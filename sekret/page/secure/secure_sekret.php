  <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

<?php
	error_reporting(0);	
	session_start();
	include('../../config/config.php');
	/*
	$sql2 = "SELECT * FROM log_sekret WHERE username = '".$_SESSION['FULLNAME']."' AND password='".$_SESSION['FBID']."'";
	$result_ad = $db->Execute($sql2);
	$count2 = $result_ad->RecordCount();
	*/
	function decode($teks){
	return html_entity_decode($teks,ENT_QUOTES);
	};
	function code($teks){
	return htmlentities($teks,ENT_QUOTES);
	};
	
	if($count2!=1){
	die("<div class='alert alert-danger' role='alert'>ilegal access</div>");
	}
?>