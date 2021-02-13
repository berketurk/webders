<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident</title>
    <link rel="stylesheet" href="style2.css">
    <?php include "css.php"; ?>
    <style>
        
        body {background:url("images/1.jpg");}
        </style>
</head>

<body>

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
        $name = $pwd = $number = $email = $doorNo = $entryDate = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST['name'])) {
                $nameErr = "Name is Required";
            } else {
                $name = test_input($_POST['name']);
                
            }

            if (empty($_POST['pwd'])) {
                $pwdErr = "Password is Required";
            } else {
                $pwd = test_input($_POST['pwd']);
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
    ?>


        <div class="container col-md-5 my-3">
                    <div class="container my-5 bg-dark text-white">

                        <h2 class="text-center my-2">Add Resident</h2>
                        <br>

                        <?php
                        if (isset($_GET['succesadd'])) {?>
                        <p class="success">User Added Succesfully</p>
                        <?php 
                        }
                        ?>

                        

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                            <div class="form-group row">
                                <!-- Name -->
                                <label class="col-md-4 col-form-label" for="name">Name:<span class="err"> *<?php echo "$nameErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="<?php echo "$name"; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Password -->
                                <label class="col-md-4" for="pwd">Password:<span class="err"> *<?php echo "$pwdErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="pwd" id="pwd" maxlength="11" placeholder="Password" value="<?php echo "$pwd"; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Number - Backup Number-->

                                <label class="col-md-4" for="number">Number:<span class="err"> *<?php echo "$numberErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" placeholder="Number" value="<?php echo "$number"; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- email -->

                                <label class="col-md-4" for="email">Email:</label>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo "$email"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                

                                <label class="col-md-4" for="doorNo">Door No:</label>
                                <div class="form-group col-md-8">
                                    <select class="form-control" name="doorNo" id="doorNo">

                                        <?php

                                        $query = "SELECT doorNo FROM user WHERE exitDate IS NULL ORDER BY doorNo ASC";
                                        $result = mysqli_query($conn, $query);
                                        $doorNos = array();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            array_push($doorNos, $row['doorNo']);
                                        }

                                        for ($i = 1; $i <= 20; $i++) {
                                            if (in_array($i, $doorNos)) {
                                            } else {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Dates -->

                                <label class="col-md-4" for="entryDate">Entry Date:<span class="err"> *<?php echo "$entryDateErr"; ?></span></label>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="date" name="entryDate" id="entryDate" placeholder="Entry Date">
                                    
                                </div>
                                
                            </div>

                            

                            <div class="row justify-content-center">
                                
                        <span class="err">* Doldurulması Zorunlu Alanlar</span>
                                <input class="btn btn-primary btn-block mt-0 mb-2" type="submit" value="Add">
                            </div>

                        </form>
                    </div>
        </div>
    <?php
    }

    if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($doorNoErr) && empty($entryDateErr)) {

        if (!empty($name) && !empty($pwd) && !empty($number) && !empty($doorNo) && !empty($entryDate)) {

            $dene = md5($_POST['pwd']);
           
            echo $dene ;
            echo $pwd;
            

            $query = "INSERT INTO `user` (`userID`, `userName`, `userPwd`, `userNum`, `email`, `doorNo`, `entryDate`, `isAdmin`) 
            VALUES (NULL, '$name', '$dene', '$number', '$email', '$doorNo', '$entryDate', '0')";

            if (mysqli_query($conn, $query)) {
                header("Location: adduser.php?succesadd");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            } 
        }
    }
    ?>

</body>

</html>