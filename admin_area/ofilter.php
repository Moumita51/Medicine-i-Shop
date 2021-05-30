<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="ddtf.js"></script>
    <script>
        jQuery('order_table2').ddTableFilter();
    </script>

</head>


<body>
<table class="table table-bordered" id="order_table2">
</body>
</html>

<?php
 if(isset($_POST["from_date"], $_POST["to_date"])){
     $connect = mysqli_connect("localhost", "root", "", "medicine_shop");
     $output= '';
     $query = "
        SELECT * FROM customer_order
        WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
     ";
     $result = mysqli_query($connect, $query);
     $output .=" 
            
            <tr>
            <th>Order No:</th>
            <th>Customer Email:</th>
            <th>Invoice No:</th>                     
            <th>Product Qty:</th>
            <th>Product Size:</th>
            <th>Order Date:</th>
            <th>Total Amount:</th>
            <th>Order Status:</th>
            <th>Delete Order:</th>
            </tr>
            
    ";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            $output .='

            
            <tr>
            <td>'.  $row["order_id"] .' </td>
            <td>'.  $row["customer_id"] .' </td>
            <td> '. $row["product_id"] .' </td>
            <td>'.  $row["due_amount"] .' </td>
            <td>'.  $row["invoice_no"] .' </td>
            <td>'.  $row["qty"] .' </td>
            <td>'.  $row["size"] .' </td>
            <td>'.  $row["order_date"] .' </td>
            <td>'.  $row["order_status"] .' </td>
        </tr>

            ';
        }
    } else{
        $output .= '
            <tr> 
                <td colspan="5"> No Order found </td>
            </tr>
        ';

    }
    $output .= '</table>';
    echo $output;
     
 }

?>