<?php
session_start();
class consultas{
    
    public static function cargar_actividades(){
        $contenido = '';
        include 'conexion.php';
        $id = $_SESSION['id_usuario'];
        $consu = $mysqli->query("SELECT * FROM actividades WHERE id_usuario = '$id' ORDER BY id_actividad ASC");
        if($consu->num_rows > 0){
            while($r_consu = $consu->fetch_assoc()){
                $contenido .= '
                <tr>
                    <td>'. $r_consu["descripcion"].'</td>
                </tr>
                ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
    public static function cargar_tiempos(){
        $contenido = '';
        include 'conexion.php';
        $consu = $mysqli->query("SELECT actividades.descripcion, fecha, hora FROM tiempos INNER JOIN actividades ON tiempos.id_actividad = actividades.id_actividad ORDER BY tiempos.id_actividad ASC");
        if($consu->num_rows > 0){
            while($r_consu = $consu->fetch_assoc()){
                $contenido .= '
                <tr>
                    <td>'. $r_consu["descripcion"].'</td>
                    <td>'. $r_consu["fecha"].'</td>
                    <td>'. $r_consu["hora"].' hora(s)</td>
                </tr>
                ';
            }
        }
        $mysqli->close();
        return $contenido;
    }

    public static function cargar_act_selec(){
        $id = $_SESSION['id_usuario'];
        $contenido = '';
        include 'conexion.php';
        $consu = $mysqli->query("SELECT * FROM actividades WHERE id_usuario = '$id' ORDER BY id_actividad ASC");
        if($consu->num_rows > 0){
            while($r_consu = $consu->fetch_assoc()){
                $contenido .= '
                    <option value="'. $r_consu["descripcion"].'" >'. $r_consu["descripcion"].'</option>
                ';
            }
        }
        $mysqli->close();
        return $contenido;
    }
}