<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
	echo "userid: " . $userid;
}

else
{
	$userid = "";
}
?>

<?php
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
echo "<br />Code: " . $code;
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

		<!--Random Featured Product Start-->
		<div class="box mb0" id="checkout">
		<div class="box-heading-1"><span>CHECKOUT</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php

						include("config.php");
						
						$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
						
						$query = mysqli_query($conn,$sql);
						
						$row = mysqli_fetch_row($query);
						//echo $row;
						// Here we have the total row count
						$rows = $row[0];
						echo $rows;
						$countrows = $rows;
						//echo $countrows;
						$totalquantity = 0;
						
						$subtotal = 0;
						
						$totalamount = 0;
						
						$vat1 = 0;
						
						$delivery = 100;
						$selectproducts = "SELECT * FROM cart , tblitem WHERE cart.cust_id = $userid  AND cart.checkout = 'n' AND tblitem.itemid = cart.product_id";
						//$selectproducts = "SELECT * FROM cart,tblitems,tblusers WHERE cart.cust_id = $userid AND tblusers.userid = $userid AND cart.checkout = 'n' AND tblitem.itemid = cart.product_id";
						//echo $selectproducts;
						$query = mysqli_query($conn, $selectproducts);
						
						$list = "";
						$src = "uploads/";
						
						if($rows == 0)
						{
							echo "<script>alert('Buy an Item First!')</script>";
							echo "<script>window.location.href='index-1.php';</script>";
						}
						
						else
						{
							echo "<center><b><u>ITEMS IN YOUR CART</u></b></center><br />";
							echo "<table align='center' border='1' cellspacing='3' cellpadding='1' width='50%'>
									<th align='center' bgcolor='e6e6e6'>ITEM ID</th><th align='center' bgcolor='e6e6e6''>PRODUCT</th>
									<th align='center' bgcolor='e6e6e6''>QUANTITY</th><th align='center' bgcolor='e6e6e6''>PRICE</th>
									<th align='center' bgcolor='e6e6e6''>AMOUNT</th>";
							
							for($loop = 0; $loop < $rows ; $loop++)
							{
								
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
									$jewelid = $row['product_id'];
									$qty = $row['qty'];
									$userid = $row['cust_id'];
									$checkout = $row['checkout'];
									$added = $row['added'];
									$checked = $row['checkedon'];
									$row['trans'] = $code;
									$trans = $row['trans'];
									
									$prodname = $row['item_name'];
									$path = $row['image'];
									$category = $row['item_subcat'];
									$price = $row['price'];
									$desc = $row['description'];
									$width="150px";
									$height="150px";
									
									/*$user_id = $row['userid'];
									$name = $row['first_name'];
									$surname = $row['last_name'];
									$uname = $row['username'];
									$pass = $row['password'];
									$email = $row['email'];
									$address = $row['address'];
									$tel = $row['phone'];
									$type = $row['ac_type'];
									$status = $row['status'];*/
									
									
									$amount = ($qty * $price);
									
									$totalquantity = $totalquantity + $qty;
									$subtotal = $subtotal + $amount;
									$vat1 = round(0.15 * $subtotal);
									
									$totalamount = ($subtotal + $vat1 + $delivery);
									
									$amount = round($amount);
									if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; //to avoid prices like 17.5 - write 17.50 instead
									{
										if (round($amount) == $amount) //add .00
										{
											$amount  = "$amount".".00";
										}
									}
									$list ="<tr align='center'><td>" . $jewelid . "</td><td>" . $prodname . "</td><td>" . $qty . "</td>";
									
									$list .= "<td>" . $price . "</td><td>" . $amount . "</tr>";

									echo $list;
										
								}
							}
							
							echo "</table></center><br />";
						}
					?>
					<table border="1" align="center" width="300px">
							<tr align="center">
								<td width="150px"><b>Total Quantity</b></td><td width="150px"><?php echo $totalquantity;?></td>
							</tr>
							<tr align="center">
								<td width="150px"><b>Total Items</b></td><td width="150px"><?php echo $rows;?></td>
							</tr>
							<tr align="center">
								<td><b>Sub Total</b></td><td><?php echo $subtotal;?></td>
							</tr>
							<tr align="center">
								<td><b>VAT (15%)</b></td><td><?php echo $vat1;?></td>
							</tr>
							<tr align="center">
								<td><b>Delivery Cost</b></td><td><?php echo $delivery;?></td>
							</tr>
							<tr align="center">
								<td><b>Total Amount</b></td><td><?php echo $totalamount;?></td>
							</tr>
						</table>
						
						<br />

					<script type="text/javascript">
					<!--  Begin

					function resetform()
					{
					document.forms[0].elements[6]=="";
					}

					function submitForms()
					{
					if (isCard())
					if (confirm("\n You are about to submit this form. \n\nPress Ok to submit. Cancel to abort."))
					{
					alert(document.forms[0].elements[2].value + " " + document.forms[0].elements[1].value +"\n\n\nYour Checkout form has been sent successfully. \n\n\nThank you!");
					return true;
					}
					else
					{
					alert("You have chosen to abort the checkout.");
					return false;
					}
					else 
					return false;
					}


					
					// End -->
					</script>
					<?php
						$selectproducts = "SELECT * FROM cart,tblusers WHERE cart.cust_id = $userid AND tblusers.userid=$userid";
						$result=mysqli_query($conn,$selectproducts);
						//echo $selectproducts;
						$rows=mysqli_num_rows($result);
						//echo "<br>".$rows;
						if(mysqli_num_rows($result)>0)
						{
								while($row=mysqli_fetch_array($result))
								{
									$user_id = $row['userid'];
									
									$name = $row['first_name'];
									$surname = $row['last_name'];//echo $surname;
									$uname = $row['username'];//echo $uname;
									$pass = $row['password'];
									$email = $row['email'];//echo $email;
									$address = $row['address'];//echo $address;
									$tel = $row['phone']; //echo $tel;
									$type = $row['ac_type'];
									$status = $row['status'];
								}
						}
						else{
							echo"error";}
					
					?>
						
					<p align="center"><b>Billing Information</b></p>

					<table border="0" cellpadding="2" cellspacing="0" width="80%" align="center">
					  <tr>
						<td colspan="5" height="96">
							<form name="formCheckout" method="post" target="_blank"action="ch.php" onSubmit="return submitForms()">
							<table width="400" align="center" border="0">
							<tr>
								<td bgColor="c6d3ce">
								  <table width="400" border="0">
								  <tr bgColor="dee7e7">
									 <td width="400" align="center"><strong>ID</strong></td>
									 <td><input type="text" name="Userid"  size="30"value="<?php echo $userid;?>" disabled="TRUE" /></td>
								  </tr>
									<tr bgColor="dee7e7">
									  <td width="165" align="center"><strong>Name</strong></td>
									  <td><b><input type="text"  name="Name" size="30"value="<?php echo$name;echo" ";echo$surname; ?>" disabled="TRUE" /></b></td>
									</tr>
																	
									<tr bgColor="e7efef">
									  <td align="center"><strong>Email</strong></td>
									  <td><b><input type="text" size="30" name="Email" value="<?php echo $email; ?>" disabled="TRUE" /></b></td>
									</tr>
									<tr bgColor="dee7e7">
									  <td align="center"><strong>Billing Address</strong></td>
									  <td><b><textarea rows="3" name="Address" cols="30" disabled="TRUE"><?php echo $address; ?></textarea></b></td>
									</tr>
									<tr bgColor="e7efef">
									  <td align="center"><strong>Mobile</strong></td>
									  <td><b><input type="text" size="30" maxlength="10" name="Tel" value="<?php echo $tel; ?>" disabled="TRUE" /></b></td>
									</tr>			
									</table>
								</td>
							</tr>
							</table>
							<br>
							<table width="400" align="center" border="0">
							  <tr>
								<td align="center" width="200"><input type="submit" value="Confirm Checkout"></td>
								
							  </tr>
							</table>
						  </form>
						</td>
					  </tr>
					</table>
				</div>
			</div>
		</div>
		
		<!--Random Featured Product End-->

		<!--Special Promo Banner Start-->
		<div class="box-promo" id="box-promo">
			<div class="box-heading-1"><span>PROMO ON FEATURED ITEMS</span></div>
			<div id="banner0" class="banner">
				<div style="display:block;"><img src="images/addBanner-940x145.jpg" alt="Special Offers" title="Special Offers" /></div>
			</div>
		</div>
		<!--Special Promo Banner End-->    	

		<!--Coming Soon Product Start-->
		<!--
		<div class="box-heading-1" id="soon">
			<div class="box-heading-1"><span>Coming Soon</span></div>
				<div id="carousel0">
					<ul class="jcarousel-skin-opencart">
					-->
		<!--Coming Soon Product End-->
			
					<!--Carousel Start-->
					<!--
					<?php
						// Included configuration file in our code.
						//include("comingsoon.php");
					?>
			
					</ul>
				</div>
		</div>
		-->
		<!--Carousel End-->

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