<?php session_start(); ?>

<header>
    <div class="container-fluid my-1 text-center">
        <a href="http://localhost:80/php/index.php">
            
        </a>
    </div>


</header>



<nav class="navbar navbar-default navbar-expand-sm bg-dark navbar-dark sticky-top p-1">

    <div class="container-fluid">

        <ul class="nav navbar-nav justify-content-left">

        

            <li> <span class="nav-link"> <?php if ($_SERVER['REQUEST_URI'] == "/index.php") echo "active"; ?><a href="http://localhost:80/php/index.php"> <h8 style=" font-family:algerian; " > Home</a> </span></li>
                
                <?php if (!isset($_SESSION['isLoggedIn'])) { ?>

<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/rules.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/rules.php">About</a></li>
<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/contact.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/contact.php">Contact</a></li>

<?php } ?>

            <?php if (isset($_SESSION["authorization"])) { ?>

                <ul class="nav navbar-nav justify-content-center">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/apartments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/apartments.php">Residents</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/showdues.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/showdues.php">Dues</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/income-expense.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/income-expense.php">Report</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/mesaj.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/mesaj.php">Message</a></li>
                </ul>

                


                <?php if ($_SESSION['authorization'] == 1) { ?>

                    

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/comments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/comments.php">Inbox</a></li>
            <?php
                }   }
             ?>
        </ul>

        <ul class="nav navbar-nav justify-content-right">

       

                <?php if (!isset($_SESSION['isLoggedIn'])) { ?>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/adminkey.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/adminkey.php">Admin</a></li>

                    <li>
                    <span class="nav-link"><a href="http://localhost:80/php/login.php"> <h8 style=" font-family:algerian; " >LOGIN</h8></a></span>
                    </li>

                <?php } else { ?>

                    <?php if ($_SESSION["authorization"] !=1 ) { ?>

                    <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/php/profile.php") echo "active"; ?>">
                        <a class="nav-link dropdown-toggle ml-5" href="#" id="logoutdrop" data-toggle="dropdown">
                        <?php echo $_SESSION['userName']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/php/profile.php">Profile</a>
                    
                            <a class="dropdown-item" href="/php/logout.php"><b>Logout</b></a>
                        </div>
                    </li>

                    <?php }  ?>

                    <?php if ($_SESSION['authorization'] == 1) { ?>

                        <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/php/profile.php") echo "active"; ?>">
                        <a class="nav-link dropdown-toggle ml-5" href="#" id="logoutdrop" data-toggle="dropdown">
                        <?php echo $_SESSION['userName']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/php/profile.php">Profile</a>
                            <a class="dropdown-item" href="/php/adduser.php">Add Residents</a>
                            <a class="dropdown-item" href="/php/expenseform.php">Add Expense</a>
                            <a class="dropdown-item" href="/php/sendduesform.php">Add Due</a>
                            <a class="dropdown-item" href="/php/logout.php"><b>Logout</b></a>
                        </div>
                    </li>



                <?php }  }  ?>


        </ul>

    </div>
</nav>