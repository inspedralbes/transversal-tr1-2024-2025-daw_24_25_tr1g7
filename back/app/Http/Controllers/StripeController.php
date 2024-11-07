<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArticuloComanda;
use App\Models\Comanda;
use App\Models\Invoice;
use App\Models\Producte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    //
    public function createSetupIntent()
    {
        $user = Auth::user();

        // Si el usuario no tiene un Stripe ID, lo crea
        if (!$user->hasStripeId()) {
            $user->createAsStripeCustomer();
        }

        // Creación del SetupIntent
        $intent = $user->createSetupIntent();

        // Devolver el client_secret del SetupIntent
        return response()->json([
            'client_secret' => $intent->client_secret
        ]);
    }

    public function addPaymentMethod(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user->hasStripeId()) {
                $user->createAsStripeCustomer();
            }

            $existingPaymentMethodsCount = $user->paymentMethods()->count();

            $user->addPaymentMethod($request->paymentMethod);

            $paymentMethods = $user->paymentMethods();

            if ($existingPaymentMethodsCount === 1 && $paymentMethods->isNotEmpty()) {
                $user->updateDefaultPaymentMethod($paymentMethods->first()->id);
            }

            $defaultPaymentMethod = $user->defaultPaymentMethod();

            return response()->json([
                'status' => 'success',
                'message' => 'Payment Method added successfully!',
                'user' => $user,
                'paymentMethods' => $paymentMethods,
                'defaultPaymentMethod' => $defaultPaymentMethod
            ]);

        } catch (\Exception $e) {
            \Log::error('Error adding payment method: ' . $e->getMessage());

            return response()->json(['status' => 'error', 'message' => 'Failed to add payment method'], 500);
        }
    }

    public function retrievePaymentMethod()
    {
        $user = Auth::user();

        $paymentMethods = $user->paymentMethods();
        $defaultPaymentMethod = $user->defaultPaymentMethod();

        return response()->json([
            'status' => 'success',
            'message' => 'Payment Method retrieved successfully!',
            'paymentMethods' => $paymentMethods,
            'defaultPaymentMethod' => $defaultPaymentMethod]);
    }

    public function setDefaultPaymentMethod(Request $request)
    {
        try {
            $user = Auth::user();

            $user->updateDefaultPaymentMethod($request->payment_method_id);

            $paymentMethods = $user->paymentMethods();
            $defaultPaymentMethod = $user->defaultPaymentMethod();


            return response()->json([
                'status' => 'success',
                'message' => 'Default payment method updated successfully',
                'paymentMethods' => $paymentMethods,
                'defaultPaymentMethod' => $defaultPaymentMethod
            ]);

        } catch (\Exception $e) {
            \Log::error('Error setting default payment method: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to set default payment method'
            ], 500);
        }

    }

    public function purchase(Request $request)
    {
        $data = $request->validate([
            'paymentMethod' => 'required',
            'price'=>'required',
            'products' => 'required',
            'shippingAddress' => 'required',
            'billingAddress' => 'required'
        ],
        [
            'paymentMethod.required'=>'Payment Method is required.',
            'price.required'=>'Price is required.',
            'products.required'=>'Products is required.',
            'shippingAddress.required'=>'Shipping Address is required.',
            'billingAddress.required'=>'Billing Address is required.'
        ]);

        $user = Auth::user();

        $priceInCents = (int) round($request->input('price') * 100);
        $paymentMethod = $request->input('paymentMethod');

        try {
            $charge = $user->charge($priceInCents, $paymentMethod['id'], [
                'return_url' => route('home'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
//        return $data['products'];
        $order = new Comanda();
        $order->idUser = $user->id;
        $order->idBillingAddress = $data['billingAddress']['id'];
        $order->idShippingAddress = $data['shippingAddress']['id'];
        $order->status = "pending";
        $order->price = $data['price'];
        $order->save();

        foreach ($data['products'] as $productInCart){
            $orderProducts = new ArticuloComanda();
            $orderProducts->idOrder = $order->id;
            $orderProducts->idProduct = $productInCart['id'];
            $orderProducts->num_product = $productInCart['num_product'];
            $orderProducts->save();

            $product = Producte::findOrFail($productInCart['id']);
            $product->stock = $product->stock - $productInCart['num_product'];
            $product->save();
        }

        $invoice = new Invoice();
        $invoice->idOrder = $order->id;
        $invoice->idUser = $user->id;
        $invoice->price = $data['price'];
        $invoice->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Payment Method purchased successfully!',
            'charge' => $charge
        ]);

    }

}
