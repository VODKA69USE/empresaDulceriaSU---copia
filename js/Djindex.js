
    alert("¡Hola! Bienvenido a la Dulcería Santiago Apóstol. Espero que sea de tu agrado.");


// Llamar a la función de mostrar mensaje de bienvenida inmediatamente
mostrarMensajeBienvenida();

// Evento de clic en el encabezado para cambiar el color de fondo
const header = document.querySelector('header');
header.addEventListener('click', function() {
    header.style.transition = 'background-color 0.5s ease';
    header.style.backgroundColor = '#ff5733';
});

// Eventos de pasar el ratón sobre los elementos del menú para cambiar el color de fondo
const menuItems = document.querySelectorAll('#menu li');
menuItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
        item.style.transition = 'background-color 0.3s ease';
        item.style.backgroundColor = '#ffcc00';
    });
    item.addEventListener('mouseleave', function() {
        item.style.transition = 'background-color 0.3s ease';
        item.style.backgroundColor = 'transparent';
    });
});



