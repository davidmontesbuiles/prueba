<?php 
session_start();
include 'conexion.php';
$nombre = $_POST['Nom'];
$continue = 0;
$id = $_SESSION['id_usuario'];
if($continue == 0){
    $sqls = mysqli_query($mysqli, "SELECT COUNT(id_actividad) AS cont FROM actividades WHERE descripcion = '$nombre' AND id_usuario = '$id'");
    $f2 = mysqli_fetch_assoc($sqls);
    $val2 = $f2['cont'];
    if ($val2 == '0') {
        $continue = 0;
    } else {
        $continue = 1;
    }
    if($continue == 0){
        $sql = mysqli_query($mysqli, "INSERT INTO actividades(descripcion, id_usuario) VALUES ('$nombre','$id')");
    }
}

if ($continue == 0) {
    echo '0';
}
if ($continue == 1) {
    echo '1';
}
