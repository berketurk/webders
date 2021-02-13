<?php 

include "dbconn.php";

$userId = $_GET['id'];
$postDate = $_GET['postDate'];
$date = date("Y-m-d");

$query = "UPDATE dues SET paymentStatus = 'paid', paymentDate='$date' WHERE userID=$userId AND postDate = '$postDate'";

if (mysqli_query($conn, $query)) {
    header("Location: showdues.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>