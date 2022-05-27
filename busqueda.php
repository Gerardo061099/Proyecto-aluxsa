<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
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
            //busqueda de herramientas
                include("abrir_conexion.php");
                $herramienta = $_POST["herramientajs"];
                $medidaA = $_POST["medida"];
                echo $herramienta;
                echo $medidaA;
                /*if ($herramienta != "" || $medidaA != "") {*/
                    $query = mysqli_query($conexion, "SELECT h.id_herramienta,h.Nombre,c.Descripcion,c.Material,g.Num_gavilanes,m.Ancho,m.Largo,h.Cantidad,h.rutaimg FROM $tbherr_db7 h inner join $tbcat_db3 c on h.id_categoria = c.id_categoria inner join $tbgav_db6 g on h.id_gavilanes = g.id_gav inner join $tbmed_db9 m on h.id_medidas = m.id_medidas WHERE h.Nombre LIKE '$herramienta' AND m.Ancho like '$medidaA' ORDER BY h.id_herramienta");
                    echo '<div class="contador-h"><div><center><h1>Resultados</h1></center></div>';
                    while($consulta = mysqli_fetch_array($query)) {
                    echo '
                            <div class="conten">
                            <img src='.$consulta['rutaimg'].' id="imgs" alt="imagen no encontrada">
                                <div class = "infor">
                                    <h1 class="subt">Caracteristicas</h1>
                                    <p> # '.$consulta['id_herramienta'].' Nombre: '.$consulta['Nombre'].' de '.$consulta['Material'].' '.$consulta['Descripcion'].'</p>
                                    <p>Medidas: '.$consulta['Ancho'].' Ancho x '.$consulta['Largo'].' Largo'.'</p>
                                    <p>gavilanes: '.$consulta['Num_gavilanes'].' Cantidad: '.$consulta['Cantidad'].'</p>
                                </div>
                            </div>
                        ';
                    }
                    include("cerrar_conexion.php");
                /*}else{
                    if ($medidaA == "" || $herramienta == ""){
                        echo "Datos vacios";
                    }
                }*/
                echo '</div>';
                
            ?>
</body>
<script src="js/app.js"></script>
</html>