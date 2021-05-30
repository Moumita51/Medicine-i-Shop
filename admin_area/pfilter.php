<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>


<body>
<table class="table table-bordered">
</body>
</html>

<?php
error_reporting(0);
 if(isset($_POST["from_date"], $_POST["to_date"])){
     $connect = mysqli_connect("localhost", "root", "", "medicine_shop");
     $output= '';
     $query = "
        SELECT * FROM payments
        WHERE payment_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
     ";
     $result = mysqli_query($connect, $query);
     $output .=" 
      


            
     <tr>

     <th>Paymanet ID</th>
     <th>Invoice No:</th>
     <th>Amount Paid:</th>                     
     <th>Payment Method:</th>
     <th>Reference No:</th>
     <th>Payment Date:</th>
     
     
     
 </tr>
            
    ";
    if(mysqli_num_rows($result)>0){
        
        while($row = mysqli_fetch_array($result)){
            $output .='
            
            <tr>
            <td>'.  $row["payment_id"] .' </td>
            <td>'.  $row["invoice_id"] .' </td>
            <td>  '. $row["amount"] .' </td>
            <td>'.  $row["payment_mode"] .' </td>
            <td>'.  $row["ref_no"] .' </td>
            <td>'.  $row["payment_date"] .' </td>
            

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
    echo  $output;


 
 }



 

?>












<h4>
<?php
 if(isset($_POST["from_date"], $_POST["to_date"])){
     $connect = mysqli_connect("localhost", "root", "", "adp");
     $output= '';
     $query = "
        SELECT SUM(amount) as amount FROM payments
        WHERE payment_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
     ";
     $result = mysqli_query($connect, $query); 
     echo"Total Amount (TK) :";
     echo  $result->$amount;
     $output .=" 
    
    


            
     
            
    ";
    if(mysqli_num_rows($result)>0){
        
        while($row = mysqli_fetch_array($result)){
            $output .='
            
            <tr>
            <td>  '. $row["amount"] .' </td>
            
            

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
</h4>

<?php
// Turn off all error reporting

?>
