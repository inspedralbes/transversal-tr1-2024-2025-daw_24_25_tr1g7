<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $billingAddress = BillingAddress::where('idUser', $user->id)->first(); 
        
        $data = [
            'invoice_number' => '4112024/125304',
            'date' => now()->format('d/m/Y'),  
            'payment_method' => 'Tarjeta',  
            'order_number' => '6022024171671',  
            'delivery_note' => '4022024131231',  
            'items' => [
                [
                    'code' => '10828143',
                    'description' => 'Razer Viper V3 Pro Ratón Gaming Inalámbrico 35000 DPI Blanco',
                    'price' => 134.70,
                    'quantity' => 1,
                    'total' => 134.70,
                ]
            ],
            'tax_base' => 134.70,
            'tax' => 28.29,
            'equivalent_charge' => 0,
            'total_amount' => 162.99,
            'billing_address' => $billingAddress, 
        ];

        // Generar el PDF con los datos obtenidos
        $pdf = PDF::loadView('pdf.invoice', $data);  
        
        // Mostrar el PDF en el navegador
        return $pdf->stream('invoice.pdf');
    }
}
