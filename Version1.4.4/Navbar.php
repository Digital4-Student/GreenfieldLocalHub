<?php include 'head.html'; 
session_start();


?>

<nav class="navbar navbar-expand-sm NAVBAR-bg  " >
    <div class="container-fluid d-flex align-items-center justified-content-center">  
    <!--Logo-->
    <div>
        <a class="navbar-brand" href="Homepage.php"><img src="GLH-Logo.png" style="width: 80px;" class="round-pill"></a>
    </div>
        
    <!--Links-->
    <div class="nav position-absolute top-50 start-50 translate-middle">
        <ul class="navbar-nav " >
            <li class="nav-item">
            <a class="nav-link NAVLINK-colour" href="Products.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link NAVLINK-colour" href="Farmers_page.php">Farmers</a>
            </li>
            <li class="nav-item">
            <a class="nav-link NAVLINK-colour" href="Contact_Us.php">Contact us</a>
            </li>
        </ul>
    </div>

    <div class="d-flex align-items-center gap-3 ms-auto">

            <!--Cart-->
            
            <div>
                <a href="Cart_page.php">
                <i class="fa-solid fa-cart-arrow-down fa-2xl" style="color: rgb(255, 255, 255);"></i>
                </a>
            </div>

            <!--Account-->
            <div>
                <div class="dropdown">
                <a data-bs-toggle="dropdown">
                <i class="fa-regular fa-circle-user fa-2xl" style="color: rgb(255, 255, 255);"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">


                    <?php if (isset($_SESSION["customer"])){
                        ?>                    
                    <li><a class="dropdown-item" href="Settings.php">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                    <?php
                    } else {
                        ?>
                    <li><a class="dropdown-item" href="Sign_Up.php">Sign up</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="Sign_In.php">Sign in</a></li>
                    <?php
                    } ?>

                
                </ul>
                </div>



            </div>
    </div>
</nav>