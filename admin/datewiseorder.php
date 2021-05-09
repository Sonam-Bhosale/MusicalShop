<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DateWise Report of  Order</title>
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
			 <h4 class="header-line">Reports\<a href="orderreport.php">Order</a>\<a href="dailyorder.php">Daily</a>\DateWise\<a href="weeklyorder.php">Weekly</a>\<a href="dateinbetweenorder.php">Date in Between</a>\<a href="monthlyorder.php">Monthly</a>\<a href="yearlyorder.php">Yearly</a>\<a href="category_order.php">Category Wise</a>\<a href="subcategory_order.php">Subcategory Wise</a></h4> 
			 </div>
			 </div>
			 <div class="row">
			 <div class="col-md-4"></div>
			 <div class="col-md-5">
				<form method="post" enctype="multipart/form-data">
				<table>
				<div class="form-group">
				<tr>
				<td><label>Enter Date:&nbsp;</label></td>
				<td><input type="date" name="date" placeholder="yyyy-mm-dd"></td>
				<td><td colspan="2" align="center"><button type="submit" name="Search" class="btn btn-info">Search </button></td>
				</tr>
				</div>
				
				</table>
			 </form>
			 
			 </div>
			
			 </div> <br>
				<div class="panel panel-info">
					<div class="panel-heading" align="center">Datewise Report of Order</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
											<th>#</th>
											<th>Order Id</th>
											<th>User Name</th>
											<th>Item Name</th>
											<th>Order Date</th>	
											<th>Status</th>	
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");
		
			$date=$_POST['date'];
			$sql="SELECT * FROM tblorder,tblusers,tblitem where tblorder.c_id =tblusers.userid and tblitem.itemid=tblorder.i_id and tblorder.o_date='$date' ORDER BY tblorder.order_id ASC";
			
			$result = mysqli_query($conn,$sql); 
             $cnt=1;
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                         <td class="center" align="center"><?php echo htmlentities($cnt);?></td>
                          <td class="center"><?php echo $row['order_id'];?></td>
                                           <td class="center"><?php echo $row['username'];?></td>
											<td class="center"><?php echo $row['item_name'];?></td>
											
											    <td class="center"><?php echo $row['o_date'];?></td>
												 <td class="center"><?php echo $row['o_status'];?></td>
											 
						
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
		