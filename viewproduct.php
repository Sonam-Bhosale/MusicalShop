<?php
include("config.php");
session_start();
$item=$_GET['Items'];
$subcat=$_GET['Subname'];
$catid=$_GET['MenuCat'];
$sql="Select * from tblcat where cat_id=$catid";
$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
									{		$catid=$row['cat_id'];
											$catname=$row['cat_name'];
											}
											}
$sql1="Select * from tblitem where itemid=$item";
$result=mysqli_query($conn,$sql1);
						if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
									{		$itemid=$row['itemid'];
											$itemname=$row['item_name'];
											}
											}
											
?>

<?php
// User is already logged in. Redirect them somewhere useful.
if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<!-- Head1 Part Start-->
<?php include("head1.html");?>
<!-- Head1 Part End-->

<!-- Top Part Start-->
<?php 
if($User != "")
{
	include("top_links2.php");
}
else
{
	include("top_links.php");
}
?>
<!-- Top Part End-->


<!-- Main Div Tag Start-->
<div id="wrapper">

	<!-- Header Part Start-->
	<?php 
	if($User != "")
	{
		include("header2.php");
	}
	else
	{
		include("header.php");
	}
	?>
	<!-- Header Part Start-->
	

	<!-- Middle Part Start--> 
	<!-- Section Start--> 
	<?php include("section.html"); ?>
	<!--Section End-->
	<!--Middle Part End-->
	<div class="box mb0">
	
			<!--View Product Start-->
				<div class="box-heading-1" align="left"><span>Home</a>\<?php echo $catname;?>\<?php echo$subcat;?></span></div>
				<div class="box-heading-1"><span>Items</span></div>
				<div class="box-content-1">
					<div class="box-product-1" >
						<?php
							
							$sql = "SELECT COUNT(*) FROM tblcat, tblsubcat, tblitem where tblcat.cat_id = tblsubcat.cat_id and tblitem.item_subcat = tblsubcat.subcat_id and tblitem.item_subcat = $item";
							$query = mysqli_query($conn, $sql);
							$row = mysqli_fetch_row($query);
							$rows = $row[0];
							$sql = " SELECT * FROM tblcat, tblsubcat, tblitem where tblcat.cat_id = tblsubcat.cat_id and tblitem.item_subcat = tblsubcat.subcat_id and tblitem.item_subcat = $item $limit";

							$query = mysqli_query($conn, $sql);
							
							$query2 = mysqli_query($conn, $sql);
							$rowtext = mysqli_fetch_row($query2);
							
							$list = '';

							$src = "uploads/";
								
							if(!isset($_SESSION['username']))
							{
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
								
									$id = $row["itemid"];
									$prodname = $row["item_name"];
									$path = $row["image"];
									$category = $row["item_subcat"];
									$price = "Rs. " . $row["price"];
									$desc = $row["description"];
									$width="150px";
									$height="150px";
									/*
									$list .='
								<div>
								 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
								 $list .='
								   <div class="proName">
									<div class="name"><a href="' . $src . $path . '">' . $prodname . '</a></div>
									<div class="price">' . $price . '</div>
									<div class="cart">
										<label class="btn">';
										
										$list .='
										</label>
									</div>
								  </div>
								</div>
								'; */
								$list .='
								<div align=center><center>
								 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
								 $list .='
								   <div class="proName">
									<div class="name"><a href="' . $src . $path . '">' . $prodname . '</a></div>
									<div class="price">' . $price . '</div>
									<div class="cart">
										<label class="btn">';
										
										$list .='<form method="post" action="login.php">
										<input type="hidden" name="txtid" value="'.$id.'">
										<input type="submit" value="Add to Cart" class="button"/>
										
										</form>';
										
										$list .='
										</label>
									</div>
								  </div></center>
								</div>
								';

								}
							}

							else
							{
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
								
								$id = $row["itemid"];
								$prodname = $row["item_name"];
								$path = $row["image"];
								$category = $row["item_subcat"];
								$price = "Rs. " . $row["price"];
								$desc = $row["description"];
								$width="150px";
								$height="150px";

								$list .='
								<div>
								 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
								 $list .='
								   <div class="proName">
									<div class="name"><a href="' . $src . $path . '">' . $prodname . '</a></div>
									<div class="price">' . $price . '</div>
									<div class="cart">
										<label class="btn">';
										
										$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'">
										<input type="submit" value="Add to Cart" class="button"/>
										
										</form>';
										
										$list .='
										</label>
									</div>
								  </div>
								</div>
								'; 

								}
							}
							// Close your database connection
							mysqli_close($conn);
						?>
						
						<?php
							if($rows == 0)
							{
								echo "<h2 align='center'>Nothing to display</h2>";
							}
							
							else
							{
								
								echo $list;
								//echo "<p align='center'>" . $paginationCtrls . "</p>";
							}
						?>
					</div>
				</div>
			</div>
			<!--View Product End-->
			
			<!--Special Promo Banner Start-->
		<div class="box-promo" id="box-promo">
			<div class="box-heading-1"><span>PROMO ON FEATURED ITEMS</span></div>
			<div id="banner0" class="banner">
				<div style="display:block;"><img src="images/addBanner-940x145.jpg" alt="Special Offers" title="Special Offers" /></div>
			</div>
		</div>
		<!--Special Promo Banner End-->

	<!--Footer Part Start-->
		<?php include("footer.php");?>
	<!--Footer Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>