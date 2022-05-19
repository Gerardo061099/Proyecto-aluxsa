<?php
//datos del servidor
$host = "localhost";//servidor
$userdb = "root";//usuario
$claveus = "root";//clavepass
$nombredb = "bodega";//db bodega
//tablas BD
$tbu_db1 = "usuarios";
$tbcat_db3 = "categorias";
$tbdet_db4 = "detalle_solicitud";
$tbem_db5 = "empleado";
$tbgav_db6 = "gavilanes";
$tbherr_db7 = "herramientas";
$tbmaq_db8 = "maquinaria";
$tbmed_db9 = "medidas";
$tbsoli_db10 = "solicitud";
//conexion
$conexion = new mysqli($host,$userdb,$claveus,$nombredb);
//En caso de haber datos erroneos del servidor
if ($conexion->connect_errno) {
    echo "Problemas de conexion con el servidor...";
}