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
<form action="" method="post" >
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">ANIMAL APARTMENT<br>RESIDENTS LOGIN</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="door" id="door" placeholder="Door"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        
                    </form>

                    <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/></a>
                        </div>

                        <?php

if (isset($_POST['submit'])) {

    $submit = htmlspecialchars($_POST['submit'], ENT_QUOTES, 'UTF-8');

    if(empty($_POST['name']) || empty($_POST['door'])) {
        die("Boş Alan Bırakmayınız.");
    }


else{
    $name = $_POST['name'];
    $door = $_POST['door'];

    $db=mysqli_select_db($baglan,"deneme_db");
    $query =mysqli_query($baglan, "SELECT * FROM residents WHERE name = '$name' AND door = '$door'");

    $sıra = mysqli_num_rows($query);
    if($sıra == 1) {
        header('location: mainsakin.php');
    }
    else {
        die("kullanıcı adı veya şifre hatalı");
    }
    }

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
</body>
</html>