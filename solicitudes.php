<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Salidas del almacén</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- libreria JQuery--->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
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
        <a class="navbar-brand" href="#">ALUXSA S.A de C.V</a>
        <a class="navbar-brand" href="pagina_principal.php">
            <img src="img/home.png" alt="">
        </a>
    </nav>
    <center>
    <div class="box-1" style="border-left: #DC7633 7px solid;">
            <div class="encabesado">
                <h1 class="titulo">Solicitud de herramientas</h1>
            </div>
        </div>
    <div class="aside1">
                <div class="contenedor" style="border-left: #48C9B0 7px solid;">
                    <div class="aside">
                        <form>
                            <img src="img/documents.png" alt=""><!-- from. Realizar una solicitud -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre :</label>
                                    <input type="text" class="form-control" id="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cantidad">Apellidos:</label>
                                    <input type="text" class="form-control" id="ap">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cantidad">N° Empleado:</label>
                                    <input type="text" class="form-control" id="n_empleado" maxlength="5">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="genero">Genero:</label>
                                    <select class="custom-select" id="genero">
                                        <option selected>Choose...</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" value="Siguiente" class="btn btn-outline-info" onclick="subirsolicitud(event)">
                            <a class="btn btn-danger" href="pagina_principal.php" role="button">Cancelar</a>
                            <br>
                            <div id="cargar"></div>
                        </form>
                    </div>
                </div>
    </div>
    
</body>
<script src="js/app.js"></script>
</html>