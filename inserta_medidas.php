<?php
include("abrir_conexion.php");
$m2 = $_POST['Ancho'];
$m1 = $_POST['Largo'];
    if ($m1 == "" && $m2 == "") {
        echo "Datos Vacios";
    }else{
        $mp = str_replace('\'\'','pul',$m2);//cambiamos las '' por pulg en la variable m2
        $mp2 = str_replace('\'\'','pul',$m1);//cambiamos las '' por pulg en la variable m1
        mysqli_query($conexion,"INSERT INTO $tbmed_db9 (Ancho,Largo) VALUES ('$mp','$mp2')");
        echo "Insercion exitosa";
        include("cerrar_conexion.php");
    }
?>