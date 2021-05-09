<?php
include("config.php");
//extract($_REQUEST);
if(isset($_POST['sub']))
 {
	$name=mysqli_real_escape_string($conn,$_POST['t1']);
	$phone=mysqli_real_escape_string($conn,$_POST['t2']);
	$email = mysqli_real_escape_string($conn,$_POST['t3']);
	//$email=mysqli_real_escape_string($conn,$POST['t3']);
	$mesg=mysqli_real_escape_string($conn,$_POST['t5']);
	
	$sql = "SELECT contact_id FROM tblfeedback WHERE email = '$email' LIMIT 1" ;
				
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_row($query);
				
				// Here we have the total row count
	$rows = $row[0];
			
	if($rows == 0)
	{			
						$insertSQL ="INSERT INTO tblfeedback VALUES ('','$name','$phone','$email','$mesg')";
							
						//$add=mysqli_query($conn, $insertSQL);
						
						if(mysqli_query($conn, $insertSQL))
						{
							echo "<font face='Lucida Handwriting' color='red' size='12px'><script>alert('You are Message Sent successfully..!!')</script>";
							echo "<br />Redirecting to Home Page...";
							
							echo "<script>window.location.href='default.php'</script>";
						}
						else
						{
							echo "<script>alert('An error occured while sending message the entry to database. Please try again later.')</script>";
								echo" Error:".$conn->error;//$insertSQL;
						}
					}
			
					else
					{
						echo "<font color='red'><script>alert('Sorry  Message not sent!!!')</script></font>";
						echo "<script>alert('Redirecting...')</script>";
						echo "<script>window.location.href='contact.php'</script>";
					}
			}
			// Close your database connection
			mysqli_close($conn);
?>
<html>
<head>
<script>
function name()
{
  var name=/^[a-zA-Z]{4,15}$/;
   if(document.f1.t1.value.search(name)==-1)
    {
	 alert("Enter Correct Name");
	 document.f1.t1.focus();
	 return false;
	 }
	} 
		 function phone()
{
  var phone=/^[0-9]{10,15}$/;
   if(document.f1.t2.value.search(phone)==-1)
    {
	 alert("Enter Correct Phone No");
	 document.f1.t2.focus();
	 return false;
	 }
	} 
	function email()
	{
	 var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
	   if(document.f1.t3.value.search(email)==-1)
		{
		 alert("Enter Correct Email");
		 document.f1.t3.focus();
		 return false;
		 }
		} 
			function subj()

	 }
	
function vali()
{

		var name=/^[a-zA-Z]{4,15}$/;
		var phone=/^[0-9]{10,15}$/;
		var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
	
	 var mesg=/^[a-zA_Z0-9]{10,300}$/;
   if(document.f1.t1.value.search(name)==-1)
    {
	 alert("Enter Correct Name");
	 document.f1.t1.focus();
	 return false;
	 }
	 
 
  else if(document.f1.t2.value.search(phone)==-1)
    {
	 alert("Enter Correct Phone No");
	 document.f1.t2.focus();
	 return false;
	 }
	 


   else if(document.f1.t3.value.search(email)==-1)
    {
	 alert("Enter Correct Email");
	 document.f1.t3.focus();
	 return false;
	 }	
   
	 else
	 {
	 return true;
	 }
	}
</script>
</head>
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
	<div>
	<br/>
	<center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">CONTACT US</font></h2></center></div>

			<p align="center"style="font-size:18px;font-color:blue;">For the convenience of their customers, the products at Anusandhan Musical Instrument in are broadly classified as the guitars, pianos, keyboards , traditional instruments, drums kits.
			For any query or feedback ....Please fill up feedback for improving customer satisfaction....
		</p>
		<div style="width:25%;float:left"><br><br><center><fieldset style="width:25%;background-color:#CC99CC"><p><font size="+1" face="Comic Sans MS">We at AnuSandhan Musical Istrument Store value your views and your concerns regarding our products and services. 
We would like to know how we can serve you better. If you have any queries please feel free to drop in your queries at customercarecell@fashionshop.in and we will be happy to assist you.</font></p>
</fieldset>
</center></div>&nbsp;&nbsp;
<div style="width:50%;float:right">
<br><br>
<center><fieldset style="width:25%;border-color:#006633;float:left">
<br><br>
  <form method="post" name="f1" onSubmit="return vali()">
    <table width="300" border="0" align="center">
      <tr>
        <td width="111"><font color="#996699" size="+1" face="Comic Sans MS">Name:</font></td>
        <td width="161"><label>
          <input name="t1" type="text" id="t1" onChange="return name()">
        </label></td>
      </tr>
      <tr>
        <td><font color="#996699" size="+1" face="Comic Sans MS">Phone No: </font></td>
        <td><label>
        <input name="t2" type="text" id="t2" onChange="return phone()">
        </label></td>
      </tr>
      <tr>
        <td><font color="#996699" size="+1" face="Comic Sans MS">Email:</font></td>
        <td><label>
        <input name="t3" type="text" id="t3" onChange="return email()">
        </label></td>
      </tr>
      <tr>
        <td><font color="#996699" size="+1" face="Comic Sans MS">Message:</font></td>
        <td><label>
          <textarea name="t5" id="text" ></textarea>
        </label></td>
      </tr>
	  <tr>
	  <td colspan="2"><center><input name="sub" type="submit" value="Submit"></center>	  </td>
	  </tr> 
    </table>
  

</form>
</fieldset></center>
</div>

</center>


</div>
</body>
</html>
<?php include 'footer.php';?>