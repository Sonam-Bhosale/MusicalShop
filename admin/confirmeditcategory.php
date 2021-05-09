<?php
session_start();
include 'includes/config.php';

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=index-1.php'>";
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
	$menuid = mysqli_real_escape_string($conn,htmlspecialchars($_POST['catid']));
	$Name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['catname']));
	$details = mysqli_real_escape_string($conn,htmlspecialchars($_POST['text']));
	
}

else
{
	echo "ERROR!!!";
	$menuid = "";
}
	
	
	$updateuser = "UPDATE tblcat SET cat_name='$Name', detail='$details' WHERE cat_id='$menuid'";
	
	$query = mysqli_query($conn,$updateuser);
	if(empty($Name))
			{
				
				echo "<script> alert('Please Fill Name fields..!')</script>";
				echo "<script>window.location.href='edit_category.php'</script>";
				exit();
				
			}
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='manage_category.php';</script>";
	}
	
	else
	{
		echo "Could not update data";
		echo "<script>window.location.href='manage_category.php';</script>";
	}
?>