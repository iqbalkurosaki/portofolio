<?php 
		require_once 'koneksi.php';
		// $salt = 'af';
		// $a = $db->query("SELECT des_encrypt('BNI-AM Dana Pasar Uang Kemilau', '".$salt."')");
		// $res = $a->fetch();
		// $coded = $res[0];
		// echo $coded.'<br />';
		// $b = $db->query("SELECT des_decrypt('".$coded."', '".$salt."')");
		// $res2 = $b->fetch();
		// $decoded = $res2[0];
		// echo $decoded;
		$reksadana = 'Avrist Balanced - Amar Syariah';
		$a = $db->query("INSERT INTO reksadana values(".crc32($reksadana).", '".$reksadana."', 'Campuran', 1048.8300, -0.83, 3.95, -0.09, 0)");

?>