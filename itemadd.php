<?php
	session_start();
	include 'config.php';
?>
<html>
<head>
<title>VIEW CATEGORY RECORDS</title>
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
    echo "<meta http-equiv='refresh' content='2;url=../index-1.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>
	<div style="background-color:violet;height:50px;width:100%;">
	<h1 style="margin-top:25px;"align="center">NEW ITEM PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>
	<br><br>
	<center><font color="#660066" size="+3">Add New Item</font></center>
	<br>
	<center><fieldset style="width:50%">
	<form  method="post" action="processitem1.php" enctype="multipart/form-data" >
			<table align="center">
				
				<tr>
					<td width="111"><span class="style3">Category:</span></td>
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
				</td>
				</tr>
				
				<tr>
					<td width="111"><span class="style3">Sub-Category:</span></td>
					<td width="400"><select name=subcat>
					<option value=''>Select One</option>
					<?php
						/*include 'config.php';
						
						$sql="SELECT * FROM tblsubcat,tblcat where tblcat.cat_id =tblsubcat.cat_id ORDER BY tblsubcat.subcat_id ASC";
						
						echo $sql;$result=mysqli_query($conn,$sql);
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
								}*/
					?>
					
					<?php
							include 'config.php';
							$query="select * from tblcat ";
							$res=mysqli_query($conn,$query);
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<option disabled>".$row['cat_name'];
								$q2 = "select * from tblsubcat where cat_id = ".$row['cat_id'];
								$res2 = mysqli_query($conn,$q2) or die("Can't Execute Query..");
								while($row2 = mysqli_fetch_assoc($res2))
								{
									
									echo '<option value="'.$row2['subcat_id'].'"> ---> '.$row2['subcat_name'];
								}
							}
							mysqli_close($conn);
							?>
							

				</select>
				</td>
				</tr>
				<tr>
				  <td><span class="style3">Item Name: </span></td>
				  <td><label><input name="itemname" type="text" id="name" required></label></td>
				</tr>
				<tr>
					<td><span class="style3">Image:</span></td>
					<td><input name="userfile" type="file" required></td></tr>
				<tr>
				  <td><span class="style3">Stock:</span></td>
				  <td><label> <input name="stock" type="text" id="t3" required></label></td>
				</tr>
				<tr>
				  <td><span class="style3">Purchase Price:</span></td>
				  <td><label><input name="price" type="text" id="t4"></label></td>
				</tr>
				<tr>
				  <td><span class="style3">Selling Price:</span></td>
				  <td><label><input name="price1" type="text" id="t5"></label></td>
				</tr>
				
				
				<tr>
					<td><span class="style3">Description:</span></td>
					<td><textarea name="description" cols="35" rows="6" required></textarea></td>
				</tr>
				<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"><input name="clear" type="reset" value="Clear"></td></tr>
			</table>
	</form>
	</fieldset></center>
</body>
</html>