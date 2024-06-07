document.addEventListener("DOMContentLoaded", () => {
    const offers = document.querySelectorAll('.offer');
    let currentIndex = 0;
    const interval = 5000; // Cambiar oferta cada 5 segundos

    const showNextOffer = () => {
        offers[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % offers.length;
        offers[currentIndex].classList.add('active');
    };

    setInterval(showNextOffer, interval);
});
