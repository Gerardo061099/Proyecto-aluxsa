<?php
include("abrir_conexion.php");
$nombre =$_POST['Nombre'];
$apellidos =$_POST['Apellidos'];
$n_empleado =$_POST['N_empleado'];
$genero =$_POST['Genero'];
if ($nombre != "" && $apellidos != "" && $n_empleado != "" && $genero != "") {
    mysqli_query($conexion,"INSERT INTO $tbem_db5 (Nombre,Apellidos,N_Empleado,Sexo) values ('$nombre','$apellidos',$n_empleado,'$genero')");
    echo "Insercion exitosa!!";
    $consulta = mysqli_query($conexion,"SELECT MAX(id_Empleado) as id_empleado FROM $tbem_db5");
    $res = mysqli_fetch_array($consulta);
        $num_emp = $res['id_empleado'];
        if ($num_emp !="") {
            mysqli_query($conexion,"INSERT INTO $tbsoli_db10 (id_Empleado,Fecha) values ($num_emp,now())");
        }else{
            echo "Tratamos de obtener los datos del empleado, pero no fue posible terminar el proceso.";
        }
        include("cerrar_conexion.php");
}
else {
    echo "La insercion no se pudo ejecutar";
}

?>