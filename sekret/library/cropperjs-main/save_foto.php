<?php
require_once "../../config/config.php";
$nis = $_POST['nis'];
$img = $_POST['jpegCropped'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
if (strlen($nis) == 13) {
	$upload_komplek = substr($nis, 0, 1);
	$upload_kamar = substr($nis, 1, 1);
	
} else {
	$upload_komplek = substr($nis, 0, 2);
	$upload_kamar = substr($nis, 2, 1);
}
if (is_file("../../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
    unlink("../../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg");
}
if (file_put_contents("temp/".$nis.".jpg", $data)) {
    if (rename("temp/".$nis.".jpg", "../../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
        $sql = "UPDATE t_santri SET foto = 1 WHERE nis = $nis";
        $db->Execute($sql);
    }
}
?>