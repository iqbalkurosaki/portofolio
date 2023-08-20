<?php
	require_once "../../config/config.php";
	$keterangan = $_POST['keterangan'];
	
	$sql2 = "SELECT * FROM komplek WHERE `keterangan` = '$keterangan' ORDER BY nama_komplek ASC";
	$result2=$db->Execute($sql2);
	echo '<option disabled="" selected="" value="">--Pilih Kamar--</option>';
	while (!$result2->EOF) {
		$id = $result2->fields["id_komplek"];
		$komplek = $result2->fields["nama_komplek"];
		echo "<option id='kamar' class='".$id."' value='".$id."' >".$komplek." </option> ";
		$result2->MoveNext();
	}
?>
