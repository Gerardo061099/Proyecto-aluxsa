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
    </nav>
    <center>
        <div class="box-1">
            <div class="encabesado">
                <h1 class="titulo">Reportes</h1>
            </div>
        </div>
        <section class="tablas2">
            <div class="caja1">
            <h1 class="subtitulo2">Herramientas Agotadas</h1>
                <div class="tb">
                <?php
                    include("abrir_conexion.php");// conexion con la BD
                    $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas  WHERE cantidad <= 2 ORDER BY id_herramienta");
                    //Unimos tabla Herramientas con categorias y medidas
                    echo "
                            <table class=\"table\" id=\"tabla2\" style=\"width:115px; height:25px; font-size:13px;\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th><center>#</center></th>
                                        <th><center>Nombre</center></th>
                                        <th><center>Material</center></th>
                                        <th><center>Descripcion</center></th>
                                        <th><center>Gavilanes</center></th>
                                        <th><center>Ancho</center></th>
                                        <th><center>Largo</center></th>
                                        <th><center>Precio</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Total</center></th>
                                        <th><center>Fecha_Hora</center></th>
                                        <th><center>Estado</center></th>
                                    </tr>
                                </thead>
                        ";
                    while($consulta = mysqli_fetch_array($resultados)){
                        echo 
                        "<tbody>
                            <tr>
                                <td><center>".$consulta['id_herramienta']."</center></td>
                                <td><center>".$consulta['Nombre']."</center></td>
                                <td><center>".$consulta['material']."</center></td>
                                <td><center>".$consulta['descripcion']."</center></td>
                                <td><center>".$consulta['Num_gavilanes']."</center></td>
                                <td><center>".$consulta['Ancho']."</center></td>
                                <td><center>".$consulta['Largo']."</center></td>
                                <td><center>".$consulta['preciocompra']."</center></td>
                                <td><center>".$consulta['cantidad']."</center></td>
                                <td><center>".$consulta['total']."</center></td>
                                <td><center>".$consulta['fecha_hora']."</center></td>
                                <th><center>";
                                //mostramos un aviso segun la cantidad de piezas 
                                if($consulta['cantidad']<=2){//condicionamos var cantidad a 2 o menor para mostrar un mesaje 
                                    echo "<span class=\"badge badge-danger\">Insuficiente</span>";
                                }//si la cantidad es mayor a 2 no se requiere comprar más
                                    else{
                                    echo "<span class=\"badge badge-success\">Suficientes</span>";
                                    }
                                "</center></th>
                            </tr>
                        </tbody>
                        ";
                    }
                        echo "</table><br>";
                ?>
                </div>
            </div>
        </section>
    </center>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="pagina_principal.php">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="pagina_principal.php">1</a></li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    
</body>
</html>