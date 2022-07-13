<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <link rel="shortcut icon" href="img/list.png">
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
        <a class="navbar-brand" href="pagina_principal.php">
            <img src="img/home.png" alt="Sin resultados">
        </a>
    </nav>
    <center>
        <section class="tablas2">
            <div class="caja1" id="tb-herramientas-agotadas">
            <h1 class="subtitulo2">Herramientas Agotadas</h1>
                <div class="tb">
                <?php
                    include("abrir_conexion.php");// conexion con la BD
                    $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.cantidad_minima,h.cantidad,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas  WHERE cantidad < Cantidad_Minima ORDER BY Nombre");
                    //Unimos tabla Herramientas con categorias y medidas
                ?>
                            <table class="table" id="tabla2">
                                <thead class="thead-dark" id="thead">
                                    <tr>
                                        <th><center>#</center></th>
                                        <th><center>Nombre</center></th>
                                        <th>Material</th>
                                        <th>Descripcion</th>
                                        <th><center>Gavilanes</center></th>
                                        <th><center>Ancho</center></th>
                                        <th><center>Largo</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>A Comprar</center></th>
                                    </tr>
                                </thead>
                                <?php
                                while($consulta = mysqli_fetch_array($resultados)){
                                ?>
                                <tbody class="body-tb">
                                    <tr>
                                        <td><center><?php echo $consulta['id_herramienta']?></center></td>
                                        <td><center><?php echo $consulta['Nombre']?></center></td>
                                        <td><?php echo $consulta['material']?></td>
                                        <td><?php echo $consulta['descripcion']?></td>
                                        <td><center><?php echo $consulta['Num_gavilanes']?></center></td>
                                        <td><center><?php echo $consulta['Ancho']?></center></td>
                                        <td><center><?php echo $consulta['Largo']?></center></td>
                                        <td><center><?php echo $consulta['cantidad']?></center></td>
                                        <td><center><?php echo $consulta['cantidad_minima']-$consulta['cantidad']?></center></td>
                                    </tr>
                                </tbody>
                                <?php
                            }?>
                        </table><br>
                        <?php
                        include("cerrar_conexion.php");
                        ?>
                </div>
            </div>
        </section>
        <br><br>
        <div>
            <a href="reporte_pdf.php" class="btn btn-outline-info"><img src="img/printer.png" alt="Sin resultados"> Imprimir documento</a>
        </div><br><br>
    </center>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="pagina_principal.php">Pagina principal</a>
            </li>
            <li class="page-item"><a class="page-link" href="registros.php">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="solicitudes.php">4</a></li>
            <li class="page-item">
                <a class="page-link" href="solicitudes.php">Next</a>
            </li>
        </ul>
    </nav>
    
</body>
<script src="js/app.js"></script>
</html>