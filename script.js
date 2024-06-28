document.addEventListener('DOMContentLoaded', () => {
    const inputElementBuscar = document.getElementById('buscar_producto');
    if (inputElementBuscar) {
        inputElementBuscar.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                buscar_ahora_a();
            }
        });
    }
});


function buscar_ahora_a() {
    const producto = document.getElementById("buscarProducto_a").value;

    // Usando solo jQuery para la solicitud AJAX
    $.ajax({
        data: { producto: producto }, // Aquí asumo que quieres enviar un objeto con una propiedad 'producto'
        type: 'POST',
        url: './Controllers/buscador.php',
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
