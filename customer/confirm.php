<?php
session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
}
?>

<?php

                $get_product="select * from customer_order where order_id='$order_id'";
                $run_pro=mysqli_query($con,$get_product);
                $row_order=mysqli_fetch_array($run_pro);
                $customer_name =$row_order['customer_name'];
                $p_title =$row_order['p_title'];
                $product_id =$row_order['product_id'];
                $invoice_no =$row_order['invoice_no'];
                $due_amount =$row_order['due_amount'];
                
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
                            echo"Welcome Guest";
                        }
                        else{
                            echo"Welcome: ".$_SESSION['customer_email']."";
                        }
                    ?>
                </a>

                <a href="#"></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                    <a href="../customer_registration.php"> Register </a>
                    </li>

                    <li>
                    <a href="my_account.php"> My Account </a>
                    </li>

                    <li>
                    <a href="../cart.php"> Goto Cart </a>
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
                </ul>
            </div>
        </div>
    </div>
    <!-- Top Bar end -->
    <div class="navbar navbar-default"> 
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/logo.png" alt="logo" class="hidden-xs">
                    <img src="images/logo-small.jpg" alt="logo" class="visible-xs">
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
                            <a href="../index.php">Home</a>
                        </li>
                        
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>

                        <li  class="active">
                            <a href="my_account.php">My Account</a>
                        </li>

                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>

                        <li>
                            <a href="about.php">About Us</a>
                        </li>

                        <li>
                            <a href="../services.php">Services</a>
                        </li>

                        <li>
                            <a href="../contactus.php">Contact Us</a>
                        </li>

                        <li>
                            <a href="../aboutus.php">About Us</a>
                        </li>
                    </ul>
                </div>
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span></span>
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

    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>
                        My Account
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                    include("includes/sidebar.php");
                ?>
            </div>
            
            <div class="col-md-9">
                <div class="box">
                    <h1 align=center>Please confirm your payment</h1>
                    <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Customer Info</label>
                        <input type="text" class="form-control" value="<?php echo $customer_name ?>" name="customer_name" required="">

                    </div>
                    
                    <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" class="form-control" value="<?php echo $p_title ?>" name="product_title" required="">

                    </div>

                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" class="form-control" value="<?php echo $product_id ?>" name="product_id" required="">

                    </div>
                    
                    <div class="form-group">
                        <label>invoice number</label>
                        <input type="text" class="form-control" value="<?php echo $invoice_no ?>" name="invoice_number" required="">

                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" value="<?php echo $due_amount ?>" name="amount" required="">

                    </div>

                    <div class="form-group">
                        <label>Select Payment Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option>Bank Transfaer</option>
                            <option>Bkash</option>
                            <option>Nagad</option>
                            <option>Rocket</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Transaction Number</label>
                        <input type="text" class="form-control" name="trfr_number" required="">

                    </div>

                    <div class="form-group">
                        <label>Payment Date</label>
                        <input type="date" class="form-control" name="date" required="">

                    </div>

                    <div class="text-center">
                        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
                    </div>
                </form>
                
                <?php
                    if(isset($_POST['confirm_payment'])){
                        $update_id=$_GET['update_id'];
                        $customer_name=$_POST['customer_name'];
                        $invoice_number=$_POST['invoice_number'];
                        $product_id=$_POST['product_id'];
                        $product_title=$_POST['product_title'];
                        $amount=$_POST['amount'];
                        $payment_mode=$_POST['payment_mode'];
                        $trfr_number=$_POST['trfr_number'];
                        $date=$_POST['date'];
                        $complete="Complete";
                        $insert="insert into payments (invoice_id, customer_name, product_id,product_title, amount,payment_mode,ref_no,payment_date)
                         values('$invoice_number','$customer_name', '$product_id','$product_title','$amount','$payment_mode','$trfr_number','$date') ";
                        $run_insert=mysqli_query($con,$insert);
                    
    
                        $update_q="update customer_order set order_status='$complete' where order_id='$update_id' ";
                        $run_insert=mysqli_query($con,$update_q);

                        // $update_p="update pending_order set order_status='$complete' where order_id='$update_id' ";
                        // $run_insert=mysqli_query($con,$update_p);

                        echo"<script> alert('Your order has been received') </script>";
                        echo"<script> window.open('my_account.php?order','_self') </script>";
                    }
                ?>

                </div>

            </div>
            

            </div>
    </div>

    

<!--Footer-->
<?php
    include("includes/footer.php");
?>
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php } ?>
