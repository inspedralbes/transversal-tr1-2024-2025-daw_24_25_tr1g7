<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Comanda;
use App\Models\BillingAddress;
use PDF;

class PdfController extends Controller
{
   
    public function index($order_id)
    {
        // Obtener la factura por el idOrder
        $invoice = Invoice::where('idOrder', $order_id)->first();  
    
        if (!$invoice) {
            return abort(404, 'Factura no encontrada');
        }
    
        // Obtener la comanda asociada a la factura
        $comanda = $invoice->order;
    
        // Obtener la dirección de facturación
        $billingAddress = BillingAddress::where('idUser', $comanda->idUser)->first();
    
        // Obtener los artículos de la comanda
        $items = $comanda->products->map(function ($item) {
    
            $producto = $item->producto;
    
            return [
                'product_id' => $item->idProduct,     
                'quantity' => $item->num_product,      
                'description' => $producto->description, 
                'price' => $producto->price,         
                'total' => $producto->price * $item->num_product,  
            ];
        });
    
        // Calcular impuestos y total
        $tax_base = $items->sum('total');
        $tax = $tax_base * 0.21; 
        $total_amount = $tax_base + $tax;
    
        // Preparar los datos para la vista
        $data = [
            'invoice_number' => $invoice->id,
            'date' => $invoice->created_at->format('d/m/Y'),
            'payment_method' => $invoice->payment_method,
            'order_number' => $comanda->id,
            'delivery_note' => $comanda->delivery_note,
            'items' => $items,
            'tax_base' => number_format($tax_base, 2),
            'tax' => number_format($tax, 2),
            'total_amount' => number_format($total_amount, 2),
            'billing_address' => $billingAddress,
        ];
    
        // Generar el PDF con los datos recopilados
        $pdf = PDF::loadView('pdf.invoice', $data);
        
        return $pdf->stream('invoice.pdf');
    }
    

}
