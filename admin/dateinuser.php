<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Date In Between Report of  Users</title>
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
			 <div class="row">
			 <div class="col-md-3"></div>
			 <div class="col-md-9">
				<form method="post" enctype="multipart/form-data">
				<table>
				<div class="form-group">
				<tr>
				
				<td>Enter Start Date:<input type="date" name="txtstartdate"placeholder="yyyy-mm-dd"></td>
				<td>Enter End Date:<input type="date" name="txtenddate"placeholder="yyyy-mm-dd"></td>
				<td colspan="2" align="center"><button type="submit" name="Search" class="btn btn-info">Search </button></td>
				</tr>
				</div>
				
				</table>
			 </form>
			 
			 </div>
			
			 </div> <br>
				<div class="panel panel-info">
					<div class="panel-heading" align="center">Date In Between Report of Product</div>

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
		
			$startdate=$_POST['txtstartdate'];
			$enddate=$_POST['txtenddate'];
			//echo $startdate;
			//echo $enddate;
			
			$sql="SELECT * FROM tblusers where date between '$startdate' and '$enddate' ORDER BY userid ASC";
			//echo $sql;
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
		