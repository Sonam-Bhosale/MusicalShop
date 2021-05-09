<?php
    session_start();
	include'config.php';
	if (isset($_SESSION['user_id'])) { 
		$userid = $_SESSION['user_id']; 
	}
	else { 
		   header('location:index-1.php');
	}
	
			$oldpassword= mysqli_real_escape_string($conn,$_POST['txtoldpassword']);
			$newpassword= mysqli_real_escape_string($conn,$_POST['txtnewpassword']);
			$repassword = mysqli_real_escape_string($conn,$_POST['txtcnewpassword']);
			//echo$oldpassword;
			
				/*if(strlen($newpassword) > 9 )
				{
					echo "<script> alert('New Password is weak')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}
				/*if(strlen($repassword) > 9 )
				{
					echo "<script> alert('Repassword is weak!')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}*/
				if($newpassword != $repassword)
				{
					echo "<script> alert('Password is not same')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}
			$password_from_database_query="select password from tblusers where userid='$userid'";
			$password_from_database_result=mysqli_query($conn,$password_from_database_query) or die(mysqli_error($conn));
			$row=mysqli_fetch_array($password_from_database_result);
			//echo $row;
			if($row['password']==$oldpassword){
			$update_password_query="update tblusers set password='$newpassword' where userid='$userid'";
			//echo$update_password_query;
			$update_password_result=mysqli_query($conn,$update_password_query) or die(mysqli_error($conn));
			echo "<script>alert('Your password has been Changed to new password')</script>";
			echo "<script>window.location.href='index-1.php'</script>";
			
		
        ?>
      <!--<meta http-equiv="refresh" content="3;url=index-1.php" />
        <?php
    }else{
		echo"Error".$conn->error;
		echo "<script>alert('Invalid user')</script>";
		echo "<script>window.location.href='change.php'</script>";
		
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
       <!-- <meta http-equiv="refresh" content="1;url=change.php" />
        <?php
        //header('location:settings.php');
    }
?>