<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php
    $connect = mysqli_connect("localhost", "root", "", "medicine_shop");
    $query ="SELECT * FROM customer_order ORDER BY order_id desc"; 
    $result = mysqli_query($connect, $query);
?>




<html>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  


</head>



<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts  --->

            <li class="active">

            <i class="fa fa-dashboard"></i> Dashboard / View Orders

            </li>

        </ol><!-- breadcrumb Ends  --->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <h3 class="panel-title"><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"></i> View Orders

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

        <div class="panel-body"><!-- panel-body Starts -->

        <div class="table-responsive"><!-- table-responsive Starts -->
            <div id="order_table">
            <table id="order_table" class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                <thead><!-- thead Starts -->

                    <tr>

                        <th>Order Id:</th>
                        <th>Customer Id:</th>
                        <th>Customer Name:</th>
                        <th>Product Id:</th>                     
                        <th>Product Title:</th>
                        
                        <th>Amount:</th>
                        <th>Invoice No:</th>
                        <th>Quantity:</th>
                        <th>Size:</th>
                        <th>Order Date:</th>
                        <th>Order Status:</th>
                    </tr>
                </thead><!-- thead Ends -->
            <tbody><!-- tbody Starts -->
                <?php
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td> <?php echo $row["order_id"]; ?> </td>
                        <td> <?php echo $row["customer_id"]; ?> </td>
                        <td> <?php echo $row["customer_name"]; ?> </td>
                        <td> <?php echo $row["product_id"]; ?> </td>
                        <td> <?php echo $row["p_title"]; ?> </td>
                        <td> <?php echo $row["due_amount"]; ?> </td>
                        <td> <?php echo $row["invoice_no"]; ?> </td>
                        <td> <?php echo $row["qty"]; ?> </td>
                        <td> <?php echo $row["size"]; ?> </td>
                        <td> <?php echo $row["order_date"]; ?> </td>
                        <td> <?php echo $row["order_status"]; ?> </td>
                    </tr>
                    <?php

                    }
                ?>
            </tbody>

                        </table><!-- table table-bordered table-hover table-striped Ends -->
                        </div>


                        </div><!-- table-responsive Ends -->

                        </div><!-- panel-body Ends -->

                        </div><!-- panel panel-default Ends -->

                        </div><!-- col-lg-12 Ends -->

                        </div><!-- 2 row Ends -->


                        <?php } ?>

<script>
 $(document).ready(function(){
     $.datepicker.setDefaults({
         dateFormat:'dd-mm-yy' 
     });
     $(function(){
         $("#from_date").datepicker();
         $("#to_date").datepicker();
     });
     $('#filter').click(function(){
         var from_date = $('#from_date').val();
         var to_date = $('#to_date').val();
         if(from_date != '' && to_date != ''){
             $.ajax({
                 url:"ofilter.php",
                 method:"POST",
                 data:{from_date:from_date, to_date:to_date},
                 success:function(data)
                 {
                     $('#order_table').html(data);
                 }
             })

         } else{
             alert("Please Select Date");
         }
     })

 });
</script>