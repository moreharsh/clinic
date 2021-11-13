<?php
require 'phpmailer/class.phpmailer.php';

  $msg = array();

  $email = $_POST['email'];
  $otp = rand(100000,999999);

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

  $mail->Subject  = "OTP Sent";
	$mail->WordWrap   = 80;

  $mail->MsgHTML("OTP is : " . $otp);
	$mail->IsHTML(true);

  if(!$mail->Send())
  {
     $msg['otp'] = 'err';
  }
  else
  {
    $msg['otp'] = $otp;
  }

  echo json_encode($msg);

?>
