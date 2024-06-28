

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

document.addEventListener('DOMContentLoaded', () => {
    const inputElementCliente = document.getElementById('formularioLogueo');
    if (inputElementCliente) {
        inputElementCliente.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                logueo();
            }
        });
    }

});


function logueo(){


        const correoLogueo = document.getElementById('correoLogueo').value;
        const contraseñaLogueo = document.getElementById('contraseñaLogueo').value;

        // Validar que se ingresen ambos campos
        if (correoLogueo.trim() === '' || contraseñaLogueo.trim() === '') {
            swalerror('Por favor, ingresa tu correo electrónico y contraseña');
            return;
        }

        // Validar el formato del correo electrónico
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexEmail.test(correoLogueo)) {
            swalerror('Por favor, ingresa un correo electrónico válido');
            return;
    
    
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controllers/iniciarSesion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function() {

            const responseLog = xhr.responseText;
      
            
            if(responseLog === "fallo"){
              swalerror("No se encuentra registradas las credenciales con las que intentas acceder");
            }else if(responseLog === "contraseña") {
              swalerror("La contraseña o el correo estan mal, verificalos");
            }else if(responseLog === "bloqueado") {
                swalerror("El usuario se encuentra bloqueado, comunicate con decroche por lo medios disponibles");
            }else if(responseLog === "cliente") {
                swalsuccess("Bienvenido a DeCroche usuario");
                setTimeout(() => {
                    location.href="../../index.php";
                }, 2000);
            }else if(responseLog === "administrador") {
                swalsuccess("Bienvenido a DeCroche administrador");
                setTimeout(() => {
                    location.href="../administrador/administrador.php";
                }, 2000);
            }else if(responseLog === "Vendedor") {
                swalsuccess("Bienvenido a DeCroche Vendedor ");
                setTimeout(() => {
                    location.href="../vendedor/vendedor.php";
                }, 2000);
            }
            else {
              swalerror("Error en el registro, Hubo un problema al registrar los datos");
              }
          };
          
          // Enviar los datos del formulario al servidor
          xhr.send(`clave=${contraseñaLogueo}&email=${correoLogueo}`);
}



