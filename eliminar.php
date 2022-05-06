<?php
include("abrir_conexion.php");
$id = $_POST['id'];
if ($id != "") {
    $sql = mysqli_query($conexion,"DELETE FROM $tbherr_db7 where id_herramienta = $id ");
    $resultado (mysqli_fetch_array($sql));
    echo "se elimino el registro";
}else {
    echo "<script type='text/javascript'>
            alert('ocurrion un problea al obtener la variable id');
    </script>";
}


?>