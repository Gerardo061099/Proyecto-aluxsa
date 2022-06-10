<?php
                            include("abrir_conexion.php");// conexion con la BD
                            $resultados = mysqli_query($conexion,"SELECT h.id_herramienta,h.Nombre,c.material,c.descripcion,g.Num_gavilanes,m.Ancho,m.Largo,h.cantidad,h.fecha_hora FROM $tbherr_db7 h inner join $tbcat_db3 c on h.id_categoria = c.id_categoria inner join $tbgav_db6 g on h.id_gavilanes = g.id_gav inner join $tbmed_db9 m on h.id_medidas = m.id_medidas ORDER BY h.id_herramienta");
                            //Unimos tabla Herramientas con categorias y medidas
                            echo "
                            <table class=\"table\" id=\"herramientas\">
                                        <thead class=\"thead-dark\">
                                            <tr>
                                                <th><center>#</center></th>
                                                <th><center>Nombre</center></th>
                                                <th><center>Material</center></th>
                                                <th><center>Descripcion</center></th>
                                                <th><center>Gavilanes</center></th>
                                                <th><center>Ancho</center></th>
                                                <th><center>Largo</center></th>
                                                <th><center>Cantidad</center></th>
                                                <th><center>Fecha</center></th>
                                                <th><center>Estado</center></th>
                                                <th><center></center></th>
                                            </tr>
                                        </thead>
                                ";
                                while($consulta = mysqli_fetch_array($resultados)){
                                echo 
                                "<tbody class=\"body-tb\">
                                    <tr>
                                        <td><center>".$consulta['id_herramienta']."</center></td>
                                        <td><center>".$consulta['Nombre']."</center></td>
                                        <td><center>".$consulta['material']."</center></td>
                                        <td><center>".$consulta['descripcion']."</center></td>
                                        <td><center>".$consulta['Num_gavilanes']."</center></td>
                                        <td><center>".$consulta['Ancho']."</center></td>
                                        <td><center>".$consulta['Largo']."</center></td>
                                        <td><center>".$consulta['cantidad']."</center></td>
                                        <td><center>".$consulta['fecha_hora']."</center></td>
                                        <th><center>";?>
                                        <?php
                                        //mostramos un aviso segun la cantidad de piezas 
                                        if($consulta['cantidad']<2){//condicionamos var cantidad a 2 o menor para mostrar un mesaje 
                                            if ($consulta['cantidad']==1) {
                                                echo "<img src=\"img/warning.png\" alt=\"sin resultados\">";
                                            }
                                            else{
                                                if ($consulta['cantidad']==0) {
                                                    echo "<img src=\"img/cancel.png\" alt=\"sin resultados\">";
                                                }
                                            }
                                        }//si la cantidad es mayor a 2 no se requiere comprar más
                                        else{
                                            if ($consulta['cantidad']>=2) {
                                                echo "<img src=\"img/check.png\" alt=\"sin resultados\">";
                                            }
                                        }
                                        ?>
                                        
                                        </center></th>
                                        <th><center><a class="btn btn-danger btn-sm" href="../eliminar.php?id=<?php echo $consulta['id_herramienta']?>" role="button">Eliminar</a></center></th>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            include("cerrar_conexion.php");
                            ?>