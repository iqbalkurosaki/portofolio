<?php
		// file koneksi : $db
	require "../config/config.php";
	// memanggil file kelas kuisioner
	require_once "class.kuisioner.php";
	
	// objek kuisioner dari kelas kuisioner
	$kuisioner = new Kuisioner();
	
	// koneksi
	$kuisioner->db = $db;

	$krj_saat_ini_y = $kuisioner->table_D_value("COUNT", "krj_saat_ini", "Ya");
	$krj_saat_ini_t = $kuisioner->table_D_value("COUNT", "krj_saat_ini", "Tidak");

	//D2
	$sa_lnjt_kul = $kuisioner->table_D_value("COUNT", "sa_lnjt_kul", "Ya");
	$sa_nikah = $kuisioner->table_D_value("COUNT", "sa_nikah", "Ya");
	$sa_sbk_klg_ank = $kuisioner->table_D_value("COUNT", "sa_sbk_klg_ank", "Ya");
	$sa_cr_krj = $kuisioner->table_D_value("COUNT", "sa_cr_krj", "Ya");
	$sa_lainnya = $kuisioner->table_D_t_value("COUNT", "sa_lainnya");

	//D3
	$aktf_cr_krj_4_mgg_trkhr_t = $kuisioner->table_D_value("COUNT", "aktf_cr_krj_4_mgg_trkhr", "Tidak");
	$aktf_cr_krj_4_mgg_trkhr_t_tggu = $kuisioner->table_D_value("COUNT", "aktf_cr_krj_4_mgg_trkhr", "Tidak, tapi saya sedang menunggu hasil lamaran kerja");
	$aktf_cr_krj_4_mgg_trkhr_y_2mgg = $kuisioner->table_D_value("COUNT", "aktf_cr_krj_4_mgg_trkhr", "Ya, saya akan mulai bekerja dalam 2 minggu ke depan");
	$aktf_cr_krj_4_mgg_trkhr_y_b2mgg = $kuisioner->table_D_value("COUNT", "aktf_cr_krj_4_mgg_trkhr", "Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan");
	$aktf_cr_krj_4_mgg_trkhr_lain = $kuisioner->table_D_for_multiple_4("COUNT", "aktf_cr_krj_4_mgg_trkhr","Tidak","Tidak, tapi saya sedang menunggu hasil lamaran kerja","Ya, saya akan mulai bekerja dalam 2 minggu ke depan","Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan");
	
	//D4
	$jml_alumni = $kuisioner->table_D_value_lds_tptk("COUNT", "inst_dimasuki", "1");
	$jml_inst = $kuisioner->table_D_t_value("SUM", "inst_dimasuki");
	$rt_inst = $kuisioner->table_D_t_value("AVG", "inst_dimasuki");
	$max_inst = $kuisioner->table_D_t_value("MAX", "inst_dimasuki");
	$min_inst = $kuisioner->table_D_t_value("MIN", "inst_dimasuki");

	//D5
	$inst_pmrnth = $kuisioner->table_D_value("COUNT", "jns_inst_krj", "Instansi pemerintah (termasuk BUMN)");
	$lsm = $kuisioner->table_D_value("COUNT", "jns_inst_krj", "Organisasi non-profit/Lembaga Swadaya Masyarakat");
	$perus_swasta = $kuisioner->table_D_value("COUNT", "jns_inst_krj", "Perusahaan swasta");
	$wiraswasta = $kuisioner->table_D_value("COUNT", "jns_inst_krj", "Wiraswasta/perusahaan sendiri");
	$jns_lain = $kuisioner->table_D_for_multiple_4("COUNT", "jns_inst_krj","Instansi pemerintah (termasuk BUMN)","Organisasi non-profit/Lembaga Swadaya Masyarakat","Perusahaan swasta","Wiraswasta/perusahaan sendiri");

	//D6
	$pertanian = $kuisioner->table_D_value("COUNT", "bid_krj", "Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu");
	$kehutanan = $kuisioner->table_D_value("COUNT", "bid_krj", "Kehutanan dan penebangan kayu");
	$perikanan = $kuisioner->table_D_value("COUNT", "bid_krj", "Perikanan");
	$pertambangan_batu_bara = $kuisioner->table_D_value("COUNT", "bid_krj", "Pertambangan batu bara dan lignit");
	$pertambangan_minyak = $kuisioner->table_D_value("COUNT", "bid_krj", "Pertambangan minyak bumi dan gas alam dan panas bumi");
	$pertambangan_bijih = $kuisioner->table_D_value("COUNT", "bid_krj", "Pertambangan bijih logam");
	$pertambangan_lain = $kuisioner->table_D_value("COUNT", "bid_krj", "Pertambangan dan penggalian lainnya");
	$jasa_pertambangan = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa Pertambangan");
	$ind_makanan = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri makanan");
	$ind_minuman = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri minuman");
	$ind_temb = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri pengolahan tembakau");
	$ind_tekstil = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri tekstil");
	$ind_pakaian_jd = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri pakaian jadi");
	$ind_kulit = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri kulit, barang dari kulit dan alas kaki");
	$ind_kayu = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya");
	$ind_kertas = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri kertas dan barang dari kertas");
	$ind_pencetakan = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri pencetakan dan reproduksi media rekaman");
	$ind_batu_bara = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri produk dari batu bara dan pengilangan minyak bumi");
	$ind_kimia = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri bahan kimia dan barang dari bahan kimia");
	$ind_farmasi = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri farmasi, produk obat kimia dan obat tradisional");
	$ind_karet = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri karet, barang dari karet dan plastik");
	$ind_gali_non_logm = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri barang galian bukan logam");
	$ind_logm_dsr = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri logam dasar");
	$ind_logm_brg = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri barang logam, bukan mesin dan peralatannya");
	$ind_komp = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri komputer, barang elektronik dan optik");
	$ind_lstrk = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri peralatan listrik");
	$ind_mesin = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri mesin dan perlengkapan ytdl");
	$ind_motor = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri kendaraan bermotor, trailer dan semi trailer");
	$ind_angkut = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri alat angkutan lainnya");
	$ind_frntr = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri furnitur");
	$ind_olah_lain = $kuisioner->table_D_value("COUNT", "bid_krj", "Industri pengolahan lainnya");
	$js_reparasi = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa reparasi dan pemasangan mesin dan peralatan");
	$ada_lstrk = $kuisioner->table_D_value("COUNT", "bid_krj", "Pengadaan listrik, gas, uap/air panas dan udara dingin");
	$ada_air = $kuisioner->table_D_value("COUNT", "bid_krj", "Pengadaan air");
	$olah_limbah = $kuisioner->table_D_value("COUNT", "bid_krj", "Pengolahan limbah");
	$olah_sampah = $kuisioner->table_D_value("COUNT", "bid_krj", "Pengolahan sampah dan daur ulang");
	$kelola_smph = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa pembersihan dan pengelolaan sampah lainnya");
	$kons_gdg = $kuisioner->table_D_value("COUNT", "bid_krj", "Konstruksi gedung");
	$kons_sipil = $kuisioner->table_D_value("COUNT", "bid_krj", "Konstruksi bangunan sipil");
	$kons_khusus = $kuisioner->table_D_value("COUNT", "bid_krj", "Konstruksi khusus");
	$pdgg = $kuisioner->table_D_value("COUNT", "bid_krj", "Perdagangan, reparasi dan perawatan mobil dan sepeda motor");
	$pdgg_bsr = $kuisioner->table_D_value("COUNT", "bid_krj", "Perdagangan besar, bukan mobil dan sepeda motor");
	$pdgg_ecr = $kuisioner->table_D_value("COUNT", "bid_krj", "Perdagangan eceran, bukan mobil dan motor");
	$angk_drt = $kuisioner->table_D_value("COUNT", "bid_krj", "Angkutan darat dan angkutan melalui saluran pipa");
	$angk_air = $kuisioner->table_D_value("COUNT", "bid_krj", "Angkutan air");
	$angk_udr = $kuisioner->table_D_value("COUNT", "bid_krj", "Angkutan udara");
	$gdg = $kuisioner->table_D_value("COUNT", "bid_krj", "Pergudangan dan jasa penunjang angkutan");
	$pos = $kuisioner->table_D_value("COUNT", "bid_krj", "Pos dan kurir");
	$peny_akom = $kuisioner->table_D_value("COUNT", "bid_krj", "Penyediaan akomodasi");
	$peny_makmin = $kuisioner->table_D_value("COUNT", "bid_krj", "Penyediaan makanan dan minuman");
	$penerbitan = $kuisioner->table_D_value("COUNT", "bid_krj", "Penerbitan");
	$gmbr_grk = $kuisioner->table_D_value("COUNT", "bid_krj", "Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik");
	$siar = $kuisioner->table_D_value("COUNT", "bid_krj", "Penyiaran dan pemrograman");
	$telkom = $kuisioner->table_D_value("COUNT", "bid_krj", "Telekomunikasi");
	$programmer = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu");
	$jasa_info = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan jasa informasi");
	$jasa_uang = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa keuangan, bukan asuransi dan dana pensiun");
	$asuransi = $kuisioner->table_D_value("COUNT", "bid_krj", "Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib");
	$jasa_tunjg = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa penunjang jasa keuangan, asuransi dan dana pensiun");
	$real_estat = $kuisioner->table_D_value("COUNT", "bid_krj", "Real estat");
	$jasa_hkm = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa hukum dan akuntansi");
	$konsul_mnj = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan kantor pusat dan konsultasi manajemen");
	$jasa_arstktr = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa arsitektur dan teknik sipil; analisis dan uji teknis");
	$pen_ilmu = $kuisioner->table_D_value("COUNT", "bid_krj", "Penelitian dan pengembangan ilmu pengetahuan");
	$perikln = $kuisioner->table_D_value("COUNT", "bid_krj", "Periklanan dan penelitian pasar");
	$jasa_prof = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa profesional, ilmiah dan teknis lainnya");
	$jasa_kes_hwn = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa kesehatan hewan");
	$jasa_sewa = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa persewaan dan sewa guna usaha tanpa hak opsi");
	$jasa_ktnkrjn = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa ketenagakerjaan");
	$jasa_tour = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya");
	$jasa_aman = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa keamanan dan penyelidikan");
	$jasa_gdg = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa untuk gedung dan pertamanan");
	$jasa_adm = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya");
	$adm_pmrnth = $kuisioner->table_D_value("COUNT", "bid_krj", "Administrasi pemerintahan, pertahanan dan jaminan sosial wajib");
	$jasa_pend = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa pendidikan");
	$jasa_kes_mnsa = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa kesehatan manusia");
	$jasa_sos_pnt = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa kegiatan sosial di dalam panti");
	$jasa_sos_lu_pnt = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa kegiatan sosial di luar panti");
	$kgtn_hib = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan hiburan, kesenian dan kreativitas");
	$perpus = $kuisioner->table_D_value("COUNT", "bid_krj", "Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya");
	$judi = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan perjudian dan pertaruhan");
	$olga = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan olahraga dan rekreasi lainnya");
	$org = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan keanggotaan organisasi");
	$rpr_komp = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga");
	$jasa_orang = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa perorangan lainnya");
	$jasa_orang_rt = $kuisioner->table_D_value("COUNT", "bid_krj", "Jasa perorangan yang melayani rumah tangga");
	$rt_sndr = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan");
	$inter = $kuisioner->table_D_value("COUNT", "bid_krj", "Kegiatan badan internasional dan badan ekstra internasional lainnya");

	//D7
	$tug_utm = $kuisioner->table_D_t_value("COUNT", "bid_krj");

	//D8
	$rt_jm_tug_utm = $kuisioner->table_D_t_value("AVG", "rt_jam_tugas_utama_prmgg");
	$max_jm_tug_utm = $kuisioner->table_D_t_value("MAX", "rt_jam_tugas_utama_prmgg");
	$min_jm_tug_utm = $kuisioner->table_D_t_value("MIN", "rt_jam_tugas_utama_prmgg");
	$rt_jm_tug_tam = $kuisioner->table_D_t_value("AVG", "rt_jam_tugas_tmbhn_prmgg");
	$max_jm_tug_tam = $kuisioner->table_D_t_value("MAX", "rt_jam_tugas_tmbhn_prmgg");
	$min_jm_tug_tam = $kuisioner->table_D_t_value("MIN", "rt_jam_tugas_tmbhn_prmgg");
	$rt_jm_tug_lain = $kuisioner->table_D_t_value("AVG", "rt_jam_pkrjn_lain");
	$max_jm_tug_lain = $kuisioner->table_D_t_value("MAX", "rt_jam_pkrjn_lain");
	$min_jm_tug_lain = $kuisioner->table_D_t_value("MIN", "rt_jam_pkrjn_lain");
	$rt_jm_krj_tot = $kuisioner->table_D_t_value("AVG", "rt_tot_jm_krj_wrwst");
	$max_jm_krj_tot = $kuisioner->table_D_t_value("MAX", "rt_tot_jm_krj_wrwst");
	$min_jm_krj_tot = $kuisioner->table_D_t_value("MIN", "rt_tot_jm_krj_wrwst");

	//D9
	$ju_kontraktor = $kuisioner->table_D_value("COUNT", "ju_kontraktor", "Ya");
	$ju_beli_perus = $kuisioner->table_D_value("COUNT", "ju_beli_perus", "Ya");
	$ju_bngun_kntr = $kuisioner->table_D_value("COUNT", "ju_bngun_kntr", "Ya");
	$ju_mint = $kuisioner->table_D_value("COUNT", "ju_mint", "Ya");
	$ju_rmh = $kuisioner->table_D_value("COUNT", "ju_rmh", "Ya");
	$ju_sendiri = $kuisioner->table_D_value("COUNT", "ju_sendiri", "Ya");
	$ju_sdr = $kuisioner->table_D_value("COUNT", "ju_sdr", "Ya");
	$ju_lainnya = $kuisioner->table_D_t_value("COUNT", "ju_lainnya");

	//D10
	$rt_pndptn_pkrj_utm = $kuisioner->table_D_t_value("AVG", "pndptn_bln_prkjn_utm");
	$max_pndptn_pkrj_utm = $kuisioner->table_D_t_value("MAX", "pndptn_bln_prkjn_utm");
	$min_pndptn_pkrj_utm = $kuisioner->table_D_t_value("MIN", "pndptn_bln_prkjn_utm");
	$rt_pndptn_lmbr_tips = $kuisioner->table_D_t_value("AVG", "pndptn_bln_lmbr_tips");
	$max_pndptn_lmbr_tips = $kuisioner->table_D_t_value("MAX", "pndptn_bln_lmbr_tips");
	$min_pndptn_lmbr_tips = $kuisioner->table_D_t_value("MIN", "pndptn_bln_lmbr_tips");
	$rt_pndptn_lain = $kuisioner->table_D_t_value("AVG", "pndptn_bln_pkrjn_lain");
	$max_pndptn_lain = $kuisioner->table_D_t_value("MAX", "pndptn_bln_pkrjn_lain");
	$min_pndptn_lain = $kuisioner->table_D_t_value("MIN", "pndptn_bln_pkrjn_lain");

	//D11
	$cnt_jln_ln = $kuisioner->table_D_tds("COUNT", "prjln_luar_ngri_bsns","0");
	$rt_jln_ln = $kuisioner->table_D_tds("AVG", "prjln_luar_ngri_bsns","0");
	$max_jln_ln = $kuisioner->table_D_tds("MAX", "prjln_luar_ngri_bsns","0");
	$min_jln_ln = $kuisioner->table_D_tds("MIN", "prjln_luar_ngri_bsns","0");
	$tdk_jln_ln = $kuisioner->table_D_value("COUNT", "prjln_luar_ngri_bsns","0");

	//D12
	$cnt_prsn_inter = $kuisioner->table_D_tds("COUNT", "wkt_konteks_inter","0");
	$rt_prsn_inter = $kuisioner->table_D_tds("AVG", "wkt_konteks_inter","0");
	$max_prsn_inter = $kuisioner->table_D_tds("MAX", "wkt_konteks_inter","0");
	$min_prsn_inter = $kuisioner->table_D_tds("MIN", "wkt_konteks_inter","0");
	$tdk_prsn_inter = $kuisioner->table_D_value("COUNT", "wkt_konteks_inter","0");
?>
