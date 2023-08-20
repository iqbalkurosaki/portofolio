<?php 
	require_once '../config/config.php';
	
	if (($_POST["submit"] == "Kirim")) {
		$id_kuis_d = $_SESSION['FULLNAME'];

		$work_now = $_POST["work_now"];
		$st_blj = $_POST["st_blj"];
		$st_mnkh = $_POST["st_mnkh"];
		$st_sbk = $_POST["st_sbk"];
		$st_cari = $_POST["st_cari"];
		$situasi_other_text =code($_POST["situasi_other_text"]);


		$aktif_get =code ($_POST["aktif_get"]);

		$jml_perus = $_POST["jml_perus"];

		$jenis_perus =code( $_POST["jenis_perus"]);

		$bidang = code ($_POST["bidang"]);

		$tugas_job =code( $_POST["tugas_job"]);

		$tugas_utama =code( $_POST["tugas_utama"]);

		$tugas_tambahan = $_POST["tugas_tambahan"];

		$job_lain = $_POST["job_lain"];

		$jam_job = $_POST["jam_job"];
		$ju_kontr = $_POST["ju_kontr"];
		$ju_beli_perus = $_POST["ju_beli_perus"];
		$ju_bngun_kntr = $_POST["ju_bngun_kntr"];
		$ju_mint = $_POST["ju_mint"];
		$ju_rmh	= $_POST["ju_rmh"];
		$ju_sendiri = $_POST["ju_sendiri"];
		$ju_sdr = $_POST["ju_sdr"];
		$jenis_usaha_other_text =code( $_POST["jenis_usaha_other_text"]);

		$job_utama = $_POST["job_utama"];

		$lembur = $_POST["lembur"];

		$job_lain = $_POST["job_lain"];

		$bsnsInter = $_POST["bsnsInter"];

		$persen_inter = $_POST["persen_inter"];


		$sql = "INSERT INTO kuisioner_d VALUES ('".$id_kuis_d."','".$work_now."','".$st_blj."','".$st_mnkh."','".$st_sbk."','".$st_cari."','".$situasi_other_text."','".$aktif_get."','".$jml_perus."','".$jenis_perus."'
												,'".$bidang."','".$tugas_job."','".$tugas_utama."','".$tugas_tambahan."','".$job_lain."','".$jam_job."'
												,'".$ju_kontr."','".$ju_beli_perus."','".$ju_bngun_kntr."','".$ju_mint."','".$ju_rmh."','".$ju_sendiri."','".$ju_sdr."','".$jenis_usaha_other_text."','".$job_utama."','".$lembur."','".$job_lain."','".$bsnsInter."','".$persen_inter."')";

		if ($db->Execute($sql)) {
			echo "<div class='alert alert-success' role='alert'>Selamat telah terkirim. <a href='menu_alumni.php?a=kuisioner_E'>Selanjutnya</a></div>";
						}else{
							echo "<div class='alert alert-warning' role='alert'>Gagal Menambahkan<br/></div>";
							print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg(). "<BR></div>";
		}
	}
 ?>
