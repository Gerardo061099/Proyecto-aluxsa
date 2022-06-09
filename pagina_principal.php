<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="img/pie-chart.png">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="pag" onload="mueveReloj()">
<?php
//importante
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
        <script>
            function mueveReloj(){
                momentoActual = new Date()
                hora = momentoActual.getHours()
                minuto = momentoActual.getMinutes()
                segundo = momentoActual.getSeconds()
                str_segundo = new String (segundo)
                if (str_segundo.length == 1)
                segundo = "0" + segundo

                str_minuto = new String (minuto)
                if (str_minuto.length == 1)
                minuto = "0" + minuto

                str_hora = new String (hora)
                if (str_hora.length == 1)
                hora = "0" + hora
                horaImprimible = hora + " : " + minuto + " : " + segundo

                document.form_reloj.reloj.value = horaImprimible
                setTimeout("mueveReloj()",1000)
            }
        </script>
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            ALUXSA S.A de C.V
        </a>
        <form name="form_reloj">
            <input type="text" name="reloj" size="10" onfocus="window.document.form_reloj.reloj.blur()" style="background-color : #283747; color : White; font-family : Verdana, Arial, Helvetica; font-size : 12pt; text-align : center;">
        </form>
        <a class="navbar-brand" href="cerrar_sesion.php">
        <img src="img/log-out.png" alt="">
        </a>
        
    </nav>
    <center>
        <div class="box-1">
            <div class="encabesado">
                <h1 class="titulo">¡Bienvenido al sistema de inventario de ALUXSA!</h1>
            </div>
        </div>
    </center>
    <center>
    <div class="card-categorias">
        <div class="card text-white bg-primary mb-3" id="card1" style="max-width: 18rem;">
            <div class="card-header">Herramientas</div>
            <div class="card-body">
                <h5 class="card-title">Lista de herramientas</h5>
                <p class="card-text"><center><a href="inventario.php"><img src="img/drilling.png" alt=""></a></center></p>
            </div>
        </div>
        <div class="card text-white bg-success mb-3" id="card1" style="max-width: 18rem;">
            <div class="card-header">Categorias</div>
            <div class="card-body">
                <h5 class="card-title">Lista de Categorias</h5>
                <p class="card-text"><center><a href="registros.php"><img src="img/categ.png" alt=""></a></center></p>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" id="card1" style="max-width: 18rem;">
            <div class="card-header">Reportes</div>
            <div class="card-body">
                <h5 class="card-title">Herramientas agotadas</h5>
                <p class="card-text"><center><a href="herramienta_agotada.php"><img src="img/report.png" alt=""></center></a></p>
            </div>
        </div>
        <div class="card text-white bg-info mb-3" id="card1" style="max-width: 18rem;">
            <div class="card-header">Solicitudes</div>
            <div class="card-body">
                <h5 class="card-title">Registrar solicitud</h5>
                <p class="card-text"><center><a href="solicitudes.php"><img src="img/responsive.png" alt=""></center></a></p>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3" id="card1" style="max-width: 18rem;">
            <div class="card-header">Salidas del almacén</div>
            <div class="card-body">
                <h5 class="card-title">Salidas del almacén</h5>
                <p class="card-text"><center><a href="salidas_almacen.php"><img src="img/out.png" alt=""></center></a></p>
            </div>
        </div>
    </div>
    </center>
</body>
</html>