<?php
//$_POST[data][1] has the base64 encrypted binary codes. 
//convert the binary to image using file_put_contents
$nis = $_POST['nis'];
if (strlen($nis) == 13) {
	$upload_komplek = substr($nis, 0, 1);
	$upload_kamar = substr($nis, 1, 1);
	
} else {
	$upload_komplek = substr($nis, 0, 2);
	$upload_kamar = substr($nis, 2, 1);
}
$savefile = @file_put_contents("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png", base64_decode(explode(",", $_POST['datas'])[1]));

//if the file saved properly, print the file name
if(is_file("../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png")){
	// File and new size
	$filename = "../../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png";

	//image source sizes
	list($width, $height) = getimagesize($filename);

	// new image sizes
	$newWidth = 1011;
	$newHeight = 638;
	$thumb = imagecreatetruecolor($newWidth, $newHeight);
	$source = imagecreatefrompng($filename);

	// Allow transparency for png
    imagealphablending($thumb, false);
    imagesavealpha($thumb, true);
	$transparency = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
	imagefilledrectangle($thumb, 0, 0, $newWidth, $newHeight, $transparency);

	// Resize
	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	imagepng($thumb, "../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png", 9);

	// Output
	if (is_file("../../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
	    require_once '../../config/config.php';
		$sql2 = "UPDATE t_santri SET kts = 4 WHERE nis = '".$nis."'";
		$result2=$db->Execute($sql2);
		echo $nis;
	} else {
		echo "ERROR pada NIS : ".$nis;
	}
}
?>