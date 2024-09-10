document.getElementById('pago-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const metodoPago = document.querySelector('input[name="metodoPago"]:checked').value;
    localStorage.setItem('metodoPago', metodoPago);

    window.location.href = 'resumen.html';  // Redirigir a resumen.html
});