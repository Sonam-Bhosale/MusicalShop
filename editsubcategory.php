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
			$menuid = $_GET['id'];
			
			//echo $_GET['id']; 
			
			$sql="SELECT * FROM tblsubcat where subcat_id = '$menuid' ";
			
			
			$result = mysqli_query($conn,$sql); 
			
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_array( $result )) 
				{
					$catid = $row['cat_id'];
					$subid = $row['subcat_id'];
					$name = $row['subcat_name'];
					$link = $row['sub_link'];
					$details=$row['details'];
				
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
		$menuid = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>EDIT CATEGORY PAGE</title>
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
	<form   action="confirmeditsubcat.php" method="post" enctype="multipart/form-data" >
		<table align="center">
			<tr>
			  <td><b><span class="style3">ID: <?php echo $menuid;?></span></td>
			  <td><label>
				<input name="subcatid" type="hidden" id="subcatid" value="<?php echo $menuid; ?>">
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
			  <td><span class="style3">Sub-Category Name: </span></td>
			  <td><label>
				<input name="subcatname" type="text" id="t1" value="<?php echo $name; ?>">
			  </label></td>
			</tr>
			<tr>
			  <td><span class="style3">Category Link: </span></td>
			  <td><label>
				<input name="sublink" type="text" id="t2"  value="<?php echo $link; ?>">
			  </label></td>
			</tr>
			<tr>
				<td><span class="style3">Description:</span></td>
				<td><textarea name="text" cols="35" rows="6" ><?php echo $details; ?></textarea></td>
			</tr>
			<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Update Changes"><input name="clear" type="reset" value="Reset"></td></tr>
		</table>
	</form>
	</fieldset></center>
	</body>
	</html>