<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
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
    <nav>
            <nav>
                <label class="logo">ALUXSA S.A DE C.V</label>
                <ul>
                    <li><a href="inventario.php" class="active">Home</a></li>
                    <li><a href="#">Herramientas</a></li>
                    <li><a href="#">Registros</a></li>
                    <li><a href="#">Notificaciones</i></a></li>
                    <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
                    <li><a href="index/inde.html">ALUXSA</a></li>
                </ul>
            </nav>
    </nav>
    <center>
        <div class="box-1">
            <div class="encabesado" >
                <h1 class="titulo">Inventario</h1>
            </div>
        </div>
        <div>
            <div class="tb-herramientas">
            <?php
                    include("abrir_conexion.php");// conexion con la BD
                    $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas ORDER BY id_herramienta");
                    //Unimos tabla Herramientas con categorias y medidas
                    echo "<h1 class=\"titulos\"><strong>Herramientas</strong></h1>
                            <table class=\"table\" id=\"tabla1\" style=\"width:115px; height:25px; font-size:15px;\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th><center>N°</center></th>
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
                                        <th><center>Prioridad</center></th>
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
                ?>
            </div>
        </div>
        <section class="tablas">
            <div class="cuadro-texto">
                <div class="parrafo">
                    <?php
                        include("abrir_conexion.php");
                        $resultados1 = mysqli_query($conexion,"SELECT * FROM $tbgav_db6 ");
                            echo " <h1 class=\"titulos\"><strong style=\"border-bottom: #000 2px solid;\"> N° Gavilanes</strong></h1>
                                <table class=\"table table-striped\" style= \"width:90px; heigh:25px; font-size:15px;\">
                                    <tr>
                                    <td><b><center>Codigo</center></b></td>
                                    <td><b><center>N° Gavilanes</center></b></td>
                                    </tr>";
                        while($consulta1 = mysqli_fetch_array($resultados1))
                        {
                        echo 
                        "
                            <tr>
                            <td><center>".$consulta1['id_Gav']."</center></td>
                            <td><center>".$consulta1['Num_gavilanes']."</center></td>
                            </tr>
                        ";
                        }
                        echo "</table>";
                        include("cerrar_conexion.php");
                        ?>
                </div>
                <div class="parrafo2">
                    <?php
                            include("abrir_conexion.php");
                            $resultados1 = mysqli_query($conexion,"SELECT * FROM $tbcat_db3 ");
                                echo " <h1 class=\"titulos\"><strong style=\"border-bottom: #000 2px solid; \" >Categorias</strong></h1>
                                    <table class=\"table table-striped\" style= \"width:90px; height:25px; font-size:15px; margin: 8px 8px;\">
                                        <tr>
                                        <td><b><center>Codigo</center></b></td>
                                        <td><b><center>Descripcion</center></b></td>
                                        <td><b><center>Material</center></b></td>
                                        </tr>";
                            while($consulta1 = mysqli_fetch_array($resultados1))
                            {
                            echo 
                            "
                                <tr>
                                <td><center>".$consulta1['id_Categoria']."</center></td>
                                <td><center>".$consulta1['Descripcion']."</center></td>
                                <td><center>".$consulta1['Material']."</center></td>
                                </tr>
                            ";
                            }
                            echo "</table>";
                            
                            include("cerrar_conexion.php");
                    ?>
                </div>
            </div>
            <aside class="aside1">
                <div class="contenedor">
                    <div class="aside">
                    <form method="POST" action="inventario.php">
                    <h1>Registrar.</h1><!-- from. registrar nuesvas herramientas -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Cortador, Broca..">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio $:</label>
                                <input type="text" class="form-control" id="precio" name="precio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="total">Total:</label>
                                <input type="texto" class="form-control" id="total" name="total">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="medidas">Codigo Medidas:</label>
                                    <select id="medidas" name="medidas" class="form-control">
                                        <option selected>Choose...</option>
                                        <?php
                                            include("abrir_conexion.php");
                                            $query = $conexion -> query ("SELECT * FROM $tbmed_db9");
                                            //$id_partida=0;
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo ('<option value="'.$valores['id_Medidas'].'">'.$valores['id_Medidas'].'</option>');
                                                    //$id_partida++;
                                                }
                                                include("cerrar_conexion.php");
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="categoria">Codigo Categoria:</label>
                                    <select id="categoria" name="categoria" class="form-control">
                                        <option selected>Choose...</option>
                                        <?php
                                            include("abrir_conexion.php");
                                            $query = $conexion -> query ("SELECT * FROM $tbcat_db3");
                                            //$id_partida=0;
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo ('<option value="'.$valores['id_Categoria'].'">'.$valores['id_Categoria'].'</option>');
                                                    //$id_partida++;
                                                }
                                                include("cerrar_conexion.php");
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="gavilanes">Gavilanes:</label>
                                    <select id="gavilanes" name="gav" class="form-control">
                                        <option selected>Choose...</option>
                                        <?php
                                            include("abrir_conexion.php");
                                            $query = $conexion -> query ("SELECT * FROM $tbgav_db6");
                                            //$id_partida=0;
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo ('<option value="'.$valores['id_Gav'].'">'.$valores['id_Gav'].'</option>');
                                                    //$id_partida++;
                                                }
                                                include("cerrar_conexion.php");
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <input type="submit" value="Agregar" class="btn btn-success" name="add">
                        </form>
                        <?php
                        if (isset($_POST['add'])) {
                            include("abrir_conexion.php");
                            $nombre = $_POST['nombre'];
                            $cantidad = $_POST['cantidad'];
                            $precio = $_POST['precio'];
                            $total = $_POST['total'];
                            $medidas = $_POST['medidas'];
                            $categoria = $_POST['categoria'];
                            $n_gavilanes = $_POST['gav']; 
                            if ($nombre=="" || $cantidad=""||$precio=""||$total=""||$medidas=""||$categoria=""||$n_gavilanes="") {
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
                                mysqli_query($conexion, "INSERT INTO $tbherr_db7 (id_categoria,nombre,id_gavilanes,id_medidas,preciocompra,cantidad,total,fecha_hora) values ('$categoria','$nombre','$n_gavilanes','$medidas','$precio','$cantidad','$total',now())");
                                echo"<script>
                                        swal({
                                            title: \"Insercion exitosa:\",
                                            text:\"Se realizo un registro en la tabla herramientas.\",
                                            icon:\"success\",
                                            dangerMode: false,
                                        });
                                    </script>";
                                include("cerrar_conexion.php");
                            }
                                
                            
                        }
                        ?>
                    </div>
                </div>
                <div>
                    
                </div>
            </aside>
            <div class="medidas">
                <div class="parrafo">
                    <?php
                        include("abrir_conexion.php");
                        $resultados1 = mysqli_query($conexion,"SELECT * FROM $tbmed_db9 ");
                            echo " <h1 class=\"titulos\"><strong style=\"border-bottom: #000 2px solid;\">Medidas</strong></h1>
                                <table class=\"table table-striped\" style= \"width:90px; heigh:25px; font-size:15px;\">
                                    <tr>
                                    <td><b><center>Codigo</center></b></td>
                                    <td><b><center>Ancho</center></b></td>
                                    <td><b><center>Largo</center></b></td>
                                    </tr>";
                        while($consulta1 = mysqli_fetch_array($resultados1))
                        {
                        echo 
                        "
                            <tr>
                            <td><center>".$consulta1['id_Medidas']."</center></td>
                            <td><center>".$consulta1['Ancho']."</center></td>
                            <td><center>".$consulta1['Largo']."</center></td>
                            </tr>
                        ";
                        }
                        echo "</table>";
                        include("cerrar_conexion.php");
                        ?>
                </div>
                
            </div>
        </section>
        <section class="tablas2">
            <div class="caja1">
            <h1 class="subtitulo2">Herramientas por comprar</h1>
                <div class="tb">
                <?php
                    include("abrir_conexion.php");// conexion con la BD
                    $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join gavilanes g on h.id_gavilanes = g.id_gav inner join medidas m on h.id_medidas = m.id_medidas  WHERE cantidad <= 2 ORDER BY id_herramienta");
                    //Unimos tabla Herramientas con categorias y medidas
                    echo "<h1 class=\"titulos\"><strong>Cortadores de Carburo y Acero Alta Velocidad</strong></h1>
                            <table class=\"table\" id=\"tabla2\" style=\"width:115px; height:25px; font-size:15px;\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th><center>N°</center></th>
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
                                        <th><center>Prioridad</center></th>
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
    <div>
        <div class="botones">
            <center>
                <form method="POST" action="inventario.php">
                    <div class="form-search">
                        <label for="search" class="Buscar">Buscar:</label>
                        <input class="form-control" id="search" type="text" name="dato"><br>
                    </div>
                    <div class="acciones">
                    <input type="submit" value="Consultar" class="btn btn-primary" name="conulta">
                        <input type="submit" value="Actualizar" class="btn btn-success" name="actualiza">
                        <input type="submit" value="Borrar" class="btn btn-danger" name="borra">
                    </div>
                </form>
            </center>
        </div>
    </div>
    
</body>
</html>