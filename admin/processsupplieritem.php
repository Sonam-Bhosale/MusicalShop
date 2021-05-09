<?php
		include 'includes/config.php';
	
		$sid=mysqli_real_escape_string($conn,$_POST['sid']);
		$sname=mysqli_real_escape_string($conn,$_POST['sname']);
		$product = mysqli_real_escape_string($conn,$_POST['product_name1']);
		$price=mysqli_real_escape_string($conn,$_POST['price1']);
		$qty=mysqli_real_escape_string($conn,$_POST['qty1']);
		$amount=$price*$qty;
		$sql="INSERT INTO tblsupplier(s_id,s_name,item_name,price,qty,amount)VALUES ('$sid','$sname','$product','$price','$qty','$amount')";
		$result=mysqli_query($conn,$sql);
		/*
		for($i = 0; $i < count($_POST['product_name']); $i++) 
		{
			$product = $_POST['product_name'][$i];
				for ($j = 0; $j < $_POST['qty'][$i]; $j++) 
					
				{
					$price=$_POST['price'][$i];
					$qty=$_POST['qty'][$i];
					$amount=$price*$qty;
					$sql="INSERT INTO tblsupplier(s_id,s_name,item_name,price,qty,amount)
					VALUES ('$sid','$sname','$product','$price','$qty','$amount')";
						
					
				}

		}*/
		
	
		if($result)
		{
			echo "<script>alert('New Item added')</script>";
			echo "<script>window.location.href='manage_supplier.php';</script>";
		}
		else
		{
			echo "Error:".$conn->error;
			echo "<script>alert('Error in insert!!')</script>";
			echo "<script>window.location.href='addnewitem.php';</script>";
		}
		
		
		
		
	

?>