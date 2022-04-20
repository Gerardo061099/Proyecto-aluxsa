<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Categorias</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <a class="navbar-brand" href="#">
            ALUXSA S.A de C.V
        </a>
        <a class="navbar-brand" href="inventario.php">
        Volver a registros
        </a>
    </nav>
    <div >
        <p></p>
    </div>
    <center>
        <div class="box-1" style="border-top: #DC7633 7px solid;">
            <div class="encabesado">
                <h1 class="titulo">Registra una categoria</h1>
            </div>
        </div>
        <div class="aside1">
            <div class="contenedor" style="border-top: #5DADE2 7px solid;">
                <div class="aside">
                    <form method="POST" action="registro_h.php">
                        <h1>Registrar:</h1><!-- from. registrar nuesvas herramientas -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="desc">Descripcion:</label>
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Vertical, Bola .....">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="material">Material:</label>
                                    <input type="text" class="form-control" id="material" name="material">
                                </div>
                            </div>
                        <input type="submit" value="Agregar" class="btn btn-success" name="add">
                    </form>
                            <?php
                                if (isset($_POST['add'])) {
                                    include("abrir_conexion.php");
                                    $descripcion = $_POST['desc'];
                                    $material = $_POST['material'];
                                    if ($descripcion=="" && $material="") {
                                        echo"<script>
                                                swal({
                                                    title: \"Campos vacios:\",
                                                    text:\"Debes llenar todos los campos.\",
                                                    icon:\"warning\",
                                                    dangerMode: true,
                                                });
                                            </script>";
                                    }
                                    else {
                                        mysqli_query($conexion, "INSERT INTO $tbcat_db3 (Descripcion,Material) values ('$descripcion','$material')");
                                        echo"<script>
                                                swal({
                                                    title: \"Insercion exitosa:\",
                                                    text:\"Se realizo un registro en la tabla herramientas.\",
                                                    icon:\"success\",
                                                    dangerMode: false,
                                                });
                                            </script>";
                                        header("Location:pagina_principal.php");
                                        include("cerrar_conexion.php");
                                    }
                                }
                            ?>
                <div>
            </div>
        </div>
</body>
</html>