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

			td { font-size:18px; font-family:Times New Roman; vertical-align:top; background: #EEEEEE; color: #333333; padding: 5px; }
			input,select{ font-size:14px;font-family:Times New Roman; }
			td:hover{ background: #DDDDDD; color: #FF0000; }
			th { background: #007700; color: #eee; font-family: Times New Roman; font-size: 18px;}
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
	<h1 style="margin-top:25px;"align="center">NEW SUB-CATEGORY PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>
	<center><font color="#660066" size="+3">Add Sub-category</font></center>
	<br><br>
	<center><fieldset style="width:50%">
	<form  method="post" action="processsubcat.php" enctype="multipart/form-data" >
			<table align="center">
				<tr>
					<td width="111"><span class="style3">Main Category:</span></td>
					<td width="400"><select name=cat>
						<option value=''>Select One</option>
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
				  <td><span class="style3">Subcatgory Name: </span></td>
				  <td><label><input name="subcat" type="text" id="subcat"></label></td>
				</tr>	 
				<tr>
				  <td><span class="style3">Subcatgory Link: </span></td>
				  <td><label><input name="subcatlink" type="text" id="subcat"></label></td>
				</tr>	
				<tr>
					<td><span class="style3">Description:</span></td>
					<td><textarea name="description" cols="35" rows="6"></textarea></td>
				</tr>
				<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"><input name="clear" type="reset" value="Clear"></td></tr>
			</table>
	</form>
	</fieldset></center>
</body>
</html>