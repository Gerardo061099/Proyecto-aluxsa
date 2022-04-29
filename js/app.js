function obtener(e) {
    console.log("Datos obtenidos: ");
    e.preventDefault();
    var nom = document.getElementById('nombre').value;
    var can = document.getElementById('cantidad').value;
    var precio = document.getElementById('precio').value;
    var total = document.getElementById('total').value;
    var img = document.getElementById('subir_imagen').files[0];
    var select = document.getElementById('medidas').value;
    var cate = document.getElementById('categoria').value;
    var gav = document.getElementById('gavilanes').value;
    if (nom == "" || can == "" || precio == "" || total == "" || img == "" || select == "" || cate == "" || gav == "") {
        swal({
            title: "Campos Vacios",
            text: "Debes llenar todos los campos",
            icon: "warning",
        });
    } else {
        console.log("Nombre del producto: " + nom);
        console.log("Cantidad: " + can);
        console.log("Precio: " + precio);
        console.log("Total: " + total);
        console.log("Ruta de la imagen: " + img);
        console.log("Id de la medida es: " + select);
        console.log("Id de la categoria es: " + cate);
        console.log("Id de los gavilanes son: " + gav);
        var datos = new FormData();
        datos.append("nombre", nom);
        datos.append("cantidad", can);
        datos.append("precio", precio);
        datos.append("total", total);
        datos.append("img", img);
        datos.append("medidas", select);
        datos.append("categoria", cate);
        datos.append("gavilanes", gav);
        console.log("Subiendo datos");
        $.ajax({
            url: "registro_h.php",
            type: "POST",
            data: datos,
            processData: false,
            Cache: false,
            contentType: false,
            success: function() {
                swal({
                    title: "Insercion exitosa!!",
                    text: "Se inserto una nueva herramienta a la base de datos",
                    icon: "success",
                });
            },
            error: function() {
                alert("Ocurrio un error");
            }

        });
    }

}