<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Estado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .email-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }

        .status {
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="email-content">
            <h1>¡Actualización de Estado!</h1>
            <p>Hola {{$user->name}},</p>
            <p>Tu pedido ha cambiado de estado. El nuevo estado es:</p>
            <p class="status">{{$status}}</p>
            <p>Para más detalles o si tienes alguna duda, no dudes en contactarnos.</p>

            <div class="footer">
                <p>Gracias por confiar en nosotros.</p>
                <p>Si no realizaste esta acción, por favor contáctanos inmediatamente.</p>
            </div>
        </div>
    </div>

</body>

</html>
