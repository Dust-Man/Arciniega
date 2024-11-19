const header = document.querySelector('header');
let lastScrollTop = 0;

window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;

    if (scrollTop > lastScrollTop) {
        // Scroll hacia abajo: Ocultar el header
        header.style.transform = 'translateY(-100%)';
    } else {
        // Scroll hacia arriba: Mostrar el header
        header.style.transform = 'translateY(0)';
    }

    lastScrollTop = scrollTop;
});
