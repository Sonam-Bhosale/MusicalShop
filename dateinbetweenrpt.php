<?php
	session_start();
	include 'config.php';
?>
<html>
<head>
<title>VIEW DATE IN BETWEEN PRODUCT RECORDS 
	

<html>
<head>
<title>VIEW DATEWISE PRODUCT RECORDS</title>
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
	<h1 style="margin-top:25px;"align="center">DATEWISE PRODUCT RECORDS PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>

	<br><br>
	<form method="post" >
		<table>
			<tr>
				<td>Enter Start Date<input type="date" name="txtstartdate"placeholder="20-02-19"></td>
				<td>Enter End Date<input type="date" name="txtenddate"placeholder="20-03-19"></td>
			</tr>
		</table>
				<p><input type="submit" name="search" Value="Search"></p>
	</form>
	<?php
	include 'config.php';
	echo "<table align='center' border='1' cellpadding='10'>";
	$src="uploads/";
	if(isset($_POST['search']))
	{
			$startdate=$_POST['txtstartdate'];
			//echo $startdate;
			$enddate=$_POST['txtenddate'];
			//echo $enddate;
			$sql="Select itemid,item_name,image,price from tblitem where date between '$startdate' and '$enddate'order by itemid";
			//echo $sql;
			$result=mysqli_query($conn,$sql);
			//$result;
			if(mysqli_num_rows($result)>0)	
			{
				
				echo "<tr><th>Item Id</th><th>Item Name</th><th>Image</th></tr>";
			
						while($row = mysqli_fetch_array( $result )) {	
						// echo out the contents of each row into a table
						echo "<tr>";
						echo '<td align=center>' . $row['itemid'] . '</td>';
						echo '<td>' . $row['item_name'] . '</td>';
						//echo '<td>'.$src.$row['image'] . '</td>';
						//echo '<td>' . $row['price'] . '</td>';
						echo '<td><img height=50px width=50px src='.$src.$row['image'] . '></td>';
						
						}
			}
			elseif(mysqli_num_rows($result)==0)	
			{
				echo "<script>alert('Nothing to display')</script>";
			}
			else
			{
				
				echo "<script>alert('Error in Report')</script>";
	
			}
			
	}
?>
			
			
	
	</body>
	</html>
	
	
	
	
	