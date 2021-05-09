<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
	//echo "userid: " . $userid;
}

else
{
	$userid = "";
}
?>

<?php
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
//echo "<br />Code: " . $code;
?>
<?php

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
		include'config.php';

		$id=$_POST['Userid'];
		$fname=$_POST['Name'];
		$email=$_POST['Email'];
		$tel=$_POST['tel'];
		$address=$_POST['Address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$date=date('y-m-d');
		$name = "/^[A-Z][a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";
		if(empty($name)||empty($email)||empty($address)||empty($city)||empty($state)||empty($zip))
			{
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='checkout.php'</script>";

			} 
			
			else 
			{
				/*if(!preg_match($name,$fname))
				{
					echo "<script> alert('This name is not valid..!')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				if(!preg_match($name,$city))
				{
					echo "<script> alert('This city is not valid..!')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				
				if(!preg_match($emailValidation,$email))
				{
					echo "<script> alert('This email is incorrect..!')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				
				if(!preg_match($number,$tel))
				{
					echo "<script> alert('This mobile number is incorrect..!.!')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				if(!preg_match($number,$zip))
				{
					echo "<script> alert('This mobile number is incorrect..!.!')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				if(!(strlen($zip) == 6)){
					echo "<script> alert('zip number must be 6 digit')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}
				if(!(strlen($tel) == 10))
				{
					echo "<script> alert('Mobile number must be 10 digit')</script>";
					echo "<script>window.location.href='checkout.php'</script>";
				}*/
			
				$sql = "INSERT INTO billing VALUES (null,'$userid','$fname','$email','$tel','$address','$city','$state','$zip','$date')";
				if(mysqli_query($conn, $sql))
				{
						
							echo "<script>window.location.href='payment.php'</script>";
				}
				else
				{
							echo "<script>alert('An error occured while uploading the entry to database. Please try again later.')</script>";
								echo" Error:".$conn->error;
				}
			}
			
	
			
			// Close your database connection
			mysqli_close($conn)




?>