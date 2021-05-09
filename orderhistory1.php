<?php
$start = microtime(true);
session_start(); // start a session
$uid=$_GET['id'];
if (isset($_SESSION['user_id'])) { 
	$userid = $_SESSION['user_id']; 
}
else { // if it is not set
	$userid = ""; // assign a null value to $userid
}
echo "User ID: " . $userid; //print it on screen.
?>

<?php
$_SESSION['code'] = rand(); 
$code = $_SESSION['code']; 
echo "<br />Code: " . $code; 
?>

<?php
// User is already logged in.
if (isset($_SESSION['username'])) { //check if session username is set
	$User = $_SESSION['username']; // if it is, assign the value to $User
}
else {
	$User = ""; // else $User will be null
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

		<div class="box mb0" id="cart">
		<div class="box-heading-1"><span>ORDER HISTORY</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						$id=$_GET['id'];
					
						//$sql = "SELECT COUNT(*) FROM tblorder WHERE c_id = '$id' order by order_id";
						$sql = "SELECT COUNT(*) FROM tblorder , tblitem, tblusers WHERE tblorder.c_id = $userid AND tblusers.userid = $userid  AND tblitem.id = tblorder.i_id";
						$query = (mysqli_query($conn,$sql));
						/*$row = mysqli_num_rows($query);
						echo$row;
	// Here we have the total row count
	$rows = $row[0];
	
	$countrows = $rows;
//$sql="select tblorder.date,tblorder.pid,tblorder.pname,tblorder.price,product.type,product.flavour,product.weight from tblorder inner join product on tblorder.pid=product.id  where user_id = '$id' order by tblorder.order_id";		

	$selectproducts = "SELECT * FROM tblorder,tblitem, tblusers WHERE tblorder.c_id = $userid AND tblusers.user_id = $userid  AND tblitem.id = tblorder.i_id";
	echo$selectproducts;
	$query = mysqli_query($conn, $selectproducts);
	
	$list = "";
	$src = "uploads/";
	
	/*if($rows == 0)
	{
		echo "<script>alert('Nothing Bought Yet!')</script>";
		//echo "<script>window.close();</script>";
	}*/
					$row = mysqli_num_rows($query);
						echo $row;
						// Here we have the total row count
						$rows = $row[0];
						echo $rows."<br>";
						$totalquantity = 0;
						
						
						
						$subtotal = 0;
						
						$totalamount = 0;
						
						$vat1 = 0;
						
						$selectproducts = "SELECT * FROM tblorder,tblitem,tblusers WHERE tblorder.c_id = '$uid'  AND tblitem.itemid = tblorder.i_id ";
						echo$selectproducts;
						$query = mysqli_query($conn, $selectproducts);
						$rows=mysqli_num_rows($query);
						//echo $rows;
						$list = "";
						$src = "uploads/";

						/*if($rows == 0)
						{
							echo "<script>alert('No any Order Placed')</script>";
							echo "<script>window.location.href='index-1.php';</script>";
						}*/
						
						
						
							$delivery = 100;
							$vat = 0.15;
							
	

	
		echo "<table align='center' cellspacing='1' cellpadding='0' width='80%'>
				<tr>
				<th align='center' bgcolor='e6e6e6'>ORDER ID</th>
				<th align='center' bgcolor='e6e6e6'>DATE</th>
				<th align='center' bgcolor='e6e6e6'>INVOICE NO</th>
				<th align='center' bgcolor='e6e6e6'>ITEM ID</th>
				<th align='center' bgcolor='e6e6e6'>ITEM NAME</th>
				<th align='center' bgcolor='e6e6e6'>QUANTITY</th>
				<th align='center' bgcolor='e6e6e6'>PRICE</th>
				<th align='center' bgcolor='e6e6e6'>AMOUNT</th>
				<th align='center' bgcolor='e6e6e6'>ACTION</th>
				<th align='center' bgcolor='e6e6e6'>REMOVE</th></tr>";
				
		
		for($loop = 0; $loop < $countrows; $loop++)
		{
			
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
			{
				$order_id = $row['order_id'];
				/*$jewelid = $row['product_id'];
				$qty = $row['qty'];
				$userid = $row['cust_id'];
				$checkout = $row['checkout'];
				$added = $row['added'];
				$checked = $row['checkedon'];
				;*/
				$trans = $row['trans'];
				$itemid=$row['i_id'];
				$c_id=$row['c_id'];
				$status=$row['o_status'];
				
				$date = date("Y-m-d H:i:s");
				
				$prodname = $row['item_name'];
				$path = $row['image'];
				$o_date=$row['o_date'];
				$price = $row['price'];
				$width="150px";
				$height="150px";
				$qty=$row['qty'];
				
				$user_id = $row['userid'];
				

				$amount = ($qty * $price);
				
				$amount = round($amount);
				if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; //to avoid prices like 17.5 - write 17.50 instead
				{
					if (round($amount) == $amount) //add .00
					{
						$amount  = "$amount".".00";
					}
				}
				$subtotal = $subtotal + $amount;
				$vat = round(0.15 * $subtotal);
				$totalamount = ($subtotal + $vat + $delivery);
				
				$list ="<tr align='center'><td>".$order_id. "</td><td>" . $o_date. "</td><td>" . $trans . "</td><td>" . $itemid . "</td><td>" . $prodname . "</td><td>" . $qty . "</td>";
				
				$list .= "<td>" . $price . "</td><td>" . $amount . "</td><td>". $totalamount. "</td><td>"."echo'Remove';</td></tr>";

				echo $list;	
			}
		}
	
?>
</div>
</div>
</div>

						
						
						
						


