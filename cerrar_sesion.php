<?php
session_start();
	ob_start();
	$_SESSION['sesion_exito']=4;//error 4 cerro sesion exitosamente
	header('Location: index.php');
?>