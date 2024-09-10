document.addEventListener('DOMContentLoaded', () => {
    const carritoItemsContainer = document.querySelector('.carrito-items');
    const totalPrecioEl = document.getElementById('total-precio');

    // Función para cargar y mostrar los productos en el carrito
    function cargarCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carritoItemsContainer.innerHTML = ''; // Limpiar contenido previo
        let totalPrecio = 0;

        carrito.forEach((producto, index) => {
            totalPrecio += producto.precio * producto.cantidad;

            const carritoItem = document.createElement('div');
            carritoItem.classList.add('carrito-item');
            carritoItem.innerHTML = `
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <div class="carrito-item-info">
                    <h4>${producto.nombre}</h4>
                    <p>Precio: ${producto.precio} mil pesos</p>
                    <p>Cantidad: ${producto.cantidad}</p>
                    <p>Talla: ${producto.talla}</p> <!-- Añadir talla si es relevante -->
                </div>
                <button class="eliminar-btn" data-index="${index}">Eliminar</button>
            `;
            carritoItemsContainer.appendChild(carritoItem);
        });

        // Actualizar el total del precio en el carrito
        totalPrecioEl.textContent = totalPrecio.toLocaleString('es-CO');
        activarBotonesEliminar();
    }

    // Función para activar los botones de eliminación de productos
    function activarBotonesEliminar() {
        const botonesEliminar = document.querySelectorAll('.eliminar-btn');
        botonesEliminar.forEach(boton => {
            boton.addEventListener('click', () => {
                const index = boton.getAttribute('data-index');
                let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
                carrito.splice(index, 1);
                localStorage.setItem('carrito', JSON.stringify(carrito));
                cargarCarrito(); // Actualizar la vista del carrito
            });
        });
    }

    // Cargar productos del carrito al iniciar
    cargarCarrito();
});
// Función para obtener el carrito desde localStorage
function obtenerCarrito() {
    let carrito = localStorage.getItem('carrito');
    return carrito ? JSON.parse(carrito) : [];
}

// Función para guardar el carrito en localStorage
function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

// Función para añadir un producto al carrito
function añadirAlCarrito(producto) {
    let carrito = obtenerCarrito();
    carrito.push(producto);
    guardarCarrito(carrito);
    alert('Producto añadido al carrito');
}

// Event listener para el formulario de detalles del producto
document.getElementById('form-detalles-producto').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el comportamiento por defecto del formulario

    let producto = {
        nombre: document.querySelector('.producto-informacion h1').innerText,
        precio: document.querySelector('.producto-informacion .precio').innerText.replace('$ ', '').replace(' COP', '').replace(',', ''), // Limpieza de texto
        talla: document.getElementById('talla').value,
        cantidad: document.getElementById('cantidad').value,
        imagen: document.querySelector('.producto-imagen img').src // Captura la ruta de la imagen
    };
    

    if (producto.talla === "") {
        alert("Por favor selecciona una talla.");
    } else {
        añadirAlCarrito(producto);
    }
});
document.getElementById('comprar').addEventListener('click', function() {

    console.log('Botón de comprar clickeado');
    window.location.href = 'compra.html';
});

