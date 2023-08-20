<?php
	require_once "call_class_kuisC.php";
	//include "modal_laporan.php";
?>


<div class="table-responsive">
				<table  class="table table-striped">
				<tr class="success">
					<td><h4>C</h4></td>
					<td><h4>PENCARIAN KERJA DAN TRANSISI KE DUNIA KERJA</h4></td>
				</tr>
				<tr></tr>
				<tr>
					<td><b>C1</td>
					<td><b>Kapan anda mulai mencari pekerjaan?</b><i><font size="2">Mohon pekerjaan sambilan tidak dimasukkan</td>
				</tr>
				<tr>
					<td></td>
					<td>
						Total Alumni yang Mencari Kerja Sebelum Lulus : <?php echo $tot_seb_lul["hasil"];?> <br/>
						Total Alumni yang Mencari Kerja Setelah lulus : <?php echo $tot_set_lul["hasil"];?> <br/>
						Rata-Rata Sebelum lulus : <?php echo $rt_seb_lul["hasil"];?> <br/>
						Rata-Rata Setelah lulus : <?php echo $rt_set_lul["hasil"];?> <br/>
						Max Bulan Sebelum lulus : <?php echo $max_seb_lul["hasil"];?> <br/>
						Max Bulan Setelah Lulus : <?php echo $max_set_lul["hasil"];?> <br/>
						Min Bulan Sebelum lulus : <?php echo $min_seb_lul["hasil"];?> <br/>
						Min Bulan Setelah Lulus : <?php echo $min_set_lul["hasil"];?> <br/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak Mencari Kerja : <?php echo $tdk_cr["jumlah"];?></td>
				</tr>
				<tr>
					<td><b>C2</td>
					<td><b>Bagaimana anda mencari pekerjaan Sesudah lulus?</b><i><font size="2">Jawaban bisa lebih dari satu</td>
				</tr>
				<tr>
					<td></td>
					<td>Melalui iklan di koran/majalah, brosur  :  <?php echo $iklan_ctk["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Melamar ke perusahaan tanpa mengetahui lowongan yang ada  :  <?php echo $lamar_tanpa_tahu["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Pergi ke bursa/pameran kerja  :  <?php echo $pergi_bursa["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Mencari lewat internet/iklan online/milis  :  <?php echo $iklan_ol["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Dihubungi oleh perusahaan  :  <?php echo $dihub_perus["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Menghubungi Kemnakertrans  :  <?php echo $menghub_kemnaker["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Menghubungi agen tenaga kerja komersiaI/swasta :  <?php echo $menghub_agen["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Memeroleh informasi dari pusat/kantor pengembangan karir SMA  :  <?php echo $pengem_karir_SMA["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Menghubungi kantor kesiswaan/hubungan alumni :  <?php echo $menghub_alumni["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Membangun network sejak masih sekolah :  <?php echo $bangun_network["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Melalui relasi (misalnya guru, orantua, saudara, teman, dll.) :  <?php echo $relasi["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Membangun bisnis sendiri :  <?php echo $bangun_bisnis["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Melalui penempatan kerja atau magang :  <?php echo $magang["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Bekerja di tempat yang sama dengan tempat kerja semasa sekolah :  <?php echo $kerja_sekolah["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Lainnya : 
						<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalc2">
			  klik disini
			</button>
					 </td>
				</tr>
				
				<tr>
					<td><b>C3</td>
					<td><b>Berdasarkan persepsi anda, seberapa pentingkah aspek-aspek di bawah ini bagi perusahaan/instansi dalam melakukan penerimaan pegawai baru?</b><br><i><font size="2">Jawaban bisa lebih dari satu</td>
				</tr>
				<tr>
					<td></td>
					<td>Program studi :  <?php echo $asp_prodi["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Spesialisasi :  <?php echo $asp_spesialisasi["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Nilai NEM :  <?php echo $asp_NEM["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Pengalaman kerja selama sekolah :  <?php echo $asp_pengalaman_kerja_sekolah["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Reputasi dari sekolah :  <?php echo $asp_reputasi_sekolah["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Kemampuan bahasa inggris :  <?php echo $asp_bing["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Kemampuan bahasa asing lainnya :  <?php echo $asp_basing["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Pengoperasian computer :  <?php echo $asp_op_komp["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Pengalaman berorganisasi :  <?php echo $asp_organisasi["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Rekomendasi dari pihak ketiga :  <?php echo $asp_rekom_tiga["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Kepribadian dan ketrampilan antar personal :  <?php echo $asp_prib_trampil["jumlah"]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Lainnya : 
						<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalc3">
			  klik disini
			</button>
					</td>
				</tr>
				<tr>
					<td><b>C4</td>
					<td><b>Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
				</tr>
				<tr>
					<td></td>
					<td>				
						Total Alumni yang melamar Institusi : <?php echo $alumn_lmr_inst["jumlah"];?><br/>
						Total Instansi yang Dilamar Alumni (SUM) : <?php echo $tot_inst_dlmr["jumlah"];?><br/>
						Rata-Rata Instansi yang Dilamar Alumni : <?php echo $rta_inst_dlmr["rata"]; ?><br/>
						Max Instansi yang Dilamar Alumni : <?php echo $max_inst_dlmr["rata"]; ?><br/>
						Min Instansi yang Dilamar Alumni : <?php echo $min_inst_dlmr["rata"]; ?>

					</td>
				</tr>
				<tr>
					<td><b>C5</td>
					<td><b>Berapa bulan waktu yang dihabiskan (sebelum dan setelah kelulusan) untuk memeroleh pekerjaan pertama?</td>
				</tr>


					</tr>
				<tr>
					<td></td>
					<td>
						Total Alumni yang Memperoleh Kerja Sebelum Lulus : <?php echo $tot_p_seb_lul["hasil"];?> <br/>
						Total Alumni yang Memperoleh Kerja Setelah lulus : <?php echo $tot_p_set_lul["hasil"];?> <br/>
						Rata-Rata Peroleh Sebelum lulus : <?php echo $rt_p_seb_lul["hasil"];?> <br/>
						Rata-Rata Peroleh Setelah lulus : <?php echo $rt_p_set_lul["hasil"];?> <br/>
						Max Bulan Peroleh Sebelum lulus : <?php echo $max_p_seb_lul["hasil"];?> <br/>
						Max Bulan Peroleh Setelah Lulus : <?php echo $max_p_set_lul["hasil"];?> <br/>
						Min Bulan Peroleh Sebelum lulus : <?php echo $min_p_seb_lul["hasil"];?> <br/>
						Min Bulan Peroleh Setelah Lulus : <?php echo $min_p_set_lul["hasil"];?> <br/>
					</td>
				</tr>

				<tr>
					<td><b>C6</td>
					<td><b>Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
				</tr>
				<tr><td></td>
					<td>Jumlah Perusahaan yang Merespon Lamaran Alumni : <?php echo $jml_perus_rspn_lmrn["hasil"];?> <br/>
						Total Alumni yang Lamarannya Direspon Perusahaan : <?php echo $tot_alum_lmrn_drspn["hasil"];?> <br/>
						Rata-Rata Perusahaan yang Merespon Lamaran Alumni : <?php echo $rt_perus_rspn_lmrn["hasil"];?> <br/>
						Jumlah Terbesar Perusahaan yang Merespon Lamaran Seorang Alumni : <?php echo $max_perus_rspn_lmrn["hasil"];?> <br/>
						Jumlah Terkecil Perusahaan yang Merespon Lamaran Seorang Alumni : <?php echo $min_perus_rspn_lmrn["hasil"];?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak Ada : <?php echo $instansi_respon_lmrn_tidak["jumlah"]; ?></td>
				</tr>
				<tr>
					<td><b>C7</td>
					<td><b>Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
				</tr>
				<tr><td></td>
					<td>
						Jumlah Perusahaan yang Mengundang Wawancara : <?php echo $jml_perus_udg_wwcr["hasil"];?> <br/>
						Total Alumni yang Diundang untuk Wawancara : <?php echo $tot_alum_udg_wwcr["hasil"];?> <br/>
						Rata-Rata Perusahaan yang Mengundang untuk Wawancara : <?php echo $rt_perus_udg_wwcr["hasil"];?> <br/>
						Jumlah Terbesar Perusahaan yang Pernah Mengundang Seorang Alumni : <?php echo $max_perus_udg_wwcr["hasil"];?> <br/>
						Jumlah Terkecil Perusahaan yang Pernah Mengundang Seorang Alumni : <?php echo $min_perus_udg_wwcr["hasil"];?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>Tidak Ada : <?php echo $perus_udg_wwcr_tdk["jumlah"]; ?></td>
				</tr>
					<tr>
						<td><b>C8</td>
						<td><b>Apa alasan utama anda tidak mencari pekerjaan Sesudah lulus sekolah?</td>
					</tr>
					<tr>
						<td></td>
						<td>Saya memulai bisnis sendiri : <?php echo $bisnis_sendiri["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya sudah memeroleh pekerjaan sebelum lulus : <?php echo $peroleh_krj_seb_lls["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya melanjutkan kuliah : <?php echo $lanjut_kul["jumlah"]; ?></label></div></td>
					</tr>
					<tr>
						<td></td>
						<td>Saya belum mencari pekerjaan : <?php echo $blm_cr_krj["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Lainnya :
							<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalc8">
			  klik disini
			</button>
						</td>
					</tr>
				</tbody>
				<tbody id="c910">
					<tr>
						<td><b>C9</td>
						<td><b>Bagaimana cara anda mendapatkan pekerjaan pertama?</b><i><font size="2"> Hanya satu jawaban</td>
					</tr>
					<tr>
						<td></td>
						<td>Melalui iklan di koran/majalah, brosur : <?php echo $d_iklan_ctk["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Melamar ke perusahaan tanpa mengetahui lowongan yang ada : <?php echo $d_lamar_tanpa_tahu["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Pergi ke bursa/pameran kerja : <?php echo $d_pergi_bursa["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Mencari lewat internet/iklan online/milis : <?php echo $d_iklan_ol["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Dihubungi oleh perusahaan : <?php echo $d_dihub_perus["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Menghubungi Kemnakertrans : <?php echo $d_menghub_kemnaker["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Menghubungi agen tenaga kerja komersial/swasta : <?php echo $d_menghub_agen["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Memeroleh informasi dari pusat/kantor pengembangan karir SMA : <?php echo $d_pengem_karir_SMA["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Menghubungi kantor kesiswaan/hubungan alumni : <?php echo $d_menghub_alumni["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Membangun network sejak masih sekolah : <?php echo $d_bangun_network["jumlah"]; ?></td>
					</tr>
					<tr>
						<td></td>
						<td>Melalui relasi (misalnya guru, orantua, saudara, teman, dll.) : <?php echo $d_relasi["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Membangun bisnis sendiri : <?php echo $d_bangun_bisnis["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Melalui penempatan kerja atau magang : <?php echo $d_magang["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Bekerja di tempat yang sama dengan tempat kerja semasa sekolah : <?php echo $d_kerja_sekolah["jumlah"];?></td>
					</tr>
					<tr>
						<td></td>
						<td>Lainnya : 
								<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalc9">
			  klik disini
			</button>
						</td>
					</tr>
					
				</tbody>
				
				</table>
				</div>

