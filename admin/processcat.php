<?php
 
		include ("includes/config.php");

		$name = mysqli_real_escape_string($conn,$_POST['catname']);
		$link = mysqli_real_escape_string($conn,$_POST['catlink']);
		$details = mysqli_real_escape_string($conn,$_POST['text']);
			if(empty($name)||empty($link))
			{
				
				echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='add_category.php'</script>";
				exit();
				
			} 
			else
			{
			// This first query is just to get the total count of rows
				$sql = "SELECT COUNT(*) FROM tblcat WHERE cat_name LIKE '$name'";
				
				$query = mysqli_query($conn, $sql);

				$row = mysqli_fetch_row($query);
				
				// Here we have the total row count
				$rows = $row[0];
				
				if($rows == 0)
				{	
					$insertSQL = "INSERT INTO tblcat VALUES ('','$name','$link','$details')";
						
					//$add=mysqli_query($conn, $insertSQL);
					
					if(mysqli_query($conn, $insertSQL))
					{
						echo "<script>alert('Successfully  Category Added!')</script>";
						
						echo "<script>window.location.href='add_category.php'</script>";
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
			}
			
			// Close your database connection
			mysqli_close($conn);
		?>