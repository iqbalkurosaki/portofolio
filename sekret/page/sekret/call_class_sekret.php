<?php
	
	// file koneksi : $db
	require "../config/config.php";
	
	// memanggil file kelas form
	require "class.sekret.php";
	
	// objek form dari kelas form
	$form = new Form();
	
	// koneksi
	$form->db = $db;
	
	 // Array
        // (
            // [0] => 0
            // [jumlah] => 0
        // )
	
	//a1
	$Nis = $form->table_santri("Nis");
	
	
	
?>