$(".carousel").owlCarousel({
margin: 10,
loop: true,
autoplay: true,
autoplayTimeout: 2000,
autoplayHoverPause: true,
responsive: {
    0:{
        items: 1,
        nav: false
    },
    1000:{
        items: 2,
        nav: false
    }
} 
});