<?php

	error_reporting(1);
	//db connection settings
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="test"; // Database name

	$conn = mysqli_connect($host, $username, $password,$db_name);// or trigger_error(mysql_error(mysql_error(),E_USER_ERROR)
	//mysql_select_db($db_name, $conn) or die("could not" . mysql_error());
?>
