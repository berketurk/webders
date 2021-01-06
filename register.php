<?php
 $baglan =mysqli_connect("localhost","root","","apartment");

 

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANIMAL APARTMENT</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container1">
                <div class="signup-content">

                <form method="post" action="">

                        <h2 class="form-title">Animal apartment Admin Register </h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Name *" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email *"/>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="door" id="door" placeholder="Door Number"/>
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="Phone Number *"/>
                        </div>
                        <div class="form-group">
                            <b> Start Date Of Admin * </b>
                            <input type="date" class="form-input" name="date" id="date" placeholder="Start Date Of Admin"/>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password *"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Confirm your password *"/>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/></a>
                        </div>
                        
                        <h1 style="color:red; font-size:18px; ">* Required Field</h1> 
                      
             <?php

 
                        if (isset($_POST['submit'])) {

                        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['date']) || empty($_POST['password'])) {
                            die("Boş Alan Bırakmayınız.");
        
                                }

                     $submit = htmlspecialchars($_POST['submit'], ENT_QUOTES, 'UTF-8');
                    $sql = "insert into admın (name, email, door, phone, date, password) values ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["door"]."',
                                                                                   '".$_POST["phone"]."','".$_POST["date"]."','".$_POST["password"]."')";
                        $sonuc=mysqli_query($baglan,$sql);
                     if($sonuc)
                        {
                     echo "veri eklendi";
                        }
                     header('location: entry.php');
                            }
 

                        ?>

                        
                    </form>
                    </div>
            </div>
        </section>

    </div>





    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>