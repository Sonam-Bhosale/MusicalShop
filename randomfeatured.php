<?php
	include("config.php");

	$sql = "SELECT COUNT(*) FROM tblitem";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 12;
	$limit = 'LIMIT ' . $page_rows;
	

	$sql = " SELECT * FROM tblitem ORDER BY RAND( ) " . $limit ;

	$query = mysqli_query($conn, $sql);
	
	$textline1 = "Random Items - Refresh To View More Items";

	$list = '';

	$src = "uploads/";

	if(!isset($_SESSION['username']))
	{
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
		
			$id = $row["item_id"];
			$prodname = $row["item_name"];
			$path = $row["image"];
			$category = $row["item_subcat"];
			$price = "Rs. " . $row["price"];
			$desc = $row["description"];
			$width="150px";
			$height="150px";

		/*$list .='
		<div>
		 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
		 $list .='
		   <div class="proName">
			<div class="name"><a href="' . $src . $path . '">' . $prodname . '</a></div>
			<div class="price">' . $price . '</div>
			<div class="cart">
				<label class="btn">';
										
				$list .='
				</label>
			</div>
		  </div>
		</div>
		'; */$list .='
		<div>
		 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
		 $list .='
		   <div class="proName">
			<div class="name"><a href="' . $src . $path . '">' . $desc . '</a></div>
			<div class="price">' . $price . '</div>
			<div class="cart">
				<label class="btn">';
				
				$list .='<form method="post" action="login.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';
									
				$list .='
				</label>
			</div>
		  </div>
		</div>
		'; 

		}
	}

	else
	{
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		{
		
		$id = $row["itemid"];
		$prodname = $row["item_name"];
		$path = $row["image"];
		$category = $row["item_subcat"];
		$price = "Rs. " . $row["price"];
		$desc = $row["description"];
		$width="150px";
		$height="150px";

		$list .='
		<div>
		 <div class="image"><a href="' . $src . $path . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $path . '" alt = "' . $prodname . '"></a></div>';
		 $list .='
		   <div class="proName">
			<div class="name"><a href="' . $src . $path . '">' . $desc . '</a></div>
			<div class="price">' . $price . '</div>
			<div class="cart">
				<label class="btn">';
				
				$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';
									
				$list .='
				</label>
			</div>
		  </div>
		</div>
		'; 

		}
	}
		// Close your database connection
		mysqli_close($conn);

		if($rows == 0)
		{
			echo "<h2>Nothing to display</h2>";
		}
		
		else
		{
			echo "<h2 align='center'>" . $textline1 . "</h2>";
			echo $list;
		}
?>