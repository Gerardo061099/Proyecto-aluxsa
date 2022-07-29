function registrar(a) {
    a.preventDefault();
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var usuario = document.getElementById("user").value;
    var pwd1 = document.getElementById("pass").value;
    var pwd2 = document.getElementById("pwd2").value;
    var n_empleado = document.getElementById("n_empleado").value;
    console.log("Nombre de usuario: " + nombre +" "+apellidos );
    console.log("Usuario: " + usuario+ " con numero de empleado: " +n_empleado);
    if (pwd1.length == pwd2.length) {
        console.log("El tamaño de las contraseñas es el mismo");
        if (pwd1 == pwd2) {
            console.log("Las contraseñas coinciden");
            $.ajax({
                url: "registrar_usuarios.php",
                type: "POST",
                data: {
                    "nombre": nombre,
                    "apellidos": apellidos,
                    "usuario": usuario,
                    "pwd": pwd1,
                    "n_empleado":n_empleado
                },
                beforeSend: function() {
                    $('#load1').html('Cargando...');
                },
                success: function(response) {
                    if (response=="Insercion exitosa") {
                        swal({
                            title: "Listo!!",
                            text: "Registro exitoso!!",
                            icon: "success"
                        });
                        $('#load1').html('Registro exitoso!!');
                    } else if (response == "Datos incorrectos") {
                        swal({
                            title: "Oh oh!!",
                            text: "Ocurrio un problema inesperado!!",
                            icon: "error"
                        });
                        $('#load1').html('Ocurrio un problema inesperado!!');
                    }
                }
            });
        } else {
            $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Las contraseñas son diferentes</div>');
        }
    } else {
        $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Las contraseñas son diferentes</div>');
    }
}
function Update_infousers(data) {
    var d = data.split("||");
    $("#modal_id").val(d[0]);
    $("#modal_nombre").val(d[1]);
    $("#modal_apellidos").val(d[2]);
    $("#modal_user").val(d[3]);
    $("#modaln_empleado").val(d[4]);
    $("#modal_estado").val(d[5]);

}
function actualizar_usuarios(a) {
    a.preventDefault();
    var datos = $("#frm_update").serialize();
    $.ajax({
        type: "POST",
        url: "actualizar_usuario.php",
        data: datos,
        beforeSend: function name(params) {
        $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Cargando...</div>');  
        },
        success: function (b) {
            if (b=="Actualizado") {
                $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Actualizacion exitosa!!</div>');
                //window.location.href = "";
                location.reload(true);
            }
            else if (b=="Datos faltantes") {
                $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Accion no permitida</div>');
            }
        }
    });
}
function eliminar_us(a) {
    a.preventDefault();
    var datos = $("#frm_update").serialize();
    var confirmar = confirm("¿Estas seguro?");
    if (confirmar == true) {
        $.ajax({
            type: "POST",
            url: "eliminar_us.php",
            data: datos,
            success: function (response) {
                if (response == "Registo eliminado"){
                    $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Se elimino el registro</div>');
                    //$("#tabla_us").load("add_user.php");
                    location.reload();
                } else if (response == "datos vacios"){
                    $('#load1').html('<br><div style="background:#EC7063; color:#FDFEFE; width: max-content; border-radius:3px; padding:3px 3px;">Sin id</div>');
                }
            }
        });
    } else {
        alert("Proceso cancelado!!");
        
    }
    
}