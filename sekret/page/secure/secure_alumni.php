 <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
	error_reporting(0);
	
	include('../../config/config.php');
	$sql = "SELECT * FROM alumni WHERE email = '".$_SESSION['FULLNAME']."' AND password='".$_SESSION['FBID']."'";
	$result = $db->Execute($sql);
	$count = $result->RecordCount();
	function decode($teks){
	return html_entity_decode($teks,ENT_QUOTES);
	};
	function code($teks){
	return htmlentities($teks,ENT_QUOTES);
	};
	if($count!=1){
	die("<div class='alert alert-danger' role='alert'>ilegal access</div>");
	}
?>