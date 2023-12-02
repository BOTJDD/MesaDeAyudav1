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
            <h1>Tablero Administrador</h1>
            <!-- Analyses -->
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
            </div>
            <!-- End of Analyses -->
            <!-- New Users Section -->
            <div class="new-users">
                <h2>Admin Conectados</h2>   
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
            </div>
            <!-- End of New Users Section -->
            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Tickets Abiertos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tickets</th>
                            <th>Propietario</th>
                            <th>Estatus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Mostrar todos</a>
            </div>
            <!-- End of Recent Orders -->
        </main>
        
        <?php include "../plantilla/rightSection.php"?>
    </div>   
    <script src="/Dashboard/orders.js"></script>
    <script src="/Dashboard/index.js"></script>
</body>
</html>