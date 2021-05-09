<?php
	
	include('includes/config.php');
	//$status=$_GET['status'];
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$id = $_GET['id'];
		if($id=="")
		{
		?>
        <script language="javascript">
 
 			alert('Nothing Selected.');
 
 		</script>
        <?php
		exit;
	}
	else
	{
?>
 
 <script language="javascript">
 
 var delmsg = confirm("Do you confirm to delete  Order <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Order Deletion Confirmed');
		
		location.href='delconfirm.php?type=order&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Order Deletion Cancelled');
		location.href='pending.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href='pending.php';</script>

<?php
 }
 
?>



