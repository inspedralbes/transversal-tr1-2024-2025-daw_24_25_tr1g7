<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $data = [
            'invoice_number' => '4112024/125304',
            'date' => '02/11/2024',
            'payment_method' => 'Tarjeta',
            'order_number' => '6022024171671',
            'delivery_note' => '4022024131231',
            'items' => [
                [
                    'code' => '10828143',
                    'description' => 'Razer Viper V3 Pro Ratón Gaming Inalámbrico 35000 DPI Blanco',
                    'price' => 134.70,
                    'quantity' => 1,
                    'total' => 134.70
                ]
            ],
            'tax_base' => 134.70,
            'tax' => 28.29,
            'equivalent_charge' => 0,
            'total_amount' => 162.99
        ];

        $pdf = Pdf::loadView('pdf.invoice', $data);

        // Descargar el PDF
        return $pdf->download('invoice.pdf');
    }
}
