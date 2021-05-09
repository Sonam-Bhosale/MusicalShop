<?php
	session_start();
	include 'config.php';
?>
	
<!DOCTYPE html>
<html lang="en">
  <head>
  

    <title>Anusadhan Musical Store</title>

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
				
				<div class="heading">
                        <strong style="color:blue;">Change Password </strong>  
                 </div>
				<form method="post" enctype="multipart/form-data"action="changepassword.php">
					
					
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"  >Old Password</i></span>
						<input type="password" class="form-control text" name="txtoldpassword"  placeholder="Please enter greater than 9 letters,numbers password..."required>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"  >New Password</i></span>
						<input type="password" class="form-control text" name="txtnewpassword" placeholder="Re-type password....">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"  >Confirm Password</i></span>
						<input type="password" class="form-control text" name="txtcnewpassword" placeholder="Re-type password....">
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Change Password" name="btnchange">
						<input type="reset" class="btn btn-danger" value="Reset" onClick="return confirm('Are you sure you want to clear the current information?');">
					</div>
					
				</form>
			</div>
		</div>
		
	</body>
	</html>
	
	

			