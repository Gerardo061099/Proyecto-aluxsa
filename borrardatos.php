<?php
include("abrir_conexion.php");
$medida = $_POST['Medida'];
$cate = $_POST['Categoria'];
    if ($medida != "Choose..." && $cate == "") {
        mysqli_query($conexion, "DELETE FROM $tbmed_db9 WHERE id_Medidas = '$medida'");
        echo "La medida fue eliminada";
    } elseif ($cate != "Choose..." && $medida == "") {
        mysqli_query($conexion, "DELETE FROM $tbcat_db3 WHERE id_categoria = '$cate'");
        echo "La categoira fue eliminada";
    }
include("cerrar_conexion.php");
?>