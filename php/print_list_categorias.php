<?php
    include("abrir_conexion.php");
    $query = $conexion -> query ("SELECT * FROM $tbcat_db3");
    while ($valores = mysqli_fetch_array($query)) {
        echo ('<option value="'.$valores['id_Categoria'].'">'.$valores['Descripcion'].' '.$valores['Material'].'</option>');
    }
    include("cerrar_conexion.php");
?>
