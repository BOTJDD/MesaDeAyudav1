
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                <span class="material-icons-sharp">
                    menu
                </span>
            </button>
            <div class="dark-mode">
                <span class="material-icons-sharp active">
                    light_mode
                </span>
                <span class="material-icons-sharp">
                    dark_mode
                </span>
            </div>

            <div class="profile">
                <div class="info">
                    <p>Bienvenido, <b><?php echo $_SESSION['NombreUsuario'];?></b></p>
                    <?php
                
                        if($_SESSION['Rol'] == 1){
                            ?><small class="text-muted">Administrador</small><?php
                        }else{
                            ?><small class="text-muted">Usuario</small><?php
                        }
                    ?>
                    
                </div>
                <div class="profile-photo">
                    <img loading="lazy" src="../Imagenes/<?php echo $_SESSION['FotoDePerfil'] . ".jpg"; ?>">
                </div>
            </div>

        </div>
        <!-- End of Nav -->

        <div class="headreminders">
            <h2>Notificaciones</h2>
        <span class="material-icons-sharp">
            notifications_none
        </span>
        </div>
        <div class="notifications">
            <div class="header">
            </div>
            <?php
                $resultado_tickets = mysqli_query($db, "SELECT * FROM tickets WHERE REVISION = 0");
                if ($resultado_tickets && mysqli_num_rows($resultado_tickets) > 0) {
                    while ($ticket = mysqli_fetch_assoc($resultado_tickets)) {
                        echo '<div class="notification">';
                        echo '<div class="icon">';
                        echo '<span class="material-icons-sharp">volume_up</span>';
                        echo '</div>';
                        echo '<div class="content">';
                        echo '<div class="info">';
                        echo '<h3>' . $ticket["ASUNTO"] . '</h3>';
                        echo '<small class="text_muted">' . date("H:i", strtotime($ticket["FECHA_CREACION"])) . '</small>';
                        echo '</div>';
                        echo '<span class="material-icons-sharp">more_vert</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'No se encontraron tickets con revisión igual a 0.';
                }
                ?>
                </div>
            </div>
        </div>
    </div>
