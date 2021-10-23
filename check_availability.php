<?php
  $msg = array();

  $date = $_POST['date'];
  $time = $_POST['time'];

  $host = "localhost";
  $dbUsername = "root";
  $password = "";
  $dbname = "appointment";

  $conn = new mysqli($host, $dbUsername, $password, $dbname);

  if(mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
  }
  else {

      $query = "SELECT booking_date, booking_time FROM appointment WHERE booking_date = ? AND booking_time = ?";

      $count = 0;

      if ($stmt = $conn->prepare($query)) {

        $stmt->bind_param("ss",$date, $time);
          /* execute statement */
          $stmt->execute();

          /* bind result variables */
          $stmt->bind_result($date, $time);

          /* fetch values */
          while ($stmt->fetch()) {
              $count += 1;
          }

          /* close statement */
          $stmt->close();
      }

      if($count >= 3)
      {
          $msg['message'] = "Sorry, selected slot is not Available! \nPlease select some other slot.";
          $msg['status'] = 'err';
      }
      else
      {
          $msg['message'] = "Slot Confirmed!";
          $msg['status'] = 'ok';
      }
      $conn->close();
      echo json_encode($msg);
}
?>
