// Initialize Related Blog Swiper
if (document.querySelector('.related-blog-slider')) {
    new Swiper('.related-blog-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 1000,
        rtl: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.related-blog-slider .swiper-button-next',
            prevEl: '.related-blog-slider .swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            }
        }
    });
}