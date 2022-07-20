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
                type: "POST",
                url: "registrar_usuarios.php",
                data: {
                    "nombre": nombre,
                    "apellidos": apellidos,
                    "usuario": usuario,
                    "pwd": pwd1,
                    "n_empleado":n_empleado,
                },
                dataType: false,
                beforeSend: function () {
                    $('#load1').html('Cargando...');
                },
                success: function (response) {
                    if (response=="Insercion exitosa") {
                        swal({
                            title: "Listo!!",
                            text: "Registro exitoso!!",
                            icon: "success",
                        });
                        $('#load1').html('Registro exitoso!!');
                    } else {
                        swal({
                            title: "Oh oh!!",
                            text: "Ocurrio un problema inesperado!!",
                            icon: "error",
                        });
                        $('#load1').html('Ocurrio un problema inesperado!!');
                    }
                }
            });
        } else {
        console.log("Las contraseñas son diferentes");
        }
    } else {
        console.log("Las contraseñas son diferentes");
    }
    
    
}