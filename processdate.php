<?php
include 'config.php';
	echo "<table align='center' border='1' cellpadding='10'>";
	
	if(isset($_POST['search']))
	{
			$startdate=$_POST['txtstartdate'];
			echo $startdate;
			$enddate=$_POST['txtenddate'];
			echo $enddate;
			$sql="Select itemid,item_name,image,price from tblitem where date between '$startdate' and '$enddate'order by itemid";
			echo $sql;
			$result=mysqli_query($conn,$sql);
			$result;
			if(mysqli_num_rows($result)>0)	
			{
				
				echo "<tr><th>Item Id</th><th>Item Name</th><th>Image</th><th>Selling Price</th></tr>";
			
						while($row = mysqli_fetch_array( $result )) {	
						// echo out the contents of each row into a table
						echo "<tr>";
						echo '<td align=center>' . $row['itemid'] . '</td>';
						echo '<td>' . $row['item_name'] . '</td>';
						echo '<td>' . $row['image'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						
						}
			}
			elseif(mysqli_num_rows($result)==0)	
			{
				echo "<script>alert('Nothing to display')</script>";
			}
			else
			{
				
				echo "<script>alert('Error in Report')</script>";
	
			}
			
	}
?>
	