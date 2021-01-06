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
<br><br><br>
<h10 class="mx-auto my-0 text-uppercase text-center">announcement </h10>
</div>

<br><br>    
<section class="signup">
<div class="container">
<div class="signup-content">
<form method="post" action="">


                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white"  >Announcement</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="anno" id="anno" placeholder="Write Announcement">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white">Month Of Dues</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="modu" id="modu" placeholder="Enter Montly Dues">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white">Dues Amount</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="duam" id="duam" placeholder="Enter Dues Amount">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Extra</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="extra" id="extra" placeholder="Enter The Additional Payment Amount">
                                </div>
                            </div>
                            
                           <br><br>
                      <input type="submit" name="buton">
                      
                      <br><br>
                             <div class="form-group avatar">
                             <h1 style="color:red; font-size:18px; "></h1> 
                                
                          
                             <br><br><br><br>
                            </div>
                  
                       
                        
                        

                          <br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>
</form>
</div>
</div>
</section>
             


 

 <?php
 
 if (isset($_POST['buton'])) {


    $buton = htmlspecialchars($_POST['buton'], ENT_QUOTES, 'UTF-8');
    $sql = "insert into rate (modu, duam, extra, anno) values ('".$_POST["modu"]."','".$_POST["duam"]."','".$_POST["extra"]."','".$_POST["anno"]."')";
    $sonuc=mysqli_query($baglan,$sql);
    if($sonuc)
    {
        echo "veri eklendi";
    }
    
 }
 

?>


</header>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>