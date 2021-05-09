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
    <title> Add and View Product</title>
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
                <h4 class="header-line">Products\Add Product\<a href="manage_product.php">Manage Product\<a href="category_product.php">Category Wise</a>\<a href="subcategory_product.php">Subcategory Wise</a></a></h4>
                
                            </div>

		</div>
<div class="row">
<div class="col-md-7">
		<div class="panel panel-info">
			<div class="panel-heading">Add New Product</div>
			<div class="panel-body">
			<center>
			<table>
				<form role="form" method="post" action="processitem1.php" enctype="multipart/form-data">
				<div class="form-group">
				<tr>
				<td><label>Category Name</label></td>
				<td><select name=cat>
						<option value=''>Select One</option>
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
				</tr></div>
				
				<div class="form-group">
				<tr>
				<td><label>Subcategory Name</label></td>
				<td><select name=subcat>
						<option value=''>Select One</option>
						<?php
								$query="select * from tblcat ";
							$res=mysqli_query($conn,$query);
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<option disabled>".$row['cat_name'];
								$q2 = "select * from tblsubcat where cat_id = ".$row['cat_id'];
								$res2 = mysqli_query($conn,$q2) or die("Can't Execute Query..");
								while($row2 = mysqli_fetch_assoc($res2))
								{
									
									echo '<option value="'.$row2['subcat_id'].'"> ---> '.$row2['subcat_name'];
								}
							}
							mysqli_close($conn);
							/*
								$query="select * from tblsubcat where cat_id='$catid'";
								$res=mysqli_query($conn,$query);
							while($row=mysqli_fetch_assoc($res))
							{
											$subcatid=$row['subcat_id'];
											$subcatname=$row['subcat_name'];
											
									?><option value="<?php echo $subcatid;?>"><?php echo $subcatname;?></option>
									<?php
							}	
							*/
								?>
								</select>
				</td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Item Name</label></td>
				<td><input name="itemname" type="text" id="name" required> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Image</label></td>
				<td><input name="userfile" type="file" required> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Stock</label></td>
				<td><input name="stock" type="text" id="t3" required> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Purchase Price</label></td>
				<td><input name="price" type="text" id="t4"> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label>Selling Price</label></td>
				<td><input name="price1" type="text" id="t5"> </td>
				</tr></div>
				<div class="form-group">
				<tr>
				<td><label align="center"style="top-margin:20px">Description</label></td>
				<td><textarea type="text" rows="2"cols="18" name="description"></textarea></td>
				</tr></div>
				<tr><td colspan="2" align="center"><button type="submit" name="create" class="btn btn-info">Create </button>
				<button type="reset" name="create" class="btn btn-info">Reset</button></td></tr>
				</form>
				</table>
				</center>
            </div>
        </div>
	</div>
   <div class="col-md-5 ">
		<div class="panel panel-info">
			<div class="panel-heading">View Product</div>
			
			<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>                         
											<th>Item Id</th>                                          
											<th>Item Name</th>
											<th>Image</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");

       
		$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id ORDER BY tblitem.itemid ASC";
        $result = mysqli_query($conn,$sql); 
             $cnt=1;
			// $src="../uploads/";
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                                           
                                            <td class="center"><?php echo $row['itemid'];?></td>
                                          <!--  <td class="center"><?php //echo $row['cat_name'];?></td>
											 <td class="center"><?php //echo $row['subcat_name'];?></td>-->
											 <td class="center"><?php echo $row['item_name'];?></td>
                                            <td class="center"><img width="30px"height="30px"src="../uploads/<?php echo $row['image'];?>"></td>
											  
											
                                          
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