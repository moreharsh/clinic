<?php

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$phone = $_POST['mobile_no'];



if(!empty($firstname) || !empty($lastname) ||  !empty($password) ||  !empty($address) || !empty($email) || !empty($phone) ) {

  $host = "localhost";
  $dbUsername = "root";
  $password = "";
  $dbname = "form";

  $conn = new mysqli($host, $dbUsername, $password, $dbname);

  if(mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
  } else {
    $SELECT = "SELECT email FROM form WHERE email = ? Limit 1";
    $INSERT = "INSERT INTO form (firstname, lastname, password, email, address,
     phone) values (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum == 0) {
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssi",$firstname,$lastname,$password,$email,$address,$phone);
      $stmt->execute();
      header("Location: index.html");
    } else {
      echo "User Already Exists";
    }
    $stmt->close();
    $conn->close();

  }


} else {
  echo "All Field are Required!";
  die();
}

?>
