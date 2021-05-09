<?php
session_start();
include 'includes/config.php';
$mid=$_GET['id'];

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
	$Stock = mysqli_real_escape_string($conn,htmlspecialchars($_POST['stock']));
	$Descr = mysqli_real_escape_string($conn,htmlspecialchars($_POST['description']));
	$image = mysqli_real_escape_string($conn,htmlspecialchars($_FILES['userfile']['name']));

	
}

else
{
	echo "ERROR!!!";
	$id = "";
}
		
		if(empty($Category )||empty($Subcategory)||empty($Stock)||empty($Name))
		{
			echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='edit_product.php'</script>";
				exit();
		}
        $target_file='../uploads/';
       // $imagetmp=basename($_FILES['userfile']['name']);
		
		$location1 = $target_file.$_FILES['userfile']['name'];
		 if($image)   
          {
			  $image_name=$image;
          }   
          else
          {
			$image_name=$image;
			              
          }
		$updateuser = "UPDATE tblitem SET item_name='$Name',item_cat='$Category', item_subcat='$Subcategory',stock='$Stock',image='$image_name',description='$Descr'WHERE itemid='$mid'";
	
	$query = mysqli_query($conn,$updateuser);
	
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='manage_product.php';</script>";
		
	}
	
	else
	{
		echo "<script> alert('Could not update data')</script>";
		echo "<script>window.location.href='manage_product.php';</script>";
	}
?>