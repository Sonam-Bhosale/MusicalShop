
<?php
session_start();
?>

<?php

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
	$userid=$_SESSION['userid'];
}

else
{
	$User = "";
}
if (isset($_SESSION['userid']))
{
	//$User = $_SESSION['username'];
	$userid=$_SESSION['userid'];
}

else
{
	$User = "";
}

?>
<!--Footer Part Start-->
	<footer id="footerWrapper" class="clear" style="background:url(images/aa.jpg);">
        <!--Custom Column Start--> 
<center>		
        <div id="footer" >
        	<div class="column">
            	<h3>Information</h3>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="delivery.html">Delivery Information</a></li>
                    
                </ul>
          	</div>
          	<div class="column">
            	<h3>Contact Info</h3>
				<ul>
              		<li><a href="contact.php"><img src="images/mail.png" width="14px" height="14px"> Contact Us</a></li>
              		<li><img src="images/phone.png" width="14px" height="14px"> 09922933411</li>
              		<li><a href="#" onmouseover="showAddress();" onmouseout="hideAddress();">Address</a></li>
				</ul>
				<div id="AddressDiv" class="AddressDiv">
					<p>Shop 4 Namrta Plaza 132 Karad - 415110</p>
					<p>Opposite Church, Shaniwar Peth </p>
				</div>
          	</div>
          	<div class="column">
			<h3>Login</h3>
            	
            	<ul>
              		<li><a href="login.php">Login</a></li>
            	</ul>
          	</div>
          	<div class="column" >
            	<h3>History</h3>
            	<ul>
              		<li><a href="orderhistory.php?id=<?php echo$userid;?>">Order</a></li>
            	</ul>
          	</div>
      	</div>
        <!--Custom Column End--> 
          
        <div class="powered-main">
        	<div id="powered"><h5 font size="18px">Designed By AnuSadhan Musical  Instrument Store</h5>
            	<div class="fr"><h5>Copyright <a href="default.php">AnuSadhan Musical Instrument</a> Your Online Store &copy; <?php /*$date = date("l, d F, Y");*/echo date("Y") ?></h5></div>
            	<div id="back-top" class="back-to-top"><a class="backtotop" href="javascript:void(0)" title="Back to Top"></a></div>
          	</div>
        </div>
        </center>
  	</footer>
    <!--Footer Part End-->