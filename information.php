<?php
 $baglan =mysqli_connect("localhost","root","","apartment");

 if(!$baglan) 
 {
     die("connection failed:" .mysqli_connect_error());
 }
 else{
     echo "baglantı gerceklesti";
 }

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
                <a class="navbar-brand js-scroll-trigger" href="main.html"><img src="images/home.png" width="45" height="45" alt=""> Home </a> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
            
                <a class="navbar-brand js-scroll-trigger" href="profile.html"> Profile <img src="images/indir.png" width="45" height="45" alt=""> </a> <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>   
            </div>
        </nav>

      
<header class="masthead2">
<div class="container d-flex h-10 align-items-center">
<h10 class="mx-auto my-0 text-uppercase text-center">My Information</h10>
</div>

<br><br>    
          
                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white">Name</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white">Door Number</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="" placeholder="Your Door Number">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2 col-sm-3 col-xs-12" style="color: white">Phone Number</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="" placeholder="Your Phone Number">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Email</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Start Date</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="" placeholder="Your Start Date Of Admin">
                                </div>
                            </div>
                             <div class="form-group d-flex">
                                <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Password</label>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" value="" placeholder="Your Password">
                                </div>
                            </div>
                           
                          <div class="form-group d-flex">
                            <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Change Password</label>
                              <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Change Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                          </div>
                        </div>

                        <div class="form-group d-flex">
                           <label class="col-md-2  col-sm-3 col-xs-12" style="color: white">Confirm Password</label>
                             <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Confirm your password"/>
                          </div>
                        </div>
                       
                      
                             <div class="form-group avatar">
                                <figure class="figure col-md-8 col-sm-3 col-xs-12 you">
                                    <img class="img-rounded img-responsive im fine" src="images/profile.png" width="200" alt="">

                                    <input type="file" class="file-uploader" style="color: white" >
                                </figure>
                          
                                 
                            </div>
                  
                        <hr>
                        <div class="form-group"
                            <div class="col-md-20 col-sm-23 col-xs-12">
                                <input class="btn btn-primary" type="submit" value="Update Profile">
                            </div>
                          </div>
                          <br><br><br> 
             


</header>

</body>

