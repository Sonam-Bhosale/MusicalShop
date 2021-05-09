<?php
session_start();
include 'config.php';

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

<?php

if(isset($_SESSION['username']))
{
	$id = mysqli_real_escape_string($conn,htmlspecialchars($_POST['itemid']));
	$Category = mysqli_real_escape_string($conn,htmlspecialchars($_POST['cat']));
	$Subcategory = mysqli_real_escape_string($conn,htmlspecialchars($_POST['subcat']));
	$Name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['itemname']));
	$image = mysqli_real_escape_string($conn,htmlspecialchars($_FILES['userfile']['name']));
	$Price1 = mysqli_real_escape_string($conn,htmlspecialchars($_POST['price1']));
	$Price = mysqli_real_escape_string($conn,htmlspecialchars($_POST['price']));
	$Stock = mysqli_real_escape_string($conn,htmlspecialchars($_POST['stock']));
	$Descr = mysqli_real_escape_string($conn,htmlspecialchars($_POST['description']));

	
}

else
{
	echo "ERROR!!!";
	$id = "";
}
	
	$updateuser = "UPDATE tblitem SET item_name='$Name',item_cat='$Category', item_subcat='$Subcategory',stock='$Stock',price='$Price',purchase_price='$Price1',image='$image',description='$Descr'WHERE itemid='$id'";
	
	$query = mysqli_query($conn,$updateuser);
	/*if(empty($Category)||empty($Subcategory)||empty($Name)||empty($Stock)||empty($Price)||empty($Price1))
			{
				
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='edititem.php'</script>";
				
				
			}*/
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='viewitem.php';</script>";
	}
	
	else
	{
		echo "<script> alert('Could not update data')</script>";
		echo "<script>window.location.href='viewitem.php';</script>";
	}
?>