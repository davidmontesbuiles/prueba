<?php 
session_start();

include 'conexion.php';

$user = $_POST['User'];
$ip = $_SERVER['REMOTE_ADDR'];
$contraseña = $_POST['Pass'];
$continue = 0;

if($continue == 0){
    $sql = mysqli_query($mysqli, "SELECT COUNT(id_usuario) AS cont FROM usuarios WHERE usuario='$user' AND contraseña='$contraseña'");
    $fetch = mysqli_fetch_assoc($sql);
    $value = $fetch['cont'];

    if($value == '1'){
        $sqlss = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE usuario='$user' AND contraseña='$contraseña'");
        $f2s = mysqli_fetch_assoc($sqlss);
        $_SESSION['id_usuario'] = $f2s['id_usuario'];
        $_SESSION['nombres'] = $f2s['nombres'];
        $continue = 0;
    }else{
        $continue = 1;
    }
}

if ($continue == 0) {
    echo '0';
}
if ($continue == 1) {
    echo '1';
}