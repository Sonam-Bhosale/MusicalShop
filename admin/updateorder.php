<?php
session_start();
error_reporting(0);
include('includes/config.php');

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
	$oid=intval($_GET['id']);
	if(isset($_POST['submit2']))
	{
		$status=$_POST['status'];	
		$sql=mysqli_query($conn,"update tblorder set o_status='$status' where order_id='$oid'");
		echo "<script>alert('Order updated sucessfully...');</script>";
	}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Update Orders</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<?php
		$sql="SELECT * FROM tblorder where order_id='$oid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{       
			while($row = mysqli_fetch_array( $result )) {
				$date=$row['o_date'];
				$status=$row['o_status'];
			
			}
		}
		else{echo"Error".$conn->error;
		}

?>  
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Orders\<?php echo$status."Order";?>\Update Order</h4>
                                  </div>

				</div>
				
				<div class="row">
				<div class="col-md-3"></div>
<div class="col-md-6 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">Update Order Information</div>
			<div class="panel-body">
			<center>
			<table>
				<form role="form" method="post" action="">
				<div class="form-group">
				
				<tr ><td><label>Order ID:  </label></td><td><?php echo $oid;?><br></td>
				<input name="orderid" type="hidden" id="orderid" value="<?php echo  $oid; ?>">
				</tr>
				
				</div>

				<div class="form-group">
				<td><label>OrderDate</label><br></td>
				<td><input name="date" type="text" id="t2" value="<?php echo $date; ?>"Readonly><br></td>
				</tr></div>
				
				<div class="form-group">
				<td><label align="center"style="top-margin:20px">Status</label></td>
				<td><select name="status" required="required" >
						  <option value="<?php echo $status;?>"><?php echo $status;?></option>
								 <option value="Confirmed">Confirmed</option>
								  <option value="Delivered">Delivered</option>
						</select></td>
				</tr></div>
				
				<tr><td colspan="2" align="center"><button type="submit" name="submit2" class="btn btn-info">Update </button></td>
				</tr>
				</form>
				</table>
				</center>
            </div>
        </div>
	</div>
				

				</div>
   
  </div>
 </div>
	
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>