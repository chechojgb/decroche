function swalerror(text) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: text,
        position: 'top',
        toast: true,
        showConfirmButton: false,
        timer: 3000
    });
}

function swalsuccess(text) {
    Swal.fire({
        icon: 'success',
        text: text,
        position: 'top',
        toast: true,
        showConfirmButton: false,
        timer: 6000
    });
}

const regexSoloLetras = /^[a-zA-Z\s]+$/;
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


document.addEventListener('DOMContentLoaded', () => {
    const inputElementCliente = document.getElementById('formularioRegistro');
    if (inputElementCliente) {
        inputElementCliente.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                registro();
            }
        });
    }

    const inputElementVendedor = document.getElementById('formularioRegistroVendedor');
    if (inputElementVendedor) {
        inputElementVendedor.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                registroVendedor();
            }
        });
    }
    const inputElementPeticion = document.getElementById('envioPeticion');
    if (inputElementPeticion) {
        inputElementPeticion.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                registrarPeticion();
            }
        });
    }

    const inputElementBuscar = document.getElementById('buscar_producto');
    if (inputElementBuscar) {
        inputElementBuscar.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                buscar_ahora();
            }
        });
    }


    const inputElementBuscar_nav = document.getElementById('buscar_producto_nav');
    if (inputElementBuscar_nav) {
        inputElementBuscar_nav.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                buscar_ahora_a();
            }
        });
    }
});


function registro() {
   
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const email = document.getElementById("email").value;
    const clave = document.getElementById("clave").value;
    const cclave = document.getElementById("cclave").value;
    // const rol = document.getElementById("rol").value;
    const telefono = document.getElementById("telefono").value;
    
    

    if (!nombres) {
        swalerror("Por favor, ingresa tu nombre");
        return;
    }

    if (!regexSoloLetras.test(nombres)) {
        swalerror("El nombre solo puede contener letras");
        return;
    }

    if (!apellidos) {
        swalerror("Por favor, ingresa tus apellidos");
        return;
    }

    if (!regexSoloLetras.test(apellidos)) {
        swalerror("Los apellidos solo pueden contener letras");
        return;
    }

    if (!email) {
        swalerror("Por favor, ingresa tu correo electrónico");
        return;
    }

    if (!regexEmail.test(email)) {
        swalerror("Por favor, ingresa un correo electrónico válido");
        return;
    }

    if (!clave) {
        swalerror("Por favor, ingresa una contraseña");
        return;
    }

    if (clave.length < 6) {
        swalerror("La contraseña debe tener al menos 6 caracteres");
        return;
    }

    if (clave !== cclave) {
        swalerror("Las contraseñas no coinciden");
        return;
    }

    // if (rol === "Seleccione una opcion") {
    //     swalerror("Por favor, selecciona un rol");
    //     return;
    // }

    if (!telefono) {
        swalerror("Por favor, ingresa tu número de teléfono");
        return;
    }

    if (isNaN(telefono)) {
        swalerror("El número de teléfono solo puede contener números");
        return;
    }


    var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controllers/registroUserExterno.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function() {

            const responseLog = xhr.responseText;
            console.log(responseLog);
            
            if(responseLog === "fallo"){
              swalerror("Ya esta registrado el correo, intenta con uno diferente");
            }else if(responseLog === "exito") {
              swalsuccess("Registro exitoso, Bienvenido a DeCroche");
              setTimeout(() => {
                location.href="./page-login.html";
            }, 2000);
            }else {
              swalerror("Error en el registro, Hubo un problema al registrar los datos");
              }
          };
          
          // Enviar los datos del formulario al servidor
          xhr.send(`clave=${clave}&email=${email}&nombres=${nombres}&apellidos=${apellidos}&cclave=${cclave}&telefono=${telefono}`);


}




