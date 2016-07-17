<?php
 
		include("config.php");
	
class keywordO
{
	var $keyword, $fulltext;
	
		public function __construct($keyword,$fulltext) 
 		{
	  	 include("config.php");
			 $this->dbconn = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);
			 if ($this->dbconn->connect_errno) { printf("Connect failed: %s\n", $this->dbconn->connect_error); exit(); }//end if
			 $this->keyword = $keyword;
			 $this->fulltext = $fulltext;
  	} // end function construct

		function lowCase()
		{
			return strtolower($keyword);
		} //end function lowCase 

		function positive_int()
		{
			if((!(ctype_digit($this->keyword)))||(!($this->keyword > "0"))) { return false; } //end if
			else { return true; } //end else
		} //end function positive_int

	
} //end class keywordO


	function msisdnSanityCheck($msisdn) {

		//Performs sanity checks on SMS sending number to keep away extras like masked SMS, etc. Returns the result.
					
					if(strlen($msisdn) < '11') {
						die("Function msisdnSanityCheck failed for $msisdn");
					}
					else {
						echo "msisdnSanityCheck OK for ".$msisdn."<br>";
						return $msisdn;
					}
	}
	
	function fixMSISDN($msisdn) {

		//Fix MSISDN format. Removes extra characters and +92 (if any).
		//Input: +923455003289
		//Output: 03455003289
	
			if (preg_match("/\+92/",$msisdn)) {
					$msisdn_new   = trim(str_replace("+92","0",$msisdn));
					echo "fixMSISDN: ".$msisdn." changed to ".$msisdn_new." <br>";
					return $msisdn_new;
			}
			else {
				echo "fixMSISDN: No changes to ".$msisdn." <br>";
				return $msisdn;
			}
	}
	

function send_sms($smsfrom,$smsto,$msg) 
{
		 global $dbServer,$dbUser,$dbPassword,$dbName;
		 $dbguy = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);
		 if ($dbguy->connect_errno) { printf("Connect failed: %s\n", $dbguy->connect_error); exit(); }

 		$sql = "INSERT into kannel.send_sms (momt,charset,coding,sender,receiver,msgdata,smsc_id,sms_type,dlr_mask,dlr_url,boxc_id) 
 		VALUES ('MT','','','$smsfrom','$smsto','$msg','$smsfrom','2','31','','mobile')";
//http://127.0.0.1/smsplug/dlr.php?dlrid=$dlr_id&status=%d
		$result = $dbguy->query($sql) or die("db error on line ".$dbguy->error.__LINE__);				

		$send_path."---".$smsfrom."---".$smsto."---".$msg."<br>";
}

?>