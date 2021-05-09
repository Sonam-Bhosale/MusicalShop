<?php
session_start();
include("config.php");
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

$oid = $_GET['oid'];



$sql = "DELETE FROM tblorder WHERE c_id = '$userid' AND order_id = '$oid' ";

$result=mysqli_query($conn, $sql);

// Close your database connection
if($result)
{
		echo "<script>alert('Order Successfully Removed');</script>";
		echo "<script>window.location.href = 'orderhistory.php?id=$userid';</script>";
}
else
{
	echo"Error".$conn->error;
	//echo "<script>window.location.href = 'orderhistory.php?id=$userid';</script>";
}
?>
 