function obtener(e) {
    e.preventDefault();
    //obtenemos los valores ingresados por el usuario del documento registro_h.php
    //por su id incluyendo la imagen
    var nom = document.getElementById('nombre').value;
    var can = document.getElementById('cantidad').value;
    var canm = document.getElementById('cantidadm').value;
    var img = document.getElementById('subir_imagen').files[0]; //obtenemos un objeto
    var select = document.getElementById('medidas').value;
    var cate = document.getElementById('categoria').value;
    var gav = document.getElementById('gavilanes').value;
        var datos = new FormData();
        datos.append("nombre", nom);
        datos.append("cantidad", can);
        datos.append("cantidadm", canm);
        datos.append("img", img);
        datos.append("medidas", select);
        datos.append("categoria", cate);
        datos.append("gavilanes", gav);
        console.log("Subiendo datos");
        $.ajax({
            url: "add_h.php",
            type: "POST",
            data: datos,
            processData: false,
            Cache: false,
            contentType: false,
            beforeSend: function() {
                $('#load1').html('Cargando...');
            },
            success: function(mensaje) {
                if (mensaje == "campos vacios") {
                    swal({
                        title: "Campos Vacios",
                        text: "Debes llenar todos los campos",
                        icon: "warning",
                    });
                    $('#load1').html('Oh Oh.. ocurrio un error!!');
                } else {
                    swal({
                        title: "Insercion exitosa",
                        text: "Puedes consultar la informacion en la lista de herramientas",
                        icon: "success"
                    });
                    $('#load1').html('Registro terminado!!');
                }
            }
        });
    
} //fin function obtener();

// funcion para actualizar campo cantidad de una herramienta
function update() {
    //e.preventDefault();
    var id_herramienta = document.getElementById('id_h').value;
    var cantidadnew = document.getElementById('cantidadnew').value;
    if (id_herramienta != "Choose..." && cantidadnew != "") {
        var files = new FormData();
        files.append("numero_h", id_herramienta);
        files.append("can", cantidadnew);
        $.ajax({
            url: "update.php",
            type: "POST",
            data: files,
            processData: false,
            Cache: false,
            contentType: false,
            beforeSend: function() {
                $('#resultado').html('<div>cargando.... Espere un momento</div>');
            },
            success: function(mensaje) {
                //$('#resultado').html(mensaje);
                if (mensaje == "Actualizacion exitosa") {
                    swal({
                        title: "Actualizacion exitosa!!",
                        text: "Se realizo un actualizacion de manera exitosa!!",
                        icon: "success"
                    });
                } else {
                    swal({
                        title: "Oh oh ",
                        text: "Ocurrio un error",
                        icon: "Debes ingresar los valores necesarios para realizar la actualizacion"
                    });
                }
            }
        });
    } else {
        swal({
            title: "Datos Vacios",
            text: "Debes ingresar los valores necesarios para realizar la actualizacion",
            icon: "error"
        });
    }

} //fin function update();
function consultar(e) {
    var nombre_h = document.getElementById('herra_b').value;
    var medida_h = document.getElementById('medida_b').value;
    if (nombre_h != "Choose..." && medida_h != "Choose...") {
        var datos = new FormData();
        datos.append("herramientajs", nombre_h);
        datos.append("medidajs", medida_h);
        $.ajax({
            type: "POST",
            url: "inventario.php",
            data: datos,
            processData: false,
            Cache: false,
            contentType: false,
            beforeSend: function() {
                $('#cargando').html('<div>Cargando...</div>');
            },
            success: function(mensaje) {
                if (mensaje == "Datos vacios") {
                    swal({
                        title: "Oh oh ",
                        text: "Ocurrio un error",
                        icon: "error"
                    });
                } else {
                    swal({
                        title: "Consulta exitosa!!",
                        text: "Deslice para abajo para ver los resultados de la busqueda!!",
                        icon: "success"
                    });
                }
            },
            error: function() {
                swal({
                    title: "Oh oh ",
                    text: "Algo salio mal",
                    icon: "error"
                });
            }
        });
    } else {
        swal({
            title: "Campos vacios",
            text: "Debes seleccionar una opcion para realizar la busqueda!!",
            icon: "warning"
        });
        e.preventDefault();
    }
} //fin function consultar();

function convertir() {
    console.log("Function convertir");
    var $screenshot = document.body;
    html2pdf()
        .set({
            margin: 0.2,
            marginTop: 0.4,
            filename: "Reportes.pdf",
            image: {
                type: "jpg",
                quality: 0.50,
            },
            html2canvas: {
                scale: 3,
                letterRendering: true
            },
            jsPDF: {
                unit: "in",
                format: "a3",
                orientation: "portrait" //portrait o landscape
            }
        })
        .from($screenshot)
        .save()
        .catch(error => console.log(error))
        .finally()
        .then(() => {
            swal({
                title: "Conversion exitosa!!",
                text: "Se a generado el PDF",
                icon: "success"
            });
        });
}

function subirsolicitud(e) {
    e.preventDefault();
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("ap").value;
    var n_empleado = document.getElementById("n_empleado").value;
    var genero = document.getElementById("genero").value;
    var datos = new FormData();
    datos.append("Nombre", nombre);
    datos.append("Apellidos", apellidos);
    datos.append("N_empleado", n_empleado);
    datos.append("Genero", genero);
    $.ajax({
        url: "add_solicitante.php",
        type: "POST",
        data: datos,
        processData: false,
        Cache: false,
        contentType: false,
        beforeSend: function() {
            $('#cargar').html('<div><img src="img/cargando.gif"></img><br><br>Cargando...</div>');
        },
        success: function(mensaje) {
            if (mensaje == "Insercion exitosa!!") {
                swal({
                    title: "Insercion exitosa",
                    text: "Los datos han sido insertados",
                    icon: "success"
                });
                window.location.href = "add_solicitud.php";
            } else if (mensaje == "La insercion no se pudo ejecutar") {
                swal({
                    title: "Oh oh",
                    text: "Ocurrio un problema",
                    icon: "warning"
                });
            }
        }
    });
}
function RegistrarSoli(e) {
    e.preventDefault();
    var herramienta = document.getElementById("herramienta").value;
    var maquina = document.getElementById("maquina").value;
    var cantidad = document.getElementById("cantidad").value;
    if (herramienta != "Choose..." && maquina != "Choose..." && cantidad != "") {
        var data = new FormData();
        data.append("N_herramienta", herramienta);
        data.append("N_maquina", maquina);
        data.append("cantidad", cantidad);
        $.ajax({
            url: "fin_solicitud.php",
            type: "POST",
            data: data,
            processData: false,
            Cache: false,
            contentType: false,
            beforeSend: function() {
                $('#load').html('<br><br><div><img src="img/cargando.gif"></img>Cargando...</div>');
            },
            success: function(message) {
                if (message == "Registro realizado") {
                    swal({
                        title: "Registro Exitoso",
                        text: "Se a registrado la solicitud de forma exitosa!!",
                        icon: "success"
                    });
                    window.location.href = " ";
                } else if (message == "La cantidad solicitada es mayor a la cantidad en existencia") {
                    swal({
                        title: "Error",
                        text: "La cantidad que solicitas es mayor al número de piezas almacenadas",
                        icon: "warning"
                    });
                    window.location.href = " ";
                } else {
                    swal({
                        title: "Error",
                        text: "Ocurrio un error inesperado",
                        icon: "warning"
                    });
                    window.location.href = " ";
                }
            }
        });
    } else {
        swal({
            title: "Datos no ingresados",
            text: "Debes Selection los datos",
            icon: "warning"
        });
    }
}