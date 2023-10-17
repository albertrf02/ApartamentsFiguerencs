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
