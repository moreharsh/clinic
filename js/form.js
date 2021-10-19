//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$("#next1").click(function(){

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var mobile_validation = /^\d{10}$/;

	// Validation Start
	if($(".fullname").val() == '')
	{
		$(".fullname").css("background-color","#E5E5E5");
		error_fullname = 'Fullname is required';
		$('#error_fullname').text(error_fullname);
	}
	else
	{
		error_fullname = ''
		$('#error_fullname').text(error_fullname);
	}

	if($(".email").val() == '')
	{
		$(".email").css("background-color","#E5E5E5");
		error_email = 'Email is required';
		$('#error_email').text(error_email);
	}
	else
	{
		if (!filter.test($('.email').val()))
		{
		 error_email = 'Invalid Email';
		 $('#error_email').text(error_email);
		}
		else
		{
		 error_email = '';
		 $('#error_email').text(error_email);
		}
	}

	if($(".phone").val() == '')
	{
		$(".phone").css("background-color","#E5E5E5");
		error_phone = 'Phone number is required';
		$('#error_phone').text(error_phone);
	}
	else
	{
		if (!mobile_validation.test($('.phone').val()))
		{
		 error_phone = 'Invalid Phone Number';
			$('#error_phone').text(error_phone);
		}
		else
		{
			error_phone = '';
			$('#error_phone').text(error_phone);
		}
	}

	if(!$("#checkbox").is(":checked"))
	{
		$(".checkbox").css("background-color","#E5E5E5");
		error_checkbox = 'Check this';
		$('#error_checkbox').text(error_checkbox);
	}
	else
	{
		error_checkbox = '';
		$('#error_checkbox').text(error_checkbox);
	}
	// Validation Ends

	//animation Starts
	if($(".fullname").val() != '' && $(".email").val() != '' && filter.test($('.email').val()) && $(".phone").val() != '' && mobile_validation.test($('.phone').val()) && $("#checkbox").is(":checked"))
	{
		if(animating) return false;
		animating = true;

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
	        'transform': 'scale('+scale+')',
	        'position': 'absolute'
	      });
				next_fs.css({'left': left, 'opacity': opacity});
			},
			duration: 800,
			complete: function(){
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	}
});


$("#next2").click(function(){

	// Validation Start
	if($(".date").val() == '')
	{
		$(".date").css("background-color","#E5E5E5");
		error_date = 'Date is required';
    $('#error_date').text(error_date);
	}
	else
	{
		error_date = ''
		$('#error_date').text(error_date);
	}

	if($("#time").val() == '')
	{
		$("#time").css("background-color","#E5E5E5");
		error_time = 'Time Slot is required';
		$('#error_time').text(error_time);
	}
	else
	{
		error_time = ''
		$('#error_time').text(error_time);
	}


	// Validation Ends
	//animation Starts
	if($(".date").val() != '' && $("#time").val() != '')
	{
		if(animating) return false;
		animating = true;

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
					'transform': 'scale('+scale+')',
					'position': 'absolute'
				});
				next_fs.css({'left': left, 'opacity': opacity});
			},
			duration: 800,
			complete: function(){
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	}

});

$("#btn_contact_details").click(function(){
	if($(".otp").val() == '')
	{
		$(".otp").css("background-color","#E5E5E5");
		error_otp = 'OTP is required';
    $('#error_otp').text(error_otp);
	}
	else
	{
		error_otp = ''
		$('#error_otp').text(error_otp);
	}
});



$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
