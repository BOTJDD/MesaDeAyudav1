<?php 
    require '../plantilla/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: ../Login/index.php');
    }
    if($_SESSION['Rol'] != 1){
        header('Location: ../RF/AltaTicket/ticket.php');
    }


  //Imprime errores que pueden salir
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  //Importar Base De Datos
  require '../BaseDeDatos/database.php';
  $db = conectarDB();

  $consulta = "SELECT tickets.FOLIO_TICKET, tickets.OPCIONES, tickets.ASUNTO, tickets.DESCRIPCION, tickets.FECHA_CREACION, tickets.ID_USUARIO, 
    usuario.NOMBREUSUARIO, usuario.USUARIOID, usuario.ROLID, usuario.ECORREO, usuario.NOMBRE, usuario.APELLIDOPATERNO, usuario.APELLIDOMATERNO, usuario.FOTOPERFIL, usuario.NUMEROCUENTA, usuario.GRUPO, usuario.GRADO
    FROM tickets INNER JOIN usuario ON tickets.ID_USUARIO = USUARIOID";
  $resultado = mysqli_query($db, $consulta);
  $usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Ejemplo</title>
</head>
<body class="body">        
    <div class="container"> 
        <?php include "../plantilla/aside.php"?>
        <main>
        <?php
            if($_SESSION['Rol'] == 1){
                ?><h1>Bienvenido Administrador</h1><?php
            }else{
                ?><<h1>Bienvenido Usuario</h1><?php
            }
        ?>
            
            
            <!-- Analyses --><!--
            <div class="analyse">
                <div class="tickets">
                    <div class="status">
                        <div class="info">
                            <h3>Total Tickets</h3>
                            <h1>50</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Visitas al Sitio</h3>
                            <h1>0</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-0%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Busquedas</h3>
                            <h1>14</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- End of Analyses -->

<!-- New Users Section -->
<div class="new-users">
    <h2>Admin Colaboradores</h2>   
    <div class="user-list">
        <?php

        // Consulta para obtener usuarios con rol igual a 1
        $consulta2 = "SELECT * FROM usuario WHERE ROLID = 1";
        $resultado2 = mysqli_query($db, $consulta2);

        if ($resultado2->num_rows > 0) {
            while ($usuario = $resultado2->fetch_assoc()) {
                echo '<div class="user">';

                if(isset($usuario["FOTOPERFIL"]) && !empty($usuario["FOTOPERFIL"])){
                    $ruta_imagen = '../Imagenes/' . $usuario["FOTOPERFIL"] . '.jpg';
                    if (file_exists($ruta_imagen)) {
                    echo '<img src="../Imagenes/' . $usuario["FOTOPERFIL"] . '.jpg">';
                }else{
                    echo '<img src="../Imagenes/fotodefault.jpg">';
                }}else{
                    echo '<img src="../Imagenes/fotodefault.jpg">';
                }

                echo '<h2>' . $usuario["NOMBREUSUARIO"] . '</h2>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay usuarios con rol de administrador.</p>';
        }
        // Cerrar la conexión a la base de datos

        ?>
    </div>
</div>
<!-- End of New Users Section -->



            <!-- New Users Section 
            <div class="new-users">
                <h2>Admin Colaboradores</h2>   
                <div class="user-list">
                    <div class="user">
                        <img src="/Dashboard/images/lola.jpeg">
                        <h2>JDD</h2>
                    </div>
                    <div class="user">
                        <img src="/Dashboard/images/aispuro.jpg">
                        <h2>Elifosters</h2>
                    </div>
                    <div class="user">
                        <img src="/Dashboard/images/chris.jpg">
                        <h2>Chris</h2>
                    </div>
                    <div class="user">
                        <img src="/Dashboard/images/plus.png">
                        <h2>Mas</h2>
                        <p>Usuarios Inactivos</p>
                    </div>
                </div>
            </div>-->
            <!-- End of New Users Section -->
            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Tickets Abiertos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID Ticket</th>
                            <th>Grado Y Grupo</th>
                            <th>Propietario</th>
                            <th>Asunto</th>
                            <th></th>
                        </tr>

                    <?php
                        if ($resultado->num_rows > 0) {
                            while ($consulta = $resultado->fetch_assoc()) {  ?>  
                            <tr>
                                <th><?php echo $consulta["FOLIO_TICKET"];?></th>
                                <th><?php echo $consulta["GRADO"] . '-' . $consulta["GRUPO"] ;?></th>
                                <th><?php echo $consulta["NOMBREUSUARIO"];?></th>
                                <th><?php echo $consulta["ASUNTO"];?></th>

                            </tr>
                            <?php }}?>
                    </thead>
                    
                </table>
            </div>
            <!-- End of Recent Orders -->
        </main>
        
        <?php include "../plantilla/rightSection.php"?>
    </div>   
    <script src="/Dashboard/orders.js"></script>
    <script src="/Dashboard/index.js"></script>
</body>
</html>