<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident</title>
    <?php include "css.php"; ?>
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

        $nameErr = $pwdErr = $numberErr = $blockNoErr = $doorNoErr = $entryDateErr = $statusErr = $isAdminErr;
        $name = $pwd = $number = $backupNum = $address = $blockNo = $doorNo = $entryDate = $status = $isAdmin;

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
            }

            if (empty($_POST['number'])) {
                $numberErr = "Number is Required";
            } else {
                $number = test_input($_POST['number']);
            }

            $backupNum = test_input($_POST['backupNumber']);
            $address = test_input($_POST['address']);


            if (empty($_POST['blockNo'])) {
                $blockNoErr = "Block Number is Required";
            } else {
                $blockNo = test_input($_POST['blockNo']);
            }

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

            if (empty($_POST['status'])) {
                $statusErr = "Status is Required";
            } else {
                $status = test_input($_POST['status']);
            }
        }
    ?>


        <div class="container col-md-5 my-3">
                    <div class="container">

                        <h2 class="text-center my-2">Add Resident</h2>

                        <?php
                        if (isset($_GET['succesadd'])) {?>
                        <p class="success">User Added Succesfully</p>
                        <?php 
                        }
                        ?>

                        <span class="err">* fields are required</span>

                        

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
                                    <input class="form-control" type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" placeholder="eg:(555-123-4567)" value="<?php echo "$number"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4" for="backupNumber">Backup Number:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="tel" name="backupNumber" id="backupNumber" pattern="[0-9]{10}" maxlength="10" placeholder="Backup Number" value="<?php echo "$backupNum"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Address -->

                                <label class="col-md-4" for="address">Address:</label>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?php echo "$address"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Block No - Door No -->

                                <label class="col-md-4" for="blockNo">Block No:</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="blockNo" id="blockNo">
                                        <option value="A" selected>A</option>
                                        <option value="B" selected>B</option>
                                    </select>
                                </div>

                                <label class="col-md-4" for="doorNo">Door No:</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="doorNo" id="doorNo">

                                        <?php

                                        $query = "SELECT doorNo FROM users ORDER BY doorNo ASC";
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


                            <div class="form-group row">
                                <!-- Status -->

                                <label class="col-md-4" for="status">Status:<span class="err">*<?php echo "$statusErr"; ?></span></label>

                                <div class="form-group col-md-4">
                                    <label for="owner">Owner</label>
                                    <input type="radio" id="owner" name="status" value="owner" <?php if (isset($status) && $status == "owner") echo "checked"; ?>>
                                </div>

                                <div class="form-group col-md-4 mb-0">
                                    <label for="tenant">Tenant</label>
                                    <input type="radio" id="tenant" name="status" value="tenant" <?php if (isset($status) && $status == "tenant") echo "checked"; ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Status -->

                                <label class="col-md-4" for="isAdmin">User:<span class="err">*<?php echo "$isAdminErr"; ?></span></label>

                                <div class="form-group col-md-4">
                                    <label for="Admin">Admin</label>
                                    <input type="radio" id="1" name="isAdmin" value="Admin" <?php if (isset($isAdmin) && $isAdmin == "1") echo "checked"; ?>>
                                </div>

                                <div class="form-group col-md-4 mb-0">
                                    <label for="Resident">Resident</label>
                                    <input type="radio" id="0" name="isAdmin" value="Resident" <?php if (isset($isAdmin) && $isAdmin == "0") echo "checked"; ?>>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input class="btn btn-primary btn-block mt-0 mb-2" type="submit" value="Add">
                            </div>

                        </form>
                    </div>
        </div>
    <?php
    }

    if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($blockNoErr) && empty($doorNoErr) && empty($entryDateErr) && empty($statusErr) && empty($isAdminErr)) {

        if (!empty($name) && !empty($pwd) && !empty($number) && !empty($blockNo) && !empty($doorNo) && !empty($entryDate) && !empty($status)  && !empty($isAdmin)) {

            
            $pwd = md5($pwd);
            $query = "INSERT INTO `users` (`userID`, `userName`, `userPwd`, `userNum`, `backupNum`, `address`, `blockNo`, `doorNo`, `entryDate`, `status`, `isAdmin`) 
            VALUES (NULL, '$name', '$pwd', '$number', '$backupNum', '$address', '$blockNo', '$doorNo', '$entryDate', '$status', '$isAdmin')";

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