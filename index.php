<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--CDN swal(sweatalert)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="cuerpo">
    <div class="row" style="margin: 5px;">
        <div class="col-md-4" style="padding: 0px; width: 30%;"></div>
            <div class="col-md-4 " id="login">
                <center><h1 style="margin-top: 5px;" class="titulo1">Inicio de Sesion</h1>
                    <div class="contenedoru">
                        <img class="usuario" src="img/user.png" alt="imagen no disponible">
                    </div>
                </center>
                <form method="POST" action="pagina_principal.php" style="margin: 8px 8px">
                    <div class="formulario" style="text-align: center; ">
                        <div class="form-group">
                            <label for="user" class="usuariola">Nombre de usuario:</label>
                            <input type="text" name="user" placeholder="name-user" class="form-control" id="user" style="width: 55%; display:flex;  margin:auto;">
                        </div>
                        <div class="form-group">
                            <label for="pass" class="passla">Contraseña:</label>
                            <input type="password" name="pass" placeholder="********" class="form-control" id="pass" style="width: 55%; display:flex; margin:auto;">
                        </div>
                    </div>
                <center>
                    <input type="submit" value="Iniciar Sesion" class="btn btn-dark" name="btn1">
                </center>
                </form>
            </div>
        <div class="col-md-4" style="padding: 0px; width: 30%;"></div>
    </div>
    <center><p class="ley">Aluminios Xalatlaco S.A de C.V. Software v0.1</p></center>
            <?php
            //utilizando variables globales
            //control de usuarios
            session_start();
            ob_start();
                if(isset($_SESSION['sesion'])){ 
                    if($_SESSION['sesion']==2){//Error de campos vacios
                        echo "<script>
                            swal({
                                title: \"Campos Vacios:\",
                                text:\"Debes llenar todos los campos.\",
                                icon:\"warning\",
                                dangerMode: true,
                            });
                        </script>";
                    }
                    if($_SESSION['sesion']==3){//Error de datos incorrectos 
                        echo "<script>
                            swal({
                                title: \"DATOS INCORRECTOS:\",
                                text: \"Verifica el usuario o la Contraseña.\",
                                icon: \"warning\",
                                dangerMode: \"true\",
                            });
                        </script>";
                    }
                }
                else{
                    $_SESSION['sesion']=0;//No se ha iniciado sesion
                }
            ?>
            <?php
                if($_SESSION['sesion']==4){
                    echo "<script>
                        swal({
                            title: \"Sesion Cerrada\",
                            text: \"GRACIAS POR USAR NUESTROS SERVICIOS\",
                            icon: \"success\",
                        });
                    </script>";
                }
                $_SESSION['sesion']=0; //Despues de confirmar el error, igualo lo variable a 0
            ?>
</body>
</html>