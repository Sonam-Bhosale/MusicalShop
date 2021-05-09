<?php
session_start();
?>

<?php

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
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
	
		<!--About Start-->
		<div class="box mb0" id="about_us" >
			<div class="box-heading-1"><span>ABOUT US</span></div>
			<div class="box-content-1">
				<div class="box-product-1">
				<center>
						<p align="center"><h2>Finally your here on the biggest and the most popular site for buying quality musical instruments, we offer the biggest brand guitars and effects only in cheaper price. Finest Accessories, drums and many more payment is simple and easy, so what ya waiting for? 
						explore and see now the difference.
						Anusandhan Musical Instrument store is dealers for delivering instruments to the customer. Anusandhan Musical Instrument in, Karad is amongst the recognised and eminent dealers for a variety of musical instruments.As a time-served player in the music industry, it has developed repute for retailing in various kinds of musical instruments and accessories. This is one-stop shop for a wide segment of musical instruments and equipments and urges to meet the ever-growing needs of the musicians, locally and nation-wide.</p>
				
								
					
					</center>
				</div>
			</div>
		</div>
		<!--About End-->
		
		<!--Special Promo Banner Start-->
		<div class="box-promo" id="box-promo">
			<div class="box-heading-1"><span>PROMO ON FEATURED ITEMS</span></div>
			<div id="banner0" class="banner">
				<div style="display:block;"><img src="images/addBanner-940x145.jpg" alt="Special Offers" title="Special Offers" /></div>
			</div>
		</div>
		<!--Special Promo Banner End--> 

	<!--Footer Part Start-->
		<?php include("footer.php");?>
	<!--Footer Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->

</body>
</html>