function registroVendedor() {
    
    const documento = document.getElementById("documentoVendedor").value;
    const nombres = document.getElementById("nombresVendedor").value;
    const apellidos = document.getElementById("apellidosVendedor").value;
    const email = document.getElementById("emailVendedor").value;
    const clave = document.getElementById("claveVendedor").value;
    const cclave = document.getElementById("cclaveVendedor").value;
    const telefono = document.getElementById("telefonoVendedor").value;
    

    if (!documento) {
        swalerror("Por favor, ingresa un documento");
        return;
    }
    if (isNaN(documento)) {
        swalerror("El número de documento solo puede contener números");
        return;
    }

    if (!nombres) {
        swalerror("Por favor, ingresa un nombre");
        return;
    }


    if (!regexSoloLetras.test(nombres)) {
        swalerror("El nombre solo puede contener letras");
        return;
    }

    if (!apellidos) {
        swalerror("Por favor, ingresa tus apellidos");
        return;
    }

    if (!regexSoloLetras.test(apellidos)) {
        swalerror("Los apellidos solo pueden contener letras");
        return;
    }

    if (!email) {
        swalerror("Por favor, ingresa tu correo electrónico");
        return;
    }

    if (!regexEmail.test(email)) {
        swalerror("Por favor, ingresa un correo electrónico válido");
        return;
    }

    if (!clave) {
        swalerror("Por favor, ingresa una contraseña");
        return;
    }

    if (clave.length < 6) {
        swalerror("La contraseña debe tener al menos 6 caracteres");
        return;
    }

    if (clave !== cclave) {
        swalerror("Las contraseñas no coinciden");
        return;
    }

    

    // if (rol === "Seleccione una opcion") {
    //     swalerror("Por favor, selecciona un rol");
    //     return;
    // }

    if (!telefono) {
        swalerror("Por favor, ingresa tu número de teléfono");
        return;
    }

    if (isNaN(telefono)) {
        swalerror("El número de teléfono solo puede contener números");
        return;
    }

    var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controllers/registroVendedor.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function() {

            const responseLog = xhr.responseText;
            console.log(responseLog);
            
            if(responseLog === "fallo"){
              swalerror("Ya esta registrado el correo, intenta con uno diferente");
            }else if(responseLog === "exito") {
              swalsuccess("Registro exitoso, una ves se valide la información te avisaremos por correo ");
              setTimeout(() => {
                location.href="./page-login.html";
            }, 4000);
            }else {
              swalerror("Error en el registro, Hubo un problema al registrar los datos");
              }
          };
          
          // Enviar los datos del formulario al servidor
          xhr.send(`clave=${clave}&email=${email}&nombres=${nombres}&apellidos=${apellidos}&cclave=${cclave}&telefono=${telefono}&documento=${documento}`);



}


function registrarPeticion(){
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var motivo = document.getElementById("motivo").value;
    var detalle = document.getElementById("detalle").value;
    var foto = document.getElementById("foto").value;
    var formulario = document.getElementById("envioPeticion"); 

    if (!nombre) {
        swalerror("Por favor, ingresa tu nombre");
        return;
    }

    if (!regexSoloLetras.test(nombre)) {
        swalerror("El nombre solo puede contener letras");
        return;
    }
    if (!email) {
        swalerror("Por favor, ingresa tu correo electrónico");
        return;
    }

    if (!regexEmail.test(email)) {
        swalerror("Por favor, ingresa un correo electrónico válido");
        return;
    }
    if(!motivo){
        swalerror("Selecciona un motivo");
        return; // Agrega un return para evitar que el código continúe ejecutándose
    }
    if(!detalle){
        swalerror("Escribe los detalles de la petición");
        return; // Agrega un return para evitar que el código continúe ejecutándose
    }

    console.log(nombre, email, motivo, detalle, foto);

    swalsuccess("Formulario de petición enviado con éxito");
    setTimeout(() => {
        formulario.submit();
    }, 2000);
}






