<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/copy.png">
    <title>Registro de nuevas herramientas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
</head>
<body style="background: #17202A;">
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
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="registro_h.php">
            <img src="img/back.png" alt="sin respuesta">
        </a>
        <a class="navbar-brand" href="#">
        ALUXSA S.A de C.V
        </a>
    </nav>
    <center>
        <div class="box-1" style="border-top: #DC7633 7px solid;">
            <div class="encabesado">
                <h1 class="titulo">Registro de medidas</h1>
            </div>
        </div>
        <div class="aside1">
                <div class="contenedor" style="border-top: #5DADE2 7px solid;">
                    <div class="aside">
                        <form enctype="multipart/form-data">
                        <h1>Medidas:</h1>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ancho">Ancho:</label>
                                    <input type="text" class="form-control" id="ancho">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="largo">Largo:</label>
                                    <input type="text" class="form-control" id="largo">
                                </div>
                            </div>
                            <input type="submit" value="Agregar" class="btn btn-success" onclick="medidas(event)">
                            <div id="cargando"></div>
                        </form>
                    </div>
                </div>
        </div>
        <nav aria-label="Page navigation example" style="margin: 10px 10px;">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="inventario.php">Previous</a>
                </li>
            </ul>
        </nav>
    </center>
    <script src="js/funcion.js"></script>
</body>
</html>