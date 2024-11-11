<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - {{ $invoice_number }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 85%;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 32px;
            color: #333;
            margin: 0;
        }
        .header p {
            font-size: 16px;
            color: #777;
        }
        .billing-address, .summary-table {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .billing-address p, .summary-table th, .summary-table td {
            font-size: 14px;
            color: #555;
        }
        .billing-address p {
            margin: 5px 0;
        }
        .summary-table th {
            text-align: left;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 6px;
        }
        .summary-table td {
            padding: 10px;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #f0f0f0;
            color: #333;
        }
        td {
            background-color: #fff;
            color: #555;
        }
        .total {
            font-weight: bold;
            color: #000;
            font-size: 16px;
        }
        .summary-table .total {
            color: #333;
            font-size: 18px;
            text-align: left;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/front/img/logo-name.png">
            <h1>Factura Simplificada</h1>
            <p><strong>Nº de factura:</strong> {{ $invoice_number }} | <strong>Fecha:</strong> {{ $date }} |
            <strong>Pedido:</strong> {{ $order_number }} | <strong><strong>Forma de pago:</strong> Tarjeta</p>
        </div>

        <div class="billing-address">
            <p><strong>Cliente:</strong> {{ $billing_address->name }} {{ $billing_address->last_name }}</p>
            <p><strong>Empresa:</strong> {{ $billing_address->company }}</p>
            <p><strong>Dirección:</strong> {{ $billing_address->street }} {{ $billing_address->number }}, {{ $billing_address->zip_code }} {{ $billing_address->city }}, {{ $billing_address->population }}</p>
            <p><strong>Teléfono:</strong> {{ $billing_address->phone_number }}</p>
        </div>

        <h3>Detalle de los Artículos</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Artículo</th>
                    <th>Precio</th>
                    <th>Und</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['product_id'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ number_format($item['price'], 2) }} €</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['total'], 2) }} €</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3>Resumen de la Factura</h3>
        <table class="summary-table">
            <tbody>
                <tr>
                    <th>Base Imponible</th>
                    <td>{{ number_format($tax_base, 2) }} €</td>
                </tr>
                <tr>
                    <th>IVA (21%)</th>
                    <td>{{ number_format($tax, 2) }} €</td>
                </tr>
                <tr>
                    <th class="total">Total a Pagar</th>
                    <td class="total">{{ number_format($total_amount, 2) }} €</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Gracias por tu compra.</p>
    </div>
</body>
</html>
