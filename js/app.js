function obtener() {
    console.log("Datos obtenidos: ");
    var nom = document.getElementById('nombre').value;
    var can = document.getElementById('cantidad').value;
    var precio = document.getElementById('precio').value;
    var sacatotal = precio * can;
    document.getElementById("total").innerHTML = sacatotal;
    var total = document.getElementById('total').value;
    var select = document.getElementById('medidas').value;
    var cate = document.getElementById('categoria').value;
    var gav = document.getElementById('gavilanes').value;

    console.log("Nombre del producto: " + nom);
    console.log("Cantidad: " + can);
    console.log("Precio: " + precio);
    console.log("Total: " + total);
    console.log("Id de la medida es: " + select);
    console.log("Id de la categoria es: " + cate);
    console.log("Id de los gavilanes son: " + gav);
    var datos = new FormData();
    datos.append("nombre", nom);
    datos.append("cantidad", can);
    datos.append("precio", precio);
    datos.append("total", total);
    datos.append("medidas", select);
    datos.append("categoria", cate);
    datos.append("gavilanes", gav);

    $.ajax({
        url: "registro_h.php",
        type: "POST",
        data: datos,
        processData: false,
        contentType: false,
        success: function(resp) {
            alert('Datos enviados');
        }
    });
}