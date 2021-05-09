<?php
session_start();
include 'config.php';

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<?php

	if(isset($_SESSION['username']))
	{
			include 'config.php';
			$id = $_GET['id'];
			
			//echo $_GET['id']; 
			
			$sql="SELECT * FROM tblitem where itemid = '$id' ";
			
			$result = mysqli_query($conn,$sql); 
			
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_array( $result )) 
				{
					$itemid = $row['itemid'];
					$date=$row['date'];
					$catid = $row['item_cat'];
					$subcatid = $row['item_subcat'];
					$name = $row['item_name'];
					$image = $row['image'];
					$stock = $row['stock'];
					$price1 = $row['purchase_price'];
					$price = $row['price'];
					$details=$row['description'];
				
				}
			}
			else
			{
				echo" Error:".$conn->error;
			}
			
	}
	

	else
	{
		echo "ERROR!!!";
		$id = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>EDIT ITEM PAGE</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	
	<style>
			a{text-decoration:none}
			a:hover{background-color:#FFFFFF}

			td { font-size:18px; font-family:Times New Roman; vertical-align:top; background: #EEEEEE; color: #333333; padding: 5px; }
			input,select{ font-size:14px;font-family:Times New Roman; }
			td:hover{ background: #DDDDDD; color: #FF0000; }
			th { background: #007700; color: #eee; font-family: Times New Roman; font-size: 20px;}
			a, a:visited { color: #0174d9; text-decoration: none; }
			a:hover { text-decoration: underline; }
			.a, .a:visited { color: #101010;  text-decoration: none;}
			.a:hover { background: #eee; text-decoration: none; }
</style>
</head>
<script type="text/javascript">
<!--  Begin


// End -->
</script>
</head>
<body>


	<div style="background-color:violet;height:50px;width:100%;">
	<h1 style="margin-top:25px;"align="center">EDIT PRODUCT PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>


<br />

<br><br>
	
	<br><br>
	<center><fieldset style="width:50%">
	<form   action="confirmeditprod.php" method="post" enctype="multipart/form-data" >
		<table align="center">
			<tr>
			  <td><b><span class="style3">ID: <?php echo $id;?></span></td>
			  <td><label>
				<input name="itemid" type="hidden" id="subcatid" value="<?php echo $id; ?>">
			  </label></td>
			</tr>
			
			<td width="111"><span class="style3">Main Category:</span></td>
					<td width="400"><select name=cat>
						<option value='<?php echo $catid;?>'>Select One</option>
						<?php
								include 'config.php';
	
								$sql="SELECT * FROM tblcat";
								$result=mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
						{		
						$catid=$row['cat_id'];
						$catname=$row['cat_name'];
						
						?>
						<option value="<?php echo $catid;?>"><?php echo $catname;?></option>
						<?php
						}	
					}
					else
					{
						echo "0 result";
					}
?>
				</select>
				</td>
				</tr>
			<tr>
					<td width="111"><span class="style3">Sub-Category:</span></td>
					<td width="400"><select name=subcat>
					<option value=''>Select One</option>
					<?php
						include 'config.php';
						
						$sql="SELECT * FROM tblsubcat";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
									{		$subcatid=$row['subcat_id'];
											$subcatname=$row['subcat_name'];
											
									?><option value="<?php echo $subcatid;?>"><?php echo $subcatname;?></option>
									<?php
									}	
								}
								else
								{
								echo "0 result";
								}
					?>
				</select>
				</td>
				</tr>
				<tr>
				  <td><span class="style3">Item Name: </span></td>
				  <td><label><input name="itemname" type="text" id="name" value="<?php echo $name; ?>"required></label></td>
				</tr>
				<tr>
					<td><span class="style3">Image:</span></td>
					<td><input name="userfile" type="file" value="<?php echo $image;?>"></td></tr>
				<tr>
				  <td><span class="style3">Stock:</span></td>
				  <td><label> <input name="stock" type="text" id="t3"value="<?php echo $stock; ?>"required></label></td>
				</tr>
				<tr>
				  <td><span class="style3">Purchase Price:</span></td>
				  <td><label><input name="price1" type="text" id="t4" value="<?php echo $price1; ?>"></label></td>
				</tr>
				<tr>
				  <td><span class="style3">Selling Price:</span></td>
				  <td><label><input name="price" type="text" id="t2" value="<?php echo $price; ?>"></label></td>
				</tr>
				
				<tr>
					<td><span class="style3">Description:</span></td>
					<td><textarea name="description" cols="35" rows="6"required><?php echo $details; ?></textarea></td>
				</tr>
				<tr><td  colspan="2" align="center"><input name="update" type="submit" value="Update Changes"><input name="clear" type="reset" value="Clear"></td></tr>
			</table>
	</form>
	</fieldset></center>
</body>
</html>