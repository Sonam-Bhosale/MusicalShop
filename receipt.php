<?php
session_start();

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

$date = date("l, d F, Y");

?>

<?php
if(isset($_SESSION['code']))
{
	$code = $_SESSION['code'];
}

else
{
	$code = "";
	echo "<script>alert('Transaction Error Occured')</script>";
	echo "<script>window.location.href='index-1.php';</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Order Confirmation</title>
<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<p align="right"><a href="index-1.php">Home</a> | <a href="logout.php">Logout</a></p>
<p align="center">Anusadhan Musical Instrument Store</p>
<p align="center"><b><u>ORDER CONFIRMATION RECEIPT</u></b></p>
<?php

	include("config.php");
	
	$today = date("Y-m-d");
	
	$sql = "SELECT * FROM tblusers WHERE userid = $userid";
	
	$query = (mysqli_query($conn,$sql));
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$user_id = $row['userid'];
		$name = $row['first_name'];
		$surname = $row['last_name'];
		$uname = $row['username'];
		$pass = $row['password'];
		$email = $row['email'];
		$address = $row['address'];
		$tel = $row['phone'];
		$type = $row['ac_type'];
		$status = $row['status'];	
	}
	$sql1 = "SELECT * FROM billing WHERE user_id = $userid";
	
	$query = (mysqli_query($conn,$sql1));
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		
		$address1 = $row['address'];
		
		
	}
?>


<p align="left"><b> DATE : <?php echo $date;?></b></p>

<table border="0" width="auto">
	<tr>
		<td width="100%" colspan="3"></td>
	</tr>
	
	<tr>
		<td width="25%"><strong>Name</strong></td>
		<td width="3%"><b>:</b></td>
		<td width="auto"><?php echo strtoupper($surname); ?> <?php echo strtoupper($name); ?></td>
	</tr>
	
	<tr>
	  <td width="25%"><strong>Email</strong></td>
	  <td width="3%"><b>:</b></td>
	  <td width="auto"><?php echo $email; ?></td>
	</tr>
	
	<tr>
	  <td width="25%"><strong>Billing Address</strong></td>
	  <td width="3%"><b>:</b></td>
	  <td width="auto"><?php echo $address1; ?></td>
	</tr>
	
	<tr>
	  <td width="25%"><strong>Mobile</strong></td>
	  <td width="3%"><b>:</b></td>
	  <td width="auto"><?php echo $tel; ?></td>
	</tr>
</table>



<?php
	include("config.php");
	
	$today = date("Y-m-d");
	
	$sql = "SELECT COUNT(*) FROM cart, tblitem, tblusers WHERE cart.cust_id = $userid AND tblusers.userid = $userid AND cart.checkout = 'y' AND tblitem.itemid = cart.product_id AND cart.checkedon = '$today' AND cart.trans = '$code'";
	//echo$sql;
	$query = (mysqli_query($conn,$sql));
	
	$row = mysqli_fetch_row($query);
	
	// Here we have the total row count
	$rows = $row[0];
	
	$countrows = $rows;
	
	$totalquantity = 0;
	
	$subtotal = 0;
	
	$totalamount = 0;
	
	$delivery = 100;
	
	$selectproducts = "SELECT * FROM cart , tblitem, tblusers WHERE cart.cust_id = '$userid' AND tblusers.userid = $userid AND cart.checkout = 'y' AND tblitem.itemid = cart.product_id AND cart.checkedon = '$today' AND cart.trans = '$code'";
	//echo$selectproducts;
	$query = mysqli_query($conn, $selectproducts);
	
	$list = "";
	$src = "uploads/";
	
	if($rows == 0)
	{
		echo "<script>alert('Error Occured!')</script>";
		echo$conn->error;
		//echo "<script>header(location='index-1.php');</script>";
		//echo "<script>window.location.href='index-1.php';</script>";
	}
	
	else
	{
		echo "<table align='center' border='1px solid black'cellspacing='' cellpadding='0' width='50%'>
				
				<th align='center' bgcolor='e6e6e6'>ITEM ID</th><th align='center' bgcolor='e6e6e6''>PRODUCT</th>
				<th align='center' bgcolor='e6e6e6''>QUANTITY</th><th align='center' bgcolor='e6e6e6''>PRICE</th>
				<th align='center' bgcolor='e6e6e6''>AMOUNT</th>";
		
		for($loop = 0; $loop < $countrows; $loop++)
		{
			
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
			{
				$id = $row['id'];
				$jewelid = $row['product_id'];
				$qty = $row['qty'];
				$userid = $row['cust_id'];
				$checkout = $row['checkout'];
				$added = $row['added'];
				$checked = $row['checkedon'];
				
				$prodname = $row['item_name'];
				$path = $row['image'];
				$category = $row['item_subcat'];
				$price = $row['price'];
				$desc = $row['description'];
				$width="150px";
				$height="150px";
				
				$user_id = $row['userid'];
				$name = $row['first_name'];
				$surname = $row['last_name'];
				$uname = $row['username'];
				$pass = $row['password'];
				$email = $row['email'];
				$address = $row['address'];
				$tel = $row['phone'];
				$type = $row['ac_type'];
				$status = $row['status'];
				
				
				$amount = ($qty * $price);
				
				$totalquantity = $totalquantity + $qty;
				$subtotal = $subtotal + $amount;
				$vat = round(0.15 * $subtotal);
				$totalamount = ($subtotal + $vat + $delivery);
				
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
	}
?>


<tr>
	<td colspan="3" rowspan="7"></td>
	<td align="left"><b>Total Quantity</b></font></td>
	<td align="center"><?php echo $totalquantity;?></td>
</tr>

<tr>
	<td align="left"><b>Total Items</b></td>
	<td align="center"><?php echo $rows;?></td>
</tr>

<tr>
	<td align="left"><b>Sub Total</b></td>
	<td align="center"><?php echo $subtotal;?></td>
</tr>

<tr>
	<td align="left"><b>VAT (15%)</b></td>
	<td align="center"><?php echo $vat;?></td>
</tr>

<tr>
	<td align="left"><b>Delivery Cost</b></td>
	<td align="center"><?php echo $delivery;?></td>
</tr>



<tr>
	<td align="left"><b>Total Amount (Rs)</b></td>
	<td align="center" style="border-bottom-style:solid; border-bottom-width:5px"><?php echo $totalamount;?></td>
</tr>
</table>
	
<?php mysqli_close($conn); ?>
<br />
<center>
<p>THIS IS SERVED AS YOUR OFFICIAL RECEIPT</p>
<p>THANK YOU FOR CHOSING ANUSADHAN MUSICAL INSTRUMENT STORE</p>
<p><b>NOTE: Expect a phone call confirmation before the delivery</b></p>
</center>

<table align="center">
	<tr>
		<td>
		<script Language="Javascript">function printit()
		{
			if (window.print)
			{
				window.print() ;
			}
			
			else 
			{
				var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
				document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
				WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box    WebBrowser1.outerHTML = "";
			}
		}
		</script>
		
		<script Language="Javascript">
			var NS = (navigator.appName == "Netscape");
			var VERSION = parseInt(navigator.appVersion);
			
			if (VERSION > 3)
			{
				document.write('<form> <input type=button value="Print this Page" name="Print" onClick="printit()"> </form>');
			}
		</script>
		</td>
	</tr>
</table>
</body>
</html>