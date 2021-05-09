<?php
	
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
 
 var delmsg = confirm("Do you confirm to delete  category <?php echo $id; ?>?"); 
 
 	if(delmsg==true)
 	{
		alert('Category Deletion Confirmed');
		
		location.href='delconfirm.php?type=cat&id=<?php echo $id; ?>';	
	}
 	else
 	{
		alert('Category Deletion Cancelled');
		location.href='viewcategories.php';
		
	}	
 </script>
 	 
 <?php
	}

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
?>

<script>window.location.href='viewcategories.php';</script>

<?php
 }
 
?>



