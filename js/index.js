setTimeout(function () {
    $('.loader_bg').fadeToggle();
}, 1000);

$("#tour").click(function(){
	window.location.href='facilities.html';
});

$(".next").click(function(){
	window.location.href='book_appointment.html';
});

$("#reviewBtn").click(function(){
	window.location.href='review.html';
});


$(".carousel").owlCarousel({
margin: 10,
loop: true,
nav: true,
navText: [
  "<i class='fa fa-angle-left'></i>",
  "<i class='fa fa-angle-right'></i>"
],
autoplay: true,
autoplayTimeout: 5000,
autoplayHoverPause: true,
responsive: {
    0:{
        items: 1
    },
    1000:{
        items: 1
    }
}
});
