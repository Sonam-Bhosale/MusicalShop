<?php
 
			include ("config.php");

			$fname=mysqli_real_escape_string($conn,$_POST['firstname']);
			$lname=mysqli_real_escape_string($conn,$_POST['lastname']);
			$username = mysqli_real_escape_string($conn,$_POST['txtusername']);
			$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
			$address1 = mysqli_real_escape_string($conn,$_POST['txtaddress1']);
			$mobile = mysqli_real_escape_string($conn,$_POST['txtnumber']);
			$password = mysqli_real_escape_string($conn,$_POST['txtpassword']);
			$repassword = mysqli_real_escape_string($conn,$_POST['txtcpassword']);
			//$gender=$_POST['gender'];
			$date=date('Y-m-d');
			
			$name = "/^[A-Z][a-zA-Z ]+$/";
			$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
			$number = "/^[0-9]+$/";
			
			if(empty($fname)||empty($lname)||empty($username) || empty($email) || empty($password) || empty($repassword) ||
			empty($mobile) || empty($address1))
			{
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='user_reg.php'</script>";

			} 
			else 
			{
			if(!preg_match($name,$fname))
				{
					echo "<script> alert('This fname is not valid..!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				if(!preg_match($name,$lname))
				{
					echo "<script> alert('This lname is not valid..!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				/*if(!preg_match($name,$username))
				{
					echo "<script> alert('This username is not valid..!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}*/
				if(!preg_match($emailValidation,$email))
				{
					echo "<script> alert('This email is incorrect..!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				
				if(strlen($password) > 9 )
				{
					echo "<script> alert('Password is weak')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				if(strlen($repassword) > 9 )
				{
					echo "<script> alert('Password is weak!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				if($password != $repassword)
				{
					echo "<script> alert('Password is not same')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				if(!preg_match($number,$mobile))
				{
					echo "<script> alert('This mobile number is incorrect..!.!')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}
				if(!(strlen($mobile) == 10)){
					echo "<script> alert('Mobile number must be 10 digit')</script>";
					echo "<script>window.location.href='user_reg.php'</script>";
				}

				// This first query is just to get the total count of rows
				$sql = "SELECT userid FROM tblusers WHERE email = '$email' LIMIT 1" ;
				
				$query = mysqli_query($conn, $sql);

				$row = mysqli_fetch_row($query);
				
				// Here we have the total row count
				$rows = $row[0];
			
					if($rows == 0)
					{	
						$insertSQL ="INSERT INTO tblusers VALUES (NULL,'$fname','$lname','$username','$password','$email','$address1','$mobile','user',1,'$date')";
							
						//$add=mysqli_query($conn, $insertSQL);
						
						if(mysqli_query($conn, $insertSQL))
						{
							echo "<script>alert('You are Registered successfully..!!')</script>";
							echo "<br />Redirecting to Home Page...";
							echo "<script>alert('Login on Main Page!')</script>";
							
							echo "<script>window.location.href='index-1.php'</script>";
						}
						else
						{
							echo "<script>alert('An error occured while uploading the entry to database. Please try again later.')</script>";
								echo" Error:".$conn->error;//$insertSQL;
						}
					}
			
					else
					{
						echo "<font color='red'><script>alert('Sorry This user already exists!')</script></font>";
						echo "<script>alert('Redirecting...')</script>";
						echo "<script>window.location.href='user_reg.php'</script>";
					}
			}
			// Close your database connection
			mysqli_close($conn);
?>