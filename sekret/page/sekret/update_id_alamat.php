<?php
session_start();
$arrNis = array();
require_once "../../config/config.php";
$sql = "SELECT nis, provinsi, kota FROM t_santri";
$result = $db->Execute($sql);
while (!$result->EOF) {
	$nis = $result->fields["nis"];
	$provinsi = $result->fields["provinsi"];
	$kota = $result->fields["kota"];
	
	$sql2 = "SELECT provinsi.id AS id_provinsi_lama, provinsi.provinsi AS nama_provinsi_lama, provinsis.id AS id_provinsi_baru, provinsis.nama AS nama_provinsi_baru, kota.id AS id_kota_lama, kota.kota AS nama_kota_lama, kabupaten_kota.id AS id_kota_baru, kabupaten_kota.nama AS nama_kota_baru FROM provinsi INNER JOIN kota INNER JOIN provinsis INNER JOIN kabupaten_kota ON provinsi.id = kota.id_prov AND provinsis.id = kabupaten_kota.provinsi_id AND provinsi.provinsi = provinsis.nama AND kota.kota = kabupaten_kota.nama WHERE provinsi.id = $provinsi AND kota.id = $kota";
	$result2 = $db->execute($sql2);
	$id_provinsi_baru = $result2->fields["id_provinsi_baru"];
	$id_kota_baru = $result2->fields["id_kota_baru"];

	$sql3 = "UPDATE t_santri SET provinsi = $id_provinsi_baru, kota = $id_kota_baru WHERE nis = $nis";
	if (!$db->execute($sql3)) {
		array_push($arrNis, $nis);
	}

	$result->MoveNext();
}
?>