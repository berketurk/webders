<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <?php include "css.php"; ?>

</head>

<body>

    <?php
    ob_start();
    include 'dbconn.php';
    include 'navbar.php';
    ?>

<div class="small-middle-container my-5 bg-dark text-white">

    <div class="container my-3">

        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <?php
                if (isset($_GET['commentSucces'])) {
                    echo "<p class='success'>Comment Succesfully</p>";
                }
                if (isset($_GET['commentError'])) {
                    echo "<p class='errCenter'>Comment Error!</p>";
                }
                ?>

                <div class="container">


                    <div class="row form-group">
                        <div class="col-md-12">
                            <h2 class="text-center my-3">Contact</h2>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-16">
                        <p style="font-family:arial black; "  >ADDRESS: Plaj Mahallesi</p>
                        </div>
                        <div class="col-md-6 text-center">
                            
                        </div>

                    </div>

                    <div class="row ">

                        <div class="col-md-16 form-group">
                        <p style="font-family:arial black; "  >EMAIL: Berketurk035@gmail</p> 
                        </div>
                        <div class="col-md-6 text-center">
                            
                        </div>

                    </div>

                   

                    <div class="row">
                        <div class="col-md-16 form-group">
                        <p style="font-family:arial black; "  >NUMBER: 0507-409-84-34</p>
                        </div>
                        
                    </div>

                <br>



</body>

</html>