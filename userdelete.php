<?php

include 'dbconn.php';

$userId = $_GET['id'];

$query = "SELECT * FROM user WHERE userID = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$exitDate = date("Y-m-d");

$query = "SELECT * FROM dues WHERE userID = $userId AND paymentStatus = 'not paid'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    header("Location: apartments.php?errordelete");
} else {
    $query = "UPDATE user SET exitDate='$exitDate' WHERE userID=$userId";
    
    if (mysqli_query($conn, $query)) {
        header("Location: apartments.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
