<?php
	require_once "config/config.php";
	$sql = "SELECT nis FROM `t_santri3` WHERE nis NOT IN (SELECT nis FROM t_santri)";
	$result = $db->execute($sql);
	$foto = 0;
	$kts = 0;
	$kts_resize = 0;
	$qr = 0;
	while (!$result->EOF) {
		$nis = $result->fields["nis"];
		echo "$nis<br>";
        $upload_komplek = substr($nis, 0, 1);
        $upload_kamar = substr($nis, 1, 1);
        if (is_file("foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
        	unlink("foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg");
        	$foto++;
        }
		if (is_file("img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
			unlink("img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
			$kts++;
		}
		if (is_file("img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
			unlink("img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
			$kts_resize++;
		}
		if (is_file("img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
			unlink("img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png");
			$qr++;
		}
		$result->MoveNext();
	}
	echo "$foto, $kts, $kts_resize, $qr";
?>