

const swiper = new Swiper('.swiper-home-top', {
    observeSlideChildren: true,
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    slidesPerView: .99,
    spaceBetween: 0,
    loop: true,
    speed: 5000,
    // breakpoints: {
    //     320: {
    //         slidesPerView: 1
    //     },
    //     760: {
    //         slidesPerView: 1
    //     },
    //     992: {
    //         slidesPerView: 1
    //     }
    // },
    autoplay: {
       delay: 8000,
       disableOnInteraction: false,
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    // navigation: {
    //     nextEl: '.swiper-button-prev',
    //     prevEl: '.swiper-button-next',
    // },
    grabCursor: true
  });
