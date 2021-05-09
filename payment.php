
<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
	echo "userid: " . $userid;
}

else
{
	$userid = "";
}
?>

<?php
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
echo "<br />Code: " . $code;
?>


<?php
// User is already logged in. Redirect them somewhere useful.
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

<article>
    <fieldset>
    <h2 style="color:black; text-align:center; font:verdana; font-  
     size:100%"><b><u>Pay Now</u></b></h2>
        <br>
        <br>
        <p>Please select a method of payment below :</p>
        <br>
        <form action="confirmcheckout.php"method="post">
			<label><input value="1" type="radio" name="paymentmode"onclick="displayForm(this)">Cash On Delivery</label>
		
         <label><input value="2" type="radio" name="paymentmode" 
    onclick="displayForm(this)">Via Credit Card</label>
         
        <input type="submit" value="Submit">
        
              
        </form>

        <form style="visibility:hidden" id="ccform">
		<br><br><label><h3>Enter your credit 
      card details :</h3></label>
            <br>
            <br>
        <dd><p>Credit Card Name : <input type="text" id="ccname" 
       name="ccname" value="$ccname" required></p>
               

       <p>Credit Card Number : <input  type="text" size="15" maxlength="14" name="Card" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></p>
                <p>Credit Expiry Date : Month : <select 
          name="ccexpdatemonth" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>
                <span>Year : <select name="ccexpdateyear" required>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
				 <option value="2022">2022</option>
				  <option value="2023">2023</option> 
				  <option value="2024">2024</option>
				
                </select></span>
        <p>Credit Card CVC : <input type="text" maxlength="3" id="cccvc" 
       name="cccvc" value="$cccvc" required></p>
             
            </form>
            
        
    </fieldset>
    </article>  
	<script type="text/javascript"> 
        function displayForm(c)
		{ 
				if(c.value == "2")
				{ 

					 document.getElementById("ccform").style.visibility='visible'; 
					 document.getElementById("paypalform").style.visibility='hidden'; 
				} 
            else{ 
			document.getElementById("ccform").style.visibility='hidden'; 
            } 
         } 
					function isCard()
					{
						T = document.forms[1].elements[2].value;
						T1=document.forms[1].elements[4].value;
						if(T == "")
						{
							alert("Credit Card cannot be blank")
							document.forms[1].elements[2].focus();
							return false;                
						}

						else
						{
							if(T == 0)
							{
							alert("Credit Card cannot be less or equal to zero");
							document.forms[1].elements[2].focus();
							return false;  
							}

							else
							{
								if(T.length<12)
								{
								alert("Credit Card Number must be 12 digits");
								document.forms[1].elements[2].focus();
								return false;  
								}

								else
								{
									if(T.indexOf(".")==1)
									{
										alert("Credit Card cannot contain dot sign");
										document.forms[1].elements[2].focus();
										return false;  
									}

									return true;
								}
							}
						}
						if(T1 == "")
						{
							alert("CVC Number cannot be blank")
							document.forms[1].elements[4].focus();
							return false;                
						}

						else
						{
							if(T == 0)
							{
							alert("CVC Number cannot be less or equal to zero");
							document.forms[1].elements[4].focus();
							return false;  
							}

							else
							{
								if(T.length<3)
								{
								alert("CVC Number must be 3 digits");
								document.forms[1].elements[4].focus();
								return false;  
								}

								else
								{
									if(T.indexOf(".")==1)
									{
										alert("CVC Number cannot contain dot sign");
										document.forms[1].elements[4].focus();
										return false;  
									}

									return true;
								}
							}
						}
					}		 
    </script>

<!--Footer Part Start-->
		<?php include("footer.php");?>
	<!--Footer Part End-->

<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>	