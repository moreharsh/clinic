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
