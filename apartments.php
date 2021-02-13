<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
    <?php include "css.php"; ?>
    <style>
        a {color:white;}
        body {background:url("images/1.jpg");}
        </style>

</head>

<body>
    <?php include 'dbconn.php';
    include 'navbar.php';

    if (isset($_GET['succesfullyupdated']))
        echo "<p class='text-center mt-2'>Succesfully Updated</p>";

    $query = "SELECT * FROM user WHERE exitDate IS NULL ORDER BY doorNo";
    $result = mysqli_query($conn, $query);
    ?>

    <div class="container my-3 col-md-7">

        <?php if (isset($_GET['errordelete'])) {
        ?>

            <p class="err" style="background-color:#000000"><b> Bu Apartman Sakinini Listeden Silemezsin, Ödenmeyen Aidat Borçları Var. </b> </p>

        <?php
        }
        ?>

        <div class="accordion">

            <div class="card">
            <div class="card-header bg-success text-white">
                    <a id="card-link" data-toggle="collapse" href="#residents">
                        Residents
                    </a>
                </div>

                <div class="collapse show" id="residents">
                    <div class="card-body">

                        <table class="table table-hover table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <?php if ($_SESSION['authorization'] == 1) { ?>
                                        <th class="text-center" colspan="2">Action</th>
                                    <?php } ?>
                                    <th>Name</th>
                                    <th>Number</th>
                                   
                                 
                                    <th>Door No</th>
                                    <th>Entry Date</th>
                                    
                                </tr>
                            </thead>

                            <?php
                            while ($user = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <?php if ($_SESSION['authorization'] == 1) { ?>
                                        <div class="btn-group">
                                            <td> <a href="updateresidentform.php?updateId=<?php echo $user["userID"] ?>"><button type="button" class="btn btn-primary">Update</button></a></td>
                                            <td> <a href="userdelete.php?id=<?php echo $user["userID"] ?>" onclick="return confirm('Apartman Sakinini Listeden Çıkarıyorsun, Onaylıyor musun?')"><button type="button" class="btn btn-danger">Move-Out</button></a></td>
                                        </div>
                                    <?php } ?>
                                    <td> <?php echo $user["userName"]; ?> </td>
                                    <td> <?php echo $user["userNum"]; ?> </td>
                                   
                                    <td> <?php echo $user["doorNo"]; ?> </td>
                                    <td> <?php $newDate = date('d-M-Y', strtotime($user['entryDate']));
                                            echo "$newDate"; ?> </td>
                                    
                                </tr>
                            <?php } ?>

                        </table>


                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['authorization']) && $_SESSION['authorization'] == 1) { ?>
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <a id="card-link" data-toggle="collapse" href="#oldresidents">
                            Old Residents
                        </a>
                    </div>

                    <div class="collapse" id="oldresidents">
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Door No</th>
                                        <th>Entry Date</th>
                                        <th>Exit Date</th>
                                        
                                    </tr>
                                </thead>

                                <?php

                                $query = "SELECT * FROM user WHERE exitDate IS NOT NULL ORDER BY doorNo";
                                $result = mysqli_query($conn, $query);

                                while ($user = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <td> <?php echo $user['userName']; ?> </td>
                                        <td> <?php echo $user['userNum']; ?> </td>
                                        
                                        
                                        <td> <?php echo $user["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($user['entryDate']));
                                                echo "$newDate"; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($user['exitDate']));
                                                echo "$newDate"; ?></td>
                                        
                                    </tr>

                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>


    </div>

</body>

</html>