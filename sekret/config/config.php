<?php
	include('adodb.inc.php');

	$server = "localhost";
	$user = "gadj9774_ppmh";
	$password = "DB38@ppmh";
	$database = "gadj9774_ppmh";

	$db = ADONewConnection('mysqli'); #eg 'mysql' or 'postgres'
         $db->debug = false;
         $db->Connect($server, $user, $password, $database);

?>
