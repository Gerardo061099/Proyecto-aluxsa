<?php
include("abrir_conexion.php");
//variables obtenidas por metodo $ajax
$id_h=$_POST['numero_h'];
$cantidadn =$_POST['can'];
//obtenemos el valor cantidad para realizar de la base de datos
//ejecunamos la consulta y obtenemos el valor de la consulta deacuerdo al id proporcionado por el usuario
//obtenido el valor de la consulta, sumamos la cantidad almacenada en la base de datos y le sumamos la cantidad ingresada
//por el usuario y realizamos una actualizacion en la base de datos con un UPDATE
$consulta = mysqli_query($conexion,"SELECT Cantidad FROM $tbherr_db7 WHERE id_herramienta = '$id_h' ");
$resul = mysqli_fetch_array($consulta);
// ------------- operacion para almacenar la cantidad de
$suma= $resul['Cantidad'] + $cantidadn;
//$ope =$consulta + $cantidadn ;
if ($id_h!="" && $cantidadn!="") {
    $_UPDATE_SQL = "UPDATE $tbherr_db7 SET Cantidad = $suma, Fecha_Hora = now() WHERE id_Herramienta= '$id_h'";
    mysqli_query($conexion,$_UPDATE_SQL);
    echo "Actualizacion exitosa";
}
else {
    echo "ocurrio un error";
}
include("cerrar_conexion.php");
?>