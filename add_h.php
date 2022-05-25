<?php
        include("abrir_conexion.php");
        //ajax
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $_POST['total'];
        $medidas = $_POST['medidas'];
        $categoria = $_POST['categoria'];
        $n_gavilanes = $_POST['gavilanes'];
        //-------------------subimos foto--------------------------------
        $nombre_img = $_FILES['img']['name'];//así obtiene el nombre del archivo FILE
        $temporal = $_FILES['img']['tmp_name'];//así obtiene el archivo FILE
        $carpeta = 'img2';
        $ruta = $carpeta.'/'.$nombre_img;
        move_uploaded_file($temporal,$ruta);
        if ($nombre == "" || $cantidad == "" || $precio == "" || $total == "" || $medidas == "Choose..." || $categoria == "Choose..." || $n_gavilanes == "Choose..." || $nombre_img == "") {
            echo "campos vacios";
        }else {
            if ($nombre_img = $_FILES['img']['name'] != "") {
                mysqli_query($conexion, "INSERT INTO $tbherr_db7 (id_categoria,nombre,id_gavilanes,id_medidas,preciocompra,cantidad,total,rutaimg,fecha_hora) values ('$categoria','$nombre','$n_gavilanes','$medidas','$precio','$cantidad','$total','$ruta',now())");
                echo "Insercion exitosa";
            }
        include("cerrar_conexion.php");
        }
    
?>