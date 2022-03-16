<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<div class="row">
<img src="ENCABEZADO.jpg" alt="">

    <div class="col-md-4"></div>
    
        <div class="col-md-4">
        <center><h1>Inicio de Sesion</h1>
            <img src="user.png" alt="" style="width: 90px; height: 90px; border-radius: 55px; background: #fff;">
        </center>
            <form method="POST" action="inventario.php">
            <div class="form-group">
                <label for="user">Nombre de usuario:</label>
                <input type="text" name="user" class="form-control" id="user">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" class="form-control" id="pass">
            </div>

            <center>
                <input type="submit" value="Iniciar Sesion" class="btn btn-info" name="btn1">
            </center>
            </form>

        </div>
    <div class="col-md-4"></div>
</div>
<h3>    
        <p class="bg-danger" align="center" style="width: 30%; display: block;">
        <b>
            <?php
            session_start();
            ob_start();
                if(isset($_SESSION['sesion']))
                {
                    
                    if($_SESSION['sesion']==2)
                        {echo "Los campos SON OBLIGATORIOS";}
                    if($_SESSION['sesion']==3)
                        {echo "DATOS INCORRECTOS";}
                }
                else
                {
                    $_SESSION['sesion']=0;
                }
                
            ?>
        </b>
        </p>
        <p class="bg-success" align="center">
        <b>
            <?php
                if($_SESSION['sesion']==4)
                    {echo "GRACIAS POR USAR NUESTROS SERVICIOS";}
                $_SESSION['sesion']=0; //Despues de confirmar el error, igualo lo variable a 0
            ?>
        </b>
        </p>
    </h3>
</body>
</html>