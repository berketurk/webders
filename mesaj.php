<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
    ?>

    <div class="container col-md-8 my-3 bg-dark text-white">

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
                            <h2 class="text-center">Message</h2>
                        </div>
                    </div>

                    

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <div class="row form-group">

                            <div class="col-md-6">
                                <label for="comment">
                                   <b> Message the Admin: </b>
                                </label>
                            </div>

                            <div class="col-md-6 text-center">
                                <textarea class="form-control" name="comment" id="comment" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <?php

                        if (!isset($_SESSION['userNum'])) { ?>

                            <div class="row form-group">

                                <div class="col-md-6">
                                    <label for="comment">
                                        Number:
                                    </label>
                                </div>

                                <div class="col-md-6 text-center">
                                    <input class="form-control" type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" required placeholder="eg:(555-123-4567)">
                                </div>
                            </div>

                        <?php
                        }
                        ?>

<?php

if (!isset($_SESSION['doorNo'])) { ?>

    <div class="row form-group">

        <div class="col-md-6">
            <label for="comment">
                doorNo:
            </label>
        </div>

        <div class="col-md-6 text-center">
            <input class="form-control" type="tel" name="doorNo" id="doorNo" pattern="[0-9]{10}" maxlength="10" required placeholder="">
        </div>
    </div>

<?php
}
?>

                        

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input class="btn btn-success btn-block" type="submit" name="sumbitCommnet" id="sumbitCommnet" value="Send">
                            </div>


                        </div>
                    </form>

                </div>

                <?php
                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (isset($_POST['comment'])) {
                        $comment = test_input($_POST['comment']);
                    }

                    if (isset($_POST['comment'])) {
                        $date = date("Y-m-d");
                    }

                    if (isset($_POST['number'])) {
                        $number = test_input($_POST['number']);
                    } else if (isset($_SESSION['userNum'])) {
                        $number = $_SESSION['userNum'];
                    } else {
                        $number;
                    }

                    if (isset($_POST['doorNo'])) {
                        $doorNo = test_input($_POST['doorNo']);
                    } else if (isset($_SESSION['doorNo'])) {
                        $doorNo = $_SESSION['doorNo'];
                    } else {
                        $doorNo;
                    }

                    if (!empty($comment)) {

                        $query = "INSERT INTO comment (commentText, commentDate, number, doorNo) VALUES ('$comment', '$date', '$number','$doorNo')";

                        if (mysqli_query($conn, $query)) {
                            header("Location: mesaj.php?commentSucces");
                        } else {
                        }
                    } else {
                        header("Location: mesaj.php?commentError");
                    }
                }

                ?>



</body>

</html>