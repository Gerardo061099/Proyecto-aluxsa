<?php
include("abrir_conexion.php");
$id = $_POST['modal_id'];
if ($id !="") {
    mysqli_query($conexion,"DELETE FROM $tbu_db1 WHERE id_us = '$id'");
    echo "Registo eliminado";
} else {
    echo "datos vacios";
}
?>