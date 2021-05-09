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
				<td>Enter Year <input type="year" name="txtyear" placeholder="Enter Year"></td>
				<td><p><input type="submit" name="search" Value="Search"></p></td>
			</tr>
		</table>
		
	</form>
		</form>
<?php 
	echo "<table align='center' border='1' cellpadding='10'>";
	
		if(isset($_POST['search'])){
			$year=$_POST['txtyear'];
			
			
			//$sql="Select * from tblitem where month(date)='02'";// between '01' and '12'";
			$sql="SELECT * FROM tblitem WHERE year( date )='$year'";
			echo $sql;
			//$sql1="select month(date) as month from tblitem";
			//echo $sql1;
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
				
			{
				
				echo "<tr><th>Item ID</th><th>Item Name</th><th>Image</th></tr>";
						//$month=month(date);
						while($row = mysqli_fetch_array( $result )) {	
						// echo out the contents of each row into a table
						echo "<tr>";
						echo '<td align=center>' . $row['itemid'] . '</td>';
						echo '<td>' . $row['item_name'] . '</td>';
						echo '<td><img height=50px width=50px src='.$src.$row['image'] . '></td>';
						//echo '<td>'.$month.'</td>';
						
						}
			}
			else
			{
				
						echo"Error".$conn->error;
						echo "<script>alert('Nothing TO Display')</script>";
	
			}
			
		}
	?>		
	
	</body>
	</html>
	
	
	
	
	