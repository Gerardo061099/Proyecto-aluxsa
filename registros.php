<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Bodega</title>
    <!--<link rel="stylesheet" href="css/navbar.css">-->
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
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            ALUXSA S.A de C.V
        </a>
        <a class="navbar-brand" href="cerrar_sesion.php">
        Cerrar sesion
        </a>
    </nav>
    <nav aria-label="breadcrumb" style="margin: 5px 5px; width: 96%;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="pagina_principal.php">Pagina de inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
        </ol>
    </nav>
    <center>
        <div class="box-1" style="border-bottom: #F4D03F 7px solid;">
            <div class="encabesado">
                <h1 class="titulo">Categorias</h1>
            </div>
        </div>
        <div class="menu-botones">
            <div class="botones">
            <a href="registro_categorias.php" class="badge badge-primary">Nueva Categoria</a>
            <a href="registro_gavilanes.php" class="badge badge-success">Numero de Gavilanes</a>
            <a href="registro_medidas.php" class="badge badge-dark">Agrega nuevas medidas</a>
            </div>
        </div>
        <section class="tablas">
            <div class="cuadro-texto">
                <div class="parrafo">
                    <?php
                        include("abrir_conexion.php");
                        $resultados1 = mysqli_query($conexion,"SELECT * FROM $tbgav_db6 ");
                            echo " <h1 class=\"titulos\" style=\"border-bottom: #5DADE2 2px solid;\"><strong> N° Gavilanes</strong></h1>
                                <table class=\"table table-striped\" style= \"width:90px; heigh:25px; font-size:15px;\">
                                    <tr>
                                    <td><b><center>#</center></b></td>
                                    <td><b><center>Gavilanes</center></b></td>
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
                                echo " <h1 class=\"titulos\" style=\"border-bottom: #5DADE2 2px solid;\"><strong>Categorias</strong></h1>
                                    <table class=\"table table-striped\" style= \"width:90px; height:25px; font-size:15px; margin: 8px 8px;\">
                                        <tr>
                                            <td><b><center>#</center></b></td>
                                            <td><b><center>Descripcion</center></b></td>
                                            <td><b><center>Material</center></b></td>
                                        </tr>";
                            while($consulta1 = mysqli_fetch_array($resultados1)){
                            echo 
                            "
                                        <tr>
                                            <td><center>".$consulta1['id_Categoria']."</center></td>
                                            <td><center>".$consulta1['Descripcion']."</center></td>
                                            <td><center>".$consulta1['Material']."</center></td>
                                        </tr>
                            ";
                            }
                            echo "  </table>";
                            include("cerrar_conexion.php");
                    ?>
                </div>
            </div>
            <div class="medidas">
                <div class="parrafo">
                    <?php
                        include("abrir_conexion.php");
                        $resultados1 = mysqli_query($conexion,"SELECT * FROM $tbmed_db9 ");
                            echo " <h1 class=\"titulos\" style=\"border-bottom: #5DADE2 2px solid;\"><strong>Medidas</strong></h1>
                                <table class=\"table table-striped\" style= \"width:90px; heigh:25px; font-size:15px;\">
                                    <thead>
                                        <tr>
                                            <td><b><center>#</center></b></td>
                                            <td><b><center>Ancho</center></b></td>
                                            <td><b><center>Largo</center></b></td>
                                        </tr>
                                    </thead>
                                    <tbody>";
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
                        echo " </tbody>";
                        echo "</table>";
                        include("cerrar_conexion.php");
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
            <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
        </ul>
    </nav>
    
</body>
</html>