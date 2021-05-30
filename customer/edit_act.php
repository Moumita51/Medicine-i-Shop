 <?php

 $customer_email=$_SESSION['customer_email'];
 $get_customer="select * from customers where customer_email='$customer_email'";
 $run_cust=mysqli_query($con,$get_customer);
 $row_cust=mysqli_fetch_array($run_cust);
 $customer_id=$row_cust['customer_id'];
 $customer_name=$row_cust['customer_name'];
 $customer_email=$row_cust['customer_email'];
 $customer_district=$row_cust['customer_district'];
 $customer_contact=$row_cust['customer_contact'];
 $customer_address=$row_cust['customer_address'];
 $customer_image=$row_cust['customer_image'];


 ?>
 
 
 <div class="box">

    <center>
        <h1>
            Edit Your Account
        </h1>
    </center>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required="">
    </div>

    <div class="form-group">
        <label>Customer Email</label>
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required="">
    </div>


    <div class="form-group">
        <label>Customer District</label>
        <input type="text" name="c_district" class="form-control" value="<?php echo $customer_district; ?>" required="">
    </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="c_number" required="" value="<?php echo $customer_contact; ?>" class=form-control>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="c_address" required="" value="<?php echo $customer_address; ?>" class=form-control>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="c_image" required="" class=form-control value="<?php echo $customer_image; ?>">
                            <img src="customer_images/<?php echo $customer_image; ?>" class="img-responsive" height="100" width="100">
                        </div>


                        <div class="text-center">
                            <button name="update" class="btn btn-primary" > 
                                Update Now
                            </button>
                        </div>
                        </form>
                        </div>

                        <?php

                        if(isset($_POST['update'])){
                            $update_id=$customer_id;
                            $c_name=$_POST['c_name'];
                            $c_email=$_POST['c_email'];
                            $c_district=$_POST['c_district'];
                            $c_contact=$_POST['c_number'];
                            $c_address=$_POST['c_address'];
                            $c_image=$_FILES['c_image']['name'];
                            $c_image_tmp=$_FILES['c_image']['tmp_name'];

                            if($c_image_tmp !=""){
                                move_uploaded_file($c_image_tmp, "customer_images/$c_image");
                                $update_customer="update customers set customer_name='$c_name',customer_email='$c_email',customer_district='$c_district',customer_contact='$c_contact',customer_address='$c_address',
                                customer_image='$c_image' where customer_id='$update_id'";
                            }else{
                                $update_customer="update customers set customer_name='$c_name',customer_email='$c_email',customer_district='$c_district',customer_contact='$c_contact',customer_address='$c_address'
                                 where customer_id='$update_id'";
                            }

                           
                            $run_customer=mysqli_query($con,$update_customer);
                            if($run_customer){
                                echo"<script>alert('Your details updated')</script>";
                                echo"<script>window.open('my_account.php','_self')</script>";
                            }
                        }
                        ?>