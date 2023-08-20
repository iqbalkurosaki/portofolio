 <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
	error_reporting(0);	
	include('../../config/config.php');
	$sql3 = "SELECT * FROM bkk WHERE email = '".$_SESSION['FULLNAME']."' AND pass='".$_SESSION['FBID']."'";
	$result_bkk = $db->Execute($sql3);
	$count3 = $result_bkk->RecordCount();
	
	function decode($teks){
	return html_entity_decode($teks,ENT_QUOTES);
	};
	function code($teks){
	return htmlentities($teks,ENT_QUOTES);
	};
	
	if($count3!=1){
	die("<div class='alert alert-danger' role='alert'>ilegal access</div>");
	}
?>