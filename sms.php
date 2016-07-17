<?php

	include("inc/allclasses.inc.php");
	
	// DB connection 
	$dbconn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
  if ($dbconn->connect_errno) { printf("Connect failed: %s\n", $dbconn->connect_error); exit(); }

	$sender 	= $_REQUEST["sender"];
	$receiver = $_REQUEST["receiver"];
	$keyword = $dbconn->real_escape_string($_REQUEST["keyword"]);
	$fulltext	= $dbconn->real_escape_string($_REQUEST["fulltext"]);
	
	$sender = msisdnSanityCheck($sender); 
	$sender = fixMSISDN($sender);
//	$receiver = fixMSISDN($receiver);

	$sql = "select * from users where msisdn = '$sender'";
	$result = $dbconn->query($sql);

	$auth_code = mt_rand(10000, 99999);

	$sql = "INSERT INTO transactions (msisdn,auth_code,doc,date) VALUES ('$sender','$auth_code','$keyword',NOW())";
	$result = $dbconn->query($sql);

	send_sms($receiver,$sender,'Thank you for accessing e-Kaghzat. Your code is '.$auth_code.'. Please tell this code to the counter personnel for accessing your required document.\n\nhttp://www.e-kaghzat.pk',"sqlbox");

?>