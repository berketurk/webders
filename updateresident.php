<?php
ob_start();
include 'dbconn.php';
include 'navbar.php';


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SESSION['authorization'] == 1) {
    $nameErr = $pwdErr = $numberErr = $doorNoErr = $entryDateErr = "";

    $updateId = $_GET['updateId'];

    $query = "SELECT * FROM user WHERE userID = $updateId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['name'])) {
            $nameErr = "Name is Required";
        } else {
            
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['pwd'])) {
            $pwdErr = "Password is Required";
        } else {
            $pwd = test_input($_POST['pwd']);

            if ($pwd == $row['userPwd']) {
            } else {
                $pwd = md5(test_input($_POST['pwd']));
            }
        }

        if (empty($_POST['number'])) {
            $numberErr = "Number is Required";
        } else {
            $number = test_input($_POST['number']);
        }

        $email = test_input($_POST['email']);


        if (empty($_POST['doorNo'])) {
            $doorNoErr = "Door Number is Required";
        } else {
            $doorNo = test_input($_POST['doorNo']);
        }

        if (empty($_POST['entryDate'])) {
            $entryDateErr = "Entry Date is Required";
        } else {
            $entryDate = test_input($_POST['entryDate']);
        }

        }
    }


if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($doorNoErr)) {

    if (!empty($name) && !empty($pwd) && !empty($number) && !empty($doorNo)) {

        $query = "UPDATE `user` SET userName = \"$name\", userPwd = \"$pwd\", userNum = \"$number\", email = \"$email\", doorNo = \"$doorNo\", entryDate = \"$entryDate\" WHERE userID = $updateId";

        if (mysqli_query($conn, $query)) {
            header("Location: apartments.php?succesfullyupdated=1");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}else{
    header("Location: updateresidentform.php?nameErr=".$nameErr."&pwdErr=".$pwdErr."&numberErr=".$numberErr."&blockNoErr=".$blockNoErr."&doorNoErr=".$doorNoErr."&statusErr=".$statusErr."&updateId=".$updateId);
}
