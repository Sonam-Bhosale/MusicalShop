<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
<!-- MENU SECTION END-->

            
             <div class="row">

					<div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-music fa-5x"></i>
<?php 
$sql ="SELECT itemid from tblitem ";
$result = mysqli_query($conn,$sql);
$rows=mysqli_num_rows($result);

?>


                            <h3><?php echo htmlentities($rows);?></h3>
                     Music Instrument Listed
                        </div>
                    </div>

            
                 
               <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php 
$sql1 ="SELECT userid from tblusers ";
$result = mysqli_query($conn,$sql1);
$rows=mysqli_num_rows($result);
?>
                            <h3><?php echo htmlentities($rows);?></h3>
                           Registered Users
                        </div>
                    </div>

      
		

					<div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-music fa-5x"></i>
<?php 
$sql5 ="SELECT order_id from tblorder ";
$result = mysqli_query($conn,$sql5);
$rows=mysqli_num_rows($result);

?>


                            <h3><?php echo htmlentities($rows);?></h3>
                     Order Placed                        </div>
                    </div>
					</div>
					




 <div class="row">

 <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
<?php 
$sql2 ="SELECT s_id from tblsupplier ";
$result = mysqli_query($conn,$sql2);
$rows=mysqli_num_rows($result);
?>


                            <h3><?php echo htmlentities($rows);?></h3>
                     Supplier Listed
                        </div>
                    </div>

            
<div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
<?php 
$sql3 ="SELECT cat_id from tblcat";
$result = mysqli_query($conn,$sql3);
$rows=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($rows);?> </h3>
                           Listed Categories
                        </div>
                    </div>
					
                <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
<?php 
$sql4 ="SELECT subcat_id from tblsubcat ";
$result = mysqli_query($conn,$sql4);
$rows=mysqli_num_rows($result);
?>

                            <h3><?php echo htmlentities($rows);?> </h3>
                           Listed Sub-Categories
                        </div>
                    </div>
             
             

        </div>                           
            
             </div>
            
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

