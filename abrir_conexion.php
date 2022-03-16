<?php

$host = "localhost";//servidor
$userdb = "root";//usuario
$claveus = "root";//pass
$nombredb = "bodega";//db

//tablas
$tbu_db1 = "usuarios";
$tbcar_db2 = "cargo";
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

if ($conexion->connect_errno) {
    echo "Problemas de conexion con el servidor...";
}
