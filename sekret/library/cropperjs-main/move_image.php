<?php
require_once "../../config/config.php";
$file_list = scandir("edited");
unset($file_list[0],$file_list[1]);
$file_list = array_values($file_list);
for ($i=0; $i < count($file_list); $i++) { 
    $nis = explode(".jpg", $file_list[$i]);
    $nis = $nis[0];

    if (strlen($nis) == 13) {
        $upload_komplek = substr($nis, 0, 1);
        $upload_kamar = substr($nis, 1, 1);
    } else {
        $upload_komplek = substr($nis, 0, 2);
        $upload_kamar = substr($nis, 2, 1);
    }

    if ( rename("edited/".$file_list[$i], "../../foto/".$upload_komplek."/".$upload_kamar."/".$file_list[$i]) ) {
        $sql = "UPDATE t_santri SET foto = 1, kts = 6 WHERE nis = ".$nis;
            if ($db->execute($sql)) {
                echo "upload foto success ".$file_list[$i];
                echo "<br>";
            }
    }
}
?>