<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura Simplificada</title>
    <style>
        /* Estilos para el PDF */
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; border: 1px solid #ddd; padding: 20px; }
        .header, .footer { text-align: center; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; }
        .total { text-align: right; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div style="display: flex; justify-content: space-between;">
            <img src="path_to_logo/logo.png" alt="Logo" style="width: 100px;">
            <div style="text-align: right;">
                <p>PC Componentes y Multimedia SLU</p>
                <p>Avda Europa, 2-3, Pol.Ind. Las Salinas</p>
                <p>30840, Alhama de Murcia, Murcia</p>
                <p>CIF: B73347494</p>
            </div>
        </div>

        <h2 style="text-align: center; margin: 20px 0;">FACTURA SIMPLIFICADA</h2>

        <table>
            <tr>
                <td>Nº de factura: {{ $invoice_number }}</td>
                <td>Fecha: {{ $date }}</td>
                <td>Forma de pago: {{ $payment_method }}</td>
            </tr>
            <tr>
                <td>Pedido: {{ $order_number }}</td>
                <td>Albarán: {{ $delivery_note }}</td>
            </tr>
        </table>

        <table style="margin-top: 20px;">
            <thead>
                <tr style="background-color: #f5f5f5;">
                    <th>Código</th>
                    <th>Artículo</th>
                    <th>Precio</th>
                    <th>Und</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['code'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table style="margin-top: 20px;">
            <tr>
                <td>Base Imponible</td>
                <td>{{ $tax_base }}</td>
                <td>IVA</td>
                <td>{{ $tax }}</td>
                <td>REC.EQUIV.</td>
                <td>{{ $equivalent_charge }}</td>
                <td>Total factura</td>
                <td>{{ $total_amount }} €</td>
            </tr>
        </table>

        <div class="total">TOTAL A PAGAR: {{ $total_amount }} €</div>
    </div>
</body>
</html>
