<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Ticket</title>
    <link rel="stylesheet" href="../../Dashboard/style.css">
    <link rel="stylesheet" href="formulario.css">
</head>
<body class="body">        
    <div class="container"> 
        <?php include "../../plantilla/aside.php"?>

        <main>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label for="name">Nombre:</label>
                    <input id="name" name="name" type="text" value="" size="30"/>
                    <span id="name_validation"></span>
                </div>
                <div class="row">
                    <label for="name">Apellido Materno:</label>
                    <input id="name" name="name" type="text" value="" size="30" />
                    <span id="name_validation"></span>
                </div>
                <div class="row">
                    <label for="name">Apellido Paterno:</label>
                    <input id="name" name="name" type="text" value="" size="30" />
                    <span id="name_validation"></span>
                </div>
                <div class="row">
                    <label for="email">Numero Matricula:</label>
                    <input id="number" name="email" type="text" value="" size="30" />
                    <span id="email_validation"></span>
                </div>
                <div class="row">
                    <label for="message">Mensaje:</label><br />
                    <textarea id="message" name="message" rows="20" cols="92"></textarea><br />
                    <span id="message_validation"></span>
                </div>
                <input id="submit_button" type="submit" value="Enviar"/>
            </form>
        </main>

        <?php include "../../plantilla/rightSection.php"?>
    </div>   
    <script src="../../Dashboard/orders.js"></script>
    <script src="../../Dashboard/index.js"></script>
</body>
</html>