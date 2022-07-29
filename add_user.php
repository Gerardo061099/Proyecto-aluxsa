<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuarios</title>
    <link rel="shortcut icon" href="img/add_user.png">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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
                            <input type="submit" value="Enviar" class="btn btn-success" onclick="registrar(event);"><br>
                            <div id="load1" style="color: black; font-size: 20px;"></div>
                        </form>
                    </div>
                </div>
        </div>
        </center>
        <div class="table-responsive" id="tabla_us">
        <?php
        include("abrir_conexion.php");
            $query = mysqli_query($conexion,"SELECT id_us,Nombre,Apellidos,user,Num_empleado,Estado FROM $tbu_db1 ORDER BY id_us");
            echo '
            <table class="table table-dark" style="font-size: 15px;">
                <thead>
                    <tr>
                        <th>Id</th>
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

                $datos = $res[0]."||".
                $res[1]."||".
                $res[2]."||".
                $res[3]."||".
                $res[4]."||".
                $res[5];

                echo '
                    <tr>
                        <th>'.$res['id_us'].'</th>
                        <th>'.$res['Nombre'].'</th>
                        <td>'.$res['Apellidos'].'</td>
                        <td>'.$res['user'].'</td>
                        <td>'.$res['Num_empleado'].'</td>
                        <td>'.$res['Estado'].'</td>
                        <td>'?><button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal1" onclick="Update_infousers('<?php echo $datos?>');">Editar</button>
                        <?php echo'</td>
                        <td></td>
                    </tr>';
            }
            include("cerrar_conexion.php");
            echo '
                </tbody>
            </table>';
        ?>
        </div>
        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_update" method="POST">
                            <center>Datos Personales</center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="modal_nombre">Nombre(s):</label>
                                    <input type="text" class="form-control" id="modal_nombre" name="modal_nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_apellidos">Apellidos:</label>
                                    <input type="text" class="form-control" id="modal_apellidos" name="modal_apellidos">
                                </div>
                            </div>
                            <center>Datos de Usuario</center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="modal_id">Id:</label>
                                    <input type="text" class="form-control" id="modal_id" name="modal_id">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_user">Usuario:</label>
                                    <input type="text" class="form-control" id="modal_user" name="modal_user">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modaln_empleado">Número de empleado:</label>
                                    <input type="text" class="form-control" id="modaln_empleado" name="modaln_empleado">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_newpass">Nueva contraseña:</label>
                                    <input type="password" class="form-control" id="modal_newpass" name="modal_newpass">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_estado">Estado:</label>
                                    <input type="text" class="form-control" id="modal_estado" name="modal_estado">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="actualizar_usuarios(event);">Actualizar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="eliminar_us(event);">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    <script src="js/usuarios.js"></script>
</body>
</html>