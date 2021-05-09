<?php
		session_start();
		include "includes/config.php";
		$form_user = mysqli_real_escape_string($conn,$_POST['username']);
		$password = $_POST['txtpassword'];

		if(empty($form_user)||empty($password))
		{
			echo '<script>alert("Please Fill up all fields!");</script>';
			echo "<script>window.location.href='login.php';</script>";	
			exit;
		}
		$sql = "SELECT userid, username, password, ac_type, status FROM tblusers WHERE username = '$form_user' AND password = '$password'";
	
		//instantiate object of query class
		$result = mysqli_query($conn,$sql); 
        $numrows=mysqli_num_rows($result);
		if($numrows>0)
		{
			while ($row = mysqli_fetch_array( $result ))
			{
				$user_id = $row['userid'];
				$username = $row['username'];
				$pass = $row['password'];
				$ac_type = $row['ac_type'];
				$status = $row['status'];
				
				if(($status == "0") AND ($ac_type == "Administrator"))
				{
					$_SESSION['status'] = "admin";
					$_SESSION['username']=$username;
					echo "<script>alert('Welcome Back Webmaster Redirecting to personal home page')</script>";
					echo "<script>window.location.href='admin.php';</script>";
					
				}
				
				else if(($status == "1") AND ($ac_type == "user"))
				{
					$user_id = $row[0];
					$username = $row[1];
					$login=date('y-m-d,h:m:s');
					$logout=null;
					echo "<script>alert('Welcome Back')</script>";
					
					$sql="insert into tbllogin values(null,'$user_id,'$form_user','$password','$login','$logout')";
					//echo $sql;
					$res=mysqli_query($conn,$sql);
					if($res)
					{
						//echo"inserted";
					}
					else
					{
					echo"Error".$conn->error;
					}
					echo "<script>window.location.href='index-1.php';</script>";
					$_SESSION['username'] = $username;
					$_SESSION['username'] = $form_user;
					$User = $_SESSION['username'];
					$_SESSION['user_id'] = $user_id;
					$userid = $_SESSION['user_id'];
					
				}
				
				else
				{
					echo "<script>window.location.href='index-1.php';</script>";
				}
			}
		}
		else
		{
			echo '<script>alert("username and/or password not found! \n\n Signup or Login again");</script>';
			session_unset();
			session_destroy();
			echo "<script>window.location.href='default.php';</script>";
		//exit;
		}
		
	
	/*if($numrows=0)
	{
		
	}
	else
	{
		//store login information to trace user
		$_SESSION['username'] = $form_user;
		$User = $_SESSION['username'];
		$_SESSION['user_id'] = $user_id;
		$userid = $_SESSION['user_id'];
		//$status = $_SESSION['status'];
		
	
	
		//echo "<script>parent.reloadUsers();</script>";
		//echo "<script>window.location.href='index-1.php';</script>";
		//exit;
	}*/
?>
		
	