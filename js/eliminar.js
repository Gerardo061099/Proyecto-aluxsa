function borrar() {
    var medida = document.getElementById("medidas").value;
    var categoria = document.getElementById("categoria").value;
    if (medida != "Choose..." && categoria == "Choose...") {
        console.log("Id: "+medida);
        //borramos medidas
        datos.append();
        $.ajax({
            type: "POST",
            url: "borrardatos.php",
            data: {
                    "Medida": medida
            },
            beforeSend: function() {
                $('#load1').html('Cargando...');
            },
            success: function () {
                swal({
                    title: "Proceso exitoso",
                    text: "Las medidas han sido borradas",
                    icon: "success"
                });
                $('#load1').html('Medidas eliminadas');
                location.reload(true);
            }
        });
    } else if (categoria != "Choose..." && medida == "Choose...") {
        $.ajax({
            type: "POST",
            url: "borrardatos.php",
            data: {
                "Categoria": categoria
            },
            beforeSend: function() {
                $('#load1').html('Cargando...');
            },
            success: function() {
                swal({
                    title: "Proceso exitoso",
                    text: "La categoria han sido borrada",
                    icon: "success"
                });
                $('#load1').html('Categoria eliminada');
                location.reload(true);
            }
        });
    } else if (categoria == "Choose..." && medida == "Choose...") {
        swal({
            title: "Error",
            text: "Para borrar un registro necesitas seleccionar una opcion",
            icon: "error"
        });
    }else if (categoria != "Choose..." && medida != "Choose...") {
        swal({
            title: "Error",
            text: "Solo puedes borrar una opcion a la vez",
            icon: "error"
        });
    }
}
