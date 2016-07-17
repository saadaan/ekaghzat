<?php

	$dbServer 			= "localhost";
	$dbPort 			= "3306";
	$dbName 			= "ek";
	$dbUser 			= "root";
	$dbPassword 			= "Tnor123";
	
	$conn = mysql_connect($dbServer, $dbUser, $dbPassword) or die(mysql_error());
	$db = mysql_select_db($dbName, $conn) or die(mysql_error($conn));
	
	
?>
