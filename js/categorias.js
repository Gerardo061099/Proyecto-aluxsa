function addcategorias(a) {
    a.preventDefault();
    var desc = document.getElementById('desc').value;
    var material = document.getElementById('material').value;
    console.log("Descripcion: " + desc);
    console.log("Material: " + material);
    var datos = new FormData();
    datos.append("descripcion", desc);
    datos.append("material", material);
    $.ajax({
        type: "POST",
        url: "inserta_c.php",
        data: datos,
        dataType: false,
        success: function(mensaje) {
            if (mensaje == "Los datos se insertaron correctamente") {
                Swal({
                    title: "El proceso finalizo",
                    text: "Los datos se insertaron correctamente",
                    icon: "success"
                });
            } else if (mensaje == "Los datos recibidos estan vacios") {
                Swal({
                    title: "Error",
                    text: "Los datos recibidos están vacios",
                    icon: "error"
                });
            }
        }
    });
}