document.addEventListener('DOMContentLoaded', () => {
const inputElement = document.getElementById('id_consulta');
if (inputElement) {
    inputElement.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            consultar_peticion();
        }
    });
} else {
    console.log();
}
});

function consultar_peticion() {
    const id_consulta = document.getElementById("id_consulta").value;
    fetch('../../Controllers/servicios/buscarConsulta.php?id_consulta=' + id_consulta)
    .then(response => response.json())
    .then(data => {
        // Mostrar los detalles del usuario en el formulario de edición
        document.getElementById('consulta_peticion').style.display = 'block';
        document.getElementById('nombre').value = data.nombre;
        document.getElementById('email').value = data.email;
        document.getElementById('motivo').value = data.motivo;
        document.getElementById('detalles').value = data.detalle;
        document.getElementById('tipo_servicio').innerText = data.tipo_servicio;
        document.getElementById('tipo').innerText = data.tipo_servicio;
        document.getElementById('tipo_titulo').innerText = data.tipo_servicio;
        document.getElementById('fecha').innerText = data.fecha;
        document.getElementById('estado').value = data.estado;
        document.getElementById('respuesta').value = data.respuesta;
        

    })
    .catch(error => {swalerror("No se pudo encontrar la peticion que creaste, verifica el codigo");
    document.getElementById('consulta_peticion').style.display = 'none';
    });
}



function registrar_envio() {
   
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const correo = document.getElementById("correo").value;
    const celular = document.getElementById("celular").value;
    const ciudad = document.getElementById("ciudad").value;
    const status = document.getElementById("status").value;
    
    

    if (!nombre) {
        swalerror("Por favor, ingresa tu nombre");
        return;
    }
    
    if (!regexSoloLetras.test(nombre)) {
        swalerror("El nombre solo puede contener letras");
        return;
    }
    if (!ciudad) {
        swalerror("Por favor, ingresa tu ciudad");
        return;
    }

    if (!regexSoloLetras.test(ciudad)) {
        swalerror("La ciudad solo puede contener letras");
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

    if (!correo) {
        swalerror("Por favor, ingresa tu correo electrónico");
        return;
    }

    if (!regexEmail.test(correo)) {
        swalerror("Por favor, ingresa un correo electrónico válido");
        return;
    }



    if (!celular) {
        swalerror("Por favor, ingresa tu número de teléfono");
        return;
    }

    if (isNaN(celular)) {
        swalerror("El número de teléfono solo puede contener números");
        return;
    }


    swalsuccess("Pago exitoso");
    setTimeout(() => {
        document.getElementById("envioDatosEnvio").submit();
        // window.location.href = "../user/facturas.php";
    }, 2000);
    
}



function buscar_ahora() {
    const producto = document.getElementById("buscarProducto").value;

    // Usando solo jQuery para la solicitud AJAX
    $.ajax({
        data: { producto: producto }, // Aquí asumo que quieres enviar un objeto con una propiedad 'producto'
        type: 'POST',
        url: '../../Controllers/buscador.php',
        success: function(data) {
            document.getElementById("datos_buscador").innerHTML = data;
            document.getElementById('caja_buscador').style.display = 'block';
            setTimeout(() => {
                document.getElementById('caja_buscador').style.display = 'none';
            }, 9000);

        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    });
}


function buscar_ahora_a() {
    const producto = document.getElementById("buscarProducto_a").value;

    // Usando solo jQuery para la solicitud AJAX
    $.ajax({
        data: { producto: producto }, // Aquí asumo que quieres enviar un objeto con una propiedad 'producto'
        type: 'POST',
        url: '../../Controllers/buscador.php',
        success: function(data) {
            document.getElementById("datos_buscador_a").innerHTML = data;
            document.getElementById('caja_buscador_a').style.display = 'block';
            setTimeout(() => {
                document.getElementById('caja_buscador_a').style.display = 'none';
            }, 900000);

        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    });
}