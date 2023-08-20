<?php 
require_once 'koneksi.php';
$arr = array();
$nab_awal = array();
$g = 0;
date_default_timezone_set('Asia/Jakarta');
for ($i=1; $i<7; $i++){
	$date = date('Y-m-d', strtotime((-1*$i).' days'));
	$stmt = $db->query("SELECT id FROM reksadana");
	$h = 0;
	while ($res = $stmt->fetch()) {
		if ($i==1){
			$g++;
			$stmt3 = $db->prepare("SELECT nab FROM reksadana WHERE id = ?");
			$stmt3->bindParam(1, $res[0]);
			$stmt3->execute();
			$res3 = $stmt3->fetch();
			$nab = $res3[0] + rand(-500, 500)/100;
			$nab_awal[$g] = $nab;
		} else {
			$h++;
			// $stmt4 = $db->prepare("SELECT nab FROM history_nab WHERE id_reksadana = ? ORDER BY tanggal ASC LIMIT 0, 1");
			// $stmt4->bindParam(1, $res[0]);
			// $stmt4->execute();
			// $res4 = $stmt4->fetch();
			$nab = $nab_awal[$h] + rand(-500, 500)/100;
			$nab_awal[$h] = $nab;
		}
		$param = array();
		array_push($param, $res[0]);
		array_push($param, $date);
		array_push($param, $nab);
		array_push($arr, $param);
	}
}
for ($i=count($arr)-1; $i>=0; $i--) { 
	$stmt2 = $db->prepare("INSERT INTO history_nab VALUES(?, ?, ?)");
	for ($j=0; $j<3; $j++) { 
		$stmt2->bindParam($j+1, $arr[$i][$j]);
	}
	$stmt2->execute();
}
?>