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
						/*$totalquantity = 0;
						
						$subtotal = 0;
						$totalamount = 0;
						
						$vat1 = 0;*/
						$sql="select tblorder.o_status,tblorder.order_id,tblorder.o_date,tblorder.trans,tblorder.i_id,tblitem.item_name,tblitem.price,tblorder.qty from tblorder inner join tblitem on tblorder.i_id=tblitem.itemid  where tblorder.c_id = '$userid' order by tblorder.order_id";		

						//$selectproducts = "SELECT * FROM tblorder,tblitem,tblusers WHERE tblorder.c_id = '$uid' AND tblitem.itemid = tblorder.i_id";
						//echo$sql;
						$query = mysqli_query($conn, $sql);
						$rows=mysqli_num_rows($query);
						//echo$rows;
						$list = "";
						$src = "uploads/";						
						$delivery = 100;
						$vat = 0.15;
						if($rows==0)
						{
							echo "<script>alert('User Must Login First')</script>";
							echo "<script>window.location.href='login.php'</script>";
						}
	
		else{
	
		echo "<table border='1px solid black' cellspacing='' cellpadding='' width='110%'>
				<tr>
				<th align='center' bgcolor='e6e6e6'>ORDER ID</th>
				<th align='center' bgcolor='e6e6e6'>DATE</th>
				<th align='center' bgcolor='e6e6e6'>ITEM ID</th>
				<th align='center' bgcolor='e6e6e6'>ITEM NAME</th>
				<th align='center' bgcolor='e6e6e6'>QUANTITY</th>
				<th align='center' bgcolor='e6e6e6'>PRICE</th>
				<th align='center' bgcolor='e6e6e6'>AMOUNT</th>
				<th align='center' bgcolor='e6e6e6'>RECEIPT</th>
				<th align='center' bgcolor='e6e6e6'>REMOVE</th></tr>";
				
				
		
		for($loop = 0; $loop < $rows; $loop++)
		{
			
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
			{
				$order_id = $row['order_id'];
				$trans = $row['trans'];
				$itemid=$row['i_id'];
				$c_id=$row['c_id'];
				$status=$row['o_status'];			
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
				
				?>
				<tr align="center"> 
			
				<td><?php echo $order_id; ?></td>	
				<td><?php echo $o_date; ?></td>
				
				<td><?php echo $itemid?></td>
				<td><?php echo $prodname  ?></td>
				<td><?php echo $qty  ?></td>
				<td>&nbsp;&nbsp;Rs.<?php echo $price ?></td>
				<td><?php echo $amount  ?></td>
				
				<td ><a href="receipt1.php?oid=<?php echo $order_id; ?>">Receipt</a></td>
				<td><form method="post" action="removeorder.php?oid=<?php echo$order_id;?>"><input type="hidden" size="4" name="oid" value="<?php echo$order_id;?>" /><input type="submit" value="X" name="submit" /></form></td></tr>

			</tr>
			<?php	}}}
										?>
		
		</div>
	</div>
	</div>
	
<</div>

    
						
						
						
						


