<?php
    require '../BaseDeDatos/database.php';
    //Autenticar el Usuario
    $db = conectarDB();
    $errores = [];


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['Password']);
        
        if(!$email){
            $errores[] = "El campo Email no puede estar vacio";
        }
        if(!$password){
            $errores[] = "El campo Contraseña no puede estar vacio";
        }
        if(empty($errores)){
            //Revisar si el usuario existe.
            $query = "SELECT * FROM usuario WHERE ECORREO = '${email}'";
            $resultado = mysqli_query($db, $query);
            if($resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['CONTRASEÑA']);
                if($auth){
                    //El usuario esta aunteticado
                    session_start();

                    //Llenar el arreglo de la sesion
                    $_SESSION['Correo'] = $usuario['ECORREO'];
                    $_SESSION['Contraseña'] = $usuario['CONTRASEÑA'];
                    $_SESSION['Grupo'] = $usuario['GRUPO'];
                    $_SESSION['Grado'] = $usuario['GRADO'];
                    $_SESSION['FotoDePerfil'] = $usuario['FOTOPERFIL'];
                    $_SESSION['NumeroDeCuenta'] = $usuario['NUMEROCUENTA'];
                    $_SESSION['Genero'] = $usuario['GENERO'];
                    $_SESSION['FechaDeNacimiento'] = $usuario['FECHANACIMIENTO'];
                    $_SESSION['ApellidoPaterno'] = $usuario['APELLIDOPATERNO'];
                    $_SESSION['ApellidoMaterno'] = $usuario['APELLIDOMATERNO'];
                    $_SESSION['Nombre'] = $usuario['NOMBRE'];
                    $_SESSION['NombreUsuario'] = $usuario['NOMBREUSUARIO'];
                    $_SESSION['Rol'] = (int)$usuario['ROLID'];
                    $_SESSION['UsuarioID'] = (int)$usuario['USUARIOID'];
                    $_SESSION['Login'] = true;
                    header('Location: ../Dashboard/index.php');
                }else{
                    $errores[] = 'El password es incorrecto';
                }
            }else{
                $errores[] = "El Usuario no existe";
            }
        }
    }
?>





<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Iniciar Sesion | UAS FIC - Mesa De Ayuda</title>
</head>

<body class="color-fondo">
    <div class="container" id="container">
        <div class="form-container sign-in">
        <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            <form action="/Login/index.php" method="POST" id="loginForm2">
                <img src="images/fic.png">
                <h1><center> Iniciar Sesion</center></h1>
                <input id="Email" name="Email" type="email" placeholder="Correo Electronico" required/>
                <input id="Password" name="Password" type="password"  placeholder="Contraseña" required/>
                <input class="buttom" type="submit" value="Iniciar sesión"/>
                <a href="#">Olvide Mi Contraseña</a>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>MESA DE AYUDA</h1>
                    <h2>Facultad De Informatica</h2>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <!--<script src="../backend.js"></script>-->
</body>
</html>