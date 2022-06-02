<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <script src="html2pdf.bundle.min.js"></script>
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
    </nav>
    <center>
    <div style="margin: 0px 10px; background: #FDFEFE;">
                        <h1 class="titulos" style="text-align:left;"><strong>Salidas del almacen</strong></h1>
                    </div>
                    <div class="tabla-herramientas">
                        <?php
                            include("abrir_conexion.php");// conexion con la BD
                            $resultados = mysqli_query($conexion,"SELECT s.id_solicitud,e.nombre as solicitante,e.apellidos,h.Nombre as herramienta,c.Descripcion,c.Material,g.Num_gavilanes AS Gav,m.Largo,m.Ancho,d.cantidad,s.Fecha from $tbsoli_db10 s inner join $tbdet_db4 d on s.id_solicitud = d.id_solicitud inner join $tbherr_db7 h on d.id_herramientas = h.id_herramienta inner join $tbcat_db3 c on h.id_categoria = c.id_categoria inner join $tbgav_db6 g on h.id_gavilanes = g.id_gav inner join $tbmed_db9 m on h.id_medidas = m.id_medidas inner join $tbem_db5 e on s.id_empleado = e.id_empleado;");
                            //Unimos tabla Herramientas con categorias y medidas
                            echo "
                            <table class=\"table\" id=\"herramientas\">
                                        <thead class=\"thead-dark\">
                                            <tr>
                                                <th><center>#</center></th>
                                                <th><center>Solicitante</center></th>
                                                <th><center>Apellidos</center></th>
                                                <th><center>Herramienta</center></th>
                                                <th><center>Descripcion</center></th>
                                                <th><center>Material</center></th>
                                                <th><center>Gav</center></th>
                                                <th><center>Ancho</center></th>
                                                <th><center>Largo</center></th>
                                                <th><center>Cantidad</center></th>
                                                <th><center>Fecha</center></th>
                                            </tr>
                                        </thead>
                                ";
                                while($consulta = mysqli_fetch_array($resultados)){
                                echo 
                                "<tbody class=\"body-tb\">
                                    <tr>
                                        <td><center>".$consulta['id_solicitud']."</center></td>
                                        <td><center>".$consulta['solicitante']."</center></td>
                                        <td><center>".$consulta['apellidos']."</center></td>
                                        <td><center>".$consulta['herramienta']."</center></td>
                                        <td><center>".$consulta['Descripcion']."</center></td>
                                        <td><center>".$consulta['Material']."</center></td>
                                        <td><center>".$consulta['Gav']."</center></td>
                                        <td><center>".$consulta['Ancho']."</center></td>
                                        <td><center>".$consulta['Largo']."</center></td>
                                        <td><center>".$consulta['cantidad']."</center></td>
                                        <td><center>".$consulta['Fecha']."</center></td>
                                        </tr>
                                </tbody>";
                        ?>
                            <?php
                            }
                            include("cerrar_conexion.php");
                            ?>
                                </table><br>
                    </div>
    </center>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="registros.php">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="registros.php">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="pagina_principal.php">4</a></li>
            <li class="page-item">
                <a class="page-link" href="pagina_principal.php">Next</a>
            </li>
        </ul>
    </nav>
    
</body>
<script src="js/app.js"></script>
</html>