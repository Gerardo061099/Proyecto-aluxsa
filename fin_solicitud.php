<?php
include("abrir_conexion.php");
$id_herramienta = $_POST['N_herramienta'];
$id_maquina = $_POST['N_maquina'];
$cantidad = $_POST['cantidad'];//4
if ($id_herramienta != "Choose..." && $id_maquina != "Choose..." && $cantidad != "" ) {//if 1
    $consulta = mysqli_query($conexion,"SELECT MAX(id_Solicitud) AS n_solicitud FROM $tbsoli_db10");
    $result = mysqli_fetch_array($consulta);
    $id_solicitud = $result['n_solicitud'];//9
    //echo "Registro realizado";
    if ($id_herramienta != "Choose..." && $id_maquina != "Choose..." && $cantidad != "" && $id_solicitud != "") {//if 2
        $query = mysqli_query($conexion,"SELECT cantidad FROM $tbherr_db7 WHERE id_Herramienta = $id_herramienta");
        $result = mysqli_fetch_array($query);
        if ($result['cantidad']>=$cantidad) {// if 3
            $resta = $result['cantidad'] - $cantidad;//3
            if ($id_herramienta != "Choose..." && $id_maquina != "Choose..." && $cantidad != "" && $id_solicitud != "") {//if 4
                mysqli_query($conexion, "INSERT INTO $tbdet_db4 (id_herramientas,id_Maquina,id_Solicitud,Cantidad) values ($id_herramienta,$id_maquina,$id_solicitud,$cantidad)");
                mysqli_query($conexion,"UPDATE $tbherr_db7 SET cantidad = $resta WHERE id_Herramienta = '$id_herramienta'");
                echo "Registro realizado";
            }//end if 4
            else {
                echo "Agunos datos están vacios";
            }
        }//end if 3
        else {
            echo "La cantidad solicitada es mayor a la cantidad en existencia";
        }
    }// end if 2 
    else{
        echo "Agunos datos están vacios";
    }
}// end if 1
else {
    echo "Agunos datos están vacios";
}
?>