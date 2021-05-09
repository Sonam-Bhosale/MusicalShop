<?php
	include 'config.php';
	$sql="select * from tblsupplier where s_id='$id'";

?>
<form action="" id="form1" name="form1" method="POST">
  <table width="500" border="0">
  <tr>
      <td>Supplier ID</td>
      <td><input name="sid" type="text"value=<?echo $sid;?></td>
      <td>Supplier Name</td>
      <td><input name="sname" type="text"value=<?echo $sname;?> readonly></td>
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


