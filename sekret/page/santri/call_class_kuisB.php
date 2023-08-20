<?php
	
	// file koneksi : $db
	require "../config/config.php";
	
	// memanggil file kelas kuisioner
	require "class.kuisioner.php";
	
	// objek kuisioner dari kelas kuisioner
	$kuisioner = new Kuisioner();
	
	// koneksi
	$kuisioner->db = $db;
	
	 // Array
        // (
            // [0] => 0
            // [jumlah] => 0
        // )
	
	//b1
	
	//a4
	$negeri = $kuisioner->table_B( "count", "kampus", "Negeri" );
	$swasta = $kuisioner->table_B( "count", "kampus", "Swasta" );
	
	//b2
	$max_masuk= $kuisioner->table_B2( "max", "masuk" );
	$min_masuk= $kuisioner->table_B2( "min", "masuk" );
	$max_lulus= $kuisioner->table_B2( "max", "lulus" );
	$min_lulus= $kuisioner->table_B2( "min", "lulus" );
	
	
	//b5
	$tinggal_sb=$kuisioner->table_B( "count", "tmpt_tinggl", "Sendiri di asrama" );
	$tinggal_b=$kuisioner->table_B( "count", "tmpt_tinggl", "Sendiri di kos" );
	$tinggal_c=$kuisioner->table_B( "count", "tmpt_tinggl", "Bersama orang tua/keluarga" );
	$tinggal_k=$kuisioner->table_B( "count", "tmpt_tinggl", "Bersama keluarga" );
	$tinggal_t=$kuisioner->table_B( "count", "tmpt_tinggl", "Berbagi kamar kos/apartemen" );
	$tinggal=$kuisioner->table_B2( "count", "tmpt_tinggl");
	$tinggal_lain=$tinggal['jumlah']-$tinggal_sb['jumlah']-$tinggal_b['jumlah']-$tinggal_c['jumlah']-$tinggal_k['jumlah']-$tinggal_t['jumlah'];
	
	//b6
	$dana_kul_sb=$kuisioner->table_B( "count", "dana_kul", "Beasiswa (misalnya dari pemerintah, universitas)" );
	$dana_kul_b=$kuisioner->table_B( "count", "dana_kul", "Sebagian beasiswa" );
	$dana_kul_c=$kuisioner->table_B( "count", "dana_kul", "Orangtua/keluarga" );
	$dana_kul_k=$kuisioner->table_B( "count", "dana_kul", "Biaya sendiri" );
	$dana_kul=$kuisioner->table_B2( "count", "dana_kul");
	$danakul_lain=$dana_kul['jumlah']-$dana_kul_sb['jumlah']-$dana_kul_b['jumlah']-$dana_kul_c['jumlah']-$dana_kul_k['jumlah'];
	
	//b6ui
	$max_nem= $kuisioner->table_B2( "max", "nem" );
	$min_nem= $kuisioner->table_B2( "min", "nem" );
	$avg_nem= $kuisioner->table_B2( "avg", "nem" );
	//b6In
	$organisasi_y=$kuisioner->table_B( "count", "organisasi", "Ya" );
	$organisasi_t=$kuisioner->table_B( "count", "organisasi", "Tidak" );
	
	//B7
	$kursus_ya = $kuisioner->table_B( "count", "kursus", "Ya" );
	$kursus_tdk = $kuisioner->table_B( "count", "kursus", "Tidak" );
	
	
	//b7In
	$keaktifan_sb=$kuisioner->table_B( "count", "keaktifan", "Sangat aktif" );
	$keaktifan_b=$kuisioner->table_B( "count", "keaktifan", "Aktif" );
	$keaktifan_c=$kuisioner->table_B( "count", "keaktifan", "Cukup aktif" );
	$keaktifan_k=$kuisioner->table_B( "count", "keaktifan", "Kurang aktif" );
	$keaktifan_t=$kuisioner->table_B( "count", "keaktifan", "Pasif" );
	
	
?>