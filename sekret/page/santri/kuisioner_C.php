<script src="../js/kuisioner.js"></script>
<?php 
	
	require_once '../config/config.php';

	if (($_POST['submit']=="Kirim")) {
		
		
		$id_kuis_c = $_SESSION['FULLNAME'];

		$awal_kerja = $_POST["awal_kerja"];
		$sebset= $_POST["sebset"];

		// $get_job = (array) $_POST['get_job']; //casting not strictly required here
		// if(($_POST['get_job_other']) && trim($_POST['getjobtext']))  $get_job[] = $_POST['getjobtext'];	
		// $get_job = implode("; ", $get_job);

		$mll_ikln_ctk = $_POST["mll_ikln_ctk"];
		$mll_prs = $_POST["mll_prs"];
		$mll_bursa = $_POST["mll_bursa"];
		$mll_ikln_ol = $_POST["mll_ikln_ol"];
		$mll_hub_perus = $_POST["mll_hub_perus"];
		$mll_kem = $_POST["mll_kem"];
		$mll_agen = $_POST["mll_agen"];
		$mll_info = $_POST["mll_info"];
		$mll_hub_bk = $_POST["mll_hub_bk"];
		$mll_net = $_POST["mll_net"];
		$mll_relas = $_POST["mll_relas"];
		$mll_bisnis = $_POST["mll_bisnis"];
		$mll_mgg = $_POST["mll_mgg"];
		$mll_tmpt = $_POST["mll_tmpt"];
		$getjobtext =code( $_POST["getjobtext"]);



		$asp_prodi = $_POST["asp_prodi"];
		$asp_spes = $_POST["asp_spes"];
		$asp_nem = $_POST["asp_nem"];
		$asp_pengl = $_POST["asp_pengl"];
		$asp_rep = $_POST["asp_rep"];
		$asp_kem_bing = $_POST["asp_kem_bing"];
		$asp_kem_blain = $_POST["asp_kem_blain"];
		$asp_kom = $_POST["asp_kom"];
		$asp_org = $_POST["asp_org"];
		$asp_rekom = $_POST["asp_rekom"];
		$asp_prib = $_POST["asp_prib"];
		$aspek_text = code($_POST["aspek_text"]);


		$jumlah_lmrn = code($_POST["jumlah_lmrn"]);

		$bulan_get = $_POST["bulan_get"];
		$bulan_sebset = $_POST["bulan_sebset"];

		$rspon_lmrn = $_POST["rspon_lmrn"];
		$wawancara = $_POST["wawancara"];
		$alsn_notjob = code($_POST["alsn_notjob"]);
		$get_first = code($_POST["get_first"]);
		
		
		// Insert
						$sql ="INSERT INTO kuisioner_c VALUES('".$id_kuis_c."','".$awal_kerja."','".$sebset."','".$mll_ikln_ctk."','".$mll_prs."','".$mll_bursa."','".$mll_ikln_ol."','".$mll_hub_perus."','".$mll_kem."','".$mll_agen."','".$mll_info."','".$mll_hub_bk."','".$mll_net."','".$mll_relas."','".$mll_bisnis."','".$mll_mgg."','".$mll_tmpt."','".$getjobtext."'
												,'".$asp_prodi."','".$asp_spes."','".$asp_nem."','".$asp_pengl."','".$asp_rep."','".$asp_kem_bing."','".$asp_kem_blain."','".$asp_kom."','".$asp_org."','".$asp_rekom."','".$asp_prib."','".$aspek_text."','".$jumlah_lmrn."','".$bulan_get."','".$bulan_sebset."','".$rspon_lmrn."','".$wawancara."','".$alsn_notjob."'
												,'".$get_first."')";
		if ($db->Execute($sql)) {
			echo "<div class='alert alert-success' role='alert'>Selamat telah terkirim. <a href='menu_alumni.php?a=kuisioner_D'>Selanjutnya</a></div>";
						}else{
							echo "<div class='alert alert-warning' role='alert'>Gagal Menambahkan<br/></div>";
							print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg(). "<BR></div>";
		}
	}



 ?>




		<form class="form-inline" role="form" method="post" action="<?php $_SERVER['PHP_SELF'];?>" >
		<div class="table-responsive">
			<table  class="table table-striped table-hover table-condensed">
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
				<td><div class="radio"><label><input type="radio" id="awal_kerja_true" name="awal_kerja"> Kira-Kira (Hitungan Bulan) <input type="text" name="awal_kerja" id="bln_awl_krj" class="form-control" style="width: 50px;" disabled="disabled">
					<select name="sebset" class="form-control" id="sebset" disabled="disabled">
					<?php $awl = array("-- Pilih Sebelum/Setelah Lulus --","Bulan Sebelum Lulus","Bulan Setelah Lulus"); ?>
						<?php
							$awa = isset($_GET['sebset'])?$_GET['sebset']:'';
										foreach($awl as $key=>$val){
												if($awa==$val)
													echo '<option value="'.$val.'" selected> '.$val.'</option>';
												else
													echo '<option value="'.$val.'"> '.$val.'</option>';
												}
									?>
				
					</select>


				</label></div></td>
			</tr>
			<tr>
				<td></td>
				<td><div class="radio"><label><input type="radio" name="awal_kerja" value="Tidak Mencari" <?php if( isset($_POST['awal_kerja']) && $_POST['awal_kerja'] == 'tidak mencari' ){ echo "checked='checked'"; }?> /> 
				Saya tidak mencari kerja ?<i> <font size="2">==> Lanjut ke C8</font></i></label></div></td></tr>
			<tbody id="tbodybuang1">
				<tr>
					<td><b>C2</td>
					<td><b>Bagaimana anda mencari pekerjaan Sesudah lulus?</b><i><font size="2">Jawaban bisa lebih dari satu</td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_ikln_ctk" value="Ya"> Melalui iklan di koran/majalah, brosur</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_prs" value="Ya"/> Melamar ke perusahaan tanpa mengetahui lowongan yang ada</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_bursa" value="Ya"/> Pergi ke bursa/pameran kerja</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_ikln_ol" value="Ya"/> Mencari lewat internet/iklan online/milis</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_hub_perus" value="Ya"/> Dihubungi oleh perusahaan</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_kem" value="Ya"/> Menghubungi Kemnakertrans</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_agen" value="Ya"/> Menghubungi agen tenaga kerja komersiaI/swasta</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_info" value="Ya"/> Memeroleh informasi dari pusat/kantor pengembangan karir SMA</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_hub_bk" value="Ya"/> Menghubungi kantor kesiswaan/hubungan alumni</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_net" value="Ya"/> Membangun network sejak masih sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_relas" value="Ya"/> Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_bisnis" value="Ya"/> Membangun bisnis sendiri</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_mgg" value="Ya"/> Melalui penempatan kerja atau magang</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="mll_tmpt" value="Ya"/> Bekerja di tempat yang sama dengan tempat kerja semasa sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" id="getjobcheck" name="get_job_other"/> Lainnya: <input type="text" class="form-control" id="getjobtext" name="getjobtext" value="<?php	echo isset ($_POST['getjobtext']) ? $_POST['getjobtext'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
				</tr>
				
				<tr>
					<td><b>C3</td>
					<td><b>Berdasarkan persepsi anda, seberapa pentingkah aspek-aspek di bawah ini bagi perusahaan/instansi dalam melakukan penerimaan pegawai baru?</b><br><i><font size="2">Jawaban bisa lebih dari satu</td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_prodi" value="Ya"/> Program studi</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_spes" value="Ya"/> Spesialisasi</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_nem" value="Ya"/> Nilai NEM</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_pengl" value="Ya"/> Pengalaman kerja selama sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_rep" value="Ya"/> Reputasi dari sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_kem_bing" value="Ya"/> Kemampuan bahasa inggris</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_kem_blain" value="Ya"/> Kemampuan bahasa asing lainnya</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_kom" value="Ya"/> Pengoperasian computer</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_org" value="Ya"/> Pengalaman berorganisasi</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_rekom" value="Ya"/> Rekomendasi dari pihak ketiga</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" name="asp_prib" value="Ya"/> Kepribadian dan ketrampilan antar personal</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="checkbox"><label><input type="checkbox" id="aspek_other_chk" name="aspek_other"/> Lainnya: <input type="text" id="aspek_other_text" name="aspek_text" value="<?php	echo isset ($_POST['aspek_text']) ? $_POST['aspek_text'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></label></div></td>
				</tr>
				<tr>
					<td><b>C4</td>
					<td><b>Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="text" id="jumlah_lmrn" name="jumlah_lmrn" value="<?php
						echo isset ($_POST['jumlah_lmrn']) ? $_POST['jumlah_lmrn'] : '';?>" placeholder="Tulis dengan angka"/> Jumlah perusahaan/instansi/institusi yang dilamar</td>
				</tr>
				<tr>
					<td><b>C5</td>
					<td><b>Berapa bulan waktu yang dihabiskan (sebelum dan setelah kelulusan) untuk memeroleh pekerjaan pertama?</td>
				</tr>


					</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio" id="bulan_get" name="bulan_get"> Kira-Kira (Hitungan Bulan) <input type="text" name="bulan_get" id="bulan_get_text" class="form-control" style="width: 50px;" disabled="disabled">
						<select name="bulan_sebset" class="form-control" id="bulan_sebset" disabled="disabled">
						<?php $bawseb = array("-- Pilih Sebelum/Setelah Lulus --","Bulan Sebelum Lulus","Bulan Setelah Lulus"); ?>
							<?php
								$baws = isset($_GET['bulan_sebset'])?$_GET['bulan_sebset']:'';
											foreach($bawseb as $key=>$val){
													if($baws==$val)
														echo '<option value="'.$val.'" selected> '.$val.'</option>';
													else
														echo '<option value="'.$val.'"> '.$val.'</option>';
													}
										?>
					
						</select>


					</label></div></td>
				</tr>

				<tr>
					<td><b>C6</td>
					<td><b>Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</td>
				</tr>
				<tr><td></td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="respon" > Ada : <input type="text" class="form-control" id="rspon_lmrn" name="rspon_lmrn" value="<?php echo isset ($_POST['rspon_lmrn']) ? $_POST['rspon_lmrn'] : '';?>" placeholder="Tulis dengan angka" disabled="disabled"/> Jumlah perusahaan/instansi/institusi ? 
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div class="radio">
							<label>
								<input type="radio" name="respon" id="respon_rdo" value="0"> Tidak Ada <i> <font size="2">==>Lanjut ke C9</font></i></input>
							</label>
						</div>
					</td>
				</tr>
					<tbody id="c7_hidden">
						<tr>
							<td><b>C7</td>
							<td><b>Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</td>
						</tr>
						<tr><td></td>
							<td><div class="radio"><label><input type="radio" name="undang" > Ada : </input><input type="text" class="form-control" id="wawancara" name="wawancara" value="<?php
								echo isset ($_POST['wawancara']) ? $_POST['wawancara'] : '';?>" placeholder="Tulis dengan angka" disabled="disabled"/> Jumlah perusahaan/instansi/institusi ? </label></div></td>
						</tr>
						<tr>
							<td></td>
							<td><div class="radio"><label><input type="radio" name="undang" id="undang_rdo" value="0"></input> Tidak Ada <i> <font size="2">==>Lanjut ke C9</font></i></label></div></td>
						</tr>
					</tbody>
		
				<tbody id="c8_hidden">
				<tr>
					<td><b>C8</td>
					<td><b>Apa alasan utama anda tidak mencari pekerjaan Sesudah lulus sekolah?</td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio" name="alsn_notjob" value="Saya memulai bisnis sendiri" <?php if( isset($_POST['alsn_notjob']) && $_POST['alsn_notjob'] == 'Saya memulai bisnis sendiri' ){ echo "checked='checked'"; }?> /> Saya memulai bisnis sendiri</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="alsn_notjob" value="Saya sudah memeroleh pekerjaan sebelum lulus" <?php if( isset($_POST['alsn_notjob']) && $_POST['alsn_notjob'] == 'Saya sudah memeroleh pekerjaan sebelum lulus' ){ echo "checked='checked'"; }?> /> Saya sudah memeroleh pekerjaan sebelum lulus</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="alsn_notjob" value="Saya melanjutkan kuliah" <?php if( isset($_POST['alsn_notjob']) && $_POST['alsn_notjob'] == 'Saya melanjutkan kuliah' ){ echo "checked='checked'"; }?> /> Saya melanjutkan kuliah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio" id="c11_ya" name="alsn_notjob" value="Saya belum mencari pekerjaan" <?php if( isset($_POST['alsn_notjob']) && $_POST['alsn_notjob'] == 'Saya belum mencari pekerjaan' ){ echo "checked='checked'"; }?> /> Saya belum mencari pekerjaan<i> <font size="2">==>Selesai</font></i></label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  id="alsn_notjob_rdo" name="alsn_notjob" <?php if( isset($_POST['alsn_notjob']) && $_POST['alsn_notjob'] == 'Lainnya' ){ echo "checked='checked'"; }?> /> Lainnya : 
					<input type="text" id="alsn_notjob_text" name="alsn_notjob" value="<?php
						echo isset ($_POST['alsnnotjob']) ? $_POST['alsnnotjob'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/> </label></div></td>
				</tr>
			</tbody>
			<tbody id="c910">
				<tr>
					<td><b>C9</td>
					<td><b>Bagaimana cara anda mendapatkan pekerjaan pertama?</b><i><font size="2"> Hanya satu jawaban</td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Melalui iklan di koran/majalah, brosur" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Melalui iklan di koran/majalah, brosur' ){ echo "checked='checked'"; }?>/> Melalui iklan di koran/majalah, brosur</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Melamar ke perusahaan tanpa mengetahui lowongan yang ada" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada' ){ echo "checked='checked'"; }?>/> Melamar ke perusahaan tanpa mengetahui lowongan yang ada</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Pergi ke bursa/pameran kerja" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Pergi ke bursa/pameran kerja' ){ echo "checked='checked'"; }?>/> Pergi ke bursa/pameran kerja</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Mencari lewat internet/iklan online/milis" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Mencari lewat internet/iklan online/milis' ){ echo "checked='checked'"; }?>/> Mencari lewat internet/iklan online/milis</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Dihubungi oleh perusahaan"<?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Dihubungi oleh perusahaan' ){ echo "checked='checked'"; }?>/> Dihubungi oleh perusahaan</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Menghubungi Kemnakertrans"<?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Menghubungi Kemnakertrans' ){ echo "checked='checked'"; }?>/> Menghubungi Kemnakertrans</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Menghubungi agen tenaga kerja komersial/swasta" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Menghubungi agen tenaga kerja komersial/swasta' ){ echo "checked='checked'"; }?>/> Menghubungi agen tenaga kerja komersial/swasta</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Memeroleh informasi dari pusat/kantor pengembangan karir SMA" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Memeroleh informasi dari pusat/kantor pengembangan karir SMA' ){ echo "checked='checked'"; }?>/> Memeroleh informasi dari pusat/kantor pengembangan karir SMA</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Menghubungi kantor kesiswaan/hubungan alumni" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Menghubungi kantor kesiswaan/hubungan alumni' ){ echo "checked='checked'"; }?>/> Menghubungi kantor kesiswaan/hubungan alumni</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Membangun network sejak masih sekolah" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Membangun network sejak masih sekolah' ){ echo "checked='checked'"; }?>/> Membangun network sejak masih sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)' ){ echo "checked='checked'"; }?>/> Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Membangun bisnis sendiri" <?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Membangun bisnis sendiri' ){ echo "checked='checked'"; }?>/> Membangun bisnis sendiri</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Melalui penempatan kerja atau magang"<?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Melalui penempatan kerja atau magang' ){ echo "checked='checked'"; }?>/> Melalui penempatan kerja atau magang</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  name="get_first" value="Bekerja di tempat yang sama dengan tempat kerja semasa sekolah"<?php if( isset($_POST['get_first']) && $_POST['get_first'] == 'Bekerja di tempat yang sama dengan tempat kerja semasa sekolah' ){ echo "checked='checked'"; }?>/> Bekerja di tempat yang sama dengan tempat kerja semasa sekolah</label></div></td>
				</tr>
				<tr>
					<td></td>
					<td><div class="radio"><label><input type="radio"  id="get_first_rdo" name="get_first" /> Lainnya: <input type="text" id="get_first_text" name="get_first" value="<?php	echo isset ($_POST['get_first']) ? $_POST['get_first'] : '';?>" placeholder="Mohon tuliskan" disabled="disabled"/></td></tr></label></div></td>
				</tr>
				</tbody>
			</table>
			<input type="submit" value="Kirim" name="submit" class="btn btn-primary" />
			</div>
		</form>
