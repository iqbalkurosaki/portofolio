<?php
		
	define('db_host', 'localhost');
	define('db_user', 'root');
	define('db_password', '');
	define('db_name', 'elearning');

	try {
		$db = new PDO('mysql:host='.db_host.';dbname='.db_name, db_user, db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Koneksi database gagal ".$e->getMessage();
		exit;
	}
?>