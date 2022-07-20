<?php
    include("abrir_conexion.php");
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $pwd = $_POST['pwd'];
    $n_empleado = $_POST['n_empleado'];
    if ($nombre != "" && $apellidos != "" && $usuario != "" && $pwd != "" && $n_empleado != "") {
        mysqli_query($conexion,"INSERT INTO $tbu_db1 (Nombre,Apellidos,user,pass,Num_empleado,Estado) VALUES ('$nombre','$apellidos','$usuario',PASSWORD('$pwd'),'$n_empleado','Activo')");
        echo "Insercion exitosa";
    } else {
        echo "Datos incorrectos";
    }
    
