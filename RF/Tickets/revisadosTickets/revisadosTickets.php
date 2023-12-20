<!DOCTYPE html>
  <?php
  require '../../../plantilla/funciones.php';
  $auth = estaAutenticado();
  if (!$auth) {
    header('Location: ../../../Login/index.php');
  }

  //Imprime errores que pueden salir
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  //Importar Base De Datos
  require '../../../BaseDeDatos/database.php';
  $db = conectarDB();

  // Columna por defecto para ordenar
  $orderBy = isset($_POST['orden']) ? $_POST['orden'] : 'FOLIO_TICKET'; 

  $consulta = "SELECT tickets.FOLIO_TICKET, tickets.OPCIONES, tickets.ASUNTO, tickets.DESCRIPCION, tickets.FECHA_CREACION, tickets.ID_USUARIO, tickets.REVISION,
    usuario.NOMBREUSUARIO, usuario.USUARIOID, usuario.ROLID, usuario.ECORREO, usuario.NOMBRE, usuario.APELLIDOPATERNO, usuario.APELLIDOMATERNO, usuario.NUMEROCUENTA, usuario.GRUPO, usuario.GRADO
    FROM tickets INNER JOIN usuario ON tickets.ID_USUARIO = USUARIOID WHERE tickets.REVISION = 1 ORDER BY $orderBy";
  $resultado = mysqli_query($db, $consulta);
?>

<html>
<head>
  <title>Lista de Tickets Revisados</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Lista de Tickets Revisados</h1>

  <a href="../../../Dashboard/index.php" class="boton">Inicio</a> <br> <br> <br>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="orden">Ordenar por:</label>
    <select name="orden">
        <option value="FOLIO_TICKET">Folio</option>
        <option value="FECHA_CREACION">Fecha de Creación</option>
        <!-- Agrega más opciones según las columnas que desees para ordenar -->
    </select>
    <input type="submit" value="Filtrar y Ordenar">
    </form> <br> <br> <br>

  <?php
  if ($resultado->num_rows > 0) {
    while ($consulta = $resultado->fetch_assoc()) {
        echo "<div class='ticket'>";
        echo "<div class='ticket-info'>Folio: " . $consulta["FOLIO_TICKET"] . "</div>";
        echo "<div class='ticket-info'>Opciones: " . $consulta["OPCIONES"] . "</div>";
        echo "<div class='ticket-info'>Asunto: " . $consulta["ASUNTO"] . "</div>";
        echo "<div class='ticket-info'>Descripción: " . $consulta["DESCRIPCION"] . "</div>";
        echo "<div class='ticket-info'>Fecha de Creación: " . $consulta["FECHA_CREACION"] . "</div>";
        echo "<div class='ticket-info'>ID Usuario: " . $consulta["ID_USUARIO"] . "</div>";
        echo "<div class='ticket-info'>Nombre de Usuario: " . $consulta["NOMBREUSUARIO"] . "</div>";
        echo "<div class='ticket-info'>Correo Electrónico: " . $consulta["ECORREO"] . "</div>";
        echo "<div class='ticket-info'>Nombre: " . $consulta["NOMBRE"] . "</div>";
        echo "<div class='ticket-info'>Apellido Paterno: " . $consulta["APELLIDOPATERNO"] . "</div>";
        echo "<div class='ticket-info'>Apellido Materno: " . $consulta["APELLIDOMATERNO"] . "</div>";
        echo "<div class='ticket-info'>Número de Cuenta: " . $consulta["NUMEROCUENTA"] . "</div>";
        echo "<div class='ticket-info'>Grupo: " . $consulta["GRUPO"] . "</div>";
        echo "<div class='ticket-info'>Grado: " . $consulta["GRADO"] . "</div> <br>";
        echo "</div>";
    }
  } else {
    echo "No se encontraron tickets.";
  }
  ?>
</body>
</html>