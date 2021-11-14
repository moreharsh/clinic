<?php


$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$address = $_POST['address'];

if(!empty($fullname) || !empty($phone) || !empty($address) ) {

    $host = "localhost";
    $dbUsername = "aligndentalstudio1";
    $password = "Align@1411";
    $dbname = "phone_appointment";

    $conn = new mysqli($host, $dbUsername, $password, $dbname);

    if(mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {

        $SELECT = "SELECT phone FROM phone_appointment WHERE phone = ?";
        $INSERT = "INSERT INTO phone_appointment (fullname, phone, address) values (?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->bind_result($phone);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum <= 1) {
          $stmt->close();

          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("sss",$fullname,$phone,$address);
          $stmt->execute();
          header("Location: appointment_confirm.html");
        } else {
          echo '<script language="javascript">';
          echo 'alert("Thank You Contacting Us We Will Response You As Early Possible")';
          echo '</script>';
          header("Location: index.html");
        }
        $stmt->close();
        $conn->close();
      // }
  }


} else {
  echo "All Field are Required!";
  die();
}

?>
