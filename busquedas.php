<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="pag">
<?php
session_start();
ob_start();
    if (isset($_POST['btn1'])) {
        $_SESSION['sesion']=0;//No a inisiado sesion
        $mail = $_POST['user'];
        $pwd = $_POST['pass'];
        if ($mail == "" || $pwd == "") {//Revisamos si algun campo está vacio
            $_SESSION['sesion']=2;
        }
        else{
            include("abrir_conexion.php");
            $_SESSION['sesion']=3;
            $resultado = mysqli_query($conexion,"SELECT * FROM $tbu_db1 WHERE user = '$mail' AND pass = PASSWORD('$pwd')");
            while($consulta = mysqli_fetch_array($resultado)){
                //echo "Bienvenido ".$consulta['user']." has iniciado sesion";
                $_SESSION['sesion']=1;
            }
            include("cerrar_conexion.php");
        }
    }
    if ($_SESSION['sesion']<>1) {
        header("Location:index.php");
    }
?>
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            ALUXSA S.A de C.V
        </a>
        <a class="navbar-brand" href="cerrar_sesion.php">
        Cerrar sesion
        </a>
            <?php
            //Contamos la cantidad que hay en el almacen
            include("abrir_conexion.php");
                $resul = mysqli_query($conexion,"SELECT SUM(cantidad) as herramientas FROM herramientas");
                while($consulta = mysqli_fetch_array($resul)){
                echo "  <button type=\"button\" class=\"btn btn-primary\">
                            <strong>N° Herramientas:</strong> <span class=\"badge badge-light\">".$consulta['herramientas']."</span>
                        </button>
                    ";
                }
            include("cerrar_conexion.php")
            ?>
    </nav>
    <nav aria-label="breadcrumb" style="margin: 5px 5px; width: 95%;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="inventario.php">Inventario</a></li>
            <li class="breadcrumb-item"><a href="registros.php">Registros</a></li>
            <li class="breadcrumb-item active" aria-current="page">Busquedas</li>
        </ol>
    </nav>
    <center>
        <div class="box-1">
            <div class="encabesado">
                <h1 class="titulo">Busquedas</h1>
            </div>
        </div>       
    </center>
    
    
    
</body>
</html>