<?php


function conectarDB(){
    $db = new mysqli('localhost', 'root', '2001', 'mesadeayuda');
    if(!$db){
        // Si hay un error, muestra un mensaje y devuelve false
        echo "Error al conectar: " . mysqli_connect_error();
        exit;
    } else {
        // Si la conexión es exitosa, devuelve el objeto de conexión
        return $db;
    }
}
?>