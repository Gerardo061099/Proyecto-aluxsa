function medidas(e) {
    e.preventDefault();
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
        $.ajax({
            url: "inserta_medidas.php",
            type: "POST",
            data: {
                "Ancho": ancho,
                "Largo": largo
            },
            success: function(mensaje) {
                if (mensaje == "Insercion exitosa") {
                    swal({
                        title: "Insercion exitosa",
                        text: "Los datos se agregaron correctamente",
                        icon: "success"
                    });
                    location.reload(true);
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

