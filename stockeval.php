<?php
	session_start();
	include 'config.php';
?>
<html>
<head>
<title>VIEW STOCK RECORDS</title>
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
	<h1 style="margin-top:25px;"align="center">STOCK REPORT</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>
<br><br>
<?php 
echo"<br><br>";echo "<div style='width:700px; margin:auto;'>";

echo "<table cellspacing=1 bgcolor='#000000' border=0 cellpadding=1 width=100%><th width=60>ItemID</th>
	<th width=250>Item name</th><th width=100>Cost</th><th width=100>QTY Left</th><th>Amount</th>";

	$res = mysqli_query($conn,"select * from tblitem");
	$row = mysqli_num_rows($res);

	for($i=0;$i<$row;$i++){

			$id  = mysql_result($res,$i,"itemid");
			$itemname = mysql_result($res,$i,"item_name");
			$catid =  mysql_result($res,$i,"item_cat");
			$qty =  (int)mysql_result($res,$i,"stock");
			$picture =  mysql_result($res,$i,"image");
			$description = mysql_result($res,$i,"description");
			$itemcost = mysql_result($res,$i,"price");

		$amount = $itemcost * $qty;
		$total = $total + $amount;

	if($qty>=1){
	echo "
		<tr>
		<td align='center'>$id</td>
		<td>$itemname</td>
		<td align='right'>".number_format($itemcost)."</td>
		<td align='center'>$qty</td>
		<td align='right'>".number_format($amount)."</td>
		</tr>";
	}
	}

echo "<tr><td></td><td></td><td></td><td align='center'><b>TOTAL</b></td><td align='right'>
	<font color='#0174d9'><b>P".number_format($total)."</b></font></td></tr>";

echo "</table></div>";
?>