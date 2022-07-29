<?php
include("abrir_conexion.php");
$id = $_POST['modal_id'];
$nombre = $_POST['modal_nombre'];
$apellidos = $_POST['modal_apellidos'];
$usuario = $_POST['modal_user'];
$password = $_POST['modal_newpass'];
$num_us = $_POST['modaln_empleado'];
$estado = $_POST['modal_estado'];
if ($id != "" && $nombre != "" && $apellidos != "" && $password != "" && $num_us != "" && $estado!= "") {
    mysqli_query($conexion, "UPDATE $tbu_db1 SET Nombre='$nombre', Apellidos='$apellidos', user='$usuario', pass=PASSWORD('$password'), Num_empleado='$num_us', Estado='$estado' WHERE id_us = '$id'");
    echo "Actualizado";
}else if ($id != "" && $nombre != "" && $apellidos != "" && $password == "" && $num_us != "" && $estado!= ""){
    mysqli_query($conexion, "UPDATE $tbu_db1 SET Nombre='$nombre', Apellidos='$apellidos', user='$usuario', Num_empleado='$num_us', Estado='$estado' WHERE id_us = '$id'");
    echo "Actualizado";
}
else if ($id == "" || $nombre == "" || $apellidos == "" || $num_us == "" || $estado == "") {
    echo "Datos faltantes";
}