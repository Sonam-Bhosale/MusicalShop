<?php
session_start();
error_reporting(0);
include('includes/config.php');
$mid=$_GET['id'];

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
    <title> Edit Products</title>
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
                <h4 class="header-line">Manage Product\Edit Product</h4>
                
                            </div>

				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">Edit Product Information</div>
					 
					<div class="panel-body">
					<form role="form"  action="confirmeditprod.php?id=<?php echo $mid;?>" method="post" enctype="multipart/form-data"><center>
					<table>
<?php 
if(isset($_SESSION['username']))
	{
			include 'includes/config.php';
			$menuid = $_GET['id'];
			
			
		$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id and tblitem.itemid='$menuid'";

			//$sql="SELECT * FROM tblsubcat where subcat_id = '$menuid' ";
			
			$result = mysqli_query($conn,$sql); 
			
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_array( $result )) 
				{
					$itemid = $row['itemid'];
					$date=$row['date'];
					$catid = $row['item_cat'];
					$cat_name=$row['cat_name'];
					$subcatid = $row['item_subcat'];
					$subcat_name=$row['subcat_name'];
					$name = $row['item_name'];
					$image = $row['image'];
					$stock = $row['stock'];
					$price1 = $row['purchase_price'];
					$price = $row['price'];
					$details=$row['description'];
				
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
		<tr><td><label>ID  </label></td><td><?php echo $menuid ; ?><td>
		<td><input name="itemid" type="hidden" id="subcatid" value="<?php $menuid; ?>"></td>
		</div>
		  <tr>
		<div class="form-group">
		<tr>
		<td><label>Category Name</label></td>
		<td><select name=cat><option value='<?php echo $catid;?>'><?php echo $cat_name;?></option>
						<?php
								$sql="SELECT * FROM tblcat";
								$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
						{		
						$catid=$row['cat_id'];
						$catname=$row['cat_name'];
						
						?>
						<option value="<?php echo $catid;?>"><?php echo $catname;?></option>
						<?php
						}	
					}
					else
					{
						echo "0 result";
					}
?>
				</select>
				</td>
				
		</tr>
		</div>
		<div class="form-group">
		<tr>
		<td><label>SubCategory Name</label></td>
		<td><select name=subcat><option value='<?php echo $subcatid;?>'><?php echo $subcat_name;?></option>
						<?php
								

								$sql="SELECT * FROM tblsubcat";
								$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
						{		
						$subcatid=$row['subcat_id'];
						$subcatname=$row['subcat_name'];
						
						?>
						<option value="<?php echo $subcatid;?>"><?php echo $subcatname;?></option>
						<?php
						}	
					}
					else
					{
						echo "0 result";
					}
?>
				</select>
				</td>
				
		</tr></div>
		<td><label>Item Name</label></td>
				<td><input name="itemname" type="text" id="name" value="<?php echo $name; ?>"required></td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Image</label></td>
				<td><img src="../uploads/<?php echo $image;?>"><input name="userfile" type="file" value="<?php echo $image;?>" </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Stock</label></td>
				<td><input name="stock" type="text" id="t3"value="<?php echo $stock; ?>"required></td>
				</tr></div>

		<div class="form-group">
		<tr>
		<td><label>Description</label></td>
		<td><textarea name="description" cols="25" rows="3"required><?php echo $details; ?></textarea></td></tr></div>

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