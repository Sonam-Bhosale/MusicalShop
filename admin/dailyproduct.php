<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daily Report of  Products</title>
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
			 <h4 class="header-line">Reports\<a href="productreport.php">Products</a>\Daily\<a href="datewiseproduct.php">DateWise</a>\<a href="weeklyproduct.php">Weekly</a>\<a href="dateinbetweenproduct.php">Date in Between</a>\<a href="monthlyproduct.php">Monthly</a>\<a href="yearlyproduct.php">Yearly</a>\<a href="views.php">Product Views</a></h4> 
			 </div>
			 </div>
			 
				<div class="panel panel-info">
					<div class="panel-heading" align="center">Daily Report of Product</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
                                            <th>#</th>
											<th>Item Id</th>
                                            
											  <th>Item Name</th>
											   <th>Item Image</th>
											    <th>Added Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");
		
			/*$f1="00:00:00";
			$from=date('Y-m-d')." ".$f1;
			$t1="23:59:59";
			$to=date('Y-m-d')." ".$t1;*/
			$date=date('Y-m-d');
			$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id and tblitem.date='$date' ORDER BY tblitem.itemid ASC";
			//echo$sql;
			$result = mysqli_query($conn,$sql); 
			//echo$result;
			$rows=mysqli_num_rows($result);
			//echo $rows;
             $cnt=1;
	if($rows>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                         <td class="center" align="center"><?php echo htmlentities($cnt);?></td>
                          <td class="center"><?php echo $row['itemid'];?></td>
                                          
											 <td class="center"><?php echo $row['item_name'];?></td>
                                            <td class="center"><img width="30px"height="30px"src="../uploads/<?php echo $row['image'];?>"></td>
											 <td class="center"><?php echo $row['date'];?></td>
											 
						
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
		