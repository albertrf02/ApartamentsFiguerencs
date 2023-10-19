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
