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
/*
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
*/
?>
	<div style="background-color:violet;height:50px;width:100%;">
	<h1 style="margin-top:25px;"align="center">STOCK REPORT</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>
<br/><br/>

<?php
	$stockrep =5;
	$sql="select * from tblitem,tblsubcat,tblcat where stock >= '$stockrep' and tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id ORDER BY tblitem.itemid ASC";
	 $result = mysqli_query($conn,$sql); 
        
			if(mysqli_num_rows($result)>0){
                
        // display data in table
      
        
        echo "<table align='center' border='1' cellpadding='10'>";
		
		echo "<tr><th>Item ID</th><th>Category Name</th><th>Subcategory Name</th><th>Item Name</th><th>Stock Left</th></tr>";
        while($row = mysqli_fetch_array( $result )) {	
			
			echo "<tr>";
			echo '<td align=center>' . $row['itemid'] . '</td>';
			echo '<td >' . $row['cat_name'] . '</td>';
			echo '<td >' . $row['subcat_name'] . '</td>';
			echo '<td >' . $row['item_name'] . '</td>';
			
			echo '<td>' . $row['stock'] . '</td>';
			echo "</tr>"; 
		}
		}
		else
		{
			echo "<script>alert('Error')</script>";
			//echo "<script>window.location.href='subcatadd.php';</script>";
		}

        // close table>
        echo "</table>";

?>