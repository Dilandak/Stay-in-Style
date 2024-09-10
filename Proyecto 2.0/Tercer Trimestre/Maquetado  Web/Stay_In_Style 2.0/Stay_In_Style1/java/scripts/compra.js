function mostrarPaso(paso) {
    document.querySelectorAll('.paso').forEach(function(element) {
        element.style.display = 'none';
    });
    document.getElementById('paso' + paso).style.display = 'block';
}

function generarDatosCliente() {
    const nombres = ['Anderson', 'María', 'Carlos', 'Laura'];
    const apellidos = ['Pérez', 'Gómez', 'Rodríguez', 'López'];
    const correos = ['anderson@example.com', 'maria@example.com', 'carlos@example.com', 'laura@example.com'];

    document.getElementById('nombre').textContent = nombres[Math.floor(Math.random() * nombres.length)];
    document.getElementById('apellido').textContent = apellidos[Math.floor(Math.random() * apellidos.length)];
    document.getElementById('correo').textContent = correos[Math.floor(Math.random() * correos.length)];
}

// Llama a la función para generar datos del cliente cuando se carga la página de compra
window.onload = function() {
    generarDatosCliente();
    mostrarPaso(1);
};
