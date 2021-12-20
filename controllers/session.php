<?php
session_start();
date_default_timezone_set('America/Bogota');
if (!isset($_SESSION['id_usuario'])) {
    session_unset();
    session_destroy();
    header("location: ../views/login.php");
}else{
    include_once '../views/index.php';
}
