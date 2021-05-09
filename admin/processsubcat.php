<?php
 		include ("includes/config.php");
		$cat= mysqli_real_escape_string($conn,$_POST['cat']);
		$name = mysqli_real_escape_string($conn,$_POST['subcat']);
		$link= mysqli_real_escape_string($conn,$_POST['subcatlink']);
		$details = mysqli_real_escape_string($conn,$_POST['description']);
		
		if(empty($name)||empty($link)||empty($cat))
			{
				
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='add_subcategory.php'</script>";
				exit();
				
			} 

			$sql = "SELECT COUNT(*) FROM tblcat WHERE cat_name LIKE '$name'";
			
			$query = mysqli_query($conn, $sql);

			$row = mysqli_fetch_row($query);
			
			
			$rows = $row[0];
			
			if($rows == 0)
			{	
				$insertSQL = "INSERT INTO tblsubcat VALUES ('','$cat','$name','$link','$details')";
					
				//$add=mysqli_query($conn, $insertSQL);
				
				if(mysqli_query($conn, $insertSQL))
				{
					echo "<script>alert('Successfully Added!')</script>";
					
					echo "<script>window.location.href='add_subcategory.php'</script>";
				}
				else
				{
					echo "<script>alert('An error occured while uploading the entry to database. Please try again later.')</script>";
						echo" Error:".$conn->error;//$insertSQL;
				}
			}
			
			else
			{
				echo "<font color='red'><script>alert('Sorry This Menu already exists!')</script></font>";
				echo "<script>alert('Redirecting...')</script>";
				echo "<script>window.location.href='add_category.php'</script>";
			}
			
			// Close your database connection
			mysqli_close($conn);
		?>