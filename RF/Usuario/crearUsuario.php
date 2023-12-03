<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="../../Dashboard/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <div class="container"> 
        <?php include "../../plantilla/noInicioSesion/noInicioAside.php"?>
            <main>
            <form action="/procesar_formulario" method="post">
                <label for="nombre">Nombre completo:</label><br>
                <input type="text" id="nombre" name="nombre" required><br><br>
                <label for="correo">Correo electrónico:</label><br>
                <input type="email" id="correo" name="correo" required><br><br>
                <label for="contrasena">Contraseña:</label><br>
                <input type="password" id="contrasena" name="contrasena" required><br><br>
                <label for="confirmar_contrasena">Confirmar contraseña:</label><br>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required><br><br>
                <input type="submit" value="Crear cuenta">
</form>
            </main>
        <?php include "../../plantilla/noInicioSesion/noInicioRightSection.php"?>
    </div>
    <script src="../../Dashboard/orders.js"></script>
    <script src="../../Dashboard/index.js"></script>
</body>
</html>