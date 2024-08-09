    const carouselSlide = document.querySelector('.carousel-slide');
    const images = document.querySelectorAll('.carousel-slide img');

    let counter = 0;
    const size = images[0].clientWidth;

    function moveCarousel() {
        counter++;
        if (counter >= images.length) {
            counter = 0; // Reinicia o contador para o primeiro slide
        }
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }

    setInterval(moveCarousel, 3000); // 3000ms = 3s

