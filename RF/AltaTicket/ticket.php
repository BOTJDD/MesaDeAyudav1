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
                    <label for="lastname1">Apellido Materno:</label>
                    <input id="lastname1" name="lastname1" type="text" value="" size="30" />
                    <span id="lastname1_validation"></span>
                </div>
                <div class="row">
                    <label for="lastname2">Apellido Paterno:</label>
                    <input id="lastname2" name="lastname2" type="text" value="" size="30" />
                    <span id="lastname2_validation"></span>
                </div>
                <div class="row">
                    <label for="lastname2">Numero De Cuenta:</label>
                    <input id="lastname2" name="lastname2" type="text" value="" size="30" />
                    <span id="lastname2_validation"></span>
                </div>
                <div class="row">
                    <label for="opciones">Selecciona Categoria Del Asunto:</label>
                    <select id="opciones" name="opciones">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
                </div>
                <div class="row">
                    <label for="affair">Asunto:</label>
                    <input id="affair" name="affair" type="text" value="" size="30"/>
                    <span id="affair_validation"></span>
                </div>
                <div class="row">
                    <label for="message">Descripcion:</label><br />
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