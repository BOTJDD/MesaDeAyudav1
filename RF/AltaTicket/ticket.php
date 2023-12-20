<?php   
    require '../../plantilla/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: ../../Login/index.php');
    }


    //Base De Datos
    require '../../BaseDeDatos/database.php';
    $db = conectarDB();

    //Consultar para obtener los tickets
    $consulta = "SELECT * FROM tickets";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];
    //Esta vacio para que se a;ada segun despues del post incompleto y quede guardado dentro del formulario despues de cargar o enviar mal.
    $asunto = '';
    $descripcion = '';
    $opciones = '';

    //Ejecuta el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";

        $asunto = mysqli_real_escape_string($db, $_POST['Asunto']);                 //mysql_real_escape_string evita inyectores en la base de datos
        $descripcion = mysqli_real_escape_string($db, $_POST['Descripcion']);
        $opciones = mysqli_real_escape_string($db, $_POST['Opciones']);
        $IDUsuario = $_SESSION['Rol'];
        //echo "<pre>";
        //var_dump($IDUsuario);
        //echo "</pre>";

        //Revisa si no viene vacio alguno de los requisitos
        if(!$asunto){
            $errores[] = "Debes añadir un asunto";
        }
        if(!$descripcion){
            $errores[] = "Debes añadir una descripcion";
        }
        if(!$opciones){
            $errores[] = "Debes añadir alguna opcion";
        }

        //Revisa si esta completo o no los requisitos
        if(empty($errores)){

            $query = "INSERT INTO tickets (OPCIONES, ASUNTO, DESCRIPCION, ID_USUARIO) VALUES ('$opciones', '$asunto', '$descripcion', $IDUsuario)";
            //echo "<pre>";
            //var_dump($query);
            //echo "</pre>";
            $resultado = mysqli_query($db, $query);
            echo "<pre>";
            var_dump($resultado);
            echo "</pre>";
            //Redirecciona a la pagina de inicio tras mandar el formulario
            if($resultado){

                header('Location: ../../Dashboard/index.php');
            }
        }
    }   
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Ticket</title>

    <link rel="stylesheet" href="formulario.css">
</head>
<body class="body">        
    <?php
    if($_SESSION['Rol'] != 1){
        echo "<a href='../../Login/index.php'>Cerrar Sesion</a>";
    }?>
    <div class="container"> 
<br><br>
        <main>
            <?php foreach($errores as $error):?>
                <div class="alerta error"><?php echo $error; ?></div>
            <?php endforeach; ?>
            <form id="datosTicket" method="POST" enctype="multipart/form-data" action="/RF/AltaTicket/ticket.php">
                <div class="row">
                    <label for="Opciones">Selecciona Categoria Del Asunto:</label>
                    <select id="Opciones" name="Opciones">
                        <option value="Soporte Tecnico">Soporte Tecnico</option>
                        <option value="Tutorias">Tutorias</option>
                        <option value="Servicio Social">Servicio Social</option>
                    </select>
                </div>
                <div class="row">
                    <label for="Asunto">Asunto:</label>
                    <input id="Asunto" name="Asunto" type="text" value="<?php echo $asunto; ?>" size="30"/>
                    <span id="Asunto_validation"></span>
                </div>
                <div class="row">
                    <label for="Descripcion">Descripcion:</label><br />
                    <textarea id="Descripcion" name="Descripcion" rows="20" cols="92" value="<?php echo $descripcion; ?>"></textarea><br />
                    <span id="Descripcion_Validacion"></span>
                </div>
                <input id="submit_button" type="submit" value="Enviar"/>
            </form>
        </main>

    </div>   
    <script src="../../Dashboard/orders.js"></script>
    <script src="../../Dashboard/index.js"></script>
    <!--<script src="datosTicket.js"></script>-->
</body>
</html>