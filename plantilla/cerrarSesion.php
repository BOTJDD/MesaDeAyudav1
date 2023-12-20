<?php 
    session_start();
    $_SESSION = [];
    header('Location: ../Login/index.php');
?>