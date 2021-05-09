<?php
    session_start();
	include'config.php';
	if (isset($_SESSION['user_id'])) { 
		$userid = $_SESSION['user_id']; 
	}
	else { 
		   header('location:index-1.php');
	}
	
    $oldpassword= mysqli_real_escape_string($con,$_POST['txtoldpassword']);
    $newpassword= mysqli_real_escape_string($con,$_POST['txtnewpassword']);
	$repassword = mysqli_real_escape_string($conn,$_POST['txtcnewpassword']);
				if(strlen($newpassword) >9 )
				{
					echo "<script> alert('New Password is weak')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}
				if(strlen($repassword) >9 )
				{
					echo "<script> alert('Repassword is weak!')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}
				if($newpassword != $repassword)
				{
					echo "<script> alert('Password is not same')</script>";
					echo "<script>window.location.href='change.php'</script>";
				}
			$password_from_database_query="select password from tblusers where userid='$userid'";
			$password_from_database_result=mysqli_query($conn,$password_from_database_query) or die(mysqli_error($conn));
			$row=mysqli_fetch_array($password_from_database_result);
   
			if($row['password']==$oldpassword){
			$update_password_query="update tblusers set password='$newpassword' where userid='$userid'";
			$update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($conn));
			echo "<script>alert('Your password has been updated')</script>";
			echo "<script>window.location.href='index-1.php'</script>";
			
		
        ?>
     
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>