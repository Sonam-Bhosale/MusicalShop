<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Weekly Report of  Users</title>
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
			 <h4 class="header-line">Reports\<a href="usersreport.php">Users</a></h4>
			 </div>
			 </div>
			 
				<div class="panel panel-info">
					<div class="panel-heading" align="center">Weekly Report of Product</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
                                           <th>#</th>
                                            <th> Name</th>
											 <th>Username</th>
											 <th> Email</th>
											 <th> Phone no</th>
											 <th> Address</th>
											  <th> Date</th>											   
											                                         </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");
		
			
			$sql="select * from tblusers where  date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
			//$sql="SELECT * FROM tblitem WHERE month( date )='$month'";
			//$sql="SELECT * FROM tblcat,tblsubcat,tblitem where tblcat.cat_id =tblsubcat.cat_id and tblitem.item_subcat=tblsubcat.subcat_id and tblitem.date='$date'ORDER BY tblitem.itemid ASC";
			//echo$sql;
		$result = mysqli_query($conn,$sql);			
             $cnt=1;
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                         <td class="center" align="center"><?php echo htmlentities($cnt);?></td>
                           <td class="center"><?php echo$row['first_name'];echo" ".$row['last_name'];?></td>
											 <td class="center"><?php echo $row['username'];?></td>
											  <td class="center"><?php echo $row['email'];?></td>
											 <td class="center"><?php echo $row['address'];?></td>
											    <td class="center"><?php echo $row['phone'];?></td>
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
		