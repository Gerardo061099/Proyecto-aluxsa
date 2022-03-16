<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
ob_start();
if (isset($_POST['btn1'])) {

    $_SESSION['sesion']=0;//No a inisiado sesion
    $mail = $_POST['user'];
    $pwd = $_POST['pass'];

    if ($mail == "" || $pwd == "") {
        $_SESSION['sesion']=2;
    }
    else{
        include("abrir_conexion.php");
        $_SESSION['sesion']=3;
        $resultado = mysqli_query($conexion,"SELECT * FROM $tbu_db1 WHERE user = '$mail' AND pass = '$pwd'");
        while($consulta = mysqli_fetch_array($resultado)){
            echo "Bienvenido ".$consulta['user']." has iniciado sesion";
            $_SESSION['sesion']=1;
        }
        include("cerrar_conexion.php");
    }
    
}
if ($_SESSION['sesion']<>1) {
    header("Location:index.php");
}
?>
    
    <?php


    ?>
</nav>
</body>
</html>