<?php
	include('adodb.inc.php');

	$server = "localhost";
	$user = "gadj9774_ppmh";
	$password = "DB38@ppmh";
	$database = "gadj9774_bendahara";

	$db_bendahara = ADONewConnection('mysqli'); #eg 'mysql' or 'postgres'
         $db_bendahara->debug = false;
         $db_bendahara->Connect($server, $user, $password, $database);

?>