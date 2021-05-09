<?php
	session_start();
	include 'includes/config.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Add and View Supplier</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<?php

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Supplier\Add Supplier\<a href="manage_supplier.php">Manage Supplier</a></h4>
                
                            </div>

		</div>
<div class="row">
<div class="col-md-5">
		<div class="panel panel-info">
			<div class="panel-heading">Add New Supplier</div>
			<div class="panel-body">
			<center>
			<table>
				<form role="form" method="post" action="processsupplier.php" enctype="multipart/form-data">
				<div class="form-group">
				<tr>
				<td><label>Supplier ID</label></td>
				<td><input name="sid" type="text" id="t1" required></td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Supplier Name</label></td>
				<td><input name="sname" type="text" id="t2" required></td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Item Name</label></td>
				<td><input name="product_name" type="text" > </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Quantity</label></td>
				<td><input name="qty" type="text" size="15"> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Price</label></td>
				<td><input name="price" type="text" size="15"> </td>
				</tr></div>
				
				
				<tr><td colspan="2" align="center"><button type="submit" name="create" class="btn btn-info">Create </button>
				<button type="reset" name="create" class="btn btn-info">Reset</button></td></tr>
				
				</form>
				</table>
				</center>
            </div>
        </div>
	</div>
   <div class="col-md-7 ">
		<div class="panel panel-info">
			<div class="panel-heading">View Supplier</div>
			
			<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>                         
											
											<th>Supplier Id</th>
                                            <th>Supplier Name</th>
											 <th>Item Name</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");

       
		$sql="SELECT * FROM tblsupplier ORDER BY s_id ASC";
        $result = mysqli_query($conn,$sql); 
             $cnt=1;
			 $src="uploads/";
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                                           
                                            <td class="center"><?php echo $row['s_id'];?></td>                           
											 <td class="center"><?php echo $row['s_name'];?></td>
											  <td class="center"><?php echo $row['item_name'];?></td>
											
                                          
                                        </tr>
										<?php //$cnt=$cnt+1;
										}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

		

</div>
    </div>
    </div>
	

<br>
<br>
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