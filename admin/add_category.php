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
    <title>Online Library Management System | Add Categories</title>
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
                <h4 class="header-line">Category\Add category\<a href="manage_category.php">Manage Category</a></h4>
                
                            </div>

		</div>
<div class="row">
<div class="col-md-6 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Add New Category</div>
			<div class="panel-body">
			<center>
			<table>
				<form role="form" method="post" action="processcat.php">
				<div class="form-group">
				<tr>
				<td><label>Category Name</label></td>
				<td><input name="catname" type="text" id="t1" required></td>
				</tr></div>

				<div class="form-group">
				<td><label>Category Link</label></td>
				<td><input name="catlink" type="text" id="t2"></td>
				</tr></div>
				<div class="form-group">
				<td><label align="center"style="top-margin:20px">Description</label></td>
				<td><textarea type="text" rows="2"cols="18" name="text"></textarea></td>
				</tr></div>
				<tr><td colspan="2" align="center"><button type="submit" name="create" class="btn btn-info">Create </button>

				</form>
				</table>
				</center>
            </div>
        </div>
	</div>
   <div class="col-md-6 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">View Category</div>
			
			<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");

       
		$sql="SELECT * FROM tblcat ORDER BY cat_id ASC";
        $result = mysqli_query($conn,$sql); 
             $cnt=1;
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo $row['cat_id'];?></td>
                                            
                                            <td class="center"><?php echo $row['cat_name'];?></td>
                                            <td class="center"><?php echo $row['detail'];?></td>
                                          
                                        </tr>
										<?php $cnt=$cnt+1;}} ?>                                      
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