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
	<?php include("section.html"); ?>
	<!--Section End-->
	<!--Middle Part End-->

		<!--Random Featured Product Start-->
		<div class="box mb0" id="randomfeatured">
		<div class="box-heading-1"><span>Random Featured</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						// Included configuration file in our code.
						include("randomfeatured.php");
					?>
				</div>
			</div>
		</div>
		<!--Random Featured Product End-->

		<!--Special Promo Banner Start-->
		<div class="box-promo" id="box-promo">
			<div class="box-heading-1"><span>PROMO ON FEATURED ITEMS</span></div>
			<div id="banner0" class="banner">
				<div style="display:block;"><img src="image/addBanner-940x145.jpg" alt="Special Offers" title="Special Offers" /></div>
			</div>
		</div>
		<!--Special Promo Banner End-->    	

		<!--Coming Soon Product Start
		<div class="box-heading-1" id="soon">
			<div class="box-heading-1"><span>Brands</span></div>
				<div id="carousel0">
					<ul class="jcarousel-skin-opencart">
		<!--Coming Soon Product Endt--> 
			<ul>
					<!--Carousel Start--> 
					<?php
						// Included configuration file in our code.
						include("brands.php");
					?>
			
					</ul>
				</div>
		</div>
		<!--Carousel End-->

	<!--Footer Part Start-->
		<?php include("footer.php");?>
	<!--Footer Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
 
 
<?php
	
?>
</body>
</html>