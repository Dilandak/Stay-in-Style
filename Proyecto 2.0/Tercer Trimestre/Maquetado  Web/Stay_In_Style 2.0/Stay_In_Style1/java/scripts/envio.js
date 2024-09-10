document.getElementById('envio-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const datosEnvio = {
        nombre: document.getElementById('nombre').value,
        apellidos: document.getElementById('apellidos').value,
        email: document.getElementById('email').value,
        telefono: document.getElementById('telefono').value,
        direccion: document.getElementById('direccion').value,
        codigoPostal: document.getElementById('codigo-postal').value,
        departamento: document.getElementById('departamento').value,
        municipio: document.getElementById('municipio').value
    };

    localStorage.setItem('datosEnvio', JSON.stringify(datosEnvio));
    window.location.href = 'pago.html';
});
