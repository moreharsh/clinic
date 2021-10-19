<?php


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$otp = $_POST['otp'];

if(!empty($fullname) || !empty($email) ||  !empty($phone) ||  !empty($date) || !empty($time) || !empty($otp) ) {

    // header("Location: appointment_confirm.html");

    $host = "localhost";
    $dbUsername = "root";
    $password = "";
    $dbname = "appointment";

    $conn = new mysqli($host, $dbUsername, $password, $dbname);

    if(mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
      $SELECT = "SELECT booking_date FROM appointment WHERE booking_date = ? Limit 1";
      $INSERT = "INSERT INTO appointment (fullname, email, phone, booking_date, booking_time) values (?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("ss",$date, $time);
      $stmt->execute();
      $stmt->bind_result($date, $time);
      $stmt->store_result();
      $rnum = $stmt->num_rows;

      if($rnum == 0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss",$fullname,$email,$phone,$date,$time);
        $stmt->execute();
        header("Location: appointment_confirm.html");
      } else {
        echo "Appointment Already Booked <br>";
        // $query = "SELECT * FROM appointment";
        // $data = mysqli_query($conn, $query);
        //
        // $count0 = 0;
        //
        // while (($result = mysqli_fetch_assoc($data))) {
        //     echo $result['fullname'] . "  " . $result['email'] . "   " . $result['phone'] . "   " . $result['booking_date'] . "   " . $result['booking_time'], "<br>";
        //
        // }
      }
      $stmt->close();
      $conn->close();

    }


} else {
  echo "All Field are Required!";
  die();
}

?>
