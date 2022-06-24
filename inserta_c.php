<?php
    include("abrir_conexion.php");
    $Descripcion = $_POST['descripcion'];
    $Material = $_POST['material'];
    if ($Descripcion == "" || $Material == "") {
        echo "Los datos recibidos estan vacios";
    }else {
        mysqli_query($conexion,"INSERT INTO $tbcat_db3 (Descripcion,Material) values ('$Descripcion','$Material')");
        echo "Los datos se insertaron correctamente";
        include("cerrar_conexion.php");
    }
?>

