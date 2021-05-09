<?php
	session_start(); # Starts the session
	include 'config.php';
	session_unset(); #removes all the variables in the session
 
	session_destroy(); #destroys the session
 
	if(!isset($_SESSION['username']))
	{
		$logout=date('y-m-d,h:m:s');
		$sql="update tbllogin set logout='$logout'";
		$res=mysqli_query($conn,$sql);
		echo "<script>alert('Successfully logged out!')</script>";
		
   		echo "<script>window.location.href='index-1.php'</script>";
	}
	
	else
	{
		echo "<script>alert('Error Occured!')</script>";
	}
?>