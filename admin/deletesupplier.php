<?php
	// connect to the database
	include('includes/config.php');
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
 
 var delmsg = confirm("Do you confirm to delete Supplier <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Supplier Deletion Confirmed');
		
		location.href='delconfirm.php?type=supplier&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Item Deletion Cancelled');
		location.href='manage_supplier.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href='manage_supplier.php';</script>

<?php
 }
 
?>


		