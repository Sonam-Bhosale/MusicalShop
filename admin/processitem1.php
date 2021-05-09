<?php
 		include ("includes/config.php");
		$date=date('Y-m-d');
		$cat= mysqli_real_escape_string($conn,$_POST['cat']);
		$subcat= mysqli_real_escape_string($conn,$_POST['subcat']);
        $itemnm =mysqli_real_escape_string($conn,$_POST['itemname']);
        $qty = mysqli_real_escape_string($conn,$_POST['stock']);
		$p_price = mysqli_real_escape_string($conn,$_POST['price']);
		$price = mysqli_real_escape_string($conn,$_POST['price1']);
        $des =mysqli_real_escape_string($conn,$_POST['description']);
        $target_file='../uploads/';
        $imagetmp=basename($_FILES['userfile']['name']);
		
		$location1 = $target_file.$_FILES['userfile']['name'];
		
		$noviews=1;
		if(empty($cat)||empty($subcat)||empty($qty)||empty($itemnm)||empty($p_price)||empty($price))
		{
			echo "<script> alert('Please Fill all fields..!')</script>";
				echo "<script>window.location.href='add_product.php'</script>";
				exit();
		}
           
          if($imagetmp=="")   
          {
			  echo	$image_name;
		 $image_name="No image";
			  
          }   
          else
          {
			$image_name= $imagetmp;
			
               
          }
		 /* if(file_exists($target_file))
		  {
			echo "<script>alert('Sorry,file already exists')</script>";
			echo "<script>window.location.href='add_product.php'</script>";
			exit();
			
		  }*/
  
       
		move_uploaded_file($_FILES['userfile']['tmp_name'], $location1);

				
				
               $sql = "INSERT INTO tblitem  VALUES ('','$date','$cat','$subcat','$itemnm','$image_name','$qty','$p_price','$price','$des','$noviews')";
					
				//$add=mysqli_query($conn, $insertSQL);
				
				if(mysqli_query($conn, $sql))
				{
					echo "<script>alert('Item Successfully Added!')</script>";
					
					echo "<script>window.location.href='add_product.php'</script>";
				}
				else
				{
					echo "<script>alert('An error occured while uploading the entry to database. Please try again later.')</script>";
						echo" Error:".$conn->error;
				}
			
			
			// Close your database connection
			mysqli_close($conn);
		?>