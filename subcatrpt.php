<?php
	session_start();
	include 'config.php';
?>
<html>
<head>
<title> View Monthly Added product </title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	<style>
			a{text-decoration:none}
			a:hover{background-color:#FFFFFF}

			td { font-size:16px; font-family:Times New Roman; vertical-align:top; background: #EEEEEE; color: #333333; padding: 5px; }
			input,select{ font-size:14px;font-family:Times New Roman; }
			td:hover{ background: #DDDDDD; color: #FF0000; }
			th { background: #007700; color: #eee; font-family: Times New Roman; font-size: 16px;}
			a, a:visited { color: #0174d9; text-decoration: none; }
			a:hover { text-decoration: underline; }
			.a, .a:visited { color: #101010;  text-decoration: none;}
			.a:hover { background: #eee; text-decoration: none; }
</style>
</head>
<body style="background-color:cyan">

<?php
/*
// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=login.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}
*/
?>
	<div style="background-color:violet;height:50px;width:100%;">
	<h1 style="margin-top:25px;"align="center">MONTHLY ADDED RECORDS PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>

	<br><br>
	<form method="post" >
		<table>
			<tr>
					<td width="111"><span class="style3">Enter Category:</span></td>
					<td width="400"><select name=cat>
					<option value=''>Select One</option>
					<?php
						include 'config.php';
						
						$sql="SELECT * FROM tblcat";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)){
						while($row=mysqli_fetch_array($result))
									{		$catid=$row['cat_id'];
											$catname=$row['cat_name'];
											
									?><option value="<?php echo $catid;?>"><?php echo $catname;?></option>
									<?php
									}	
								}
								else
								{
								echo "<script>window.location.href='itemadd.php';</script>";
								}
					?>
				</select>
				</select>
				</td>
				</tr>
				<tr>
				<td width="111"><span class="style3">Enter Subcategory:</span></td>
					<td width="400"><select name=subcat>
					<option value=''>Select One</option>
					<?php
						include 'config.php';
						
						$sql="SELECT * FROM tblsubcat,tblcat where tblcat.cat_id =tblsubcat.cat_id ORDER BY tblsubcat.subcat_id ASC";
						
						//echo $sql;
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
					
					<?php/*include 'config.php';
							$query="select * from tblcat ";
							$res=mysqli_query($conn,$query);
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<option disabled>".$row['cat_name'];
								$q2 = "select * from tblsubcat where cat_id = ".$row['cat_id'];
								$res2 = mysqli_query($conn,$q2) or die("Can't Execute Query..");
								while($row2 = mysqli_fetch_assoc($res2))
								{
									
									echo '<option value="'.$row2['subcat_id'].'">'.$row2['subcat_name'];
								}
							}
							mysqli_close($conn);*/
							?>
							

				</select>
				</td>
				</tr>
				<tr><td colspan="2">
				<p><input type="submit" name="search" Value="Search"></p></td>
				</tr>
		</table>
		
	</form>
		</form>
<?php 
	echo "<table align='center' border='1' cellpadding='10'>";
	
		if(isset($_POST['search'])){
			$cat=$_POST['cat'];
			$subcat=$_POST['subcat'];
			
			
			
			//$sql="Select * from tblitem where month(date)='02'";// between '01' and '12'";
			$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id  and tblcat.cat_id='$cat' and tblsubcat.subcat_id='$subcat' ORDER BY tblitem.itemid ASC";
			
			$src="uploads/";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
				
			{
				
						echo "<tr><th>Item Id</th><th>Category Name</th><th>Subcategory Name</th><th>Item Name</th><th>Image Name</th></tr>";
						
						while($row = mysqli_fetch_array( $result )) {	
						// echo out the contents of each row into a table
						echo "<tr>";
						echo '<td align=center>' . $row['itemid'] . '</td>';
						echo '<td >' . $row['cat_name'] . '</td>';
						echo '<td >' . $row['subcat_name'] . '</td>';
						echo '<td>' . $row['item_name'] . '</td>';
						
						echo '<td><img src="' . $src . $row['image'] . '" width="30px" height="30"></td>';
						
						}
			}
			else
			{			
						echo "<script>alert('Nothing TO Display')</script>";
	
			}
			
		}
	?>		
	
	</body>
	</html>
	
	
	
	
	