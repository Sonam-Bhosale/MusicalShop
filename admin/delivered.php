<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Delivered Order</title>
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
			 <h4 class="header-line">Order\<a href="todays.php">Todays Order</a>\<a href="confirmed.php">Confirm Order</a>\<a href="pending.php">Pending Order</a>\Deliver Order</h4> 
			 </div>
			 </div>
				<div class="panel panel-info">
					<div class="panel-heading">List of Delivered Order</div>

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
											
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");
			$f1="00:00:00";
			$from=date('Y-m-d')." ".$f1;
			$t1="23:59:59";
			$to=date('Y-m-d')." ".$t1;

		 
		$sql="SELECT * FROM tblorder,tblusers,tblitem where tblorder.c_id =tblusers.userid and tblitem.itemid=tblorder.i_id AND tblorder.o_status='Delivered' ORDER BY tblorder.order_id ASC";
		
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
                        
						<td class="center" align="center">

                         <a href="updateorder.php?id=<?php echo $row['order_id'];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Update</button> 
                         <a href="deleteorder.php?id=<?php echo$row['order_id'];?>">  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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

?>