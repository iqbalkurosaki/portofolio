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
	

	$E4_1_sb=$kuisioner->table_E( "count", "E4_1", "Sangat besar" );
	$E4_1_b=$kuisioner->table_E( "count", "E4_1", "Besar" );
	$E4_1_c=$kuisioner->table_E( "count", "E4_1", "Cukup" );
	$E4_1_k=$kuisioner->table_E( "count", "E4_1", "Kurang" );
	$E4_1_t=$kuisioner->table_E( "count", "E4_1", "Tidak sama sekali" );
	
	$E4_2_sb=$kuisioner->table_E( "count", "E4_2", "Sangat besar" );
	$E4_2_b=$kuisioner->table_E( "count", "E4_2", "Besar" );
	$E4_2_c=$kuisioner->table_E( "count", "E4_2", "Cukup" );
	$E4_2_k=$kuisioner->table_E( "count", "E4_2", "Kurang" );
	$E4_2_t=$kuisioner->table_E( "count", "E4_2", "Tidak sama sekali" );
	
	$E4_3_sb=$kuisioner->table_E( "count", "E4_3", "Sangat besar" );
	$E4_3_b=$kuisioner->table_E( "count", "E4_3", "Besar" );
	$E4_3_c=$kuisioner->table_E( "count", "E4_3", "Cukup" );
	$E4_3_k=$kuisioner->table_E( "count", "E4_3", "Kurang" );
	$E4_3_t=$kuisioner->table_E( "count", "E4_3", "Tidak sama sekali" );
	
	$E4_4_sb=$kuisioner->table_E( "count", "E4_4", "Sangat besar" );
	$E4_4_b=$kuisioner->table_E( "count", "E4_4", "Besar" );
	$E4_4_c=$kuisioner->table_E( "count", "E4_4", "Cukup" );
	$E4_4_k=$kuisioner->table_E( "count", "E4_4", "Kurang" );
	$E4_4_t=$kuisioner->table_E( "count", "E4_4", "Tidak sama sekali" );
	
	$E4_5_sb=$kuisioner->table_E( "count", "E4_5", "Sangat besar" );
	$E4_5_b=$kuisioner->table_E( "count", "E4_5", "Besar" );
	$E4_5_c=$kuisioner->table_E( "count", "E4_5", "Cukup" );
	$E4_5_k=$kuisioner->table_E( "count", "E4_5", "Kurang" );
	$E4_5_t=$kuisioner->table_E( "count", "E4_5", "Tidak sama sekali" );
	
	$E4_6_sb=$kuisioner->table_E( "count", "E4_6", "Sangat besar" );
	$E4_6_b=$kuisioner->table_E( "count", "E4_6", "Besar" );
	$E4_6_c=$kuisioner->table_E( "count", "E4_6", "Cukup" );
	$E4_6_k=$kuisioner->table_E( "count", "E4_6", "Kurang" );
	$E4_6_t=$kuisioner->table_E( "count", "E4_6", "Tidak sama sekali" );
	
	//E5
	$E5_1_sb=$kuisioner->table_E( "count", "E5_1", "Sangat besar" );
	$E5_1_b=$kuisioner->table_E( "count", "E5_1", "Besar" );
	$E5_1_c=$kuisioner->table_E( "count", "E5_1", "Cukup" );
	$E5_1_k=$kuisioner->table_E( "count", "E5_1", "Kurang" );
	$E5_1_t=$kuisioner->table_E( "count", "E5_1", "Tidak sama sekali" );
	
	$E5_2_sb=$kuisioner->table_E( "count", "E5_2", "Sangat besar" );
	$E5_2_b=$kuisioner->table_E( "count", "E5_2", "Besar" );
	$E5_2_c=$kuisioner->table_E( "count", "E5_2", "Cukup" );
	$E5_2_k=$kuisioner->table_E( "count", "E5_2", "Kurang" );
	$E5_2_t=$kuisioner->table_E( "count", "E5_2", "Tidak sama sekali" );
	
	$E5_3_sb=$kuisioner->table_E( "count", "E5_3", "Sangat besar" );
	$E5_3_b=$kuisioner->table_E( "count", "E5_3", "Besar" );
	$E5_3_c=$kuisioner->table_E( "count", "E5_3", "Cukup" );
	$E5_3_k=$kuisioner->table_E( "count", "E5_3", "Kurang" );
	$E5_3_t=$kuisioner->table_E( "count", "E5_3", "Tidak sama sekali" );
	
	$E5_4_sb=$kuisioner->table_E( "count", "E5_4", "Sangat besar" );
	$E5_4_b=$kuisioner->table_E( "count", "E5_4", "Besar" );
	$E5_4_c=$kuisioner->table_E( "count", "E5_4", "Cukup" );
	$E5_4_k=$kuisioner->table_E( "count", "E5_4", "Kurang" );
	$E5_4_t=$kuisioner->table_E( "count", "E5_4", "Tidak sama sekali" );
	
	$E5_5_sb=$kuisioner->table_E( "count", "E5_5", "Sangat besar" );
	$E5_5_b=$kuisioner->table_E( "count", "E5_5", "Besar" );
	$E5_5_c=$kuisioner->table_E( "count", "E5_5", "Cukup" );
	$E5_5_k=$kuisioner->table_E( "count", "E5_5", "Kurang" );
	$E5_5_t=$kuisioner->table_E( "count", "E5_5", "Tidak sama sekali" );
	
	$E5_6_sb=$kuisioner->table_E( "count", "E5_6", "Sangat besar" );
	$E5_6_b=$kuisioner->table_E( "count", "E5_6", "Besar" );
	$E5_6_c=$kuisioner->table_E( "count", "E5_6", "Cukup" );
	$E5_6_k=$kuisioner->table_E( "count", "E5_6", "Kurang" );
	$E5_6_t=$kuisioner->table_E( "count", "E5_6", "Tidak sama sekali" );
	
	$E5_7_sb=$kuisioner->table_E( "count", "E5_7", "Sangat besar" );
	$E5_7_b=$kuisioner->table_E( "count", "E5_7", "Besar" );
	$E5_7_c=$kuisioner->table_E( "count", "E5_7", "Cukup" );
	$E5_7_k=$kuisioner->table_E( "count", "E5_7", "Kurang" );
	$E5_7_t=$kuisioner->table_E( "count", "E5_7", "Tidak sama sekali" );
	
	$E5_8_sb=$kuisioner->table_E( "count", "E5_8", "Sangat besar" );
	$E5_8_b=$kuisioner->table_E( "count", "E5_8", "Besar" );
	$E5_8_c=$kuisioner->table_E( "count", "E5_8", "Cukup" );
	$E5_8_k=$kuisioner->table_E( "count", "E5_8", "Kurang" );
	$E5_8_t=$kuisioner->table_E( "count", "E5_8", "Tidak sama sekali" );
	
	$E5_9_sb=$kuisioner->table_E( "count", "E5_9", "Sangat besar" );
	$E5_9_b=$kuisioner->table_E( "count", "E5_9", "Besar" );
	$E5_9_c=$kuisioner->table_E( "count", "E5_9", "Cukup" );
	$E5_9_k=$kuisioner->table_E( "count", "E5_9", "Kurang" );
	$E5_9_t=$kuisioner->table_E( "count", "E5_9", "Tidak sama sekali" );
	
	$E5_10_sb=$kuisioner->table_E( "count", "E5_10", "Sangat besar" );
	$E5_10_b=$kuisioner->table_E( "count", "E5_10", "Besar" );
	$E5_10_c=$kuisioner->table_E( "count", "E5_10", "Cukup" );
	$E5_10_k=$kuisioner->table_E( "count", "E5_10", "Kurang" );
	$E5_10_t=$kuisioner->table_E( "count", "E5_10", "Tidak sama sekali" );
	
	$E5_11_sb=$kuisioner->table_E( "count", "E5_11", "Sangat besar" );
	$E5_11_b=$kuisioner->table_E( "count", "E5_11", "Besar" );
	$E5_11_c=$kuisioner->table_E( "count", "E5_11", "Cukup" );
	$E5_11_k=$kuisioner->table_E( "count", "E5_11", "Kurang" );
	$E5_11_t=$kuisioner->table_E( "count", "E5_11", "Tidak sama sekali" );
	
	$E5_12_sb=$kuisioner->table_E( "count", "E5_12", "Sangat besar" );
	$E5_12_b=$kuisioner->table_E( "count", "E5_12", "Besar" );
	$E5_12_c=$kuisioner->table_E( "count", "E5_12", "Cukup" );
	$E5_12_k=$kuisioner->table_E( "count", "E5_12", "Kurang" );
	$E5_12_t=$kuisioner->table_E( "count", "E5_12", "Tidak sama sekali" );
	
	$E5_13_sb=$kuisioner->table_E( "count", "E5_13", "Sangat besar" );
	$E5_13_b=$kuisioner->table_E( "count", "E5_13", "Besar" );
	$E5_13_c=$kuisioner->table_E( "count", "E5_13", "Cukup" );
	$E5_13_k=$kuisioner->table_E( "count", "E5_13", "Kurang" );
	$E5_13_t=$kuisioner->table_E( "count", "E5_13", "Tidak sama sekali" );
	
	$E5_14_sb=$kuisioner->table_E( "count", "E5_14", "Sangat besar" );
	$E5_14_b=$kuisioner->table_E( "count", "E5_14", "Besar" );
	$E5_14_c=$kuisioner->table_E( "count", "E5_14", "Cukup" );
	$E5_14_k=$kuisioner->table_E( "count", "E5_14", "Kurang" );
	$E5_14_t=$kuisioner->table_E( "count", "E5_14", "Tidak sama sekali" );
	
	$E5_15_sb=$kuisioner->table_E( "count", "E5_15", "Sangat besar" );
	$E5_15_b=$kuisioner->table_E( "count", "E5_15", "Besar" );
	$E5_15_c=$kuisioner->table_E( "count", "E5_15", "Cukup" );
	$E5_15_k=$kuisioner->table_E( "count", "E5_15", "Kurang" );
	$E5_15_t=$kuisioner->table_E( "count", "E5_15", "Tidak sama sekali" );
	
	$E5_16_sb=$kuisioner->table_E( "count", "E5_16", "Sangat besar" );
	$E5_16_b=$kuisioner->table_E( "count", "E5_16", "Besar" );
	$E5_16_c=$kuisioner->table_E( "count", "E5_16", "Cukup" );
	$E5_16_k=$kuisioner->table_E( "count", "E5_16", "Kurang" );
	$E5_16_t=$kuisioner->table_E( "count", "E5_16", "Tidak sama sekali" );
	
	$E5_17_sb=$kuisioner->table_E( "count", "E5_17", "Sangat besar" );
	$E5_17_b=$kuisioner->table_E( "count", "E5_17", "Besar" );
	$E5_17_c=$kuisioner->table_E( "count", "E5_17", "Cukup" );
	$E5_17_k=$kuisioner->table_E( "count", "E5_17", "Kurang" );
	$E5_17_t=$kuisioner->table_E( "count", "E5_17", "Tidak sama sekali" );
	
	$E5_18_sb=$kuisioner->table_E( "count", "E5_18", "Sangat besar" );
	$E5_18_b=$kuisioner->table_E( "count", "E5_18", "Besar" );
	$E5_18_c=$kuisioner->table_E( "count", "E5_18", "Cukup" );
	$E5_18_k=$kuisioner->table_E( "count", "E5_18", "Kurang" );
	$E5_18_t=$kuisioner->table_E( "count", "E5_18", "Tidak sama sekali" );
	
	$E5_19_sb=$kuisioner->table_E( "count", "E5_19", "Sangat besar" );
	$E5_19_b=$kuisioner->table_E( "count", "E5_19", "Besar" );
	$E5_19_c=$kuisioner->table_E( "count", "E5_19", "Cukup" );
	$E5_19_k=$kuisioner->table_E( "count", "E5_19", "Kurang" );
	$E5_19_t=$kuisioner->table_E( "count", "E5_19", "Tidak sama sekali" );
	
	$E5_20_sb=$kuisioner->table_E( "count", "E5_20", "Sangat besar" );
	$E5_20_b=$kuisioner->table_E( "count", "E5_20", "Besar" );
	$E5_20_c=$kuisioner->table_E( "count", "E5_20", "Cukup" );
	$E5_20_k=$kuisioner->table_E( "count", "E5_20", "Kurang" );
	$E5_20_t=$kuisioner->table_E( "count", "E5_20", "Tidak sama sekali" );
	
	$E5_21_sb=$kuisioner->table_E( "count", "E5_21", "Sangat besar" );
	$E5_21_b=$kuisioner->table_E( "count", "E5_21", "Besar" );
	$E5_21_c=$kuisioner->table_E( "count", "E5_21", "Cukup" );
	$E5_21_k=$kuisioner->table_E( "count", "E5_21", "Kurang" );
	$E5_21_t=$kuisioner->table_E( "count", "E5_21", "Tidak sama sekali" );
	
	$E5_22_sb=$kuisioner->table_E( "count", "E5_22", "Sangat besar" );
	$E5_22_b=$kuisioner->table_E( "count", "E5_22", "Besar" );
	$E5_22_c=$kuisioner->table_E( "count", "E5_22", "Cukup" );
	$E5_22_k=$kuisioner->table_E( "count", "E5_22", "Kurang" );
	$E5_22_t=$kuisioner->table_E( "count", "E5_22", "Tidak sama sekali" );
	
	$E5_23_sb=$kuisioner->table_E( "count", "E5_23", "Sangat besar" );
	$E5_23_b=$kuisioner->table_E( "count", "E5_23", "Besar" );
	$E5_23_c=$kuisioner->table_E( "count", "E5_23", "Cukup" );
	$E5_23_k=$kuisioner->table_E( "count", "E5_23", "Kurang" );
	$E5_23_t=$kuisioner->table_E( "count", "E5_23", "Tidak sama sekali" );
	
	$E5_24_sb=$kuisioner->table_E( "count", "E5_24", "Sangat besar" );
	$E5_24_b=$kuisioner->table_E( "count", "E5_24", "Besar" );
	$E5_24_c=$kuisioner->table_E( "count", "E5_24", "Cukup" );
	$E5_24_k=$kuisioner->table_E( "count", "E5_24", "Kurang" );
	$E5_24_t=$kuisioner->table_E( "count", "E5_24", "Tidak sama sekali" );
	
	$E5_25_sb=$kuisioner->table_E( "count", "E5_25", "Sangat besar" );
	$E5_25_b=$kuisioner->table_E( "count", "E5_25", "Besar" );
	$E5_25_c=$kuisioner->table_E( "count", "E5_25", "Cukup" );
	$E5_25_k=$kuisioner->table_E( "count", "E5_25", "Kurang" );
	$E5_25_t=$kuisioner->table_E( "count", "E5_25", "Tidak sama sekali" );
	
	$E6_sb=$kuisioner->table_E( "count", "E6", "Sangat erat" );
	$E6_b=$kuisioner->table_E( "count", "E6", "Erat" );
	$E6_c=$kuisioner->table_E( "count", "E6", "Cukup" );
	$E6_k=$kuisioner->table_E( "count", "E6", "Kurang" );
	$E6_t=$kuisioner->table_E( "count", "E6", "Tidak sama sekali" );
	
	$E7_sb=$kuisioner->table_E( "count", "E7", "Setingkat lebih tinggi" );
	$E7_b=$kuisioner->table_E( "count", "E7", "Tingkat yang sama" );
	$E7_c=$kuisioner->table_E( "count", "E7", "Setingkat lebih rendah" );
	$E7_k=$kuisioner->table_E( "count", "E7", "Tidak perlu pendidikan tinggi" );
		
	$E8_1=$kuisioner->table_E( "count", "E8_1", "Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya." );
	$E8_2=$kuisioner->table_E( "count", "E8_2", "Saya belum mendapatkan pekerjaan yang lebih sesuai." );
	$E8_3=$kuisioner->table_E( "count", "E8_3", "Di pekerjaan ini saya memeroleh prospek karir yang baik." );
	$E8_4=$kuisioner->table_E( "count", "E8_4", "Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya" );
	$E8_5=$kuisioner->table_E( "count", "E8_5", "Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya." );
	$E8_6=$kuisioner->table_E( "count", "E8_6", "Saya dapat memeroleh pendapatn yang lebih tinggi di pekerjaan ini." );
	$E8_7=$kuisioner->table_E( "count", "E8_7", "Pekerjaan saya saat ini lebih aman/terjamin/secure" );
	$E8_8=$kuisioner->table_E( "count", "E8_8", "Pekerjaan saya saat ini lebih menarik" );
	$E8_9=$kuisioner->table_E( "count", "E8_9", "Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll." );
	$E8_10=$kuisioner->table_E( "count", "E8_10", "Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya." );
	$E8_11=$kuisioner->table_E( "count", "E8_11", "Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya." );
	$E8_12=$kuisioner->table_E( "count", "E8_12", "Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya." );
	$E8_lain=$kuisioner->table_E2( "count", "E8_13");

	
	
?>