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
    $consulta = "SELECT * FROM usuario WHERE USUARIOID = {$_SESSION['UsuarioID']}";
    $resultado = mysqli_query($db, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);

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
        //RECOPILAR DATOS DEL FORMULARIO
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
            if (!is_dir($carpetaImagenes)) {
                // Verifica si el directorio no existe antes de crearlo
                if (!mkdir($carpetaImagenes, 0777, true)) {
                    die('Error al crear la carpeta de imágenes...');
                }
            }
        //Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) );

        //Subir la imagen
        move_uploaded_file($foto_perfil['tmp_name'], $carpetaImagenes . "/" . $nombreImagen . ".jpg");
    
        //Hashear Contraseña
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
        //Query para ACTUALIZAR el usuario
        $query = "UPDATE usuario SET NOMBREUSUARIO = '${nombre_usuario}', CONTRASEÑA = '${passwordHash}', ECORREO = '${email}', ROLID = '${ROL}', NOMBRE = '${nombre}', APELLIDOPATERNO = '${apellidop}', APELLIDOMATERNO = '${apellidom}', FECHANACIMIENTO = '${fecha_nacimiento}', GENERO = '${genero}', NUMEROCUENTA = '${numero_cuenta}', FOTOPERFIL = '${nombreImagen}', GRADO = '${grado}', GRUPO = '${grupo}' WHERE USUARIOID = {$_SESSION['UsuarioID']}";
    
        //Agregarlo a la base de datos
        $resultadofinal = mysqli_query($db, $query);
        if($resultadofinal){
                    //El usuario esta aunteticado
                    session_start();

                    //Llenar el arreglo de la sesion
                    $_SESSION['Correo'] = $email;
                    $_SESSION['Grupo'] = $grupo;
                    $_SESSION['Grado'] = $grado;
                    $_SESSION['FotoDePerfil'] = $foto_perfil;
                    $_SESSION['NumeroDeCuenta'] = $numero_cuenta;
                    $_SESSION['Genero'] = $genero;
                    $_SESSION['FechaDeNacimiento'] = $fecha_nacimiento;
                    $_SESSION['ApellidoPaterno'] = $apellidop;
                    $_SESSION['ApellidoMaterno'] = $apellidom;
                    $_SESSION['Nombre'] = $nombre;
                    $_SESSION['NombreUsuario'] = $nombre_usuario;
                    $_SESSION['Rol'] = (int)$ROL;
                    $_SESSION['UsuarioID'] = $_SESSION['UsuarioID'];
                    $_SESSION['Login'] = $_SESSION['Login'];
            header('Location: ../Dashboard/index.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion De Usuario</title>
    <link rel="stylesheet" href="modificarUsuario.css">
</head>
<body>
<h2>Formulario de Modificacion de Usuario</h2>
    <form action="/RegistrarUsuarios/modificarUsuario.php" method="post" enctype="multipart/form-data">
        <br><a href="../RF/Usuarios/usuarios.php" class="boton">Volver</a><br><br><br><br>
        <label for="NombreUsuario">Nombre Usuario:</label><br>
        <input type="text" id="NombreUsuario" name="NombreUsuario" value="<?php echo htmlspecialchars($usuario['NOMBREUSUARIO']);?>" required><br><br>

        <label for="Nombre">Nombre:</label><br>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo htmlspecialchars($usuario['NOMBRE']);?>" required><br><br>

        <label for="ApellidoPaterno">Apellido Paterno:</label><br>
        <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" value="<?php echo htmlspecialchars($usuario['APELLIDOPATERNO']);?>" required><br><br>

        <label for="ApellidoMaterno">Apellido Materno:</label><br>
        <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" value="<?php echo htmlspecialchars($usuario['APELLIDOMATERNO']);?>" required><br><br>

        <label for="Email">Correo electrónico:</label><br>
        <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($usuario['ECORREO']);?>" required><br><br>

        <label for="Password">Contraseña:</label><br>
        <input type="password" id="Password" name="Password" minlength="8" required><br><br>

        <label for="ConfirmPassword">Confirmar contraseña:</label><br>
        <input type="password" id="ConfirmPassword" name="ConfirmPassword" minlength="8" required><br><br>

        <label for="FechaNacimiento">Fecha de nacimiento:</label><br>
        <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo htmlspecialchars($usuario['FECHANACIMIENTO']);?>" required><br><br>

        <label for="Genero">Género:</label><br>
        <select id="Genero" name="Genero" value="<?php echo htmlspecialchars($usuario['GENERO']);?>" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="36 Tipos De Gays">36 Tipos De Gays</option>
        </select><br><br>

        <label for="NumeroCuenta">Número de cuenta:</label><br>
        <input type="text" id="NumeroCuenta" name="NumeroCuenta" value="<?php echo htmlspecialchars($usuario['NUMEROCUENTA']);?>"><br><br>

        <label for="FotoPerfil">Foto de perfil:</label><br>
        <input type="file" id="FotoPerfil" name="FotoPerfil" accept="image/jpeg, image/png" value="<?php echo isset($usuario['FOTOPERFIL']) ? htmlspecialchars($usuario['FOTOPERFIL']) : '';?>"><br><br>

        <label for="Grado">Grado:</label><br>
        <select id="Grado" name="Grado" required>
            <option value="1" <?php echo ($usuario['GRADO'] == 1) ? 'selected' : ''; ?>>1</option>
            <option value="2" <?php echo ($usuario['GRADO'] == 2) ? 'selected' : ''; ?>>2</option>
            <option value="3" <?php echo ($usuario['GRADO'] == 3) ? 'selected' : ''; ?>>3</option>
            <option value="4" <?php echo ($usuario['GRADO'] == 4) ? 'selected' : ''; ?>>4</option>
            <option value="5" <?php echo ($usuario['GRADO'] == 5) ? 'selected' : ''; ?>>5</option>
        </select><br><br>

        <label for="Grupo">Grupo:</label><br>
        <select id="Grupo" name="Grupo" required>
            <option value="1" <?php echo ($usuario['GRUPO'] == 1) ? 'selected' : ''; ?>>1</option>
            <option value="2" <?php echo ($usuario['GRUPO'] == 2) ? 'selected' : ''; ?>>2</option>
            <option value="3" <?php echo ($usuario['GRUPO'] == 3) ? 'selected' : ''; ?>>3</option>
            <option value="4" <?php echo ($usuario['GRUPO'] == 4) ? 'selected' : ''; ?>>4</option>
            <option value="5" <?php echo ($usuario['GRUPO'] == 5) ? 'selected' : ''; ?>>5</option>
            <option value="6" <?php echo ($usuario['GRUPO'] == 6) ? 'selected' : ''; ?>>6</option>
            <option value="7" <?php echo ($usuario['GRUPO'] == 7) ? 'selected' : ''; ?>>7</option>
        </select><br><br>

        <?php if($_SESSION['Rol'] == 1){?>
        <label for="RolID">ROL:</label><br>
        <select id="RolID" name="RolID" required>
            <option value="0" <?php echo ($usuario['ROLID'] == 0) ? 'selected' : ''; ?>>0</option>
            <option value="1" <?php echo ($usuario['ROLID'] == 1) ? 'selected' : ''; ?>>1</option>
        </select><br><br>
        <?php }?>
        <input type="submit" value="Registrarse">
        
    </form>
</body>
</html>