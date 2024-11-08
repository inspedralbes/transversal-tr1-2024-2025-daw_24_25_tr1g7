<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        /* Estilos para el botón */
        .my-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #16cfe5;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        .my-button:hover {
            background-color: #16cfe6;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>¡Gracias por tu compra!</h1>
        <p>Hola {{$user->name}},</p>
        <p>Tu compra ha sido confirmada exitosamente. Puedes ver los detalles de tu pedido haciendo clic en el siguiente botón:</p>
        
        <!-- Enlace que funciona como un botón -->
        <a href="{{$url}}" class="my-button">Ver mi compra</a>

        <p>Gracias por comprar con nosotros.</p>
    </div>

</body>
</html>
