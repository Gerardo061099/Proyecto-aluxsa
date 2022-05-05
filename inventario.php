<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
    </nav>
    <center>
        <div>
            <div class="info">
                <p class="info-p">
                    <h1>Herramientas</h1>
                </p>
            </div>
            <div class="tb-herramientas">
                    <div class="opciones">
                        <a href="registro_h.php" class="badge badge-success">Nuevo registro</a>
                        <a href="#" class="badge badge-danger">Eliminar un registro</a>
                        <a href="#" class="badge badge-info">Actualizar Registro</a>
                        <a class="navbar-brand" href="#">
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
                                include("cerrar_conexion.php");
                            ?>
                        </a>
                    </div>
                    <div style="margin: 0px 10px; background: #FDFEFE;">
                        <h1 class="titulos" style="text-align:left;"><strong>Listado de herramientas</strong></h1>
                    </div>
                    <div class="tabla-herramientas">
                        <?php
                            include("abrir_conexion.php");// conexion con la BD
                            $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas ORDER BY id_herramienta");
                            //Unimos tabla Herramientas con categorias y medidas
                            echo "
                            <table class=\"table\" id=\"herramientas\" style=\"width:115px; height:25px; font-size:13px;\">
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
                                        <th><center>";?>
                                        <?php
                                        //mostramos un aviso segun la cantidad de piezas 
                                        if($consulta['cantidad']<=2){//condicionamos var cantidad a 2 o menor para mostrar un mesaje 
                                            echo "<span class=\"badge badge-danger\">Insuficiente</span>";
                                        }//si la cantidad es mayor a 2 no se requiere comprar más
                                        else{
                                            echo "<span class=\"badge badge-success\">Suficiente</span>";
                                        }
                                        "</center></th>
                                    </tr>
                                </tbody>
                                ";
                            }
                                echo "</table><br>";
                                include("cerrar_conexion.php");
                    ?>
                    </div>
            </div>
        </div>
    </center>
            <?php
                include("abrir_conexion.php");
                $res = mysqli_query($conexion, "SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.rutaimg,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas ORDER BY id_herramienta");
                echo '<div class="contador-h" style="margin: 10px 10px; background: #FDFEFE; padding: 5px; border-radius: 5px; height: max-content; width: 95%;">
                <div><h1>Herramientas Almacenadas</h1></div>';
                while ($consulta = mysqli_fetch_array($res)) {
                    echo '
                    <div class="conten">
                        <img src="'.$consulta['rutaimg'].'"id="imgs" class="" alt="imagen no encontrada">
                        <div class = "infor">
                            <h1 class="subt">Caracteristicas</h1>
                            <p>#'.$consulta['id_herramienta'].'</p>
                            <p>Nombre: '.$consulta['Nombre'].' de '.$consulta['material'].' '.$consulta['descripcion'].'</p>
                            <p>Medidas: '.$consulta['Ancho'].'Ancho x '.$consulta['Largo'].'Largo'.'</p>
                            <p># gavilanes: '.$consulta['Num_gavilanes'].'</p>
                            <p>Cantidad: '.$consulta['cantidad'].'</p>
                        </div>
                    </div>
                    ';
                }
                echo '</div>';
                include("cerrar_conexion.php");
            ?>
    <nav aria-label="Page navigation example" style="margin: 10px 10px;">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="pagina_principal.php">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="pagina_principal.php">1</a></li>
            <li class="page-item"><a class="page-link" href="registros.php">2</a></li>
            <li class="page-item"><a class="page-link" href="busquedas.php">3</a></li>
            <li class="page-item">
                <a class="page-link" href="registros.php">Next</a>
            </li>
        </ul>
    </nav>
</body>
</html>