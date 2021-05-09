<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Feedback</title>
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
			 <h4 class="header-line">Feedback\Manage Feedback</h4> 
			 </div>
			 </div>
				<div class="panel panel-info">
					<div class="panel-heading">List of Visitors Feedback</div>

						<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead  align="center">
                                        <tr>
                                            
											<th>Feedback Id</th>
                                            <th>Visitor Name</th>
											
											   <th>Phone No</th>
											 <th>Email</th>
											 <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

	<?php
     
        include("includes/config.php");

		$sql="select * from tblfeedback";
        $result = mysqli_query($conn,$sql); 
            
	if(mysqli_num_rows($result)>0)
	{       
        while($row = mysqli_fetch_array( $result )) {	?>
			<tr class="odd gradeX">
                    
                          <td class="center"><?php echo $row['contact_id'];?></td>
						   <td class="center"><?php echo $row['name'];?></td>
                            <td class="center"><?php echo $row['phoneno'];?></td>
								<td class="center"><?php echo $row['email'];?></td>                                         
							 <td class="center"><?php echo $row['Message'];?></td>
                        
						<td class="center" align="center">

                      
                         <a href="deletefeedback.php?id=<?php echo$row['contact_id'];?>">  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
										<?php $cnt=$cnt+1;}}else
												{
													echo" No any Feedback"; 
													}?>                                      
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