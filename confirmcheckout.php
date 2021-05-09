<?php
//date_default_timezone_set("Chennai/Kolkata/Mumbai/New Delhi");
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
?>

<?php
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
?>

<?php

include("config.php");
$payment = $_POST['paymentmode'];
$status="Pending";
$sql = "SELECT * FROM cart WHERE cust_id = '$userid' AND checkout = 'n'";
$query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
	$id = $row['id'];
	$jewelid = $row["product_id"];
	$qty = $row["qty"];
	$userid = $row["cust_id"];
	$checkout = $row['checkout'];
	$added = $row['added'];
	$checked = $row['checkedon'];
	$trans = $row['trans'];

	$today = date("Y-m-d H:i:s");
	
	//$topsell = "UPDATE tblitem SET topsell=(topsell + 1) WHERE tblitem.itemid = $jewelid";
	//mysqli_query($conn,$topsell);
	
	$stock="update tblitem set stock=(stock-'$qty') where tblitem.itemid = $jewelid";
	mysqli_query($conn,$stock);
	
	$sql = "UPDATE cart SET checkout = 'y', checkedon = '$today', trans = '$code' WHERE id = '$id'";
	mysqli_query($conn, $sql);
	
	$sql1="insert into tblorder values(null,'$userid','$jewelid','$qty','$today','$trans','$payment','$status')";
	$result=mysqli_query($conn,$sql1);
	if($result)
	{
		//echo "Order Place";
		}
		else{
			echo"Error".$conn->error;
		}
}
	mysqli_close($conn);

	
	echo "<script>alert('Thank You for Your Purchase!')</script>";
	echo "<script>alert('Your Order is Placed!')</script>";
	echo "<script>window.location.href='receipt.php'</script>";
?>
 