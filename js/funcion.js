function medidas(e) {
    //e.preventDefault();
    var ancho = document.getElementById('ancho').value;
    var largo = document.getElementById('largo').value;
    if (largo === "" || ancho === "") {
        swal({
            title: "Error",
            text: "Falta Agregar datos ",
            icon: "warning",
        });
    } else {
        console.log('Ancho: ' + ancho);
        console.log('Largo: ' + largo);
        var data = new FormData();
        data.append("Ancho", ancho);
        data.append("Largo", largo);
        $.ajax({
            url: "inserta_medidas.php",
            type: "POST",
            data: data,
            processData: false,
            Cache: false,
            contentType: false,
            beforeSend: function(mensaje) {
                $('#cargando').html('<div><img src="img/cargando.gif" alt=""></div>');
            },
            success: function(mensaje) {
                if (mensaje == "Insercion exitosa") {
                    swal({
                        title: "Insercion exitosa",
                        text: "Los datos se agregaron correctamente",
                        icon: "success"
                    });
                } else {
                    swal({
                        title: "Error",
                        text: "Los datos se pudieron insertar",
                        icon: "warning"
                    });
                }
            }
        });
    }
}