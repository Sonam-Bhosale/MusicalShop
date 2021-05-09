<?php
include('config.php');
 
 $id = $_GET['id'];
 
 $type = $_GET['type'];

 
 
switch($type)
{
	case 'prod':
				$sql="delete from tblitem where cat_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('Item having item id $id has been deleted')</script>";
					echo "<script>window.location.href='viewitem.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
				break;
	
	case 'user':
			$sql="delete from tblusers where userid='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('User Name Having User Id $id has been deleted')</script>";
					echo "<script>window.location.href='viewusers.php'</script>";
				}
				else
				{
					echo "Error deleting record :".$conn->error;
				}
			break;

	
	case 'subcat':
				$sql="delete from tblsubcat where subcat_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('Subcategory $id has been deleted')</script>";
					echo "<script>window.location.href='viewsubcat.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
				break;
			
	
	case 'cat':
			$sql="delete from tblcat where cat_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('Category $id has been deleted')</script>";
					echo "<script>window.location.href='viewcategories.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
			break;
	
} 

?>

 