<?php
	// file koneksi : $db
	require "../config/config.php";
	?>
<!-- Modal status -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama Program Keahlian</td></tr>
        <?php 
		$sql = "SELECT DISTINCT status FROM kuisioner_a WHERE status!='Menikah' AND status!='Bercerai' AND status!='Lajang / Tidak menikah' AND status!='Pisah rumah' AND status!='Tinggal bersama' AND status!='Janda / Duda'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$status_lain=$result->fields["status"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$status_lain. '</td></tr> ';
				$result->MoveNext();
			}?>
			</table>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal A5in-->
<div class="modal fade" id="myModala5in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Jurusan selama SLTA</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama Program Keahlian</td></tr>
        <?php $sql = "SELECT DISTINCT jurusan FROM kuisioner_a";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$jurusan=$result->fields["jurusan"];
				
			echo '<tr><td>'.$no++.'</td><td>'.$jurusan. '</td></tr> ';
				
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal nama kampus -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar Nama kampus Alumni</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama kampus</td></tr>
        <?php 
		$sql = "SELECT DISTINCT nama_kampus FROM kuisioner_b ";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$kampus=$result->fields["nama_kampus"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$kampus. '</td></tr> ';
				

				$result->MoveNext();
			}
			?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal provinsi kampus -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alamat kampus Alumni</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Kota / Kabupaten</td><td width="20%" scope="col"><b>Provinsi</td></tr>
        <?php 
		
		$sql = "SELECT DISTINCT kota,provinsi FROM kuisioner_b ";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$kota=$result->fields["kota"];
				$prov=$result->fields["provinsi"];
				echo '<tr><td>'.$no++.'</td><td>'.$kota. '</td><td>'.$prov.'</td></tr> ';
				

				$result->MoveNext();
			}
			?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal B1 -->
<div class="modal fade" id="myModalb1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Program Keahlian selama di Kuliah</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama Program Keahlian</td></tr>
        <?php $sql = "SELECT DISTINCT program FROM kuisioner_b";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$program=$result->fields["program"];
				
			echo '<tr><td>'.$no++.'</td><td>'.$program. '</td></tr> ';
				
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal B5 -->
<div class="modal fade" id="myModalb5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tempat tinggal lain selama Kuliah</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Tempat Tinggal</td></tr>
      <?php $sql = "SELECT DISTINCT tmpt_tinggl FROM kuisioner_b WHERE tmpt_tinggl!='Sendiri di asrama' AND tmpt_tinggl!='Sendiri di kos' AND tmpt_tinggl!='Bersama orang tua/keluarga' AND tmpt_tinggl!='Bersama keluarga' AND tmpt_tinggl!='Berbagi kamar kos/apartemen'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$alasanb5=$result->fields["tmpt_tinggl"];
				echo '<tr><td>'.$no++.'</td><td>'.$alasanb5. '</td></tr> ';
			
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal B6 -->
<div class="modal fade" id="myModalb6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sumber dana pembayaran lain</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Sumber dana</td></tr>
       <?php $sql = "SELECT DISTINCT dana_kul FROM kuisioner_b WHERE dana_kul!='Beasiswa (misalnya dari pemerintah, universitas)' AND dana_kul!='Sebagian beasiswa' AND dana_kul!='Orangtua/keluarga' AND dana_kul!='Biaya sendiri'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$danakul_lain=$result->fields["dana_kul"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$danakul_lain. '</td></tr> ';
			
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal B7 -->
<div class="modal fade" id="myModalb7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nama kursus saat di Kuliah</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama kursus</td></tr>
       <?php $sql = "SELECT DISTINCT nama_kursus FROM kuisioner_b";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$nama_kursus=$result->fields["nama_kursus"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$nama_kursus. '</td></tr> ';
			
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
<!-- Modal B10 -->
<div class="modal fade" id="myModalb10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nama fasilitas belajar lain</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama fasilitas</td></tr>
       <?php 
	   $sql = "SELECT DISTINCT infra_lain FROM kuisioner_a";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$infra_lain=$result->fields["infra_lain"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$infra_lain. '</td></tr> ';
			
				$result->MoveNext();
			}
		?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
<!-- Modal c2 -->
<div class="modal fade" id="myModalc2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cara  mencari pekerjaan Sesudah lulus</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama Kegiatan</td></tr>
       <?php 
	   $sql = "SELECT DISTINCT cr_lainnya FROM kuisioner_c";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$cr_lainnya=$result->fields["cr_lainnya"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$cr_lainnya. '</td></tr> ';
			
				$result->MoveNext();
			}
		?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
<!-- Modal c3 -->
<div class="modal fade" id="myModalc3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Aspek penting bagi perusahaan/instansi dalam melakukan penerimaan pegawai baru</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Nama Aspek</td></tr>
       <?php 
	   $sql = "SELECT DISTINCT asp_lain FROM kuisioner_c";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$asp_lain=$result->fields["asp_lain"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$asp_lain. '</td></tr> ';
			
				$result->MoveNext();
			}
		?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
<!-- Modal c8 -->
<div class="modal fade" id="myModalc8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Alasan utama tidak mencari pekerjaan Sesudah lulus sekolah</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Alasan</td></tr>
       <?php 
	   $sql = "SELECT DISTINCT alsn_notjob FROM kuisioner_c WHERE alsn_notjob != 'Saya belum mencari pekerjaan' AND  alsn_notjob != 'Saya memulai bisnis sendiri' AND alsn_notjob != 'Saya sudah memeroleh pekerjaan sebelum lulus' AND alsn_notjob != 'Saya melanjutkan kuliah'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$alsn_notjob=$result->fields["alsn_notjob"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$alsn_notjob. '</td></tr> ';
			
				$result->MoveNext();
			}
		?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal c9 -->
