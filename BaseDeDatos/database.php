<?php
//Pa saber en cual error hay
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function conectarDB(){
    $db = mysqli_connect('localhost', 'root', '2001', 'mesadeayuda');
    if(!$db){
        echo "Error no se pudo conectar";
    }else{
        echo "Se pudo conectar";
    }
}
conectarDB();
?>