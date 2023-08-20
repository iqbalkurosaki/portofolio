<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'psyca';

$cnn = mysqli_connect($host, $user, $pass);
if (!$cnn) {
	exit('Koneksi Gagal');
}
$db = mysqli_select_db($cnn, $db);
if (!$db) {
	exit('Gagal Memilih Database');
}

?>