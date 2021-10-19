$("#time").click(function(){
    console.log("Click");
    var box = $(".time");

    if($(".time").css("display") == "none")
    {
      $(".time").css("display", "block");
    }
    else{
      $(".time").css("display", "none");
    }
});

$(".Mt1").click(function(){
    $("#time").val("08 pm - 09 pm ");
    $(".time").css("display", "none");
});

$(".Mt2").click(function(){
    $("#time").val("09 pm - 10 pm ");
    $(".time").css("display", "none");
});

$(".Et1").click(function(){
    $("#time").val("05 pm - 06 pm ");
    $(".time").css("display", "none");
});

$(".Et2").click(function(){
    $("#time").val("06 pm - 07 pm ");
    $(".time").css("display", "none");
});


// OTP send Button
$(".send").click(function(){
    $(".send").css("display", "none");
    $(".resend").css("display", "inline");
});
