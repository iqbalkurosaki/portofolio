<?php
	require_once "koneksi.php";
	$stmt = $db->prepare("SELECT count(email) FROM user WHERE email = ?");
	$stmt->bindParam(1, $_POST['email']);
	$stmt->execute();
	while ($res = $stmt->fetch()) {
		echo $res[0];
	}
?>
