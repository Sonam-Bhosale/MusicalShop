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
	<h1 style="margin-top:25px;"align="center">NEW CATEGORY PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>

	<br><br>
	<center><font color="#660066" size="+3">Add Category</font></center>
	<br><br>
	<center><fieldset style="width:50%">
	<form  name="testform" action="processcat.php" method="post" enctype="multipart/form-data" >
		<table align="center">
			<tr>
			  <td><span class="style3">Category Name: </span></td>
			  <td><label>
				<input name="catname" type="text" id="t1">
			  </label></td>
			</tr>
			<tr>
			  <td><span class="style3">Category Link: </span></td>
			  <td><label>
				<input name="catlink" type="text" id="t2">
			  </label></td>
			</tr>
			<tr>
				<td><span class="style3">Description:</span></td>
				<td><textarea name="text" cols="35" rows="6"></textarea></td>
			</tr>
			<tr><td  colspan="2" align="center"><input name="sub" type="submit" value="Submit"><input name="clear" type="reset" value="Reset"></td></tr>
		</table>
	</form>
	</fieldset></center>
	</body>
	</html>
	