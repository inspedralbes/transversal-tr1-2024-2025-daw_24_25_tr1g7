<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
            'price'=>'required'
        ],
        [
            'paymentMethod.required'=>'Payment Method is required.',
            'price.required'=>'Price is required.'
        ]);

        $user = Auth::user();

        $stripeCharge = $user->charge($data['price'], $data['paymentMethod']['id']);

        return response()->json([
            'status' => 'success',
            'message' => 'Payment Method purchased successfully!',
            'charge' => $stripeCharge
        ]);

    }

}
