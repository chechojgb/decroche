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
        title: 'respuesta exitosa',
        position: 'top',
        toast: true,
        timer: 2300,
        showConfirmButton: false,
    });
}

function editarPqr(id_servicios) {
    // Realizar solicitud AJAX para obtener detalles del usuario por su ID
    fetch('../../Controllers/servicios/obtener_servicio.php?id_servicios=' + id_servicios)
        .then(response => response.json())
        .then(data => {
            // Mostrar los detalles del usuario en el formulario de edición
            document.getElementById('num_servicio').value = data.num_servicio;
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('email').value = data.email;
            document.getElementById('motivo').value = data.motivo;
            document.getElementById('detalle').value = data.detalle;
            document.getElementById('estado').value = data.estado;
        
        })
        .catch(error => console.error('Error al obtener usuario por ID:', error));
        console.log(id_servicios);
}



document.getElementById('form_editar_servicios').addEventListener('submit', function (event) {
    event.preventDefault();
    const num_servicio = document.getElementById("num_servicio").value;
    const estado = document.getElementById("estado").value;
    const respuesta = document.getElementById("respuesta").value;

    console.log(num_servicio, estado);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controllers/Administrador/actualizar_pqr.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {

        const responseLog = xhr.responseText;
        console.log(responseLog);
        
        if(responseLog === "fallo"){
        swalerror("Algo esta mal al enviar los datos");
        }else if(responseLog === "exito") {
        swalsuccess("Respuesta cargada");
        setTimeout(() => {
            location.href="./verRadicado.php";
        }, 1500);
        }else {
        swalerror("Error en el registro, Hubo un problema al registrar los datos");
        }
    };
    
    // Enviar los datos del formulario al servidor
    xhr.send(`num_servicio=${num_servicio}&estado=${estado}&respuesta=${respuesta}`);

});


function editarProducto(id_pro) {
    // Realizar solicitud AJAX para obtener detalles del usuario por su ID
    fetch('../../Controllers/Administrador/obtener_producto.php?id_pro=' + id_pro)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id_pro').value =data.id_pro;
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('estados').value = data.estado;
            document.getElementById('categoria').value = data.categoria;
            document.getElementById('precio').value = data.precio;
            document.getElementById('proveedor').value = data.proveedor;
        })
        .catch(error => console.error('Error al obtener producto por ID:', error));
        console.log(id_pro);
}



document.getElementById('form_editar_servicios').addEventListener('submit', function (event) {
    event.preventDefault();
    const id_pro = document.getElementById("id_pro").value;
    const nombre = document.getElementById("nombre").value;
    const estado = document.getElementById("estados").value;
    const categoria = document.getElementById("categoria").value;
    const precio = document.getElementById("precio").value;
    const proveedor = document.getElementById("proveedor").value;


    console.log(id_pro, estado);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controllers/Administrador/editar_producto.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {

        const responseLog = xhr.responseText;
        console.log(responseLog);
        
        if(responseLog === "fallo"){
        swalerror("Algo esta mal al enviar los datos");
        }else if(responseLog === "exito") {
        swalsuccess("Respuesta cargada");
        setTimeout(() => {
            location.href="./verProduct.php";
        }, 1500);
        }else {
        swalerror("Error en el registro, Hubo un problema al registrar los datos");
        }
    };
    
    // Enviar los datos del formulario al servidor
    xhr.send(`id_pro=${id_pro}&nombre=${nombre}&estado=${estado}&categoria=${categoria}&precio=${precio}&proveedor=${proveedor}`);

});


function editarUsuario(id) {
    // Realizar solicitud AJAX para obtener detalles del usuario por su ID
    fetch('../../Controllers/Administrador/obtener_usuario.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            document.getElementById('formularioEdicion').style.display = 'block';
            document.getElementById('nombreUsuario').innerText = data.nombres;
            document.getElementById('idUsuario').value = data.id;
            document.getElementById('rol').value = data.rol;
            document.getElementById('nombres').value = data.nombres;
            document.getElementById('apellidos').value = data.apellidos;
            document.getElementById('email').value = data.email;
            document.getElementById('telefono').value = data.telefono;
            document.getElementById('estado').value = data.estado;
        })
        .catch(error => console.error('Error al obtener usuario por ID:', error));
        console.log(id);
}



document.getElementById('form_editar_servicios').addEventListener('submit', function (event) {
    event.preventDefault();
    const id = document.getElementById("idUsuario").value;
    const rol = document.getElementById("rol").value;
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const email = document.getElementById("email").value;
    const telefono = document.getElementById("telefono").value;
    const estado = document.getElementById("estado").value;

    console.log(id, estado);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controllers/Administrador/editar_usuario.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {

        const responseLog = xhr.responseText;
        console.log(responseLog);
        
        if(responseLog === "fallo"){
        swalerror("Algo esta mal al enviar los datos");
        }else if(responseLog === "exito") {
        swalsuccess("Respuesta cargada");
        setTimeout(() => {
            location.href="./verUsers.php";
        }, 1500);
        }else {
        swalerror("Error en el registro, Hubo un problema al registrar los datos");
        }
    };
    
    // Enviar los datos del formulario al servidor
    xhr.send(`id=${id}&rol=${rol}&nombres=${nombres}&apellidos=${apellidos}&email=${email}&telefono=${telefono}&estado=${estado}`);

});