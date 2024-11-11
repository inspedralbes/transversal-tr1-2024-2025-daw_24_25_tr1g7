<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            color: #16cfe5;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Bienvenido a NETCORE, {{$user->name}}! 🥳</h1>
        </div>
        <div class="content">
            <p>Hola {{$user->name}},</p>
            <p>Gracias por registrarte en nuestro sitio. Estamos encantados de tenerte con nosotros.</p>
            <p>Esta es la dirección de correo electrónico que has registrado: <strong>{{$user->email}}</strong>.</p>
            <p>Por favor, confirma tu correo para activar tu cuenta y comenzar a disfrutar de nuestros servicios.</p>
            <p>Si no realizaste este registro, ignora este mensaje.</p>
        </div>
        <div class="footer">
            <p>Gracias por unirte a nosotros,</p>
            <p><strong>El equipo de Soporte</strong></p>
            <p>© {{ date('Y') }} Netcore - Todos los derechos reservados</p>
        </div>
    </div>
</body>
</html>
