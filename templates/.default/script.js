const mySwiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    speed: 1000,
    spaceBetween: 60,

    loop: true,
    effect: 'slide',

    autoplay: {
        delay: 6000
    },
    
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
}