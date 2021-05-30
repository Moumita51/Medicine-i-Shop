<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


   
<!DOCTYPE html>
<html>
<head>  
    <title>Medicine-i-Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <!-- Top Bar start -->
    <div id="top"> 
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo"Medicine-i-Shop";
                        }
                        else{
                            echo"Welcome: ".$_SESSION['customer_email']."";
                        }
                    ?>
                </a>

                <a href="#">Shopping Cart Total Price: Taka <?php totalPrice(); ?>, Total Items <?php item(); ?> </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                    <a href="customer_registration.php"> Register </a>
                    </li>

                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                    </li>

                    <li>
                    <a href="cart.php"> Goto Cart </a>
                    </li>

                    <li>
                    <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>Login</a>";
                            }else{
                                echo"<a href='logout.php'>Logout</a>";
                            }
                        ?>
                    </li>

                    <li>
                    <a href="admin_area/login.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Top Bar end -->
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/mlogo.PNG" alt="logo" class="hidden-xs">
                    <img src="" alt="logo" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only"></span>
                    <i  class="fa fa-align-justify"></i>
                </button>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i  class="fa fa-search"></i>
                </button>
            </div>
<div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li >
                            <a href="index.php">Home</a>
                        </li>
                        
                        <li class="active">
                            <a href="shop.php">Shop</a>
                        </li>

                        <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>My Account</a>";
                            }else{
                                echo"<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                        ?>
                        </li>

                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>

                        <li>
                            <a href="custom.php">Custom Shopping</a>
                        </li>

                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>

                        <li>
                            <a href="aboutus.php">About Us</a>
                        </li>
                    </ul>
                </div>
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php item(); ?> items In Cart</span>
                    </a>


                    <div class="navbar-collapse collapse right">
                        <button class="btn  navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                        </button>
                    
                    </div>
                <div class="collapse clearfix" id="search">
                    <form action="result.php" class="navbar-form" method="get">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                            <span class="input-group-btn">
                            <button type="submit" value="Search" name="search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            </span> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="myCarousel" data-slide-to="0" class="action"></li>
                    <li data-target="myCarousel" data-slide-to="1" ></li>
                    <li data-target="myCarousel" data-slide-to="2" ></li>
                    <li data-target="myCarousel" data-slide-to="3" ></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                        $get_slider ="select * from slider LIMIT 0,1";
                        $run_slider =mysqli_query($con, $get_slider);
                        while($row= mysqli_fetch_array($run_slider)){
                            $slider_name=$row['slider_name'];
                            $slider_image=$row['slider_image'];
                            echo "<div class='item active'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div>";
                        }
                    ?>
                    
                    <?php
                        $get_slider ="select * from slider LIMIT 1,3";
                        $run_slider =mysqli_query($con, $get_slider);
                        while($row= mysqli_fetch_array($run_slider)){
                            $slider_name=$row['slider_name'];
                            $slider_image=$row['slider_image'];
                            echo "<div class='item'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div>";
                        }
                    ?>


                </div>

               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
               </a> 

               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
               </a>


            </div>
        </div>
    </div>

   

    <div id="hotbox">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Latest this week</h2>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container">
        <div class="row">
            <?php
                getPro();
            ?>
        </div>
    </div>
    <hr>
    <!--Footer-->
    <?php
    include("includes/footer.php");
    ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>