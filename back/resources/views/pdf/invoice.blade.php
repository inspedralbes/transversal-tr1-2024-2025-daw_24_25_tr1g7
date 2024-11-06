<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - {{ $invoice_number }}</title>
</head>
<body>
    <h1>Factura: {{ $invoice_number }}</h1>
    <p><strong>Fecha:</strong> {{ $date }}</p>
    <p><strong>Método de pago:</strong> {{ $payment_method }}</p>
    <p><strong>Número de orden:</strong> {{ $order_number }}</p>
    <p><strong>Nota de entrega:</strong> {{ $delivery_note }}</p>

    <h2>Dirección de facturación:</h2>
    <p>{{ $billing_address->name }} {{ $billing_address->last_name }}</p>
    <p>{{ $billing_address->company }}</p>
    <p>{{ $billing_address->street }} {{ $billing_address->number }}, {{ $billing_address->zip_code }} {{ $billing_address->city }}, {{ $billing_address->population }}</p>
    <p><strong>Teléfono:</strong> {{ $billing_address->phone_number }}</p>

    <h3>Items</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['code'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Resumen</h3>
    <p><strong>Base Imponible:</strong> {{ $tax_base }}</p>
    <p><strong>IVA:</strong> {{ $tax }}</p>
    <p><strong>Total:</strong> {{ $total_amount }}</p>
</body>
</html>
