<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Salidas del almacen</title>
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
        <a class="navbar-brand" href="pagina_principal.php">Pagina Principal</a>
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
                                <label for="herramienta">Herramienta:</label>
                                <select class="custom-select" id="herramienta">
                                    <option selected>Choose...</option>
                                    <?php
                                        include("abrir_conexion.php");
                                        $consulta = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,m.Ancho,m.Largo FROM $tbherr_db7 h inner join $tbcat_db3 c on h.id_categoria = c.id_categoria inner join $tbmed_db9 m on h.id_medidas = m.id_medidas ORDER BY h.id_herramienta ");
                                        while ($res = mysqli_fetch_array($consulta)){
                                            echo '<option value='.$res['id_herramienta'].'>'.$res['Nombre'].' '.$res['material'].' '.$res['descripcion'].' '.$res['Ancho'].' x '.$res['Largo'].'</option>';
                                        }
                                        include("cerrar_conexion.php");
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="maquina">Maquina:</label>
                                <select class="custom-select" id="maquina">
                                    <option selected>Choose...</option>
                                    <?php
                                        include("abrir_conexion.php");
                                        $con = mysqli_query($conexion,"SELECT id_Maquinaria,Nombre FROM $tbmaq_db8");
                                        while ($resul = mysqli_fetch_array($con)){
                                            echo '<option value='.$resul['id_Maquinaria'].'>'.$resul['Nombre'].'</option>';
                                        }
                                        include("cerrar_conexion.php");
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad">
                            </div>
                        </div>
                        <input type="submit" value="Registrar" class="btn btn-outline-success" onclick="RegistrarSoli(event)">
                        <a class="btn btn-primary" href="salidas_almacen.php" role="button">Finalizar</a>
                        <div id="load"></div>
                    </form>
                </div>
            </div>
        </div>
    </center>
</body>
<script src="js/app.js"></script>
</html>