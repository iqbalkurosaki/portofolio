<?php
error_reporting(0);
include ('../secure/secure_alumni.php');
require "call_class_kuisE.php";
	
?>

	  <!-- Le styles -->
  <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kuisioner.js"></script>
	<script src="../js/custom.js"></script>
	
	<div>
		  <!-- Le styles -->
		<form class="form-inline" role="form" id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td><h4>E</h4></td>
				<td><h4>PEKERJAAN DAN KOMPETENSI, HUBUNGAN ANTARA STUDI DENGAN KERJA</h4></td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr>
				<td><b>E1</td>
				<td colspan="6"><b>Sejauh mana program keahlian anda bermanfaat untuk hal-hal di bawah ini?</b></td>
			</tr>
			<tr align="center"><td></td><td><font size="2">Sangat besar</font></td><td><font size="2">Besar</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			<tr align="center"><td></td>
			<td><?php echo $E4_1_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_1_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_1_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_1_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_1_t['jumlah'];
			?>
			</td><td align="left">Memulai pekerjaan?</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E4_2_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_2_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_2_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_2_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_2_t['jumlah'];
			?>
			</td><td align="left">Pembelajaran lanjut dalam pekerjaan?</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E4_3_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_3_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_3_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_3_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_3_t['jumlah'];
			?>
			</td><td align="left">Kinerja dalam menjalankan tugas?</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E4_4_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_4_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_4_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_4_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_4_t['jumlah'];
			?>
			</td><td align="left">Karir di masa depan?</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E4_5_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_5_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_5_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_5_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_5_t['jumlah'];
			?>
			</td><td align="left">Pengembangan diri?</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E4_6_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E4_6_b['jumlah'];
			?>
			</td>
			<td><?php echo $E4_6_c['jumlah'];
			?>
			</td>
			<td><?php echo $E4_6_k['jumlah'];
			?>
			</td>
			<td><?php echo $E4_6_t['jumlah'];
			?>
			</td>	<td align="left">Meningkatkan ketrampilan kewirausahaan?</td></tr>
			<tr></tr>
			<tr>
				<td><b>E2</td>
				<td colspan="6"><b>Seberapa besar peran kompetensi yang diperoleh di sekolah berikut ini dalam melaksanakan pekerjaan anda?</b></td>
			</tr>
			<tr align="center"><td></td><td><font size="2">Sangat besar</font></td><td><font size="2">Besar</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			
			<tr align="center">
			<td></td>
			<td><?php echo $E5_1_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_1_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_1_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_1_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_1_t['jumlah'];
			?>
			</td><td align="left">Pengetahuan di bidang atau disiplin ilmu anda</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_2_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_2_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_2_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_2_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_2_t['jumlah'];
			?>
			</td><td align="left">Pengetahuan di luar bidang atau disiplin ilmu anda</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_3_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_3_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_3_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_3_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_3_t['jumlah'];
			?>
			</td><td align="left">Pengetahuan umum</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_4_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_4_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_4_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_4_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_4_t['jumlah'];
			?>
			</td>	<td align="left">Ketrampilan internet</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_5_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_5_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_5_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_5_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_5_t['jumlah'];
			?>
			</td><td align="left">Ketrampilan komputer</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_6_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_6_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_6_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_6_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_6_t['jumlah'];
			?>
			</td><td align="left">Kemampuan belajar</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_7_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_7_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_7_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_7_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_7_t['jumlah'];
			?>
			</td><td align="left">Kemampuan berkomunikasi</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_8_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_8_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_8_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_8_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_8_t['jumlah'];
			?>
			</td><td align="left">Bekerja di bawah tekanan</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_9_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_9_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_9_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_9_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_9_t['jumlah'];
			?>
			</td><td align="left">Manajemen waktu</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_10_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_10_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_10_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_10_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_10_t['jumlah'];
			?>
			</td><td align="left">Bekerja secara mandiri</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_11_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_11_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_11_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_11_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_11_t['jumlah'];
			?>
			</td><td align="left">Bekerja dalam tim/bekerjasama dengan orang lain</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_12_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_12_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_12_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_12_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_12_t['jumlah'];
			?>
			</td>	<td align="left">Kemampuan dalam memecahkan masalah</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_13_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_13_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_13_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_13_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_13_t['jumlah'];
			?>
			</td><td align="left">Negosiasi</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_14_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_14_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_14_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_14_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_14_t['jumlah'];
			?>
			</td><td align="left">Kemampuan analisis</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_15_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_15_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_15_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_15_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_15_t['jumlah'];
			?>
			</td><td align="left">Toleransi</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_16_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_16_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_16_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_16_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_16_t['jumlah'];
			?>
			</td><td align="left">Kemampuan adaptasi</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_17_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_17_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_17_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_17_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_17_t['jumlah'];
			?>
			</td><td align="left">Loyalitas dan integritas</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_18_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_18_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_18_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_18_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_18_t['jumlah'];
			?>
			</td>	<td align="left">Bekerja dengan orang yang berbeda budaya maupun latar belakang</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_19_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_19_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_19_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_19_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_19_t['jumlah'];
			?>
			</td><td align="left">Kepemimpinan</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_20_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_20_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_20_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_20_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_20_t['jumlah'];
			?>
			</td><td align="left">Kemampuan dalam memegang tanggungjawab</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_21_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_21_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_21_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_21_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_21_t['jumlah'];
			?>
			</td><td align="left">Inisiatif</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_22_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_22_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_22_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_22_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_22_t['jumlah'];
			?>
			</td> <td align="left">Manajemen proyek/program</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_23_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_23_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_23_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_23_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_23_t['jumlah'];
			?>
			</td>	<td align="left">Kemampuan untuk memresentasikan ide/produk/laporan</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_24_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_24_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_24_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_24_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_24_t['jumlah'];
			?>
			</td><td align="left">Kemampuan dalam menulis laporan, memo dan dokumen</td></tr>
			<tr align="center">
			<td></td>
			<td><?php echo $E5_25_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E5_25_b['jumlah'];
			?>
			</td>
			<td><?php echo $E5_25_c['jumlah'];
			?>
			</td>
			<td><?php echo $E5_25_k['jumlah'];
			?>
			</td>
			<td><?php echo $E5_25_t['jumlah'];
			?>
			</td><td align="left">Kemampuan untuk terus belajar sepanjang hayat</td></tr>
			
			<tr>
				<td><b>E3</td>
				<td colspan="6"><b>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</b></td>
			</tr>
			<tr><td></td><td><font size="2">Sangat erat</font></td><td><font size="2">Erat</font></td><td><font size="2">Cukup</font></td><td><font size="2">Kurang</font></td><td><font size="2">Tidak sama sekali<font size="1"></td><td></td></tr>
			<tr>
			<td></td>
			<td><?php echo $E6_sb['jumlah'];
			?>
			</td>
			<td><?php echo $E6_b['jumlah'];
			?>
			</td>
			<td><?php echo $E6_c['jumlah'];
			?>
			</td>
			<td><?php echo $E6_k['jumlah'];
			?>
			</td>
			<td><?php echo $E6_t['jumlah'];
			?>
			</td><td align="left">Hubungan bidang studi dengan pekerjaan</td></tr>
			</table>
			<table class="table table-striped">
			<tr>
				<td><b>E4</td>
				<td width="60" colspan="6"><b>Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</b></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6">Setingkat lebih tinggi : <?php echo $E7_sb['jumlah'];
			?></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6">Tingkat yang sama : <?php echo $E7_b['jumlah'];
			?></td>
			</tr>
			<tr>
			<td></td>
			<td width="30" colspan="6">Setingkat lebih rendah : <?php echo $E7_c['jumlah'];
			?></td>
			</tr>	
			<tr>
			<td></td>
			<td width="30" colspan="6">Tidak perlu pendidikan tinggi : <?php echo $E7_k['jumlah'];
			?></td>
			</tr>	
			<tr></tr>
			<tr>
				<td><b>E5</td>
				<td colspan="6"><b>Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya?</b><i><font size="2">Jawaban bisa lebih dari satu</b></td>
			</tr>
			<tr><td></td><td width="30" colspan="8">Pertanyaan tidak sesuai, pekerjaan saya sekarang sudah sesuai dengan pendidikan saya. : <?php echo $E8_1['jumlah'];
			?>	</td></tr>
			<tr><td></td><td width="30" colspan="8">Saya belum mendapatkan pekerjaan yang lebih sesuai. : <?php echo $E8_2['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			Di pekerjaan ini saya memeroleh prospek karir yang baik. : <?php echo $E8_3['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya  : <?php echo $E8_4['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.  : <?php echo $E8_5['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			Saya dapat memeroleh pendapatn yang lebih tinggi di pekerjaan ini.  : <?php echo $E8_6['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			Pekerjaan saya saat ini lebih aman/terjamin/secure  : <?php echo $E8_7['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">Pekerjaan saya saat ini lebih menarik  : <?php echo $E8_8['jumlah'];
			?></td></tr>
			<tr><td></td><td width="30" colspan="8">Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll. : <?php echo $E8_9['jumlah'];
			?>			</td></tr>
			<tr><td></td><td width="30" colspan="8">Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya. : <?php echo $E8_10['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.  : <?php echo $E8_11['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.  : <?php echo $E8_12['jumlah'];
			?>
			</td></tr>
			<tr><td></td><td width="30" colspan="8">
			<?php
			echo "Lainnya : ";
			?>
				<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModale8">
			  klik disini
			</button>
			
			</td></tr>
			
		
		</table>
			
	</div>	
</form>
	 </div>
	 
	 
	 </div>
	