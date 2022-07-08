function borrar(a) {
    a.preventDefault();
    var medida = document.getElementById("medidas").value;
    var categoria = document.getElementById("categoria").value;
    if (medida != "Choose..." && categoria == "Choose...") {
        //borramos medidas
        var datos = new FormData();
        datos.append("Medida", medida);
        $.ajax({
            type: "POST",
            url: "borrardatos.php",
            data: datos,
            processData: false,
            contentType: false,
            success: function() {
                swal({
                    title: "Proceso exitoso",
                    text: "Las medidas han sido borradas",
                    icon: "success"
                });
            }
        });
    } else if (categoria != "Choose..." && medida == "Choose...") {
        var dato = new FormData();
        dato.append("Categoria", categoria);
        $.ajax({
            type: "POST",
            url: "borrardatos.php",
            data: dato,
            processData: false,
            contentType: false,
            success: function() {
                swal({
                    title: "Proceso exitoso",
                    text: "La categoria han sido borradas",
                    icon: "success"
                });
            }
        });
    } else if (categoria == "Choose..." && medida == "Choose...") {
        swal({
            title: "Error",
            text: "Para borrar un registro necesitas seleccionar una opcion",
            icon: "error"
        });
    }
}