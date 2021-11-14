<?php
require 'phpmailer/class.phpmailer.php';

  $msg = array();

  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  $mail = new PHPMailer(true);

	$mail->IsSMTP();
	$mail->SMTPAuth   = false;
	$mail->Port       = 587;
	$mail->Host       = "mail.aligndentalstudio.com";
	$mail->Username   = "test@aligndentalstudio.com";
	$mail->Password   = "Align@1411";

	$mail->IsSendmail();

	$mail->From       = "test@aligndentalstudio.com";
	$mail->FromName   = "aligndentalstudio.com";

	$mail->AddAddress($email);

  $mail->Subject  = "Thank You For Your Consideration!";
	$mail->WordWrap   = 80;

  $mail->MsgHTML("Your appointment is Confirmed. <br><br> Date: " . $date . "<br> Time: " . $time . "<br> Thank You! <br><br> Align Dental Studio");
	$mail->IsHTML(true);

  if(!$mail->Send())
  {
     $msg['otp'] = 'err';
  }
  else
  {
    $msg['otp'] = 'thank you!';
  }

  echo json_encode($msg);

?>
