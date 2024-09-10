window.addEventListener('load', () => {
    // Cargar datos de localStorage
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const datosEnvio = JSON.parse(localStorage.getItem('datosEnvio')) || {};
    const metodoPago = localStorage.getItem('metodoPago') || 'No especificado';

    // Mostrar datos de envío
    document.getElementById('resumen-nombre').textContent = datosEnvio.nombre || '';
    document.getElementById('resumen-apellidos').textContent = datosEnvio.apellidos || '';
    document.getElementById('resumen-email').textContent = datosEnvio.email || '';
    document.getElementById('resumen-telefono').textContent = datosEnvio.telefono || '';
    document.getElementById('resumen-direccion').textContent = datosEnvio.direccion || '';
    document.getElementById('resumen-codigo-postal').textContent = datosEnvio.codigoPostal || '';
    document.getElementById('resumen-departamento').textContent = datosEnvio.departamento || '';
    document.getElementById('resumen-municipio').textContent = datosEnvio.municipio || '';

    // Mostrar método de pago
    document.getElementById('resumen-metodo-pago').textContent = metodoPago;

    // Mostrar productos del carrito en el resumen
    const resumenLista = document.querySelector('.resumen-container ul');
    carrito.forEach(producto => {
        const li = document.createElement('li');
        li.textContent = `${producto.nombre} - $${producto.precio}`;
        resumenLista.appendChild(li);
    });
});

// Para finalizar la compra
document.getElementById('finalizar-compra-btn').addEventListener('click', () => {
    localStorage.clear();
    alert('¡Gracias por tu compra!');
    window.location.href = 'index.html';  // Redirigir al inicio
});
