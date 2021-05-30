<?php
    include("includes/db.php");
?>

<html>
<head>
    <title>Invoice generator</title>
</head>

<body>
    <form action="invoicedb.php">
        <select name="invoice_no">
            <?php
                $query = mysqli_query($con, "select * from customer_order");
                while($invoice = mysqli_fetch_array($query)){
                    echo"<option value='".$invoice['invoice_no']."'>" .$invoice['invoice_no']."</option>";
                }
            ?>
        </select>
        <input type="submit" value="Generate">
        
    </form>
</body>
</html>