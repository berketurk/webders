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
                <h2 class="text-center mt-3">Admin</h2>
            </div>
        </div>

        <div class="form-group justify-content-center row">

            <form class="form text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                
                <div class="form-group row">
                    <label class="col-md-4" for="pwd">AdminKey: </label>
                    <input class="form-control col-md-8" type="password" name="pwd" id="pwd" required maxlength="11" placeholder="Key">
                </div>

                <div class="form-group row">
                    <input class="btn btn-success btn-block ml-3 mb-3" type="submit" value="Confirm">
                </div>


            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        $pwd = $_POST['pwd'];
        

        $query = "SELECT * FROM adminkey WHERE adminkey=$pwd;";
        $result = mysqli_query($conn, $query);

        echo mysqli_error($conn); 


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);


            $_SESSION['id'] = $row['id'];
            $_SESSION['adminkey'] = $row['adminkey'];
            $_SESSION['isLoggedIn'] = true;

            header("Location: adminregister.php");
        } else
            echo "<p style='color: red; text-align: center';><b>Wrong key</b></p>";
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