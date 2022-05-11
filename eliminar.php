<?php
include("abrir_conexion.php");
//Recibimos la variable id
//realizamos una validadcion para saber si el documento .php esta recibiendo el valor id
$id = $_GET['id'];
if ($id != "") {//validamos si la variable id esta vacia
    $sql = mysqli_query($conexion,"DELETE FROM $tbherr_db7 where id_herramienta = $id ");
    echo "
    <script type='text/javascript'>
        alert('Registro eliminado exitosamente');
    </script>
    ";
    header("Location: inventario.php");
}else {//caso que se realiza en casi de que $id este vacia 
    if ($id == "") {
        echo "  
        <script type='text/javascript'>
            alert('ocurrion un problema al obtener la variable id');
        </script>"
                ;
    }
}
?>