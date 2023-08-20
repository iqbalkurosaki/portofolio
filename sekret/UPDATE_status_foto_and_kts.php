<?php
	require_once "config/config.php";
	$sql = "SELECT nis FROM t_santri";
	$result = $db->execute($sql);
	$i = 1;
	while (!$result->EOF) {
		$nis = $result->fields["nis"];
		echo "<br>".$i."#".$nis."#";
		if (strlen($nis) == 13) {
			$upload_komplek = substr($nis, 0, 1);
			$upload_kamar = substr($nis, 1, 1);
		} else {
			$upload_komplek = substr($nis, 0, 2);
			$upload_kamar = substr($nis, 2, 1);
		}
		if (is_file("foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
			$sql2 = "UPDATE t_santri SET foto = 1 WHERE nis = $nis";
			$db->Execute($sql2);
			echo "foto ada & ";
		} else {
			$sql2 = "UPDATE t_santri SET foto = 0 WHERE nis = $nis";
			$db->Execute($sql2);
			echo "foto tidak ada & ";
		}
		if (is_file("img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
			$sql3 = "UPDATE t_santri SET kts = 1 WHERE nis = $nis";
			$db->Execute($sql3);
			echo "kts ada";
		} else {
			$sql3 = "UPDATE t_santri SET kts = 0 WHERE nis = $nis";
			$db->Execute($sql3);
			echo "kts tidak ada";
		}
		$result->MoveNext();
		$i++;
	}
?>