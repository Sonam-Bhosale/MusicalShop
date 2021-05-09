<?php
    session_start();
	include'config.php';
	if (isset($_SESSION['user_id'])) { 
		$userid = $_SESSION['user_id']; 
	}
	else { 
		   header('location:index-1.php');
	}
			$fname=mysqli_real_escape_string($conn,$_POST['firstname']);
			$lname=mysqli_real_escape_string($conn,$_POST['lastname']);
			$username = mysqli_real_escape_string($conn,$_POST['txtusername']);
			$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
			$address1 = mysqli_real_escape_string($conn,$_POST['txtaddress1']);
			$mobile = mysqli_real_escape_string($conn,$_POST['txtnumber']);
			//$date=date('y-m-d');
			
			$name = "/^[A-Z][a-zA-Z ]+$/";
			$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
			$number = "/^[0-9]+$/";
			
			if(empty($fname)||empty($lname)||empty($username) || empty($email)||empty($mobile) || empty($address1))
			{
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='updateprofile.php'</script>";

			} 
			else 
			{
				if(!preg_match($name,$fname))
				{
					echo "<script> alert('This fname is not valid..!')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}
				if(!preg_match($name,$lname))
				{
					echo "<script> alert('This lname is not valid..!')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}
				
				if(!preg_match($emailValidation,$email))
				{
					echo "<script> alert('This email is incorrect..!')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}
				
				
				if(!preg_match($number,$mobile))
				{
					echo "<script> alert('This mobile number is incorrect..!.!')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}
				if(!(strlen($mobile) == 10)){
					echo "<script> alert('Mobile number must be 10 digit')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}

				// This first query is just to get the total count of rows
				$sql = "update tblusers set first_name='$fname',last_name='$lname',username='$username',email='$email',address='$address1',phone='$mobile'where userid='$userid'";
				
				$query = mysqli_query($conn, $sql);
				if($query)
				{
					echo "<script> alert('Profile Updated Successfully')</script>";
					echo "<script>window.location.href='index-1.php'</script>";
				}
				else{
					echo"Error".$conn->error;
				echo "<script> alert('Error in Update')</script>";
					echo "<script>window.location.href='updateprofile.php'</script>";
				}
			}		
			// Close your database connection
			mysqli_close($conn);
?>
