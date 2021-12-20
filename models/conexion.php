<?php

$mysqli = new mysqli("localhost", "root", "", "prueba");
if($mysqli->connect_errno){
    die("Falló la conexión a MySQL:(" - $mysqli->mysqli_connect_errno() . ") " . $mysqli->mysqli_connect_errno());
}

mysqli_set_charset($mysqli, "utf8");