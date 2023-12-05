<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Ticket</title>
    <link rel="stylesheet" href="../../Dashboard/style.css">
</head>
<body class="body">        
    <div class="container"> 
        <?php include "../../plantilla/aside.php"?>
        <main>
            <h2>Crear Ticket</h2>
            <form action="procesar_ticket.php" method="post" enctype="multipart/form-data">
                <label for="titulo">Título del Ticket:</label><br>
                <input type="text" id="titulo" name="titulo"><br><br>
                <label for="descripcion">Descripción:</label><br>
                <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
                <label for="archivo">Adjuntar Archivo:</label><br>
                <input type="file" id="archivo" name="archivo"><br><br>
                <input type="submit" value="Crear Ticket">
        </form>
</main>
        <?php include "../../plantilla/rightSection.php"?>
    </div>   
    <script src="../../Dashboard/orders.js"></script>
    <script src="../../Dashboard/index.js"></script>
</body>
</html>