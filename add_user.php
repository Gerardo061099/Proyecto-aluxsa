<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuarios</title>
    <link rel="shortcut icon" href="img/add_user.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
        <a class="navbar-brand" href="pagina_principal.php">
            ALUXSA S.A de C.V
        </a>
    </nav>
    <center>
        <div class="box-1" style="border-top: #DC7633 7px solid;">
            <div class="encabesado">
                <h1 class="titulo">Agregar Usuario</h1>
            </div>
        </div>
        <div class="aside1">
                <div class="contenedor" style="border-top: #5DADE2 7px solid;">
                    <div class="aside">
                        <form>
                            <center>Datos Personales</center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre(s):</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                                </div>
                            </div>
                            <center>Datos de Usuario</center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="user">Usuario:</label>
                                    <input type="text" class="form-control" id="user" name="user">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pass">Contraseña:</label>
                                    <input type="password" class="form-control" id="pass" name="pass">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pwd2">Repetir contraseña:</label>
                                    <input type="password" class="form-control" id="pwd2" name="pwd2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="n_empleado">Número de empleado:</label>
                                    <input type="text" class="form-control" id="n_empleado" name="n_empleado">
                                </div>
                            </div>
                            <input type="submit" value="Hecho" class="btn btn-success" onclick=registrar(event)><br>
                            <div id="load1" style="color: black; font-size: 20px;"></div>
                        </form>
                    </div>
                </div>
        </div>
        </center>
        <div class="table-responsive">
        <?php
        include("abrir_conexion.php");
            $query = mysqli_query($conexion,"SELECT Nombre,Apellidos,user,Num_empleado,Estado FROM $tbu_db1 ORDER BY id_us");
            echo '
            <table class="table table-dark" style="font-size: 15px;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Usuario</th>
                        <th># Empleado</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';
            while ($res = mysqli_fetch_array($query)) {
                echo '
                    <tr>
                        <th>'.$res['Nombre'].'</th>
                        <td>'.$res['Apellidos'].'</td>
                        <td>'.$res['user'].'</td>
                        <td>'.$res['Num_empleado'].'</td>
                        <td>'.$res['Estado'].'</td>
                        <td>'?><a class="btn btn-danger btn-sm" href="id=<?php echo $consulta['id_herramienta']?>" role="button">Eliminar</a><?php echo '</td>
                        <td>'?><a class="btn btn-primary btn-sm" href="id=<?php echo $consulta['id_herramienta']?>" role="button">Actualizar</a><?php echo'</td>
                    </tr>';
            }
            include("cerrar_conexion.php");
            echo '
                </tbody>
            </table>';
        ?>
        </div>
    <center>
        <nav aria-label="Page navigation example" style="margin: 10px 10px;">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="inventario.php">Pagina anterior</a>
                </li>
            </ul>
        </nav>
    </center>
    <script src="js/usuarios.js"></script>
</body>
</html>