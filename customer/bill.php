<?php
session_start();
include("includes/db.php");
include("functions/functions.php"); 
?>

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
</html>
<div class="container">
<center>
    <br>
    <img src="logo.png" style="border-radius:8px">
    <br>
    <br>
    <p>Agriculure Develoment Project <br> Sector 10, Uttara, Dhaka <br> 01779002301 </p>
    <p></p>
    <p></p>

    <hr>
    <hr>



<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Proudct Title</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Order Date</th>
                <th>Paid/Unpaid</th>
                

            </tr>
        </thead>
        <tbody>
        <?php
           
            if(isset($_GET['order_id'])){
                $order_id=$_GET['order_id'];
                $get_product="select * from customer_order where order_id='$order_id'";
                $run_product=mysqli_query($con, $get_product);
                $row_product=mysqli_fetch_array($run_product);
                $order_id=$row_product['order_id'];
                $product_title=$row_product['p_title'];
                $order_due_amount=$row_product['due_amount'];
                $order_invoice=$row_product['invoice_no'];
                $order_qty=$row_product['qty'];
                $order_size=$row_product['size'];
                $order_date=substr($row_product['order_date'],0,11);
                $order_status=$row_product['order_status'];
                
        
        ?>
        <tr>
            <td><?php echo $order_id ?></td>
            <td> <?php echo $product_title  ?> </td>
            <td><?php echo $order_due_amount ?></td>
            <td><?php echo $order_invoice ?></td>
            <td><?php echo $order_qty ?></td>
            <td><?php echo $order_size ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $order_status ?></td>
            
        </tr>
            <?php } ?>
        
           
        
        </tbody>
    </table>
    <br>
    <br>
    <p>Signature......................</p>
    
    <p>Date:......................</p>
    </center>
    </div>
</div>
</div>
</div>


<?php
    if(isset($_GET['pro_id'])){
        $pro_id=$_GET['pro_id'];
        $get_product="select * from products where product_id='$pro_id'";
        $run_product=mysqli_query($con, $get_product);
        $row_product=mysqli_fetch_array($run_product);
        $p_cat_id=$row_product['p_cat_id'];
        $p_title=$row_product['product_title'];
        $p_price=$row_product['product_price'];
        $p_desc=$row_product['product_desc'];
        $p_img1=$row_product['product_img1'];
        $p_img2=$row_product['product_img2'];
        $p_img3=$row_product['product_img3'];
        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($con, $get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_id=$row_p_cat['p_cat_id'];
        $p_cat_title=$row_p_cat['p_cat_title'];
    }
?>

              <?php
                        $get_product="select * from products order by 1 LIMIT 0,3";
                        $run_product=mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array($run_product)){
                            $pro_id=$row['product_id'];
                            $product_title=$row['product_title'];
                            $product_price=$row['product_price'];
                            $product_img1=$row['product_img1'];

                            
                        }
                    ?>

                </div>

            </div>


            </div>
    </div>
   

    

<!--Footer-->


</body>
</html>