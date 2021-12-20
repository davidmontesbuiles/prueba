<?php
include 'conexion.php';
$nombre = $_POST['Nom'];
$fecha = $_POST['Fec'];
$hora = $_POST['Hor'];
$continue = 0;

if($continue == 0){
    $sql = mysqli_query($mysqli, "SELECT COUNT(id_actividad) AS cont FROM actividades WHERE descripcion = '$nombre'");
    $fetch = mysqli_fetch_assoc($sql);
    $value = $fetch['cont'];
    if($value == '0'){
        $continue = 1;
    }else{
        $continue = 0;
    }
    if($continue == 0){
        $consul = mysqli_query($mysqli, "SELECT id_actividad FROM actividades WHERE descripcion = '$nombre'");
        $row = $consul->fetch_assoc();
        $id_actividad = $row['id_actividad'];
        $sqls = mysqli_query($mysqli, "INSERT INTO tiempos(fecha,hora,id_actividad) VALUES ('$fecha','$hora','$id_actividad')");
    }
}

if ($continue == 0) {
    echo '0';
}
if ($continue == 1) {
    echo '1';
}