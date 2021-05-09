<?php
	session_start();
	include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
  

    <title>Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
		<style>
			body
			{	
				background:url(reg.jpg)no-repeat;
				background-size:cover;
				
			}
			#form
			{
				background-color:#84e184;
				min-height=700px;
				padding 5px 40px 40px 40px;
				margin-top:50px;
			}
			.reg
			{
				font-size:40px;
				font-family:Agency FB;
				font-weight:700;
				border-bottom-style:ridge;
			}
			.heading
			{
				font-size:20px;
				font-family:san-serif;
				font-weight:100;
				text-align:center;
			}
			.text
			{
				height:43px;
			}				
			label
			{
					font-size:20px;
			}
			h5{
				font-size:16px;
				font-family:calibri;
				font-weight:100;
				text-align:center;
			}
		
		</style>
		
  </head>
  <body >
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="form">
				<center><b class="reg">User Registration</b></center>
						<h5>( Enter correct details to get access )</h5>
				<div class="heading">
                        <strong style="color:blue;">  New User ? Enter your detail </strong>  
                 </div>
				<form method="post" enctype="multipart/form-data"action="ConfirmReg.php">
					
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
						<input type="text" class="form-control text" name="firstname" placeholder="Enter Like First Name. . "autofocus="autofocus" onkeypress="acceptw()"required/>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
						<input type="text" class="form-control text" name="lastname" placeholder="Enter Like Last Name. . "autofocus="autofocus"onkeypress="acceptw()" required/>
					</div>					
						<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
						<input type="text" class="form-control text" name="txtusername" placeholder="Enter Like User Name... "autofocus="autofocus" required/>
					</div>
					
					<div class="form-group input-group">
						<span class="input-group-addon">@</span>
						<input type="text" class="form-control text" name="txtemail" placeholder="xyz@gmail.com"required>
					</div>
							
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-road"  ></i></span>
						<input type="text" class="form-control text" name="txtaddress1" placeholder="Enter Address...."required>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-mobile"  ></i></span>
						<input type="text" class="form-control text" name="txtnumber" placeholder="Enter Mobile Number..."required>
					</div>
						
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
						<input type="password" class="form-control text" name="txtpassword" maxlength="10" placeholder="Please enter greater than 9 letters,numbers password..."required>
					</div>
					
						
						<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
						<input type="password" class="form-control text" name="txtcpassword" maxlength="10"placeholder="Re-type password....">
					</div>
					
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Register" name="btnregister">
						<input type="reset" class="btn btn-danger" value="Reset" onClick="return confirm('Are you sure you want to clear the current information?');">
					</div>
					Already a User ?  <a href="login.php" >Login here</a>
				</form>
			</div>
		</div>
		<div><?php include "footer1.html";?></div>
	</div>
	</body>
	</html>
	
	

			