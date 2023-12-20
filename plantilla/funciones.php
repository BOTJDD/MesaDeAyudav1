<?php
function estaAutenticado() : bool{
    session_start();
    $auth = $_SESSION['Login'];
    if($auth){
        return true;
    }else{
        return false;
    }
}
?>