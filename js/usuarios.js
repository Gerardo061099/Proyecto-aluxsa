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
    } else {
        console.log("Las contraseñas son diferentes");
    }
    
    //validar letra
    if ( pwd1.match(/[A-z]/) && pwd2.match(/[A-z]/) ) {
        $('#letter').removeClass('invalid').addClass('valid');
    } else {
        $('#letter').removeClass('valid').addClass('invalid');
    }

    //validar numero
    if ( pwd1.match(/\d/) ) {
        $('#number').removeClass('invalid').addClass('valid');
    } else {
        $('#number').removeClass('valid').addClass('invalid');
    }
    if (pwd1 == pwd2) {
        console.log("Las contraseñas coinciden");
    } else {
        console.log("Las contraseñas son diferentes");
    }
    if (pwd1 != "" && pwd2 != "") {
        console
    } else {
        
    }
}