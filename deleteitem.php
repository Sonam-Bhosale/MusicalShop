<?php
	// connect to the database
	include('config.php');
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
 
 var delmsg = confirm("Do you confirm to delete Item <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Item Deletion Confirmed');
		
		location.href='delconfirm.php?type=prod&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Item Deletion Cancelled');
		location.href='viewitem.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href='viewitem.php';</script>

<?php
 }
 
?>


		