<?php
session_start();
?>

<!DOCTYPE html>
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
<div style="background-color:violet;height:50px;width:100%;">
	<h1 style="margin-top:25px;"align="center">VIEW CATEGORY RECORDS</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<br>
<center><font color="#660066" size="+3">Feedback</font></center>
<br>
</body>
<?php
		include("config.php");

$sel=mysqli_query($conn,"select * from tblfeedback");
if($sel>0){
while($arr=mysqli_fetch_array($sel))
  {
     $i=$arr['item
	 no'];
	
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	
	<td><h3>Details</h3><b>Visitor:</b> ".$arr['name']."<br>
	<b>Phone No:</b> ".$arr['phoneno']."<br>
	<b>Email:</b> ".$arr['email']."<br>
	<b>Message:</b> ".$arr['Message']."<br></td>
</tr>
	</table>
</fieldset><br>
</center>";
}
}
else{
	echo"No any feedback";
	}

	
	?>
