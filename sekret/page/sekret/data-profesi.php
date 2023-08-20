<?php
	require_once "../../config/config.php";
	$id_profesi = $_POST['id_profesi'];
	
	$sql2 = "SELECT * FROM institusi WHERE `id_profesi` = '$id_profesi' ORDER BY nama_institusi ASC";
	$result2=$db->Execute($sql2);
	echo '<option disabled="" selected="" value="">--Pilih Institusi--</option>';
	while (!$result2->EOF) {
		$id = $result2->fields["id_institusi"];
		$institusi = $result2->fields["nama_institusi"];
		echo "<option id='institusi' class='".$id."' value='".$id."' >".$institusi." </option> ";
		$result2->MoveNext();
	}
?>
