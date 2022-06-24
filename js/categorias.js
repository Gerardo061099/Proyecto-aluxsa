function addcategorias(a) {
    a.preventDefault();
    var desc = document.getElementById('desc').value;
    var material = document.getElementById('material').value;
    if (desc != "" && material != "") {
        console.log("Descripcion: " + desc);
        console.log("Material: " + material);
        var datos = new FormData();
        datos.append("descripcion", desc);
        datos.append("material", material);
        $.ajax({
            type: "POST",
            url: "inserta_c.php",
            data: datos,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#cargando').html("Procesando la peticion...");
            },
            success: function(mensaje) {
                alert(mensaje);
                swal({
                    title: "El proceso finalizo",
                    text: "Los datos se insertaron correctamente",
                    icon: "success"
                });
            },
        });
    } else {
        swal({
            title: "Error",
            text: "Los datos recibidos están vacios",
            icon: "error"
        });
    }
}