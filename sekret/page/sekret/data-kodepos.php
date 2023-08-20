<?php
	require_once "../../config/config.php";
	$id_kelurahan = $_POST['id_kelurahan'];
	$sql2 = "SELECT * FROM kelurahan WHERE id = $id_kelurahan";
	$result2=$db->Execute($sql2);
	$kodepos = $result2->fields["kode_pos"];
	echo $kodepos;
 ?>