<?php
include('includes/config.php');
 
 $id = $_GET['id'];
 
 $type = $_GET['type'];

 
 
switch($type)
{
	case 'prod':
				$sql="delete from tblitem where itemid='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('Item having item id $id has been deleted')</script>";
					echo "<script>window.location.href='manage_product.php'</script>";
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
					echo "<script>window.location.href='manage_subcategory.php'</script>";
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
					echo "<script>window.location.href='manage_category.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
			break;
	case 'supplier':
			$sql="delete from tblsupplier where s_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					echo "<script>alert('Supplier having  $id has been deleted')</script>";
					echo "<script>window.location.href='manage_supplier.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
			break;
	case 'feed':
			$sql="delete from tblfeedack where contact_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					//echo "<script>alert('Feedback of  having  $id has been deleted')</script>";
					echo "<script>window.location.href='manage_Feedback.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
			break;
			
		case 'order':
			$sql="delete from tblorder where order_id='$id'";
				if(mysqli_query($conn,$sql))
				{
					//echo "<script>alert('Feedback of  having  $id has been deleted')</script>";
					echo "<script>window.location.href='pending.php'</script>";
				}
				else
				{
					echo "Error deleting record :".mysqli_error($conn);
				}
			break;
			
	
	
} 

?>

 