let lastScrollTop = 0;
const header = document.getElementById("header");

window.addEventListener("scroll", function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > 100) {
        // Oculta el header cuando se desplaza hacia abajo y está a más de 100px
        header.classList.add("hide-header");
    } else if (scrollTop < lastScrollTop) {
        // Muestra el header al desplazarse hacia arriba
        header.classList.remove("hide-header");
    }

    lastScrollTop = scrollTop;
});
