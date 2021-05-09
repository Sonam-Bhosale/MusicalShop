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
 
 var delmsg = confirm("Do you confirm to delete User <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('User Deletion Confirmed');
		
		location.href='delconfirm.php?type=user&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('User Deletion Cancelled');
		location.href='viewusers.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href='viewusers.php';</script>

<?php
 }
 
?>


		


