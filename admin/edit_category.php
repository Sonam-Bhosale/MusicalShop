<?php
session_start();
error_reporting(0);
include('includes/config.php');

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Edit Categories</title>
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
<!-- MENU SECTION END-->
   
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Category\Edit category</h4>
                
                            </div>

				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">Edit Category Information</div>
					 
					<div class="panel-body">
					<form role="form" method="post" action="confirmeditcategory.php"><center>
					<table>
<?php 
if(isset($_SESSION['username']))
	{
			
			$menuid = $_GET['id'];
			
			//echo $_GET['id']; 
			
			$sql="SELECT * FROM tblcat where cat_id = '$menuid' ";
			
			$result = mysqli_query($conn,$sql); 
			
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_array( $result )) 
				{
					$id = $row['cat_id'];
					$name = $row['cat_name'];
					$link = $row['cat_link'];
					$details=$row['detail'];
				
				}
			}
			else
			{
				echo" Error:".$conn->error;
			}
			
	}
	

	else
	{
		echo "ERROR!!!";
		$menuid = "";
	}
  ?> 
  
		
		  <div class="form-group">
		<tr><td><label>ID  </label></td><td><?php echo $id; ?><td>
		<input name="catid" type="hidden" id="catid" value="<?php echo $menuid; ?>">
		</div>
		  <tr>
		<div class="form-group">
		<tr>
		<td><label>Category Name</label><td>
		<input name="catname" type="text" id="t1" value="<?php echo $name; ?>"required>
		</tr>
		</div>

		<div class="form-group">
		<tr>
		<td><label>Description</label></td>
		<td><textarea name="text" cols="18" rows="2" required><?php echo $details; ?></textarea></td></tr></div>

			<tr><td colspan="2" align="center"><button type="submit" name="update" class="btn btn-info">Update </button></td></tr>
</table>
									</center>
                                    </form>
									
                            </div>
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