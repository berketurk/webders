<?php
 $baglan =mysqli_connect("localhost","root","","apartment");


?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Animal Apartment</title>

 <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Font-->
  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/stylesgray.css" rel="stylesheet" />
</head>


<body id="page-top">
   <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="mainadmin.php"><img src="images/home.png" width="45" height="45" alt=""> Home </a> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            
                <a class="navbar-brand js-scroll-trigger" href="profile.html"> Admin <img src="images/indir.png" width="45" height="45" alt=""> </a> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>   
            </div>
        </nav>

      
<header class="masthead2">
<div class="container d-flex h-10 align-items-center">
</div>
 

<section class="about-section text-center" id="">
    <div class="container2">
        <div class="row">

            <div class="col-md-12 mb-12">
                <div class="card h-10">
                    
                    <div class="card-body2">
                        <h4 class="card-title">
                            <a href="">Duyurular</a> <br><br><br>
                        </h4>
                        
                        <?php

$bul = "SELECT anno FROM rate " ;
$kayit = $baglan->query($bul);

if ($kayit->num_rows>0) {

    while ($satir = $kayit->fetch_assoc()) {

        echo "<h5> <b> *".$satir["anno"]."<br> <br>" ;
    }

}
?>
                        
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
    
    
    <br></br><br></br>
</section>
             


 



</header>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>