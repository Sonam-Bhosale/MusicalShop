<?php
	session_start();
	include 'config.php';
?>

<?php
 
		include ("config.php");
		$sql="select s_id,s_name from tblsupplier";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_array( $result )) 
			{
				$sid=$row['s_id'];
				$sname=$row['s_name'];
			}
		}
		
		
		
		
?>
<html>
<head>
<title>Add Supplier</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	<style>
			a{text-decoration:none}
			a:hover{background-color:#FFFFFF}

			td { font-size:16px; font-family:Times New Roman; vertical-align:top; background: #EEEEEE; color: #333333; padding: 5px; }
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
	<h1 style="margin-top:25px;"align="center">NEW SUPPLIER PAGE</h1></p></div>

<div align="right">Hi, <strong><?php echo $_SESSION['username'];?></strong> Good To See You Working! || <a href="logout.php"> Logout </a></div>
<br /><center>
<div align="center">
	<?php include("adminmenu.php");?>
</div>
<form action="" id="form1" name="form1" method="POST">
  <table width="500" border="0">
  <tr>
      <td>Supplier ID</td>
      <td><input name="sid" type="hidden" value="<?php echo $sid;?>"readonly</td>
      <td>Supplier Name</td>
      <td><input name="sname" type="text" value="<?php echo $sname;?>" readonly></td>
 </tr>
 <tr>
      <td>Item1<input name="product_name[]" type="text" ></td>
      <td>Quantity<input name="qty[]" type="text" size="5"></td>
	  <td>Price<input name="price" type="text" size="5"></td>
	  <td>total<input name="amount" type="text" value="<?php echo $amount ?>"readonly></td>
 </tr>
 <tr>
      <td>Item2<input name="product_name[]" type="text"  ></td>
      <td>Quantity<input name="qty[]" type="text" size="5" id="qty[]"></td>
	  <td>Price<input name="price" type="text" size="5"></td>
	  <td>total<input name="amount" type="text" value="<?php echo $amount ?>"readonly></td>
 </tr>
  </table>

    <p>
      <input type="submit" name="submit" id="submit" value="Submit">
   </p>
</form>


<?php
		include 'config.php';
		$sname=mysqli_real_escape_string($conn,$_POST['sname']);
		$price=mysqli_real_escape_string($conn,$_POST['price']);
		//$product1=mysqli_real_escape_string($conn,$_POST['product_name']);
		$amount = $price*$qty;
		for($i = 0; $i < count($_POST['product_name']); $i++) 
		{
			$product = $_POST['product_name'][$i];
				for ($j = 0; $j < $_POST['qty'][$i]; $j++) 
				{
					$qty=$_POST['qty'][$i];
					mysqli_query($conn,"INSERT INTO tblsupplier(s_id,s_name,item_name,qty,amount)
					VALUES (null,'$sname',$product','$price','$qty','$amount')");
				}

		}
?>


