<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login </title>
	<!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<style>
	body{
		background:url(home.jpg)no-repeat;
				background-size:cover;
	}
	</style>
</head>
<?php
$start = microtime(true);
session_start(); // start a session
if (isset($_SESSION['user_id'])) { 
	$userid = $_SESSION['user_id']; 
}
else { // if it is not set
	$userid = ""; // assign a null value to $userid
}
echo "User ID: " . $userid; //print it on screen.
?>

<?php
$_SESSION['code'] = rand(); 
$code = $_SESSION['code']; 
echo "<br />Code: " . $code; 
?>

<?php
// User is already logged in.
if (isset($_SESSION['username'])) { //check if session username is set
	$User = $_SESSION['username']; // if it is, assign the value to $User
}
else {
	$User = ""; // else $User will be null
}
?>

<!-- Head1 Part Start-->
<?php include("head1.html");?>
<!-- Head1 Part End-->

<!-- Top Part Start-->
<?php 
if($User != "")
{
	include("top_links2.php");
}
else
{
	include("top_links.php");
}
?>
<!-- Top Part End-->


<!-- Main Div Tag Start-->
<div id="wrapper">


	<!-- Header Part Start-->
	<?php 
	if($User != "")
	{
		include("header2.php");
	}
	else
	{
		include("header.php");
	}
	?>
	<!-- Header Part Start-->
	
	<!-- Middle Part Start--> 
	<!-- Section Start--> 
	
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
					<h2>User Login</h2>
				<h5>( Enter correct details to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                   <div class="panel panel-default">
                       <div class="panel-heading">
							<strong style="color:blue;">Enter Details To Login </strong>  
                         </div>
                            <div class="panel-body">
                                <form role="form" action="processlogin.php" method="post"enctype="multipart/form-data">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Enter your Username. . . . ." required autofocus="autofocus"/>
                                        </div>
                                     <div class="form-group input-group">
										<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
										<input type="password" class="form-control text" name="txtpassword" maxlength="10"placeholder="Enter Your password...." required>
									</div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <!--<span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>-->
                                        </div>
                                     
                                     <div class="form-group">
										<input type="submit" class="btn btn-primary" value="Login Now" name="btnlogin">
										<input type="reset" class="btn btn-danger" value="Reset" onClick="return confirm('Are you sure you want to clear the current information?');">
									</div>
                                    <hr />
                                    Not register ? <a href="user_reg.php" >click here </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
	<!--Footer Part Start-->
		<?php include("footer.php");?>
	<!--Footer Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
 
 
<?php
	$end = microtime(true);
	$elapsed = $end - $start;
	echo "Procedure 1 = {$elapsed} seconds";
?>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
