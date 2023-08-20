<?php
	require_once "../../config/config.php";
		$id_kecamatan = $_POST['id_kecamatan'];
		$sql2 = "SELECT * FROM kelurahan WHERE `id_kecamatan` = '$id_kecamatan' ORDER BY kelurahan ASC";
		echo '<option disabled="" selected="" value="">--Pilih Desa/Kelurahan--</option>';
		$result2=$db->Execute($sql2);
		while (!$result2->EOF) {
			$id = $result2->fields["id"];
			$kelurahan = $result2->fields["kelurahan"];
			echo "<option id='kelurahan' class='".$id."' value='".$id."' >".$kelurahan." </option> ";
			$result2->MoveNext();
		}
?>
