<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Subategories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
			<div class="row pad-botm">
            <div class="col-md-12">
			 <h4 class="header-line">Subcategory\<a href="add_subcategory.php">Add Subategory</a>\Manage Subcategories</h4> 
			 </div>
			 </div>
				<div class="panel panel-info">
					<div class="panel-heading">List Of Subcategory</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
                                            <th>#</th>
											<th>Subcat Id</th>
                                            <th>Category Name</th>
											 <th>Subcategory Name</th>
											 <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");

  		$sql="SELECT * FROM tblcat,tblsubcat where tblcat.cat_id =tblsubcat.cat_id ORDER BY tblsubcat.subcat_id ASC";
        $result = mysqli_query($conn,$sql); 
             $cnt=1;
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                         <td class="center" align="center"><?php echo htmlentities($cnt);?></td>
                          <td class="center" align="center"><?php echo $row['subcat_id'];?></td>                   
                          <td class="center"><?php echo $row['cat_name'];?></td>
						  <td class="center" align="center"><?php echo $row['subcat_name'];?></td>
                         <td class="center"><?php echo $row['details'];?></td>
						<td class="center" align="center">

                         <a href="edit_subcategory.php?id=<?php echo $row['subcat_id'];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                         <a href="deletesubcategory.php?id=<?php echo$row['subcat_id'];?>">  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
										<?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

		

</div>
    
    

<br>
<br>
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
							
<?php
/*
   // connect to the database
	 // echo "<p align=left><b>View All</b> |  <a href='cat.php'>Enter New Category</a>|<a href='catrpt.php'> Category Wise Product Report</a></p>";  
        include("includes/config.php");

        // get results from database
		$sql="SELECT * FROM tblcat ORDER BY cat_id ASC";
        $result = mysqli_query($conn,$sql); 
             
	if(mysqli_num_rows($result)>0)
	{
                
        // display data in table
			
        
        echo "<table align='center' border='1' cellpadding='10'>";
	
		echo "<tr align='center'><center><th>Category Id&nbsp;&nbsp;</th> <th>Category Name</th><th>Details</th><th colspan=2>Action</th> </center></tr>";
		
		

        while($row = mysqli_fetch_array( $result )) {	
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td align=center>' . $row['cat_id'] . '</td>';
			echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;' . $row['cat_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;</td>';
			//echo '<td>' . $row['cat_link'] . '</td>';
			echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;' . $row['detail'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
			echo '<td><a href="edit_category.php?id=' . $row['cat_id'] . '">&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a></td>';
			echo '<td><a href="deletecategory.php?&id=' . $row['cat_id'] . '">&nbsp;&nbsp;&nbsp;&nbsp;Delete&nbsp;&nbsp;&nbsp;&nbsp;</a></td>';
			echo "</tr>"; 
		}}
		else
		{
			echo "<script>alert('Error')</script>";
			echo "<script>window.location.href='add_category.php';</script>";
		}

        // close table>
        echo "</table>";
?>

<br>
<br>
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
</html>*/
?>