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


  //Flecha hacia arriba
  document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("scrollTopButton");

    // Muestra u oculta el botón según la posición de desplazamiento
    window.onscroll = function () {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.style.display = "block";
      } else {
        button.style.display = "none";
      }
    };

    // Desplázate hacia arriba al hacer clic en el botón
    button.addEventListener("click", function () {
      document.body.scrollTop = 0; // Para navegadores Safari
      document.documentElement.scrollTop = 0; // Para otros navegadores
    });
  });