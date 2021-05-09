<?php
	session_start();
	include 'config.php';
?>
<html>
<head>
<title>VIEW PRODUCT RECORDS</title>
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
	<h1 style="margin-top:25px;"align="center">NEW PRODUCT PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>


<?php


        // connect to the database
        include("config.php");
		$src="Uploads/";
        // get results from database
		//$sql="SELECT * FROM tblitem ORDER BY itemid ASC";
		$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id ORDER BY tblitem.itemid ASC";
        $result = mysqli_query($conn,$sql); 
        
			if(mysqli_num_rows($result)>0){
                
        // display data in table
        echo "<p align=left><b>View All</b> | <a href='itemadd.php'>Add New Item</a>|<a href='datewisereport.php'>DateWise Report</a>|<a href='dateinbetweenrpt.php'>Date In Between Report</a>| <a href='monthrpt.php'>Monthly</a>|<a href='yearrpt.php'>Yearly</a>|<a href='viewreport.php'>Number of Views</a></p>";
        
        echo "<table align='center' border='1' cellpadding='10'>";
		
		echo "<tr><th>Item Id</th><th>Category Name</th><th>Subcategory Name</th><th>Item Name</th><th>Image Name</th><th>Stock</th><th>Purchase Price</th><th>Selling Price</th><th>Details</th><th>Image</th><th>Join Date</th><th colspan=2>Action</th> </tr>";
		
		

        while($row = mysqli_fetch_array( $result )) {	
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td align=center>' . $row['itemid'] . '</td>';
			echo '<td >' . $row['cat_name'] . '</td>';
			echo '<td >' . $row['subcat_name'] . '</td>';
			echo '<td>' . $row['item_name'] . '</td>';
			echo '<td>' . $row['image'] . '</td>';
			echo '<td>' . $row['stock'] . '</td>';
			echo '<td>' . $row['purchase_price'] . '</td>';
			echo '<td>' . $row['price'] . '</td>';
			echo '<td>' . $row['description'] . '</td>';
			echo '<td><img src="' . $src . $row['image'] . '" width="30px" height="30"></td>';
			echo '<td>' . $row['date'] . '</td>';
			echo '<td><a href="edititem.php?id=' . $row['itemid'] . '">Edit</a></td>';
			echo '<td><a href="deleteitem.php?&id=' . $row['itemid'] . '">Delete</a></td>';
			
			
			echo "</tr>"; 
		}}
		else
		{
			echo "<script>window.location.href='itemadd.php';</script>";
		}

        // close table>
        echo "</table>";
?>
</body>
</html>