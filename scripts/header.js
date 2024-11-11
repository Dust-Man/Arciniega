let lastScrollTop = 0;
const header = document.querySelector('header');
const threshold = 10; // Ajusta para controlar la sensibilidad

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (Math.abs(lastScrollTop - currentScroll) > threshold) {
        if (currentScroll > lastScrollTop) {
            // Scroll hacia abajo - Oculta el header
            header.classList.add('hide');
        } else {
            // Scroll hacia arriba - Muestra el header
            header.classList.remove('hide');
        }
        lastScrollTop = currentScroll;
    }
});
