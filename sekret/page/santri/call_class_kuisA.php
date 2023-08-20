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
	
	//a1
	$laki = $kuisioner->table_A( "count", "jk", "l" );
	$peremp = $kuisioner->table_A( "count", "jk", "p" );
	//a2
	$max_lhr= $kuisioner->table_A2( "max", "lahir" );
	$min_lhr= $kuisioner->table_A2( "min", "lahir" );
	//$avg_lhr= $kuisioner->table_A2( "avg", "lahir" );
	//a3
	$menikah = $kuisioner->table_A( "count", "status", "Menikah" );
	$bercerai = $kuisioner->table_A( "count", "status", "Bercerai" );
	$lajang = $kuisioner->table_A( "count", "status", "Lajang / Tidak menikah" );
	$pisah = $kuisioner->table_A( "count", "status", "Pisah rumah" );
	$bersama = $kuisioner->table_A( "count", "status", "Tinggal bersama" );
	$janda = $kuisioner->table_A( "count", "status", "Janda / Duda" );
	$lain=$kuisioner->table_A2( "count", "status" );
	$lainnya=$lain['jumlah']-$menikah['jumlah']-$bercerai['jumlah']-$lajang['jumlah']-$pisah['jumlah']-$bersama['jumlah']-$janda['jumlah'];
	
	//a6
	$max_lulus= $kuisioner->table_A2( "max", "lulus" );
	$min_lulus= $kuisioner->table_A2( "min", "lulus" );
	
	//a6In
	$max_nem= $kuisioner->table_A2( "max", "nem_slta" );
	$min_nem= $kuisioner->table_A2( "min", "nem_slta" );
	$avg_nem= $kuisioner->table_A2( "avg", "nem_slta" );
	
	//a7
	$kebangsaan = $kuisioner->table_A2( "count", "kebangsaan" );
	$wni = $kuisioner->table_A( "count", "kebangsaan", "WNI" );
	$asing=$kebangsaan['jumlah']-$wni['jumlah'];

	//b10
	$perpus_sb=$kuisioner->table_A( "count", "perpus", "Sangat baik" );
	$perpus_b=$kuisioner->table_A( "count", "perpus", "Baik" );
	$perpus_c=$kuisioner->table_A( "count", "perpus", "Cukup" );
	$perpus_k=$kuisioner->table_A( "count", "perpus", "Kurang" );
	$perpus_t=$kuisioner->table_A( "count", "perpus", "Tidak sama sekali" );
	
	$tik_sb=$kuisioner->table_A( "count", "tik", "Sangat baik" );
	$tik_b=$kuisioner->table_A( "count", "tik", "Baik" );
	$tik_c=$kuisioner->table_A( "count", "tik", "Cukup" );
	$tik_k=$kuisioner->table_A( "count", "tik", "Kurang" );
	$tik_t=$kuisioner->table_A( "count", "tik", "Tidak sama sekali" );
	
	$modul_sb=$kuisioner->table_A( "count", "modul", "Sangat baik" );
	$modul_b=$kuisioner->table_A( "count", "modul", "Baik" );
	$modul_c=$kuisioner->table_A( "count", "modul", "Cukup" );
	$modul_k=$kuisioner->table_A( "count", "modul", "Kurang" );
	$modul_t=$kuisioner->table_A( "count", "modul", "Tidak sama sekali" );
	
	$ruang_sb=$kuisioner->table_A( "count", "ruang", "Sangat baik" );
	$ruang_b=$kuisioner->table_A( "count", "ruang", "Baik" );
	$ruang_c=$kuisioner->table_A( "count", "ruang", "Cukup" );
	$ruang_k=$kuisioner->table_A( "count", "ruang", "Kurang" );
	$ruang_t=$kuisioner->table_A( "count", "ruang", "Tidak sama sekali" );
	
	$lab_sb=$kuisioner->table_A( "count", "lab", "Sangat baik" );
	$lab_b=$kuisioner->table_A( "count", "lab", "Baik" );
	$lab_c=$kuisioner->table_A( "count", "lab", "Cukup" );
	$lab_k=$kuisioner->table_A( "count", "lab", "Kurang" );
	$lab_t=$kuisioner->table_A( "count", "lab", "Tidak sama sekali" );
	
	$variasi_sb=$kuisioner->table_A( "count", "variasi", "Sangat baik" );
	$variasi_b=$kuisioner->table_A( "count", "variasi", "Baik" );
	$variasi_c=$kuisioner->table_A( "count", "variasi", "Cukup" );
	$variasi_k=$kuisioner->table_A( "count", "variasi", "Kurang" );
	$variasi_t=$kuisioner->table_A( "count", "variasi", "Tidak sama sekali" );
	
	$akomodasi_sb=$kuisioner->table_A( "count", "akomodasi", "Sangat baik" );
	$akomodasi_b=$kuisioner->table_A( "count", "akomodasi", "Baik" );
	$akomodasi_c=$kuisioner->table_A( "count", "akomodasi", "Cukup" );
	$akomodasi_k=$kuisioner->table_A( "count", "akomodasi", "Kurang" );
	$akomodasi_t=$kuisioner->table_A( "count", "akomodasi", "Tidak sama sekali" );
	
	$kantin_sb=$kuisioner->table_A( "count", "kantin", "Sangat baik" );
	$kantin_b=$kuisioner->table_A( "count", "kantin", "Baik" );
	$kantin_c=$kuisioner->table_A( "count", "kantin", "Cukup" );
	$kantin_k=$kuisioner->table_A( "count", "kantin", "Kurang" );
	$kantin_t=$kuisioner->table_A( "count", "kantin", "Tidak sama sekali" );
	
	$rekreasi_sb=$kuisioner->table_A( "count", "rekreasi", "Sangat baik" );
	$rekreasi_b=$kuisioner->table_A( "count", "rekreasi", "Baik" );
	$rekreasi_c=$kuisioner->table_A( "count", "rekreasi", "Cukup" );
	$rekreasi_k=$kuisioner->table_A( "count", "rekreasi", "Kurang" );
	$rekreasi_t=$kuisioner->table_A( "count", "rekreasi", "Tidak sama sekali" );
	
	$uks_sb=$kuisioner->table_A( "count", "uks", "Sangat baik" );
	$uks_b=$kuisioner->table_A( "count", "uks", "Baik" );
	$uks_c=$kuisioner->table_A( "count", "uks", "Cukup" );
	$uks_k=$kuisioner->table_A( "count", "uks", "Kurang" );
	$uks_t=$kuisioner->table_A( "count", "uks", "Tidak sama sekali" );
	
	$fasilitas_lain_sb=$kuisioner->table_A( "count", "fasilitas_lain", "Sangat baik" );
	$fasilitas_lain_b=$kuisioner->table_A( "count", "fasilitas_lain", "Baik" );
	$fasilitas_lain_c=$kuisioner->table_A( "count", "fasilitas_lain", "Cukup" );
	$fasilitas_lain_k=$kuisioner->table_A( "count", "fasilitas_lain", "Kurang" );
	$fasilitas_lain_t=$kuisioner->table_A( "count", "fasilitas_lain", "Tidak sama sekali" );
	
	//b11
	$pemb_kelas_sb=$kuisioner->table_A( "count", "pemb_kelas", "Sangat besar" );
	$pemb_kelas_b=$kuisioner->table_A( "count", "pemb_kelas", "Besar" );
	$pemb_kelas_c=$kuisioner->table_A( "count", "pemb_kelas", "Cukup" );
	$pemb_kelas_k=$kuisioner->table_A( "count", "pemb_kelas", "Kurang" );
	$pemb_kelas_t=$kuisioner->table_A( "count", "pemb_kelas", "Tidak sama sekali" );
	
	$praktek_sb=$kuisioner->table_A( "count", "praktek", "Sangat besar" );
	$praktek_b=$kuisioner->table_A( "count", "praktek", "Besar" );
	$praktek_c=$kuisioner->table_A( "count", "praktek", "Cukup" );
	$praktek_k=$kuisioner->table_A( "count", "praktek", "Kurang" );
	$praktek_t=$kuisioner->table_A( "count", "praktek", "Tidak sama sekali" );
	
	$osis_sb=$kuisioner->table_A( "count", "osis", "Sangat besar" );
	$osis_b=$kuisioner->table_A( "count", "osis", "Besar" );
	$osis_c=$kuisioner->table_A( "count", "osis", "Cukup" );
	$osis_k=$kuisioner->table_A( "count", "osis", "Kurang" );
	$osis_t=$kuisioner->table_A( "count", "osis", "Tidak sama sekali" );
	
	$ekskul_sb=$kuisioner->table_A( "count", "ekskul", "Sangat besar" );
	$ekskul_b=$kuisioner->table_A( "count", "ekskul", "Besar" );
	$ekskul_c=$kuisioner->table_A( "count", "ekskul", "Cukup" );
	$ekskul_k=$kuisioner->table_A( "count", "ekskul", "Kurang" );
	$ekskul_t=$kuisioner->table_A( "count", "ekskul", "Tidak sama sekali" );
	
	$olahraga_sb=$kuisioner->table_A( "count", "olahraga", "Sangat besar" );
	$olahraga_b=$kuisioner->table_A( "count", "olahraga", "Besar" );
	$olahraga_c=$kuisioner->table_A( "count", "olahraga", "Cukup" );
	$olahraga_k=$kuisioner->table_A( "count", "olahraga", "Kurang" );
	$olahraga_t=$kuisioner->table_A( "count", "olahraga", "Tidak sama sekali" );
	
	
	//a10
	$tdk_skul1=$kuisioner->table_A( "count", "pend_ayah", "Tidak Sekolah");
	$tdk_skul2=$kuisioner->table_A( "count", "pend_ibu", "Tidak Sekolah");
	
	$SD1=$kuisioner->table_A( "count", "pend_ayah", "SD");
	$SD2=$kuisioner->table_A( "count", "pend_ibu", "SD");
	
	$smp1=$kuisioner->table_A( "count", "pend_ayah", "SLTP");
	$smp2=$kuisioner->table_A( "count", "pend_ibu", "SLTP");
	
	$sma1=$kuisioner->table_A( "count", "pend_ayah", "SLTA");
	$sma2=$kuisioner->table_A( "count", "pend_ibu", "SLTA");
	
	$dip1=$kuisioner->table_A( "count", "pend_ayah", "Diploma");
	$dip2=$kuisioner->table_A( "count", "pend_ibu", "Diploma");	
	
	$sar1=$kuisioner->table_A( "count", "pend_ayah", "Sarjana");
	$sar2=$kuisioner->table_A( "count", "pend_ibu", "Sarjana");	
	
	$pasca1=$kuisioner->table_A( "count", "pend_ayah", "Pascasarjana");
	$pasca2=$kuisioner->table_A( "count", "pend_ibu", "Pascasarjana");

	$tdk_tahu1=$kuisioner->table_A( "count", "pend_ayah", "Tidak tahu");
	$tdk_tahu2=$kuisioner->table_A( "count", "pend_ibu", "Tidak tahu");
	
	
?>