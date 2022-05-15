<?php
include("abrir_conexion.php");
$name1 = $_POST['herramienta'];
if ($name1 != "") {
    $consulta = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.preciocompra,h.cantidad,h.total,h.fecha_hora FROM $tbherr_db7 h inner join categorias c on h.id_categoria = c.id_categoria inner join $tbgav_db6 g on h.id_gavilanes = g.id_gav inner join $tbmed_db9 m on h.id_medidas = m.id_medidas WHERE h.Nombre LIKE %$name1%");
}



$consulta = mysqli_query($conexion,"SELECT * from ");
include("cerrar_conexion.php");
?>