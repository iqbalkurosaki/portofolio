<?php
	require_once "../../config/config.php";
		$id_provinsi = $_POST['id_provinsi'];
		$sql2 = "SELECT * FROM kota WHERE `id_prov` = '$id_provinsi' ORDER BY kota ASC";
		echo '<option disabled="" selected="" value="">--Pilih Kabupaten/Kota--</option>';
		$result2=$db->Execute($sql2);
		while (!$result2->EOF) {
			$id = $result2->fields["id"];
			$kota = $result2->fields["kota"];
			echo "<option id='kota' class='".$id."' value='".$id."' >".$kota." </option> ";
			$result2->MoveNext();
		}
?>
