<?php
	require_once "config/config.php";
	$sql = "SELECT nis FROM `t_santri` WHERE kts = 3";
	$result = $db->execute($sql);
	while (!$result->EOF) {
		$nis = $result->fields["nis"];
		echo $nis;
		if (strlen($nis) == 13) {
			$upload_komplek = substr($nis, 0, 1);
			$upload_kamar = substr($nis, 1, 1);
		} else {
			$upload_komplek = substr($nis, 0, 2);
			$upload_kamar = substr($nis, 2, 1);
		}
		if (is_file("img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
			copy("img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png", "img/cetak_kts/".$nis.".png");
			// $sql2 = "UPDATE t_santri SET kts = 2 WHERE nis = $nis";
			// $db->Execute($sql2);
			echo " copied<br>";
		} else {
			echo ".png file not found</br>";
		}
		$result->MoveNext();
	}
?>