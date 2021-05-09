<?php

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
}

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<?php
	
	include("config.php");
	
	$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
	
	$query = (mysqli_query($conn,$sql));
	
	$row = mysqli_fetch_row($query);
	
	
	$rows = $row[0];
	
	$countrows = $rows;
	
	$totalquantity = 0;
	
	$subtotal = 0;
	
	$totalamount = 0;
	
	$vat = 0.15;
	
	$delivery = 100;
	
	$selectproducts = "SELECT * FROM cart , tblitem WHERE cart.cust_id = $userid AND tblitem.itemid = cart.product_id AND checkout = 'n'";
	
	$query = mysqli_query($conn, $selectproducts);
		
	for($loop = 0; $loop < $countrows; $loop++)
	{
		
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
			$jewelid = $row["product_id"];
			$qty = $row["qty"];
			$userid = $row["cust_id"];
			$checkout = $row["checkout"];
			
			$prodname = $row["item_name"];
			$path = $row["image"];
			$category = $row["item_subcat"];
			$price = $row["price"];
			$desc = $row["description"];
			$width="150px";
			$height="150px";
			
			$amount = ($qty * $price);
			
			$amount = round($amount);
			if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; //to avoid prices like 17.5 - write 17.50 instead
			{
				if (round($amount) == $amount) //add .00
				{
					$amount  = "$amount".".00";
				}
			}
			
			$totalquantity = $totalquantity + $qty;
			$subtotal = $subtotal + $amount;
			$vat = round(0.15 * $subtotal);
					
			$totalamount = ($subtotal + $vat + $delivery);
		}
	}
?>
<!-- Header Part Start-->
<header id="headerWrapper">
	<div id="header">
		<div id="logo">
			<a href="index-1.php"><img src="images/logo1.png" title="RD musical shop Logo" alt="Our Logo" /></a>
					
		</div>
		<h1 align="center"><b>AnuSadhan Musical Instrument Store </b></h1>
		<marquee direction="left" behavior="alternate"><h3>Online Shop &amp; Music Stores for Musical Instruments and Equipment - Instruments Garage</h3></marquee>
		<!-- Mini Cart Start-->
		<div id="cart">
			<div class="heading"><a href="cart.php"><span id="cart-total"><?php echo $countrows;?> item(s) - Rs <?php echo $totalamount;?></span></a></div>
			
		</div>
		<!-- Mini Cart End-->
			<?php
			// Display Username
			echo '<div id="welcome"> Welcome <b>' . $User . '</b> ||<a href="logout.php">Logout</a></div>';
			
			
			
			
			
			?>
	</div>
	
	<!-- Main Navigation Start-->            
		<?php include("navigation.php");?>
	<!-- Main Navigation End-->
	
	<div id="SearchDiv" class="SearchDiv">
			
	</div>
	
</header>
<!-- Header Part End-->