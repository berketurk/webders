<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lord</title>
    <link rel="stylesheet" href="style.css">
    <?php include "css.php"; ?>
</head>

<body>

    <?php

    include 'dbconn.php';
    include 'navbar.php';

    ?>

    <div class="small-middle-container my-5 bg-dark text-white">

        <div class="row form-group">
            <div class="col-md-12">
                <h2 class="text-center mt-3">Login</h2>
            </div>
        </div>

        <div class="form-group justify-content-center row">

            <form class="form text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <div class="form-group row">
                    <label class="col-md-4" for="doorNo">Door No: </label>
                    <input class="form-control col-md-8" type="tel" name="doorNo" id="doorNo"  maxlength="10" placeholder="Door No">
                </div>

                <div class="form-group row">
                    <label class="col-md-4" for="pwd">Password: </label>
                    <input class="form-control col-md-8" type="password" name="pwd" id="pwd" required maxlength="11" placeholder="Password">
                </div>

                <div class="form-group row">
                    <input class="btn btn-success btn-block ml-3 mb-3" type="submit" value="Login">
                </div>


            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $doorNo = test_input($_POST['doorNo']);
        $pwd = test_input($_POST['pwd']);

        $password_crypt = md5($pwd);
        

        $query = "SELECT * FROM `user` WHERE doorNo='$doorNo' AND userPwd='$password_crypt';";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);


            $_SESSION['userID'] = $row['userID'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userPwd'] = $row['userPwd'];
            $_SESSION['userNum'] = $row['userNum'];
            $_SESSION['backupNum'] = $row['backupNum'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['blockNo'] = $row['blockNo'];
            $_SESSION['doorNo'] = $row['doorNo'];
            $_SESSION['entryDate'] = $row['entryDate'];
            $_SESSION['exitDate'] = $row['exitDate'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['authorization'] = $row['isAdmin'];
            $_SESSION['isLoggedIn'] = true;

            header("Location: apartments.php");
        } else
            echo "<p style='color: red; text-align: center';><b>Wrong number or password</b></p>";
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</body>

</html>