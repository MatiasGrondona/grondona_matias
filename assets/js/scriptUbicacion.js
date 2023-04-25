//JS para la card de ubicación
window.onload = function() {
   // Obtener las cards
const cardFormulario = document.querySelector('#card-formulario');
const cardMapa = document.querySelector('#card-mapa');

// Obtener los elementos hijos de cada card que contienen su contenido
const cardFormularioBody = cardFormulario.querySelector('.card-body');
const cardMapaBody = cardMapa.querySelector('.card-body');

// Obtener el elemento que contiene el título de la segunda card
const cardMapaTitulo = cardMapa.querySelector('.card-title');

console.log('Titulo', cardMapaTitulo);

// Obtener la altura de la card del formulario
const alturaFormulario = cardFormularioBody.offsetHeight;
console.log('altura card Formulario', alturaFormulario);
const alturaTitulo = cardMapaTitulo.offsetHeight;
console.log('altura titulo', alturaTitulo)
const alturaFinal = alturaFormulario - alturaTitulo;
console.log('altura formulario - titulo', alturaFinal);

// Obtener el iframe
const iframeMapa = cardMapa.querySelector('iframe');

// Establecer la altura del iframe igual a la altura de la card del formulario
iframeMapa.style.height = alturaFinal+ 'px';
console.log('altura', iframeMapa.style.height);
}