<div class="modal fade" id="myModalc9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cara mendapatkan pekerjaan pertama</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Cara</td></tr>
       <?php 
	   $sql = "SELECT DISTINCT cara_dpt_krj_pertama FROM kuisioner_c WHERE cara_dpt_krj_pertama !='' AND cara_dpt_krj_pertama != 'Melalui iklan di koran/majalah, brosur' AND cara_dpt_krj_pertama != 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada' AND cara_dpt_krj_pertama != 'Pergi ke bursa/pameran kerja' AND cara_dpt_krj_pertama != 'Mencari lewat internet/iklan online/milis' AND cara_dpt_krj_pertama != 'Dihubungi oleh perusahaan' AND cara_dpt_krj_pertama != 'Menghubungi Kemnakertrans' AND cara_dpt_krj_pertama != 'Menghubungi agen tenaga kerja komersial/swasta' AND cara_dpt_krj_pertama != 'Memeroleh informasi dari pusat/kantor pengembangan karir SMA' AND cara_dpt_krj_pertama != 'Menghubungi kantor kesiswaan/hubungan alumni' AND cara_dpt_krj_pertama != 'Membangun network sejak masih sekolah' AND cara_dpt_krj_pertama != 'Melalui relasi (misalnya guru, orantua, saudara, teman, dll.)' AND cara_dpt_krj_pertama != 'Membangun bisnis sendiri' AND cara_dpt_krj_pertama != 'Melalui penempatan kerja atau magang' AND cara_dpt_krj_pertama != 'Bekerja di tempat yang sama dengan tempat kerja semasa sekolah'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$cara_dpt_krj_pertama=$result->fields["cara_dpt_krj_pertama"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$cara_dpt_krj_pertama. '</td></tr> ';
			
				$result->MoveNext();
			}
		?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
<!-- Modal d2 -->
<div class="modal fade" id="myModald2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gambaran situasi alumni</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Gambaran situasi</td></tr>
        <?php 
		$sql = "SELECT DISTINCT sa_lainnya FROM kuisioner_d WHERE sa_lainnya !=''";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$sa_lainnya=$result->fields["sa_lainnya"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$sa_lainnya. '</td></tr> ';
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal d3-->
<div class="modal fade" id="myModald3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Keaktifan alumni mencari pekerjaan dalam 4 minggu terakhir</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Keaktifan lain</td></tr>
        <?php $sql = "SELECT DISTINCT aktf_cr_krj_4_mgg_trkhr FROM kuisioner_d WHERE aktf_cr_krj_4_mgg_trkhr !='' AND aktf_cr_krj_4_mgg_trkhr != 'Tidak' AND aktf_cr_krj_4_mgg_trkhr != 'Tidak, tapi saya sedang menunggu hasil lamaran kerja' AND aktf_cr_krj_4_mgg_trkhr != 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan' AND aktf_cr_krj_4_mgg_trkhr != 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$aktf_cr_krj_4_mgg_trkhr=$result->fields["aktf_cr_krj_4_mgg_trkhr"];
				
			echo '<tr><td>'.$no++.'</td><td>'.$aktf_cr_krj_4_mgg_trkhr. '</td></tr> ';
				
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal d5 -->
<div class="modal fade" id="myModald5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Jenis perusahaan/instansi/institusi tempat alumni bekerja</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Jenis tempat kerja</td></tr>
        <?php 
		$sql = "SELECT DISTINCT jns_inst_krj FROM kuisioner_d WHERE jns_inst_krj != '' AND jns_inst_krj != 'Instansi pemerintah (termasuk BUMN)' AND jns_inst_krj != 'Organisasi non-profit/Lembaga Swadaya Masyarakat' AND jns_inst_krj != 'Perusahaan swasta' AND jns_inst_krj != 'Wiraswasta/perusahaan sendiri'";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$jns_inst_krj=$result->fields["jns_inst_krj"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$jns_inst_krj. '</td></tr> ';
				

				$result->MoveNext();
			}
			?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>


<!-- Modal d9 -->
<div class="modal fade" id="myModald9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Jenis bisnis/usaha lain yang sedang alumni jalani</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b> Jenis bisnis/usaha</td></tr>
        <?php 
		$sql = "SELECT DISTINCT ju_lainnya FROM kuisioner_d WHERE ju_lainnya != ''";
		$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$ju_lainnya=$result->fields["ju_lainnya"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$ju_lainnya. '</td></tr> ';
				

				$result->MoveNext();
			}
			?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>

<!-- Modal E8 -->
<div class="modal fade" id="myModale8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alasan lain mengambil pekerjaan anda saat ini tidak sesuai dengan pendidikan</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
		<tr><td width="4%" scope="col"><b>Nomor</td><td width="20%" scope="col"><b>Alasan</td></tr>
       <?php $sql = "SELECT DISTINCT E8_13 FROM kuisioner_e";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				
				$E8_lain=$result->fields["E8_13"];
				
				echo '<tr><td>'.$no++.'</td><td>'.$E8_lain. '</td></tr> ';
			
				$result->MoveNext();
			}?>
			</table>
			
      </div>
     
    </div>
  </div>
</div>
