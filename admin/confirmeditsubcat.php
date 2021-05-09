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
	$submenuid = mysqli_real_escape_string($conn,htmlspecialchars($_POST['subcatid']));
	$menuid = mysqli_real_escape_string($conn,htmlspecialchars($_POST['cat']));
	$Name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['subcatname']));
	//$Link = mysqli_real_escape_string($conn,htmlspecialchars($_POST['sublink']));
	$details = mysqli_real_escape_string($conn,htmlspecialchars($_POST['text']));
	
}

else
{
	echo "ERROR!!!";
	$menuid = "";
}
	
	//echo $submenuid;
	//echo $menuid;
	//echo $Name;
	//echo $Link;
	$updateuser = "UPDATE tblsubcat SET cat_id='$menuid ',subcat_name='$Name',details='$details' WHERE subcat_id='$submenuid'";
	
	$query = mysqli_query($conn,$updateuser);
	if(empty($menuid)||empty($Name))
			{
				
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='edit_subcategory.php'</script>";
				exit();
				
			}
	
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='manage_subcategory.php';</script>";
	}
	
	else
	{
		echo  "<script>alert('Could not update data')</script>";
		echo" Error:".$conn->error;
		echo "<script>window.location.href='manage_subcategory.php';</script>";
	}
?>