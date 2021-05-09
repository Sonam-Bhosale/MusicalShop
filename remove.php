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
?>

<?php

$jewelid = $_POST['txtjewelid'];

include("config.php");

$sql = "DELETE FROM cart WHERE cust_id = $userid AND product_id = $jewelid";

mysqli_query($conn, $sql);

// Close your database connection
mysqli_close($conn);

echo "<script>alert('Item Successfully Removed');</script>";
echo "<script>window.location.href = 'index-1.php';</script>";
?>
 