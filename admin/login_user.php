<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>view Login User</title>
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
			 <h4 class="header-line">Users\<a href="register_users.php">Register User</a>\Login User</h4> 
			 </div>
			 </div>
				<div class="panel panel-info">
					<div class="panel-heading">List Of Login Users</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
                                            <th>#</th>
											<th>User Id</th>
                                            <th> User Name</th>
											 <th>Login</th>
											  <th>Logout</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");


		$sql="SELECT * FROM tblusers,tbllogin where tblusers.userid=tbllogin.u_id ORDER BY l_id ASC";
        $result = mysqli_query($conn,$sql); 
             $cnt=1;
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                         <td class="center" align="center"><?php echo htmlentities($cnt);?></td>
                         
                                           <td class="center"><?php echo $row['u_id'];?></td>
											 <td class="center"><?php echo $row['u_name'];?></td>
											 <td class="center"><?php echo$row['login'];?></td>
											    <td class="center"><?php echo $row['logout'];?></td>
											 
            
							
                                        </tr>
										<?php $cnt=$cnt+1;}}
										else{
										echo"Error:".$conn->error;
										}								
										?>                                      
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