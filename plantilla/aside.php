<?php
// ... tu código existente para conectarte a la base de datos y demás

// Consulta para contar los registros en la tabla 'tickets' sin revisar
$consulta_cantidad = "SELECT COUNT(*) AS total_sin_revisar FROM tickets WHERE REVISION = 0";
$resultado_cantidad = mysqli_query($db, $consulta_cantidad);

if ($resultado_cantidad) {
    $row = mysqli_fetch_assoc($resultado_cantidad);
    $cantidad_sin_revisar = $row['total_sin_revisar'];
} else {
    $cantidad_sin_revisar = 0; // Si hay algún error, mostrará 0
}
?>
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="/Dashboard/images/fic.png">
                </div>
                <div class="close" id="close-btn">
                </div>
            </div>

            <div class="sidebar" class="active">
                <a href="../Dashboard/index.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Tablero</h3>
                </a>
                <a href="../RF/Usuarios/usuarios.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Usuarios</h3>
                </a>
                <a href="../RF/Tickets/revisadosTickets/revisadosTickets.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Historial</h3>
                </a>
                <a href="../RF/Tickets/tickets.php">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count"><?php echo $cantidad_sin_revisar; ?></span>
                </a>
                <a href="../plantilla/cerrarSesion.php">
                    <span class="material-icons-sharp">
                    logout
                    </span>
                    <h3>Cerrar Sesion</h3>
                </a>
            </div>
        </aside>
