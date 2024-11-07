<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - {{ $invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .info, .billing-address {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
        }
        .summary-table {
            margin-top: 20px;
        }
        .summary-table th, .summary-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .summary-table th {
            text-align: left;
        }
        .total {
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/front/img/logo-name.png" alt="Logo Empresa">
            <h1>Factura Simplificada</h1>
            <p><strong>Nº de factura:</strong> {{ $invoice_number }} <strong>Fecha:</strong> {{ $date }} <strong>Forma de pago:</strong> {{ $payment_method }}</p>
            <p><strong>Pedido:</strong> {{ $order_number }} <strong>Albarán:</strong> {{ $delivery_note }}</p>
        </div>

        <h3>Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Artículo</th>
                    <th>Precio</th>
                    <th>Und</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
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

        <h3>Resumen</h3>
        <table class="summary-table">
            <tbody>
                <tr>
                    <th>Base Imponible</th>
                    <td>{{ $tax_base }}</td>
                </tr>
                <tr>
                    <th>IVA (21%)</th>
                    <td>{{ $tax }}</td>
                </tr>
                <tr>
                    <th class="total">Total a Pagar</th>
                    <td class="total">{{ $total_amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
