<?php
    require '../plantilla/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: ../Login/index.php');
    }

    //Imprime errores que pueden salir
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Importar Base De Datos
    require '../BaseDeDatos/database.php';
    $db = conectarDB();

    //Consultar para obtener los tickets
    $consulta = "SELECT * FROM usuario";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];
    //Esta vacio para que se a;ada segun despues del post incompleto y quede guardado dentro del formulario despues de cargar o enviar mal.
    $nombre_usuario = '';
    $nombre = '';
    $apellidop = '';
    $apellidom = '';
    $email = '';
    $password = '';
    $confirm_password = '';
    $fecha_nacimiento = '';
    $genero = '';
    $numero_cuenta = '';
    $foto_perfil = '';
    $grado = '';
    $grupo = '';
    $ROL = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombre_usuario = mysqli_real_escape_string($db, $_POST['NombreUsuario']); 
        $nombre = mysqli_real_escape_string($db, $_POST['Nombre']); 
        $apellidop = mysqli_real_escape_string($db, $_POST['ApellidoPaterno']); 
        $apellidom = mysqli_real_escape_string($db, $_POST['ApellidoMaterno']); 
        $email = mysqli_real_escape_string($db, $_POST['Email']); 
        $password = mysqli_real_escape_string($db, $_POST['Password']); 
        $confirm_password = mysqli_real_escape_string($db, $_POST['ConfirmPassword']); 
        $fecha_nacimiento = date($_POST['FechaNacimiento']); 
        $genero = mysqli_real_escape_string($db, $_POST['Genero']); 
        $numero_cuenta = mysqli_real_escape_string($db, $_POST['NumeroCuenta']); 
        $foto_perfil = $_FILES['FotoPerfil'];
        $grado = mysqli_real_escape_string($db, $_POST['Grado']); 
        $grupo = mysqli_real_escape_string($db, $_POST['Grupo']);
        $ROL = mysqli_real_escape_string($db, $_POST['RolID']);  
    }

    //Revisa si no viene vacio alguno de los requisitos
    if(!$nombre_usuario){
        $errores[] = "Debes añadir un nombre de usuario";
    }
    if(!$nombre){
        $errores[] = "Debes añadir un nombre";
    }
    if(!$apellidop){
        $errores[] = "Debes añadir un apellido paterno";
    }
    if(!$apellidom){
        $errores[] = "Debes añadir un apellido materno";
    }
    if(!$email){
        $errores[] = "Debes añadir un correo electronico institucional";
    }
    if(!$password or $password != $confirm_password){
        $errores[] = "Debes añadir una contraseña";
    }
    if(!$fecha_nacimiento){
        $errores[] = "Debes añadir una fecha de nacimiento";
    }
    if(!$genero){
        $errores[] = "Debes seleccionar un genero";
    }
    if(!$numero_cuenta){
        $errores[] = "Debes añadir un numero de cuenta";
    }
    if(!$grado){
        $errores[] = "Debes seleccionar un grado";
    }
    if(!$grupo){
        $errores[] = "Debes seleccionar un grupo";
    }
    if(!$ROL){
        $errores[] = "Debes seleccionar un rol";
    }

    /*Validar por tamaño (1mb Maximo)
    $medida = 1000 * 1000;
    
    if($foto_perfil['size'] > $medida){
        $errores[] = "La foto es muy pesada";
    }*/

    if(empty($errores)){
        //SUBIDA DE IMAGENES

        //Crear Carpeta
        $carpetaImagenes = '../Imagenes';
        if(!is_dir($carpetaImagenes) ){
            mkdir($carpetaImagenes);
        }

        //Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) );

        //Subir la imagen
        move_uploaded_file($foto_perfil['tmp_name'], $carpetaImagenes . "/" . $nombreImagen . ".jpg");

        //Hashear Contraseña
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        //Query para crear el usuario
        $query = "INSERT INTO usuario (NOMBREUSUARIO, CONTRASEÑA, ECORREO, ROLID, NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, FECHANACIMIENTO, GENERO, NUMEROCUENTA, FOTOPERFIL, GRADO, GRUPO) 
            VALUES ('${nombre_usuario}', '${passwordHash}', '${email}', '${ROL}', '${nombre}', '${apellidop}', '${apellidom}', '${fecha_nacimiento}', '${genero}', '${numero_cuenta}', '${nombreImagen}', '${grado}', '${grupo}');";

        //Agregarlo a la base de datos
        $resultado = mysqli_query($db, $query);
        if($resultado){
            header('Location: ../Dashboard/index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="altaUsuario.css">
</head>
<body>
    <h2>Formulario de Registro de Usuario</h2>
    <form action="/RegistrarUsuarios/altaUsuario.php" method="post" enctype="multipart/form-data">
        <br><a href="../RF/Usuarios/usuarios.php" class="boton">Volver</a><br><br><br><br>
        <label for="NombreUsuario">Nombre Usuario:</label><br>
        <input type="text" id="NombreUsuario" name="NombreUsuario" required><br><br>

        <label for="Nombre">Nombre:</label><br>
        <input type="text" id="Nombre" name="Nombre" required><br><br>

        <label for="ApellidoPaterno">Apellido Paterno:</label><br>
        <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" required><br><br>

        <label for="ApellidoMaterno">Apellido Materno:</label><br>
        <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" required><br><br>

        <label for="Email">Correo electrónico:</label><br>
        <input type="email" id="Email" name="Email" required><br><br>

        <label for="Password">Contraseña:</label><br>
        <input type="password" id="Password" name="Password" minlength="8" required><br><br>

        <label for="ConfirmPassword">Confirmar contraseña:</label><br>
        <input type="password" id="ConfirmPassword" name="ConfirmPassword" minlength="8" required><br><br>

        <label for="FechaNacimiento">Fecha de nacimiento:</label><br>
        <input type="date" id="FechaNacimiento" name="FechaNacimiento" required><br><br>

        <label for="Genero">Género:</label><br>
        <select id="Genero" name="Genero" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="36 Tipos De Gays">36 Tipos De Gays</option>
        </select><br><br>

        <label for="NumeroCuenta">Número de cuenta:</label><br>
        <input type="text" id="NumeroCuenta" name="NumeroCuenta"><br><br>

        <label for="FotoPerfil">Foto de perfil:</label><br>
        <input type="file" id="FotoPerfil" name="FotoPerfil" accept="image/jpeg, image/png"><br><br>

        <label for="Grado">Grado:</label><br>
        <select id="Grado" name="Grado" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select><br><br>

        <label for="Grupo">Grupo:</label><br>
        <select id="Grupo" name="Grupo" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
        </select><br><br>

        <label for="RolID">ROL:</label><br>
        <select id="RolID" name="RolID" required>
            <option>0</option>
            <option>1</option>
        </select><br><br>

        <input type="submit" value="Registrarse">
        
    </form>
</body>
</html>
