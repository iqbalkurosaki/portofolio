<?php
	include('adodb.inc.php');

	$server = "localhost";
	$user = "gadj9774_ppmh";
	$password = "DB38@ppmh";
	$database = "gadj9774_aman";

	$db_aman = ADONewConnection('mysqli'); #eg 'mysql' or 'postgres'
         $db_aman->debug = false;
         $db_aman->Connect($server, $user, $password, $database);

?>
