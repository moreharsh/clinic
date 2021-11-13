<?php


$fullname = $_POST['fullname'];
$message = $_POST['message'];
$rating = $_POST['whatever1'];

if(!empty($fullname) || !empty($message)  || !empty($rating)) {

    $host = "localhost";
    $dbUsername = "aligndentalstudio2";
    $password = "Align@1411";
    $dbname = "align_review";

    $conn = new mysqli($host, $dbUsername, $password, $dbname);

    if(mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {

        $SELECT = "SELECT fullname FROM review WHERE fullname = ?";
        $INSERT = "INSERT INTO review (fullname, message, rating) values (?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$fullname);
        $stmt->execute();
        $stmt->bind_result($fullname);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum <= 5) {
          $stmt->close();

          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("sss",$fullname,$message,$rating);
          $stmt->execute();
          header("Location: index.html");
        } else {
          echo "Something went Wrong! <br>";
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
