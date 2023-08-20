<?php
require_once 'koneksi.php';
	$stmt = $db->query("SELECT reksadana FROM reksadana2");
	while ($res = $stmt->fetch()) {
			$stmt2 = $db->prepare("UPDATE reksadana2 SET id = ? WHERE reksadana = ?");
			$id = crc32($res['reksadana']);
			$stmt2->bindParam(1, $id);
			$stmt2->bindParam(2, $res['reksadana']);
			$stmt2->execute();
	}

//echo crc32("Aberdeen Syariah Proteksi Insha 1");

// require_once 'koneksi.php';
// 			$stmt2 = $db->prepare("INSERT INTO `reksadana2`(`id`, `reksadana`, `jenis`, `nab`, `1hr`, `1bln`, `YTD`, `1th`, `3th`, `rating`) VALUES (?,?,?,?,?,?,?,?,?,?)");
// 			$id = crc32('Minna Padi Pasopati Saham');
// 			$a = 'Minna Padi Pasopati Saham';
// 			$b = 'Saham';
// 			$c = 1299.8003;
// 			$d = 0.67;
// 			$e = 5.95;
// 			$f = 5.20;
// 			$g = 18.22;
// 			$h = 0.00;
// 			$i = 4;

// 			$stmt2->bindParam(1, $id);
// 			$stmt2->bindParam(2, $a);
// 			$stmt2->bindParam(3, $b);
// 			$stmt2->bindParam(4, $c);
// 			$stmt2->bindParam(5, $d);
// 			$stmt2->bindParam(6, $e);
// 			$stmt2->bindParam(7, $f);
// 			$stmt2->bindParam(8, $g);
// 			$stmt2->bindParam(9, $h);
// 			$stmt2->bindParam(10, $i);
// 			$stmt2->execute();

//echo crc32("Aberdeen Syariah Proteksi Insha 1");

?>