<?php
if (!session_id()) {
	session_start();
}

if (!$_SESSION['admin'] == true) {
	header('Location: penanganan.php');
}

require_once 'koneksi_database.php';
if (isset($_POST['insert'])) {
	$sql = "INSERT INTO depresi_".$_SESSION['depresi']."(penanganan) values('".$_POST['insert']."');";
	$res = mysqli_query($cnn, $sql);
	header('Location: penanganan.php');
} else {
	header('Location: penanganan.php');
}
?>