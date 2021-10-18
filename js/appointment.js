$(document).ready(function(){
 $('#btn_contact_details').click(function(){

   $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#msform").submit();
  }

 });
});
