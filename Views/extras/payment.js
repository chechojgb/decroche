

function swalsuccess(message) {
    Swal.fire({
        icon: 'success',
        text: message,
        position: 'top',
        toast: true,
        showConfirmButton: false,
        timer: 3000
    });
}

function swalerror(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message,
        position: 'top',
        toast: true,
        showConfirmButton: false,
        timer: 3000
    });
}


function procesarPago(){


    const cardNumber = document.getElementById('cardNumber').value;
    const expiry = document.getElementById('expiry').value;
    const csc = document.getElementById('csc').value;
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const direccion = document.getElementById('direccion').value;
    const codigoP = document.getElementById('codigoP').value;
    const ciudad = document.getElementById('ciudad').value;
    const celular = document.getElementById('celular').value;
    const correo = document.getElementById('correo').value;

    const regexSoloLetras = /^[a-zA-Z\s]+$/;
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!cardNumber) {
        swalerror("Por favor, ingresa el número de la tarjeta");
        return;
    }

    if (!expiry) {
        swalerror("Por favor, ingresa la fecha de vencimiento");
        return;
    }

    if (!csc) {
        swalerror("Por favor, ingresa el CSC");
        return;
    }

    if (!nombre) {
        swalerror("Por favor, ingresa tu nombre");
        return;
    }

    if (!regexSoloLetras.test(nombre)) {
        swalerror("El nombre solo puede contener letras");
        return;
    }

    if (!apellido) {
        swalerror("Por favor, ingresa tus apellidos");
        return;
    }

    if (!regexSoloLetras.test(apellido)) {
        swalerror("Los apellidos solo pueden contener letras");
        return;
    }

    if (!direccion) {
        swalerror("Por favor, ingresa la dirección");
        return;
    }

    if (!codigoP) {
        swalerror("Por favor, ingresa el código postal");
        return;
    }

    if (!ciudad) {
        swalerror("Por favor, ingresa la ciudad");
        return;
    }

    if (!celular) {
        swalerror("Por favor, ingresa tu número de celular");
        return;
    }

    if (isNaN(celular)) {
        swalerror("El número de celular solo puede contener números");
        return;
    }
    if (celular > 10 && celular < 9) {
        swalerror("Escribe un número valido de celular");
        return;
    }

    if (!correo) {
        swalerror("Por favor, ingresa tu correo electrónico");
        return;
    }

    if (!regexEmail.test(correo)) {
        swalerror("Por favor, ingresa un correo electrónico válido");
        return;
    }

    swalsuccess("Pago exitoso");
    setTimeout(() => {
        document.getElementById("paymentForm").submit();
    }, 2000);

        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', '../../Controllers/iniciarSesion.php', true);
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        // xhr.onload = function() {

        //     const responseLog = xhr.responseText;
      
            
        //     if(responseLog === "fallo"){
        //       swalerror("No se encuentra registradas las credenciales con las que intentas acceder");
        //     }else if(responseLog === "contraseña") {
        //       swalerror("La contraseña o el correo estan mal, verificalos");
        //     }else if(responseLog === "bloqueado") {
        //         swalerror("El usuario se encuentra bloqueado, comunicate con decroche por lo medios disponibles");
        //     }else if(responseLog === "cliente") {
        //         swalsuccess("Bienvenido a DeCroche usuario");
        //         setTimeout(() => {
        //             location.href="../../index.php";
        //         }, 2000);
        //     }else if(responseLog === "administrador") {
        //         swalsuccess("Bienvenido a DeCroche administrador");
        //         setTimeout(() => {
        //             location.href="../administrador/administrador.php";
        //         }, 2000);
        //     }else if(responseLog === "proveedor") {
        //         swalsuccess("Bienvenido a DeCroche proveedor ");
        //     }
        //     else {
        //       swalerror("Error en el registro, Hubo un problema al registrar los datos");
        //       }
        //   };
          
        //   // Enviar los datos del formulario al servidor
        //   xhr.send(`clave=${contraseñaLogueo}&email=${correoLogueo}`);
}



