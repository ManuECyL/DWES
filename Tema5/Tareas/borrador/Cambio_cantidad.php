<script>

// Función para cambiar la cantidad de productos que se van a comprar en el carrito
    function cambiarCantidad(event, cantidad, i) {
        
        // Evitamos que al pulsar los botones de añadir o quitar cantidad, se envíe el formulario y recargue la página
        event.preventDefault();

        let inputCantidad = document.getElementById('inputCantidad' + i);


            let cantidadActual = parseInt(inputCantidad.value);
            
            // Comprobamos que la cantidad no sea menor que 1
            if (cantidadActual + cantidad > 0) {
                // En esta línea, 'cantidadActual' es el valor actual del input y 'cantidad' es el valor que se va a sumar o restar. Si 'cantidad' es -1, entonces estás sumando -1 a 'cantidadActual', lo que es equivalente a restar 1 de 'cantidadActual'.
                inputCantidad.value = cantidadActual + cantidad;
            }
    }

</script>

<!-- .restarCantidad:hover {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(151, 13, 13) !important;
}

.sumarCantidad:hover {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(13, 151, 31) !important;
} -->