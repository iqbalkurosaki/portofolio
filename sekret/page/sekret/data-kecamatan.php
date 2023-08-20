<?php
	require_once "../../config/config.php";
		$id_kota = $_POST['id_kota'];
		$sql2 = "SELECT * FROM kecamatan WHERE `id_kota` = '$id_kota' ORDER BY kecamatan ASC";
		echo '<option disabled="" selected="" value="">--Pilih Kecamatan--</option>';
		$result2=$db->Execute($sql2);
		while (!$result2->EOF) {
			$id = $result2->fields["id"];
			$kecamatan = $result2->fields["kecamatan"];
			echo "<option id='kecamatan' class='".$id."' value='".$id."' >".$kecamatan." </option> ";
			$result2->MoveNext();
		}
?>
