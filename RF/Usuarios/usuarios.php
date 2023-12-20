<?php 
    require '../../plantilla/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: ../../Login/index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil del Usuario - Historial de Tickets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Perfil del Usuario</h1>
  </header>
  
  <main>
  <nav class="navbar">
  <a href="../../Dashboard/index.php" class="boton">Inicio</a>
  <?php 
    if($_SESSION['Rol'] == 1){  
    ?><a href="../../RegistrarUsuarios/altaUsuario.php" class="boton">Registrar Usuarios</a>
    <?php }else{

    }?>
  
</nav>
    <section>
      <h2>Detalles del Perfil</h2>
      <div>
        <?php                 
          if(isset($_SESSION["FotoDePerfil"]) && !empty($_SESSION["FotoDePerfil"])){
                    $ruta_imagen = '../../Imagenes/' . $_SESSION["FotoDePerfil"] . '.jpg';
                    if (file_exists($ruta_imagen)) {
                    echo '<img src="../../Imagenes/' . $_SESSION["FotoDePerfil"] . '.jpg">';
                }else{
                    echo '<img src="../../Imagenes/fotodefault.jpg">';
                }}else{
                    echo '<img src="../../Imagenes/fotodefault.jpg">';
                }?><br>
      </div>
      <div>
        <label for="nombreusuario">Nombre De Usuario:</label>
        <span id="nombreusuario"> <?php echo $_SESSION['NombreUsuario']?> </span>
      </div>
      <div>
        <label for="nombre">Nombre Completo:</label>
        <span id="nombre"> <?php echo $_SESSION['Nombre'] . " " . $_SESSION['ApellidoPaterno'] . " " . $_SESSION['ApellidoMaterno']?> </span>
      </div>
      <div>
        <label for="correo">Correo electrónico:</label>
        <span id="correo"> <?php echo $_SESSION['Correo']?> </span>
      </div>
      <div>
        <label for="numerocuenta">Numero De Cuenta:</label>
        <span id="numerocuenta"> <?php echo $_SESSION['NumeroDeCuenta']?> </span>
      </div>
      <div>
        <label for="rol">Rol:</label>
        <span id="rol">
          <?php if ($_SESSION['Rol'] == 1){?>
            Administrador
            <?php }else{?>
            Usuario
            <?php }?>
        </span>
      </div>
      <div>
        <label for="semestre">Semestre actual:</label>
        <span id="semestre"><?php echo $_SESSION['Grado'] . "-" . $_SESSION['Grupo']?></span>
      </div>
      <div>
        <label for="genero">Genero:</label>
        <span id="genero"> <?php echo $_SESSION['Genero']?> </span>
      </div>
      <div>
        <label for="fechanacimiento">Fecha De Nacimiento:</label>
        <span id="fechanacimiento"> <?php echo $_SESSION['FechaDeNacimiento']?> </span>
      </div>
    </section>
    <a href="../../RegistrarUsuarios/modificarUsuario.php" class="boton">Modificar Perfil</a>
  </main>

  <footer>
    <p>© <?php echo date("Y"); ?> Perfil del Usuario - Historial de Tickets</p>
  </footer>
</body>
</html>
