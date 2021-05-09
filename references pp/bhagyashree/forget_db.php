 <?php
	require_once('forget_con.php');
 ?>
 <?php 
	  if(isset($_POST['email']) & !empty($_POST['email']))
	  {
			$username = mysqli_real_escape_string($connection, $_POST['email']);
			
			$sql = "SELECT * FROM tbl_user WHERE email = '$username'";
			$res = mysqli_query($connection, $sql);
			$count = mysqli_num_rows($res);
			if($count == 1)
			{
				echo "Send email to user with password";
			}else
			{
				echo "User name does not exist in database";
			}
			
	}



$r = mysqli_fetch_assoc($res);

$password = $r['password'];
//echo $password."<br>";

$to = $r['email'];
//echo $to."<br>";

$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
//echo $message."<br>";

$headers = "From :'bhagi.web@gmail.com'";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}
	  ?>