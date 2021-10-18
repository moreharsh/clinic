<?php


$fullanme = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$otp = $_POST['otp'];

if(!empty($fullanme) || !empty($email) ||  !empty($phone) ||  !empty($date) || !empty($time) || !empty($otp) ) {

    echo "OK";
    echo $fullanme;
    echo $email;
    echo $phone;
    echo $date;
    echo $time;
    echo $otp;

//
//   $host = "localhost";
//   $dbUsername = "root";
//   $password = "";
//   $dbname = "form";
//
//   $conn = new mysqli($host, $dbUsername, $password, $dbname);
//
//   if(mysqli_connect_error()) {
//     die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
//   } else {
//     $SELECT = "SELECT email FROM form WHERE email = ? Limit 1";
//     $INSERT = "INSERT INTO form (firstname, lastname, college, branch, member,
//       email, phone) values (?, ?, ?, ?, ?, ?, ?)";
//
//     $stmt = $conn->prepare($SELECT);
//     $stmt->bind_param("s",$email);
//     $stmt->execute();
//     $stmt->bind_result($email);
//     $stmt->store_result();
//     $rnum = $stmt->num_rows;
//
//     if($rnum == 0) {
//       $stmt->close();
//
//       $stmt = $conn->prepare($INSERT);
//       $stmt->bind_param("ssssssi",$firstname,$lastname,$college,$branch,$member,$email,$phone);
//       $stmt->execute();
//       header("Location: form.html");
//     } else {
//       echo "User Already Exists";
//     }
//     $stmt->close();
//     $conn->close();
//
//   }
//
//
} else {
  echo "All Field are Required!";
  die();
}

?>
