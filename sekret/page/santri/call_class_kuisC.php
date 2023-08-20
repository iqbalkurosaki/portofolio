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
	
	
	 // Array
        // (
            // [0] => 0
            // [jumlah] => 0
        // )
	$tot_seb_lul = $kuisioner->table_C_for_sebset("COUNT", "bln_mncr_krj", "sebset_bln_mncr_krj", "Bulan Sebelum Lulus");
	$tot_set_lul = $kuisioner->table_C_for_sebset("COUNT", "bln_mncr_krj", "sebset_bln_mncr_krj", "Bulan Setelah Lulus");
	$rt_seb_lul = $kuisioner->table_C_for_sebset("AVG", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Sebelum Lulus");
	$rt_set_lul = $kuisioner->table_C_for_sebset("AVG", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Setelah Lulus");
	$max_seb_lul = $kuisioner->table_C_for_sebset("MAX", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Sebelum Lulus");
	$max_set_lul = $kuisioner->table_C_for_sebset("MAX", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Setelah Lulus");
	$min_seb_lul = $kuisioner->table_C_for_sebset("MIN", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Sebelum Lulus");
	$min_set_lul = $kuisioner->table_C_for_sebset("MIN", "bln_mncr_krj","sebset_bln_mncr_krj","Bulan Setelah Lulus");
	$tdk_cr = $kuisioner->table_C_value("COUNT", "bln_mncr_krj", "Tidak Mencari");
	

	


	$iklan_ctk = $kuisioner->table_C_value("COUNT", "cr_iklan_ctk", "Ya");
	$lamar_tanpa_tahu = $kuisioner->table_C_value("COUNT", "cr_lamar_tanpa_tahu", "Ya");
	$pergi_bursa = $kuisioner->table_C_value("COUNT", "cr_pergi_bursa","Ya");
	$iklan_ol = $kuisioner->table_C_value("COUNT", "cr_iklan_ol","Ya");
	$dihub_perus = $kuisioner->table_C_value("COUNT", "cr_dihub_perus","Ya");
	$menghub_kemnaker = $kuisioner->table_C_value("COUNT", "cr_menghub_kemnaker","Ya");
	$menghub_agen = $kuisioner->table_C_value("COUNT", "cr_menghub_agen","Ya");
	$pengem_karir_SMA = $kuisioner->table_C_value("COUNT", "cr_pengem_karir_SMA","Ya");
	$menghub_alumni = $kuisioner->table_C_value("COUNT", "cr_menghub_alumni","Ya");
	$bangun_network = $kuisioner->table_C_value("COUNT", "cr_bangun_network","Ya");
	$relasi = $kuisioner->table_C_value("COUNT", "cr_relasi","Ya");
	$bangun_bisnis = $kuisioner->table_C_value("COUNT", "cr_bangun_bisnis","Ya");	
	$magang = $kuisioner->table_C_value("COUNT", "cr_magang","Ya");	
	$kerja_sekolah = $kuisioner->table_C_value("COUNT", "cr_kerja_sekolah","Ya");	
	//$cr_lainnya = $kuisioner->table_C_tsd("COUNT", "cr_lainnya","");	
	

	$asp_prodi = $kuisioner->table_C_value("COUNT", "asp_prodi","Ya");	
	$asp_spesialisasi = $kuisioner->table_C_value("COUNT", "asp_spesialisasi","Ya");	
	$asp_NEM = $kuisioner->table_C_value("COUNT", "asp_NEM","Ya");		
	$asp_pengalaman_kerja_sekolah = $kuisioner->table_C_value("COUNT", "asp_pengalaman_kerja_sekolah","Ya");	
	$asp_reputasi_sekolah = $kuisioner->table_C_value("COUNT", "asp_reputasi_sekolah","Ya");	
	$asp_bing = $kuisioner->table_C_value("COUNT", "asp_bing","Ya");	
	$asp_basing = $kuisioner->table_C_value("COUNT", "asp_basing","Ya");	
	$asp_op_komp = $kuisioner->table_C_value("COUNT", "asp_op_komp","Ya");	
	$asp_organisasi = $kuisioner->table_C_value("COUNT", "asp_organisasi","Ya");
	$asp_rekom_tiga = $kuisioner->table_C_value("COUNT", "asp_rekom_tiga","Ya");
	$asp_prib_trampil = $kuisioner->table_C_value("COUNT", "asp_prib_trampil","Ya");
	$asp_lain = $kuisioner->table_C_t_value("COUNT", "asp_lain");

	$alumn_lmr_inst = $kuisioner->table_C_t_value("COUNT", "instansi_lamar");
	$tot_inst_dlmr = $kuisioner->table_C_t_value("SUM", "instansi_lamar");
	$rta_inst_dlmr = $kuisioner->table_C("AVG", "instansi_lamar");
	$max_inst_dlmr = $kuisioner->table_C("MAX", "instansi_lamar");
	$min_inst_dlmr = $kuisioner->table_C("MIN", "instansi_lamar");

	//C5
	$tot_p_seb_lul = $kuisioner->table_C_for_sebset("COUNT", "wkt_bth_peroleh_krj", "sebset_wkt_bth_peroleh_krj", "Bulan Sebelum Lulus");
	$tot_p_set_lul = $kuisioner->table_C_for_sebset("COUNT", "wkt_bth_peroleh_krj", "sebset_wkt_bth_peroleh_krj", "Bulan Setelah Lulus");
	$rt_p_seb_lul = $kuisioner->table_C_for_sebset("AVG", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Sebelum Lulus");
	$rt_p_set_lul = $kuisioner->table_C_for_sebset("AVG", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Setelah Lulus");
	$max_p_seb_lul = $kuisioner->table_C_for_sebset("MAX", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Sebelum Lulus");
	$max_p_set_lul = $kuisioner->table_C_for_sebset("MAX", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Setelah Lulus");
	$min_p_seb_lul = $kuisioner->table_C_for_sebset("MIN", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Sebelum Lulus");
	$min_p_set_lul = $kuisioner->table_C_for_sebset("MIN", "wkt_bth_peroleh_krj","sebset_wkt_bth_peroleh_krj","Bulan Setelah Lulus");

	//C6
	$jml_perus_rspn_lmrn = $kuisioner->table_C_tsd("SUM", "instansi_respon_lmrn","0");	
	$tot_alum_lmrn_drspn = $kuisioner->table_C_tsd("COUNT", "instansi_respon_lmrn","0");	
	$rt_perus_rspn_lmrn = $kuisioner->table_C_tsd("AVG", "instansi_respon_lmrn","0");	
	$max_perus_rspn_lmrn = $kuisioner->table_C_tsd("MAX", "instansi_respon_lmrn","0");	
	$min_perus_rspn_lmrn = $kuisioner->table_C_tsd("MIN", "instansi_respon_lmrn","0");	
	$instansi_respon_lmrn_tidak =  $kuisioner->table_C_value("COUNT", "instansi_respon_lmrn","0");

	//c7
	$jml_perus_udg_wwcr = $kuisioner->table_C_tsd("SUM", "wawancara","0");	
	$tot_alum_udg_wwcr = $kuisioner->table_C_tsd("COUNT", "wawancara","0");	
	$rt_perus_udg_wwcr = $kuisioner->table_C_tsd("AVG", "wawancara","0");	
	$max_perus_udg_wwcr = $kuisioner->table_C_tsd("MAX", "wawancara","0");	
	$min_perus_udg_wwcr = $kuisioner->table_C_tsd("MIN", "wawancara","0");	
	$perus_udg_wwcr_tdk =  $kuisioner->table_C_value("COUNT", "wawancara","0");	
	
	//c8
	$bisnis_sendiri = $kuisioner->table_C_value("COUNT", "alsn_notjob","Saya memulai bisnis sendiri");	
	$peroleh_krj_seb_lls = $kuisioner->table_C_value("COUNT", "alsn_notjob","Saya sudah memeroleh pekerjaan sebelum lulus");	
	$lanjut_kul = $kuisioner->table_C_value("COUNT", "alsn_notjob","Saya melanjutkan kuliah");	
	$blm_cr_krj = $kuisioner->table_C_value("COUNT", "alsn_notjob","Saya belum mencari pekerjaan");
	$alsn_ln_tdk_cr_krj = $kuisioner->table_C_for_multiple_4("COUNT", "alsn_notjob","Saya memulai bisnis sendiri","Saya sudah memeroleh pekerjaan sebelum lulus","Saya melanjutkan kuliah","Saya belum mencari pekerjaan");

	//C9
	$d_iklan_ctk = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Melalui iklan di koran/majalah, brosur");
	$d_lamar_tanpa_tahu = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Melamar ke perusahaan tanpa mengetahui lowongan yang ada");
	$d_pergi_bursa = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Pergi ke bursa/pameran kerja");
	$d_iklan_ol = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Mencari lewat internet/iklan online/milis");
	$d_dihub_perus = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Dihubungi oleh perusahaan");
	$d_menghub_kemnaker = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Menghubungi Kemnakertrans");
	$d_menghub_agen = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Menghubungi agen tenaga kerja komersial/swasta");
	$d_pengem_karir_SMA = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Memeroleh informasi dari pusat/kantor pengembangan karir SMA");
	$d_menghub_alumni = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Menghubungi kantor kesiswaan/hubungan alumni");
	$d_bangun_network = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Membangun network sejak masih sekolah");
	$d_relasi = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)");
	$d_bangun_bisnis = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Membangun bisnis sendiri");	
	$d_magang = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Melalui penempatan kerja atau magang");	
	$d_kerja_sekolah = $kuisioner->table_C_value("COUNT", "cara_dpt_krj_pertama","Bekerja di tempat yang sama dengan tempat kerja semasa sekolah");	
	$d_lainnya = $kuisioner->table_C_for_multiple_14("COUNT", "cara_dpt_krj_pertama","Melalui iklan di koran/majalah, brosur","Melamar ke perusahaan tanpa mengetahui lowongan yang ada","Pergi ke bursa/pameran kerja","Mencari lewat internet/iklan online/milis","Dihubungi oleh perusahaan","Menghubungi Kemnakertrans","Menghubungi agen tenaga kerja komersial/swasta","Memeroleh informasi dari pusat/kantor pengembangan karir SMA","Menghubungi kantor kesiswaan/hubungan alumni","Membangun network sejak masih sekolah","Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)","Membangun bisnis sendiri","Melalui penempatan kerja atau magang","Bekerja di tempat yang sama dengan tempat kerja semasa sekolah");	

	//C10
	$as_gaji = $kuisioner->table_C_value("COUNT", "aspek_pilih_kerja_pertama","Gaji");	
	$as_dkt_rmh = $kuisioner->table_C_value("COUNT", "aspek_pilih_kerja_pertama","Kedekatan dengan rumah");	
	$as_tntgn_krj = $kuisioner->table_C_value("COUNT", "aspek_pilih_kerja_pertama","Tantangan pekerjaan");	
	$as_benefit = $kuisioner->table_C_value("COUNT", "aspek_pilih_kerja_pertama","Benefit (perumahan, transport, uang lembur)");
	$as_ksmptn_beasiswa = $kuisioner->table_C_value("COUNT", "aspek_pilih_kerja_pertama","Kesempatan beasiswa");	
	$as_lain = $kuisioner->table_C_for_multiple_5("COUNT", "aspek_pilih_kerja_pertama","Gaji","Kedekatan dengan rumah","Tantangan pekerjaan","Benefit (perumahan, transport, uang lembur)","Kesempatan beasiswa");	

	
	
?>