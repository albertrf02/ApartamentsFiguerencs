let temaDark = false;

function agregarClaseDark() {
  const bodyElement = document.querySelector('body');
  if (bodyElement) {
    temaDark = !temaDark; // Invierte el estado actual del tema
    if (temaDark) {
      bodyElement.setAttribute('data-bs-theme', 'dark');
    } else {
      bodyElement.removeAttribute('data-bs-theme');
    }
  }
  console.log('Alternando clase dark');
}

const nav = document.getElementById('nav');
let lastScrollTop = 0;

window.addEventListener('scroll', () => {
  const scrollTop = window.scrollY || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    // Scrolling down, hide the nav
    nav.classList.add('hidden');
  } else {
    // Scrolling up, show the nav
    nav.classList.remove('hidden');
  }

  lastScrollTop = scrollTop;
});

//Modal
// Obtenemos todos los elementos de la clase 'card' (tus tarjetas)
const cards = document.querySelectorAll('.card');

// Obtenemos el modal y el contenido del modal
const modal = document.getElementById('myModal');
const modalContent = document.querySelector('.modal-content');

// Recorremos las tarjetas y agregamos un listener para abrir el modal al hacer clic
cards.forEach(card => {
  card.addEventListener('click', () => {
    // Clonamos el contenido de la tarjeta y lo añadimos al modal
    const cardClone = card.cloneNode(true);
    modalContent.innerHTML = '';
    modalContent.appendChild(cardClone);
    
    // Mostramos el modal
    modal.style.display = 'block';
  });
});

// Cerramos el modal al hacer clic en la "X"
const closeButton = document.querySelector('.close');
closeButton.addEventListener('click', () => {
  modal.style.display = 'none';
});

// Cerramos el modal al hacer clic en el fondo borroso
modal.addEventListener('click', event => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});

// Volver atrás
const backButton = document.getElementById('backButton');
backButton.addEventListener('click', () => {
  // Implementa la lógica para volver atrás, por ejemplo, cerrar el modal
  modal.style.display = 'none';
});

// Redirige a "index.php?r=apartament" al hacer clic en "Mostrar Más"
const showMoreButton = document.getElementById('showMoreButton');
showMoreButton.addEventListener('click', () => {
  window.location.href = "index.php?r=apartament";
});
