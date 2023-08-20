<?php
	$nis = $_POST["nis"];
    require_once '../../config/config.php';
    $sql = "SELECT id FROM kts ORDER BY id DESC LIMIT 1";
	$result=$db->Execute($sql);
	$periode_kts = $result->fields["id"];
	$sql2 = "UPDATE t_santri SET kts = $periode_kts WHERE nis = '".$nis."'";
	$result2=$db->Execute($sql2);
	echo $nis;
?>