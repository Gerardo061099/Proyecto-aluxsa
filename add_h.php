<?php
include( 'abrir_conexion.php' );
//ajax
$nombre = $_POST[ 'nombre' ];
$cantidad = $_POST[ 'cantidad' ];
$cantidadm = $_POST[ 'cantidadm' ];
$medidas = $_POST[ 'medidas' ];
$categoria = $_POST[ 'categoria' ];
$n_gavilanes = $_POST[ 'gavilanes' ];
//-------------------subimos foto--------------------------------
$nombre_img = $_FILES[ 'img' ][ 'name' ];
//así obtiene el nombre del archivo FILE
$temporal = $_FILES[ 'img' ][ 'tmp_name' ];
//path del servidor
$carpeta = 'img2';
$img = strtolower( $nombre_img );
list( $base, $extension ) = explode( '.', $img );
//separamos el nombre y la extecion
$nombre_img = implode( '.', [ $base, time(), $extension ] );
//cambia nombre imagen
$ruta = $carpeta.'/'.$nombre_img;
$nombre = ucfirst( $nombre );
//mayuscula array [ 0 ]
if ( $nombre == '' || $cantidad == '' || $medidas == 'Choose...' || $categoria == 'Choose...' || $n_gavilanes == 'Choose...' || $nombre_img == '' ) {
    echo 'campos vacios';
} else {
    if ( move_uploaded_file( $temporal, $ruta ) ) {
        mysqli_query( $conexion, "INSERT INTO $tbherr_db7 (id_categoria,nombre,id_gavilanes,id_medidas,cantidad_minima,cantidad,rutaimg,fecha_hora) values ('$categoria','$nombre','$n_gavilanes','$medidas','$cantidadm','$cantidad','$ruta',now())" );
        echo 'Insercion exitosa';
        include( 'cerrar_conexion.php' );
    } else {
        echo 'imagen no subida';
    }
}
?>