<script src="../js/kuisioner.js"></script>
		<form class="form-inline" role="form"  id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();">
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td><h4>D</h4></td>
				<td><h4>PEKERJAAN</h4></td>
			</tr>
			<tr></tr>
			<tr>
				<td><b>D1</td>
				<td><b>Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?</td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="work_now" id="work_now_ya" value="Ya" <?php if( isset($_POST['job2']) && $_POST['job2'] == 'Ya' ){ echo "checked='checked'"; }?> /> Ya<i><font size="2">==>Lanjut ke D3</font></i></label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="work_now" value="Tidak" <?php if( isset($_POST['job2']) && $_POST['job2'] == 'Tidak' ){ echo "checked='checked'"; }?> /> Tidak</label></div></td>
			</tr>
			<tbody id="D2">
				<tr>
					<td><b>D2</td>
					<td><b>Bagaimana anda menggambarkan situasi anda saat ini? </b><i><font size="2">Jawaban bisa lebih dari satu</td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="st_blj" value="Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana"/> Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="st_mnkh" value="Saya menikah"/> Saya menikah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="st_sbk" value="Saya sibuk dengan keluarga dan anak-anak"/> Saya sibuk dengan keluarga dan anak-anak</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="st_cari" value="Saya sekarang sedang mencari pekerjaan"/> Saya sekarang sedang mencari pekerjaan</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" id="situasi_other_chk" name="situasi_other" /> Lainnya : <input type="text" id="situasi_other_text" name="situasi_other_text" value="<?php	echo isset ($_POST['situasi_lain']) ? $_POST['situasi_lain'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
				</tr>
			</tbody>
			<tr>
				<td><b>D3</td>
				<td><b>Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? </b><i><font size="2">Pilih satu jawaban</td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="aktif_get" value="Tidak" <?php if( isset($_POST['aktif_get']) && $_POST['aktif_get'] == 'Tidak' ){ echo "checked='checked'"; }?> /> Tidak</label></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="aktif_get" value="Tidak, tapi saya sedang menunggu hasil lamaran kerja" <?php if( isset($_POST['aktif_get']) && $_POST['aktif_get'] == 'Tidak, tapi saya sedang menunggu hasil lamaran kerja' ){ echo "checked='checked'"; }?> /> Tidak, tapi saya sedang menunggu hasil lamaran kerja</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="aktif_get" value="Ya, saya akan mulai bekerja dalam 2 minggu ke depan" <?php if( isset($_POST['aktif_get']) && $_POST['aktif_get'] == 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan' ){ echo "checked='checked'"; }?> /> Ya, saya akan mulai bekerja dalam 2 minggu ke depan</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><div class="radio"><label><input type="radio"  name="aktif_get" value="Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan" <?php if( isset($_POST['aktif_get']) && $_POST['aktif_get'] == 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan' ){ echo "checked='checked'"; }?> /> Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  id="aktif_get_rdo" name="aktif_get"  <?php if( isset($_POST['aktif_get']) && $_POST['aktif_get'] == 'Lainnya' ){ echo "checked='checked'"; }?> /> Lainnya :
				<input type="text" id="aktif_get_text" name="aktif_get" value="<?php	echo isset ($_POST['aktif_get']) ? $_POST['aktif_get'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
			</tr>
			<tr>
				<td><b>D4</td>
				<td><b>Berapa perusahaan/instansi/institusi yang telah anda masuki untuk bekerja (termasuk perusahaan sendiri) sejak anda lulus dari sekolah?</td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="text" id="jml_perus" name="jml_perus" value="<?php	echo isset ($_POST['jml_perus']) ? $_POST['jml_perus'] : '';?>" placeholder="Mohon tuliskan"/></label></div></td>
			</tr>
			<tr>
				<td><b>D5</td>
				<td><b>Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="jenis_perus" value="Instansi pemerintah (termasuk BUMN)" <?php if( isset($_POST['jenis_perus']) && $_POST['jenis_perus'] == 'Instansi pemerintah (termasuk BUMN)' ){ echo "checked='checked'"; }?> /> Instansi pemerintah (termasuk BUMN)</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="jenis_perus" value="Organisasi non-profit/Lembaga Swadaya Masyarakat" <?php if( isset($_POST['jenis_perus']) && $_POST['jenis_perus'] == 'Organisasi non-profit/Lembaga Swadaya Masyarakat' ){ echo "checked='checked'"; }?> /> Organisasi non-profit/Lembaga Swadaya Masyarakat</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="jenis_perus" value="Perusahaan swasta" <?php if( isset($_POST['jenis_perus']) && $_POST['jenis_perus'] == 'Perusahaan swasta' ){ echo "checked='checked'"; }?> /> Perusahaan swasta</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio"  name="jenis_perus" value="Wiraswasta/perusahaan sendiri" <?php if( isset($_POST['jenis_perus']) && $_POST['jenis_perus'] == 'Wiraswasta/perusahaan sendiri' ){ echo "checked='checked'"; }?> /> Wiraswasta/perusahaan sendiri</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio" id="jenis_perus_rdo" name="jenis_perus" <?php if( isset($_POST['jenis_perus']) && $_POST['jenis_perus'] == 'Lainnya' ){ echo "checked='checked'"; }?> /> Lainnya :
					<input type="text" id="jenis_perus_text" name="jenis_perus" value="<?php	echo isset ($_POST['jenisperus']) ? $_POST['jenisperus'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
				</tr>
			<tr>
				<td><b>D6</td>
				<td><b>Tempat anda bekerja saat ini bergerak di bidang apa? (Klasifikasi Baku Lapangan Usaha Indonesia,Kemnakertrans, 2009)</b></td>
			</tr>
				<tr>
					<td><b></td>
					<td><b>Kategori A: Pertanian, kehutanan, dan perikanan</td>
				</tr>
				<tr>
					<td><font size="1">1</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu' ){ echo "checked='checked'"; }?> />
				Pertanian tanaman, peternakan, perburuan dan kegiatan yang berhubungan dengan itu</label></div></td>
				</tr>
				<tr>
					<td><font size="1">2</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kehutanan dan penetugas_tambahanan kayu" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kehutanan dan penetugas_tambahanan kayu' ){ echo "checked='checked'"; }?> />
				Kehutanan dan penetugas_tambahanan kayu</label></div></td>
				</tr>
				<tr>
				<td><font size="1">3</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Perikanan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Perikanan' ){ echo "checked='checked'"; }?> />
				Perikanan</label></div></td>
				</tr>
				<tr>
					<td><b></td>
					<td><b>Kategori B: Pertambangan dan penggalian</td>
				</tr>
				<tr>
				<td><font size="1">4</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pertambangan batu bara dan lignit" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pertambangan batu bara dan lignit' ){ echo "checked='checked'"; }?> />
				Pertambangan batu bara dan lignit</label></div></td>
				</tr>
				<tr>
					<td><font size="1">5</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pertambangan minyak bumi dan gas alam dan panas bumi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pertambangan minyak bumi dan gas alam dan panas bumi' ){ echo "checked='checked'"; }?> />
				Pertambangan minyak bumi dan gas alam dan panas bumi</label></div></td>
				</tr>
				<tr>
					<td><font size="1">6</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pertambangan bijih logam" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pertambangan bijih logam' ){ echo "checked='checked'"; }?> />
				Pertambangan bijih logam</label></div></td>
				</tr>
				<tr>
				<td><font size="1">7</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pertambangan dan penggalian lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pertambangan dan penggalian lainnya' ){ echo "checked='checked'"; }?> />
				Pertambangan dan penggalian lainnya</label></div></td>
				</tr>
				<tr><td><font size="1">8</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa Pertambangan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa Pertambangan' ){ echo "checked='checked'"; }?> />
				Jasa Pertambangan</label></div></td>
				</tr>
				<tr>
					<td><b></td>
					<td><b>Kategori C: Industri Pengolahan</td>
				</tr>
				<tr>
					<td><font size="1">9</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri makanan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri makanan' ){ echo "checked='checked'"; }?> />
				industri makanan</label></div></td>
				</tr>
				<tr><td><font size="1">10</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri minuman" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri minuman' ){ echo "checked='checked'"; }?> />
				Industri minuman</label></div></td></tr>
				<tr><td><font size="1">11</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri pengolahan tembakau" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri pengolahan tembakau' ){ echo "checked='checked'"; }?> />
				Industri pengolahan tembakau</label></div></td></tr>
				<tr><td><font size="1">12</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri tekstil" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri tekstil' ){ echo "checked='checked'"; }?> />
				Industri tekstil</label></div></td></tr>
				<tr><td><font size="1">13</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri pakaian jadi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri pakaian jadi' ){ echo "checked='checked'"; }?> />
				Industri pakaian jadi</label></div></td></tr>
				<tr><td><font size="1">14</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri kulit, barang dari kulit dan alas kaki" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri kulit, barang dari kulit dan alas kaki' ){ echo "checked='checked'"; }?> />
				Industri kulit, barang dari kulit dan alas kaki</label></div></td></tr>
				<tr><td><font size="1">15</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya' ){ echo "checked='checked'"; }?> />
				Industri kayu, barang dari kayu dan gabus (tidak termasuk furnitur) dan barang anyaman dari bambu, rotan dan sejenisnya</label></div></td></tr>
				<tr><td><font size="1">16</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri kertas dan barang dari kertas" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri kertas dan barang dari kertas' ){ echo "checked='checked'"; }?> />
				Industri kertas dan barang dari kertas</label></div></td></tr>
				<tr><td><font size="1">17</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri pencetakan dan reproduksi media rekaman" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri pencetakan dan reproduksi media rekaman' ){ echo "checked='checked'"; }?> />
				Industri pencetakan dan reproduksi media rekaman</label></div></td></tr>
				<tr><td><font size="1">18</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri produk dari batu bara dan pengilangan minyak bumi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri produk dari batu bara dan pengilangan minyak bumi' ){ echo "checked='checked'"; }?> />
				Industri produk dari batu bara dan pengilangan minyak bumi</label></div></td></tr>
				<tr><td><font size="1">19</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri bahan kimia dan barang dari bahan kimia" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri bahan kimia dan barang dari bahan kimia' ){ echo "checked='checked'"; }?> />
				Industri bahan kimia dan barang dari bahan kimia</label></div></td></tr>
				<tr><td><font size="1">20</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri farmasi, produk obat kimia dan obat tradisional" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri farmasi, produk obat kimia dan obat tradisional' ){ echo "checked='checked'"; }?> />
				Industri farmasi, produk obat kimia dan obat tradisional</label></div></td></tr>
				<tr><td><font size="1">21</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri karet, barang dari karet dan plastik" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri karet, barang dari karet dan plastik' ){ echo "checked='checked'"; }?> />
				Industri karet, barang dari karet dan plastik</label></div></td></tr>
				<tr><td><font size="1">22</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri barang galian bukan logam" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri barang galian bukan logam' ){ echo "checked='checked'"; }?> />
				Industri barang galian bukan logam</label></div></td></tr>
				<tr><td><font size="1">23</td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri logam dasar" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri logam dasar' ){ echo "checked='checked'"; }?> />
				Industri logam dasar</label></div></td></tr>
				<tr><td><font size="1">24</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri barang logam, bukan mesin dan peralatannya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri barang logam, bukan mesin dan peralatannya' ){ echo "checked='checked'"; }?> />
				Industri barang logam, bukan mesin dan peralatannya</label></div></td></tr>
				<tr><td><font size="1">25</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri komputer, barang elektronik dan optik" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri komputer, barang elektronik dan optik' ){ echo "checked='checked'"; }?> />
				Industri komputer, barang elektronik dan optik</label></div></td></tr>
				<tr><td><font size="1">26</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri peralatan listrik" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri peralatan listrik' ){ echo "checked='checked'"; }?> />
				Industri peralatan listrik</label></div></td></tr>
				<tr><td><font size="1">27</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri mesin dan perlengkapan ytdl" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri mesin dan perlengkapan ytdl' ){ echo "checked='checked'"; }?> />
				Industri mesin dan perlengkapan ytdl</label></div></td></tr>
				<tr><td><font size="1">28</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri kendaraan bermotor, trailer dan semi trailer" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri kendaraan bermotor, trailer dan semi trailer' ){ echo "checked='checked'"; }?> />
				Industri kendaraan bermotor, trailer dan semi trailer</label></div></td></tr>
				<tr><td><font size="1">29</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri alat angkutan lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri alat angkutan lainnya' ){ echo "checked='checked'"; }?> />
				Industri alat angkutan lainnya</label></div></td></tr>
				<tr><td><font size="1">30</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri furnitur" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri furnitur' ){ echo "checked='checked'"; }?> />
				Industri furnitur</label></div></td></tr>
				<tr><td><font size="1">31</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Industri pengolahan lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Industri pengolahan lainnya' ){ echo "checked='checked'"; }?> />
				Industri pengolahan lainnya</label></div></td></tr>
				<tr><td><font size="1">32</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa reparasi dan pemasangan mesin dan peralatan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa reparasi dan pemasangan mesin dan peralatan' ){ echo "checked='checked'"; }?> />
				Jasa reparasi dan pemasangan mesin dan peralatan</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori D: Pengadaan listrik, gas, uap/air panas dan udara dingin</td>
				</tr>
				<tr><td><font size="1">33</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pengadaan listrik, gas, uap/air panas dan udara dingin" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pengadaan listrik, gas, uap/air panas dan udara dingin' ){ echo "checked='checked'"; }?> />
				Pengadaan listrik, gas, uap/air panas dan udara dingin</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori E: Pengadaan air, pengelolaan sampah dan daur ulang, pembuangan dan pembersihan limbah dan sampah</td>
				</tr>
				<tr><td><font size="1">34</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pengadaan air" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pengadaan air' ){ echo "checked='checked'"; }?> />
				Pengadaan air</label></div></td></tr>
				<tr><td><font size="1">35</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pengolahan limbah" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pengolahan limbah' ){ echo "checked='checked'"; }?> />
				Pengolahan limbah</label></div></td></tr>
				<tr><td><font size="1">36</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pengolahan sampah dan daur ulang" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pengolahan sampah dan daur ulang' ){ echo "checked='checked'"; }?> />
				Pengolahan sampah dan daur ulang</label></div></td></tr>
				<tr><td><font size="1">37</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa pembersihan dan pengelolaan sampah lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa pembersihan dan pengelolaan sampah lainnya' ){ echo "checked='checked'"; }?> />
				Jasa pembersihan dan pengelolaan sampah lainnya</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori F: Konstruksi</td>
				</tr>
				<tr><td><font size="1">38</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Konstruksi gedung" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Konstruksi gedung' ){ echo "checked='checked'"; }?> />
				Konstruksi gedung</label></div></td></tr>	
				<tr><td><font size="1">39</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Konstruksi tugas_tambahanunan sipil" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Konstruksi tugas_tambahanunan sipil' ){ echo "checked='checked'"; }?> />
				Konstruksi tugas_tambahanunan sipil</label></div></td></tr>
				<tr><td><font size="1">40</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Konstruksi khusus" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Konstruksi khusus' ){ echo "checked='checked'"; }?> />
				Konstruksi khusus</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori G: Perdagangan Angkutan air dan eceran; reparasi dan perawatan mobil dan sepeda motor</td>
				</tr>
				<tr><td><font size="1">41</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Perdagangan, reparasi dan perawatan mobil dan sepeda motor" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Perdagangan, reparasi dan perawatan mobil dan sepeda motor' ){ echo "checked='checked'"; }?> />
				Perdagangan, reparasi dan perawatan mobil dan sepeda motor</label></div></td></tr>
				<tr><td><font size="1">42</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Perdagangan Angkutan air, bukan mobil dan sepeda motor" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Perdagangan Angkutan air, bukan mobil dan sepeda motor' ){ echo "checked='checked'"; }?> />
				Perdagangan Angkutan air, bukan mobil dan sepeda motor</label></div></td></tr>
				<tr><td><font size="1">43</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Perdagangan eceran, bukan mobil dan motor" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Perdagangan eceran, bukan mobil dan motor' ){ echo "checked='checked'"; }?> />
				Perdagangan eceran, bukan mobil dan motor</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori H: Transportasi dan pergudangan</td>
				</tr>
				<tr><td><font size="1">44</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Angkutan darat dan angkutan melalui saluran pipa" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Angkutan darat dan angkutan melalui saluran pipa' ){ echo "checked='checked'"; }?> />
				Angkutan darat dan angkutan melalui saluran pipa</label></div></td></tr>
				<tr><td><font size="1">45</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Angkutan air" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Angkutan air' ){ echo "checked='checked'"; }?> />
				Angkutan air</label></div></td></tr>
				<tr><td><font size="1">46</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Angkutan udara" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Angkutan udara' ){ echo "checked='checked'"; }?> />
				Angkutan udara</label></div></td></tr>
				<tr><td><font size="1">47</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pergudangan dan jasa penunjang angkutan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pergudangan dan jasa penunjang angkutan' ){ echo "checked='checked'"; }?> />
				Pergudangan dan jasa penunjang angkutan</label></div></td></tr>
				<tr><td><font size="1">48</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Pos dan kurir" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Pos dan kurir' ){ echo "checked='checked'"; }?> />
				Pos dan kurir</label></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori I: Penyediaan akomodasi dan penyediaan makan minum</td>
				</tr>
				<tr><td><font size="1">49</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Penyediaan akomodasi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Penyediaan akomodasi' ){ echo "checked='checked'"; }?> />
				Penyediaan akomodasi</label></td></tr>
				<tr><td><font size="1">50</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Penyediaan makanan dan minuman" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Penyediaan makanan dan minuman' ){ echo "checked='checked'"; }?> />
				Penyediaan makanan dan minuman</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori J: Informasi dan komunikasi</td>
				</tr>
				<tr><td><font size="1">51</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Penerbitan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Penerbitan' ){ echo "checked='checked'"; }?> />
				Penerbitan</label></div></td></tr>
				<tr><td><font size="1">52</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik' ){ echo "checked='checked'"; }?> />
				Produksi gambar bergerak, video dan program televisi, perekaman suara dan penerbitan musik</label></div></td></tr>
				<tr><td><font size="1">53</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Penyiaran dan pemrograman" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Penyiaran dan pemrograman' ){ echo "checked='checked'"; }?> />
				Penyiaran dan pemrograman</label></div></td></tr>
				<tr><td><font size="1">54</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Telekomunikasi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Telekomunikasi' ){ echo "checked='checked'"; }?> />
				Telekomunikasi</label></div></td></tr>
				<tr><td><font size="1">55</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu' ){ echo "checked='checked'"; }?> />
				Kegiatan pemrograman, konsultasi komputer dan kegiatan yang berhubungan dengan itu</label></div></td></tr>
				<tr><td><font size="1">56</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan jasa informasi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan jasa informasi' ){ echo "checked='checked'"; }?> />
				Kegiatan jasa informasi</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori K:  Jasa keuangan dan asuransi</td>
				</tr>
				<tr><td><font size="1">57</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa keuangan, bukan asuransi dan dana pensiun" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa keuangan, bukan asuransi dan dana pensiun' ){ echo "checked='checked'"; }?> />
				Jasa keuangan, bukan asuransi dan dana pensiun</label></div></td></tr>
				<tr><td><font size="1">58</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib' ){ echo "checked='checked'"; }?> />
				Asuransi, reasuransi dan dana pensiun, bukan jaminan sosial wajib</label></div></td></tr>
				<tr><td><font size="1">59</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa penunjang jasa keuangan, asuransi dan dana pensiun" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa penunjang jasa keuangan, asuransi dan dana pensiun' ){ echo "checked='checked'"; }?> />
				Jasa penunjang jasa keuangan, asuransi dan dana pensiun</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori L: Real estat</td>
				</tr>
				<tr><td><font size="1">60</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Real estat" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Real estat' ){ echo "checked='checked'"; }?> />
				Real estat</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori M: Jasa profesional, ilmiah dan teknis</td>
				</tr>
				<tr><td><font size="1">61</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa hukum dan akuntansi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa hukum dan akuntansi' ){ echo "checked='checked'"; }?> />
				Jasa hukum dan akuntansi</label></div></td></tr>
				<tr><td><font size="1">62</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan kantor pusat dan konsultasi manajemen" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan kantor pusat dan konsultasi manajemen' ){ echo "checked='checked'"; }?> />
				Kegiatan kantor pusat dan konsultasi manajemen</label></div></td></tr>
				<tr><td><font size="1">63</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa arsitektur dan teknik sipil; analisis dan uji teknis" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa arsitektur dan teknik sipil; analisis dan uji teknis' ){ echo "checked='checked'"; }?> />
				Jasa arsitektur dan teknik sipil; analisis dan uji teknis</label></div></td></tr>
				<tr><td><font size="1">64</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Penelitian dan pengemtugas_tambahanan ilmu pengetahuan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Penelitian dan pengemtugas_tambahanan ilmu pengetahuan' ){ echo "checked='checked'"; }?> />
				Penelitian dan pengemtugas_tambahanan ilmu pengetahuan</label></div></td></tr>
				<tr><td><font size="1">65</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Periklanan dan penelitian pasar" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Periklanan dan penelitian pasar' ){ echo "checked='checked'"; }?> />
				Periklanan dan penelitian pasar</label></div></td></tr>
				<tr><td><font size="1">66</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa profesional, ilmiah dan teknis lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa profesional, ilmiah dan teknis lainnya' ){ echo "checked='checked'"; }?> />
				Jasa profesional, ilmiah dan teknis lainnya</label></div></td></tr>
				<tr><td><font size="1">67</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa kesehatan hewan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa kesehatan hewan' ){ echo "checked='checked'"; }?> />
				Jasa kesehatan hewan</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori N: Jasa persewaan dan sewa guna usaha tanpa hak opsi, ketenagakerjaan, agen perjalanan dan penunjang usaha lainnya</td>
				</tr>
				<tr><td><font size="1">68</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa persewaan dan sewa guna usaha tanpa hak opsi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa persewaan dan sewa guna usaha tanpa hak opsi' ){ echo "checked='checked'"; }?> />
				Jasa persewaan dan sewa guna usaha tanpa hak opsi</label></td></tr>
				<tr><td><font size="1">69</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa ketenagakerjaan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa ketenagakerjaan' ){ echo "checked='checked'"; }?> />
				Jasa ketenagakerjaan</label></div></td></tr>
				<tr><td><font size="1">70</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya' ){ echo "checked='checked'"; }?> />
				Jasa agen perjalanan, penyelenggara tur dan jasa reservasi lainnya</label></div></td></tr>
				<tr><td><font size="1">71</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa keamanan dan penyelidikan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa keamanan dan penyelidikan' ){ echo "checked='checked'"; }?> />
				Jasa keamanan dan penyelidikan</label></div></td></tr>
				<tr><td><font size="1">72</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa untuk gedung dan pertamanan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa untuk gedung dan pertamanan' ){ echo "checked='checked'"; }?> />
				Jasa untuk gedung dan pertamanan</label></div></td></tr>
				<tr><td><font size="1">73</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya' ){ echo "checked='checked'"; }?> />
				Jasa administrasi kantor, jasa penunjang kantor dan jasa penunjang usaha lainnya</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori O: Administrasi pemerintahan, pertahanan dan jaminan sosial wajib</td>
				</tr>
				<tr><td><font size="1">74</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Administrasi pemerintahan, pertahanan dan jaminan sosial wajib" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Administrasi pemerintahan, pertahanan dan jaminan sosial wajib' ){ echo "checked='checked'"; }?> />
				Administrasi pemerintahan, pertahanan dan jaminan sosial wajib</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori P: Jasa pendidikan</td>
				</tr>
				<tr><td><font size="1">75</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa pendidikan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa pendidikan' ){ echo "checked='checked'"; }?> />
				Jasa pendidikan</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori Q: Jasa kesehatan dan kegiatan sosial</td>
				</tr>
				<tr><td><font size="1">76</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa kesehatan manusia" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa kesehatan manusia' ){ echo "checked='checked'"; }?> />
				Jasa kesehatan manusia</label></div></td></tr>
				<tr><td><font size="1">77</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa kegiatan sosial di dalam panti" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa kegiatan sosial di dalam panti' ){ echo "checked='checked'"; }?> />
				Jasa kegiatan sosial di dalam panti</label></div></td></tr>
				<tr><td><font size="1">78</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa kegiatan sosial di luar panti" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa kegiatan sosial di luar panti' ){ echo "checked='checked'"; }?> />
				Jasa kegiatan sosial di luar panti</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori R: Kesenian, hiburan dan rekreasi</td>
				</tr>
				<tr><td><font size="1">79</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan hiburan, kesenian dan kreativitas" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan hiburan, kesenian dan kreativitas' ){ echo "checked='checked'"; }?> />
				Kegiatan hiburan, kesenian dan kreativitas</label></div></td></tr>
				<tr><td><font size="1">80</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya' ){ echo "checked='checked'"; }?> />
				Perpustakaan, arsip, museum dan kegiatan kebudayaan lainnya</label></div></td></tr>
				<tr><td><font size="1">81</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan perjudian dan pertaruhan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan perjudian dan pertaruhan' ){ echo "checked='checked'"; }?> />
				Kegiatan perjudian dan pertaruhan</label></div></td></tr>
				<tr><td><font size="1">82</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan olahraga dan rekreasi lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan olahraga dan rekreasi lainnya' ){ echo "checked='checked'"; }?> />
				Kegiatan olahraga dan rekreasi lainnya</label></div></td></tr>
				<tr></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori S: Kegiatan jasa lainnya</td>
				</tr>
				<tr><td><font size="1">83</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan keanggotaan organisasi" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan keanggotaan organisasi' ){ echo "checked='checked'"; }?> />
				Kegiatan keanggotaan organisasi</label></div></td></tr>
				<tr><td><font size="1">84</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga' ){ echo "checked='checked'"; }?> />
				Jasa reparasi komputer dan barang keperluan pribadi dan perlengkapan rumah tangga</label></div></td></tr>
				<tr><td><font size="1">85</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa perorangan lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa perorangan lainnya' ){ echo "checked='checked'"; }?> />
				Jasa perorangan lainnya</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori T: Jasa perorangan yang melayani rumah tangga; kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan</td>
				</tr>
				<tr><td><font size="1">86</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Jasa perorangan yang melayani rumah tangga" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Jasa perorangan yang melayani rumah tangga' ){ echo "checked='checked'"; }?> />
				Jasa perorangan yang melayani rumah tangga</label></div></td></tr>
				<tr><td><font size="1">87</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan' ){ echo "checked='checked'"; }?> />
				Kegiatan yang menghasilkan barang dan jasa oleh rumah tangga yang digunakan sendiri untuk memenuhi kebutuhan</label></div></td></tr>
				<tr>
					<td><b></td>
					<td><b>Kategori U: Kegiatan badan internasional dan badan ekstra internasional lainnya</td>
				</tr>
				<tr><td><font size="1">88</font></td><td><div class="radio"><label><input type="radio"  name="bidang" value="Kegiatan badan internasional dan badan ekstra internasional lainnya" <?php if( isset($_POST['bidang']) && $_POST['bidang'] == 'Kegiatan badan internasional dan badan ekstra internasional lainnya' ){ echo "checked='checked'"; }?> />
				Kegiatan badan internasional dan badan ekstra internasional lainnya</label></div></td></tr>
			<tr>
				<td><b>D7</td>
				<td><b>Jelaskan tugas-tugas utama dalam pekerjaan anda sekarang?</b></td>
			</tr>
			<tr><td></td><td><textarea class="form-control" rows="3" id="tugas_job"  name="tugas_job" value="<?php
					echo isset($_POST['tugas_job'])?$_POST['tugas_job'] : '';?>"/> </textarea>	</td></tr>
			<tr>
				<td><b>D8</td>
				<td><b>Berapa jam rata-rata per minggu anda bekerja?</b></td>
			</tr>
			<tr><td></td><td><input type="text" id="tugas_utama" name="tugas_utama" value="<?php
					echo isset ($_POST['tugas_utama']) ? $_POST['tugas_utama'] : '';?>" placeholder="Tuliskan angka"/> Tugas-tugas utama sesuai kontrak</td></tr>
			<tr><td></td><td><input type="text" id="tugas_tambahan" name="tugas_tambahan" value="<?php
					echo isset ($_POST['tugas_tambahan']) ? $_POST['tugas_tambahan'] : '';?>" placeholder="Tuliskan angka"/> Tugas-tugas tambahan di luar tugas utama (termasuk lembur dibayar dan tidak dibayar)</td></tr>
			<tr><td></td><td><input type="text" id="job_lain" name="job_lain" value="<?php
					echo isset ($_POST['job_lain']) ? $_POST['job_lain'] : '';?>" placeholder="Tuliskan angka"/> Pekerjaan lainnya (pekerjaan kedua, pekerjaan sambilan, dll) </td></tr>
			<tr><td></td><td><input type="text" id="jam_job" name="jam_job" value="<?php
					echo isset ($_POST['jam_job']) ? $_POST['jam_job'] : '';?>" placeholder="Tuliskan angka"/> Jumlah jam kerja total (hanya untuk yang wiraswasta)</td></tr>
			<tr></tr>
			<tr>
				<td><b>D9</td>
				<td><b>Jika anda menjalankan perusahaan sendiri, apa jenis bisnis/usaha yang sedang anda jalani saat ini? </b><i><font size="2">Jawaban bisa lebih dari satu</b></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_kontr" value="Ya"/> Saya memiliki/melayani kontraktor tunggal</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_beli_perus" value="Ya"/> Saya mengambil alih/membeli perusahaan</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_bngun_kntr" value="Ya"/> Saya membangun dari awal sebuah firma/kantor</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_mint" value="Ya"/> Saya diminta untuk membuka perusahaan sendiri oleh perusahaan tempat saya bekerja dulu</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_rmh" value="Ya"/> Saya bekerja di rumah</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_sendiri" value="Ya"/> Saya tidak mempunyai pegawai/bekerja sendiri</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" name="ju_sdr" value="Ya"/> Saya bekerjasama dengan teman/saudara</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="checkbox"><label><input type="checkbox" id="jenis_usaha_other_chk" name="jenis_usaha_other" /> Lainnya: <input type="text" id="jenis_usaha_other_text" name="jenis_usaha_other_text" value="<?php	echo isset ($_POST['jenisusaha']) ? $_POST['jenisusaha'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
			</tr>
			<tr>
				<td><b>D10</td>
				<td><b>Kira-kira berapa pendapatan anda setiap bulannya? </b></td>
			</tr>
				<tr><td></td><td><input type="text" id="job_utama" name="job_utama" value="<?php
					echo isset ($_POST['job_utama']) ? $_POST['job_utama'] : '';?>" placeholder="Tuliskan angka" /> Dari pekerjaan utama</td></tr>
				<tr><td></td><td><input type="text" id="lembur" name="lembur" value="<?php
					echo isset ($_POST['lembur']) ? $_POST['lembur'] : '';?>" placeholder="Tuliskan angka" /> Dari lembur dan tips</td></tr>
				<tr><td></td><td><input type="text" id="job_lain" name="job_lain" value="<?php
					echo isset ($_POST['job_lain']) ? $_POST['job_lain'] : '';?>" placeholder="Tuliskan angka" /> Dari pekerjaan lainnya</td></tr>
			<tr>
				<td><b>D11</td>
				<td><b>Dalam setahun terakhir ini apakah anda melakukan perjalanan ke luar negeri dalam rangka bisnis/profesi? </b></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio" id="bsnsInter_true" name="bsnsInter" <?php if( isset($_POST['bsnsInter']) && $_POST['bsnsInter'] == 'Ya, kurang lebih' ){ echo "checked='checked'"; }?> /> Ya, kurang lebih <input type="text" id="bln_bsnsInter" name="bsnsInter" value="<?php
					echo isset ($_POST['bln_bsnsInter']) ? $_POST['bln_bsnsInter'] : '';?>" placeholder="Mohon tuliskan angka" disabled="disabled"/> bulan</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio" name="bsnsInter" value="Tidak" <?php if( isset($_POST['bsnsInter']) && $_POST['bsnsInter'] == 'Tidak' ){ echo "checked='checked'"; }?> /> Tidak</label></div></td>
			</tr>
			<tr>
				<td><b>D12</td>
				<td><b>Berapa persen dari waktu kerja anda yang memiliki konteks internasional?</b></td>
			</tr>
			<tr><td></td><td><input type="text" id="persen_inter" name="persen_inter" value="<?php
					echo isset ($_POST['persen_inter']) ? $_POST['persen_inter'] : '';?>" placeholder="Mohon tuliskan angka"/> Persentase waktu kerja (%)</td></tr>
			
		</table>
		<input type="submit" class="btn btn-primary" value="Kirim" name="submit" />
			</div>
		</form>
