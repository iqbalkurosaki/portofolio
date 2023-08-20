<?php
if (!session_id()) {
	session_start();
}

if (!$_SESSION['admin'] == true) {
	header('Location: penanganan.php');
}

require_once 'koneksi_database.php';
if (isset($_POST['update'])) {
	foreach ($_POST['update'] as $key => $value) {
		$sql = "UPDATE depresi_".$_SESSION['depresi']." SET penanganan = '".$value."' where episode = ".(((int) $key)+1).";";
		$res = mysqli_query($cnn, $sql);
	}
	header('Location: penanganan.php');
} else {
	header('Location: penanganan.php');
}
?>