<?php
$host = 'nombre_del_host';
$dbname = 'nombre_de_la_base_de_datos';
$username = 'nombre_de_usuario';
$password = 'contraseña';

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
