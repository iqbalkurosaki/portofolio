<html>
	<head>
	
	<?php
			
	?>
    <title>Angket</title> 

	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kuisioner.js"></script>
	<script src="../js/custom.js"></script>

		<?php
		
		// url_encode() url_decode()
		if(($_POST['submit']=="Simpan")){
					$user=$_SESSION['FULLNAME'];
					$jk=$_POST["jk"];
					$lahir=$_POST["lahir"];
					$res_status= code($_POST["status"]?$_POST["status"]:$_POST["status_lain"]);
					$lulus=$_POST["lulus"];
					$nem_slta=code($_POST["nem_slta"]);
					$jurusan=code($_POST["jurusan"]);
					$res_kebangsaan= code($_POST["kebangsaan"]?$_POST["kebangsaan"]:$_POST["kebangsaan1"]);
					
					$perpus=$_POST["perpus"];
					$tik=$_POST["tik"];
					$modul=$_POST["modul"];
					$ruang=$_POST["ruang"];
					$lab=$_POST["lab"];
					$variasi=$_POST["variasi"];
					$akomodasi=$_POST["akomodasi"];
					$kantin=$_POST["kantin"];
					$rekreasi=$_POST["rekreasi"];
					$uks=$_POST["uks"];
					
					$fasilitas_lain=$_POST["fasilitas_lain"];
					$infra_lain=code($_POST["infra_lain"]);
					$pemb_kelas=$_POST["pemb_kelas"];
					$praktek=$_POST["praktek"];
					$osis=$_POST["osis"];
					$ekskul=$_POST["ekskul"];
					$olahraga=$_POST["olahraga"];
					$pend_ibu=$_POST["pend_ibu"];
					$pend_ayah=$_POST["pend_ayah"];
					
					
					// Insert
					$sql="INSERT INTO kuisioner_a(id_kuisA,jk,lahir,status,lulus,nem_slta,kebangsaan,pend_ibu,pend_ayah,jurusan,perpus,tik,modul,ruang,lab,variasi,akomodasi,kantin,rekreasi,uks,fasilitas_lain,infra_lain,pemb_kelas,praktek,osis,ekskul,olahraga)
							VALUES('".$user."','".$jk."','".$lahir."','".$res_status."','".$lulus."','".$nem_slta."','".$res_kebangsaan. "','".$pend_ibu."','".$pend_ayah."','".$jurusan."','".$perpus."','".$tik."','".$modul."','".$ruang."','".$lab."','".$variasi."','".$akomodasi."','".$kantin."','".$rekreasi."','".$uks."','".$fasilitas_lain."','".$infra_lain."','".$pemb_kelas."','".$praktek."','".$osis."','".$ekskul."','".$olahraga."')";
					
					$result=$db->Execute($sql);
					if($result){
						echo "<div class='alert alert-success' role='alert'>Selamat telah terkirim. <a href='menu_alumni.php?a=kuisioner_B'>Selanjutnya</a></div>";
					}else{
						echo "<div class='alert alert-warning' role='alert'>Gagal Menambah data</div>";
						 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."<BR></div>";
					}
					}
		?>
    
	<body>
	<div class="well sidebar-nav">
		
		  <!-- Le styles -->
		<form class="form-inline" role="form"  id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td><h4>KARAKTERISTIK SOSIO-BIOGRAFI, PENDIDIKAN DAN PENGALAMAN BELAJAR di SMK</h4></td>
			</tr>
			
			<tr></tr>
			<tr>
				<td width="4%" scope="col"><b>A1</td>
				<td><b>Jenis Kelamin</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio"  name="jk" value="L" <?php if( isset($_POST['jk']) && $_POST['jk'] == 'L' ){ echo "checked='checked'"; }?> />Laki - Laki
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio"  name="jk" value="P" <?php if( isset($_POST['jk']) && $_POST['jk'] == 'P' ){ echo "checked='checked'"; }?> />Perempuan
			</label></div></td></tr>
			<tr></tr>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>A2</td>
				<td><b>Tahun Lahir</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td> 
			<select id="lahir" name="lahir" class="input-small">
				<?php 
				$tahun=date('Y');
				for($p=$tahun; $p>=1989; $p--){ ?>
				<option value="<?php echo $p ?>">
				<?php echo $p ?></option><?php }  ?>
				</select>
				</td></tr>
			
				<tr><td width="4%" scope="col"><b>A3</td>
				<td><b>Status Pernikahan</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Menikah" checked="checked" />Menikah
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Bercerai" />Bercerai
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Lajang / Tidak menikah" />Lajang / Tidak menikah
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Pisah rumah" />Pisah rumah
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Tinggal bersama" />Tinggal bersama
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" value="Janda / Duda" />Janda / Duda
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="status" id="status_lain" value="0" />Lainnya  : <input type="text" name="status_lain" id="status_teks" disabled="true" placeholder="masukan status nikah"/>
			</label></div>
			</td></tr>
	
			<tr>
				<td width="4%" scope="col"><b>A4</td>
				<td><b>Jurusan yang anda ambil pada saat di SLTA? </td>
			</tr>
			
			<tr><td width="4%" scope="col"></td><td><input type="text"  class="input-xlarge" id="jurusan" name="jurusan" value="<?php
					echo isset ($_POST['jurusan']) ? $_POST['jurusan'] : '';?>" placeholder="mohon tuliskan"/>
			<tr>
				<td width="4%" scope="col"><b>A5</td>
				<td ><b>Tahun berapa anda lulus SLTA ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td >
				<select name="lulus">
				<?php 
				$tahun=date('Y');
				for($p=$tahun; $p>=2006; $p--){ ?>
				<option value="<?php echo $p ?>">
				<?php echo $p ?></option><?php }  ?>
				</select>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>A5In</td>
				<td ><b>Berapa nilai NEM anda ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td ><input type="text" id="nem_slta" name="nem_slta" class="input-small" value="<?php
					echo isset ($_POST['nem_slta']) ? $_POST['nem_slta'] : '';?>"/>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>A6</td>
				<td ><b>Kebangsaan</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="kebangsaan" id="kebangsaan_lain" value="0"/>Asing : <input type="text" name="kebangsaan1" id="kebangsaan_teks" disabled="true" placeholder="masukan kebangsaan anda"/>
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio" name="kebangsaan" value="WNI" checked="checked"/>WNI
			</label></div><tr></tr>
			
			<tr>
			 	<td width="4%" scope="col"><b>A7</td>
				<td><b>Bagaimana penilaian anda terhadap kondisi fasilitas belajar di bawah ini?</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr><td colspan="4"><font size="2">Sangat baik</font></td>
			<td ><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td ><font size="1"><font size="1">2</font></td>
			<td ><font size="1"><font size="1">3</font></td>
			<td ><font size="1"><font size="1">4</font></td>
			<td ><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr>
			<td><input type="radio"  name="perpus" value="Sangat baik" <?php if( isset($_POST['perpus']) && $_POST['perpus'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="perpus" value="Baik" <?php if( isset($_POST['perpus']) && $_POST['perpus'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="perpus" value="Cukup" <?php if( isset($_POST['perpus']) && $_POST['perpus'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="perpus" value="Kurang" <?php if( isset($_POST['perpus']) && $_POST['perpus'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="perpus" value="Tidak sama sekali" <?php if( isset($_POST['perpus']) && $_POST['perpus'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td  width="70%" scope="col">Perpustakaan</td>
			</tr>
			<tr>
			<td><input type="radio"  name="tik" value="Sangat baik" <?php if( isset($_POST['tik']) && $_POST['tik'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="tik" value="Baik" <?php if( isset($_POST['tik']) && $_POST['tik'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="tik" value="Cukup" <?php if( isset($_POST['tik']) && $_POST['tik'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="tik" value="Kurang" <?php if( isset($_POST['tik']) && $_POST['tik'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="tik" value="Tidak sama sekali" <?php if( isset($_POST['tik']) && $_POST['tik'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Teknologi Informasi dan Komunikasi</td>
			</tr>
			<tr>
			<td><input type="radio"  name="modul" value="Sangat baik" <?php if( isset($_POST['modul']) && $_POST['modul'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="modul" value="Baik" <?php if( isset($_POST['modul']) && $_POST['modul'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="modul" value="Cukup" <?php if( isset($_POST['modul']) && $_POST['modul'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="modul" value="Kurang" <?php if( isset($_POST['modul']) && $_POST['modul'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="modul" value="Tidak sama sekali" <?php if( isset($_POST['modul']) && $_POST['modul'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Modul Belajar</td>
			</tr>
			<tr>
			<td><input type="radio"  name="ruang" value="Sangat baik" <?php if( isset($_POST['ruang']) && $_POST['ruang'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ruang" value="Baik" <?php if( isset($_POST['ruang']) && $_POST['ruang'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ruang" value="Cukup" <?php if( isset($_POST['ruang']) && $_POST['ruang'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ruang" value="Kurang" <?php if( isset($_POST['ruang']) && $_POST['ruang'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ruang" value="Tidak sama sekali" <?php if( isset($_POST['ruang']) && $_POST['ruang'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Ruang Belajar</td>
			</tr>
			<tr>
			<td><input type="radio"  name="lab" value="Sangat baik" <?php if( isset($_POST['lab']) && $_POST['lab'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="lab" value="Baik" <?php if( isset($_POST['lab']) && $_POST['lab'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="lab" value="Cukup" <?php if( isset($_POST['lab']) && $_POST['lab'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="lab" value="Kurang" <?php if( isset($_POST['lab']) && $_POST['lab'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="lab" value="Tidak sama sekali" <?php if( isset($_POST['lab']) && $_POST['lab'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Laboratorium</td>
			</tr>
			<tr>
			<td><input type="radio"  name="variasi" value="Sangat baik" <?php if( isset($_POST['variasi']) && $_POST['variasi'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="variasi" value="Baik" <?php if( isset($_POST['variasi']) && $_POST['variasi'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="variasi" value="Cukup" <?php if( isset($_POST['variasi']) && $_POST['variasi'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="variasi" value="Kurang" <?php if( isset($_POST['variasi']) && $_POST['variasi'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="variasi" value="Tidak sama sekali" <?php if( isset($_POST['variasi']) && $_POST['variasi'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Variasi pembelajaran yang digunakan</td>
			</tr>
			<tr>
			<td><input type="radio"  name="akomodasi" value="Sangat baik" <?php if( isset($_POST['akomodasi']) && $_POST['akomodasi'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="akomodasi" value="Baik" <?php if( isset($_POST['akomodasi']) && $_POST['akomodasi'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="akomodasi" value="Cukup" <?php if( isset($_POST['akomodasi']) && $_POST['akomodasi'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="akomodasi" value="Kurang" <?php if( isset($_POST['akomodasi']) && $_POST['akomodasi'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="akomodasi" value="Tidak sama sekali" <?php if( isset($_POST['akomodasi']) && $_POST['akomodasi'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Akomodasi</td>
			</tr>
			<tr>
			<td><input type="radio"  name="kantin" value="Sangat baik" <?php if( isset($_POST['kantin']) && $_POST['kantin'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="kantin" value="Baik" <?php if( isset($_POST['kantin']) && $_POST['kantin'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="kantin" value="Cukup" <?php if( isset($_POST['kantin']) && $_POST['kantin'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="kantin" value="Kurang" <?php if( isset($_POST['kantin']) && $_POST['kantin'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="kantin" value="Tidak sama sekali" <?php if( isset($_POST['kantin']) && $_POST['kantin'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Kantin</td>
			</tr>
			<tr>
			<td><input type="radio"  name="rekreasi" value="Sangat baik" <?php if( isset($_POST['rekreasi']) && $_POST['rekreasi'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="rekreasi" value="Baik" <?php if( isset($_POST['rekreasi']) && $_POST['rekreasi'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="rekreasi" value="Cukup" <?php if( isset($_POST['rekreasi']) && $_POST['rekreasi'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="rekreasi" value="Kurang" <?php if( isset($_POST['rekreasi']) && $_POST['rekreasi'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="rekreasi" value="Tidak sama sekali" <?php if( isset($_POST['rekreasi']) && $_POST['rekreasi'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Pusat kegiatan siswa dan fasilitasnya, ruang rekreasi</td>
			</tr>
			<tr>
			<td><input type="radio"  name="uks" value="Sangat baik" <?php if( isset($_POST['uks']) && $_POST['uks'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="uks" value="Baik" <?php if( isset($_POST['uks']) && $_POST['uks'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="uks" value="Cukup" <?php if( isset($_POST['uks']) && $_POST['uks'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="uks" value="Kurang" <?php if( isset($_POST['uks']) && $_POST['uks'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="uks" value="Tidak sama sekali" <?php if( isset($_POST['uks']) && $_POST['uks'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Fasilitas layanan kesehatan</td>
			</tr>
			<tr>
			<td><input type="radio"  name="fasilitas_lain" value="Sangat baik" <?php if( isset($_POST['fasilitas_lain']) && $_POST['fasilitas_lain'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="fasilitas_lain" value="Baik" <?php if( isset($_POST['fasilitas_lain']) && $_POST['fasilitas_lain'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="fasilitas_lain" value="Cukup" <?php if( isset($_POST['fasilitas_lain']) && $_POST['fasilitas_lain'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="fasilitas_lain" value="Kurang" <?php if( isset($_POST['fasilitas_lain']) && $_POST['fasilitas_lain'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="fasilitas_lain" value="Tidak sama sekali" <?php if( isset($_POST['fasilitas_lain']) && $_POST['fasilitas_lain'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Lainnya : <input type="text" id="infra_lain" name="infra_lain" class="form-control" disabled="true" value="<?php
					echo isset ($_POST['infra_lain']) ? $_POST['infra_lain'] : '';?>" placeholder="Mohon tuliskan"/></td>
			</tr>
			</table>
			</div>
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>A8</td>
				<td><b>Bagaimana penilaian anda terhadap pengalaman belajar di bawah ini?</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr><td colspan="4"><font size="2">Sangat baik</font></td>
			<td ><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td ><font size="1"><font size="1">2</font></td>
			<td ><font size="1"><font size="1">3</font></td>
			<td ><font size="1"><font size="1">4</font></td>
			<td ><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr>
			<td><input type="radio"  name="pemb_kelas" value="Sangat baik" <?php if( isset($_POST['pemb_kelas']) && $_POST['pemb_kelas'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="pemb_kelas" value="Baik" <?php if( isset($_POST['pemb_kelas']) && $_POST['pemb_kelas'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="pemb_kelas" value="Cukup" <?php if( isset($_POST['pemb_kelas']) && $_POST['pemb_kelas'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="pemb_kelas" value="Kurang" <?php if( isset($_POST['pemb_kelas']) && $_POST['pemb_kelas'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="pemb_kelas" value="Tidak sama sekali" <?php if( isset($_POST['pemb_kelas']) && $_POST['pemb_kelas'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td width="70%" scope="col">Pembelajaran di kelas</td>
			</tr>
			<tr>
			<td><input type="radio"  name="praktek" value="Sangat baik" <?php if( isset($_POST['praktek']) && $_POST['praktek'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="praktek" value="Baik" <?php if( isset($_POST['praktek']) && $_POST['praktek'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="praktek" value="Cukup" <?php if( isset($_POST['praktek']) && $_POST['praktek'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="praktek" value="Kurang" <?php if( isset($_POST['praktek']) && $_POST['praktek'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="praktek" value="Tidak sama sekali" <?php if( isset($_POST['praktek']) && $_POST['praktek'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Peraktek Industri/Praktek</td>
			</tr>
			<tr>
			<td><input type="radio"  name="osis" value="Sangat baik" <?php if( isset($_POST['osis']) && $_POST['osis'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="osis" value="Baik" <?php if( isset($_POST['osis']) && $_POST['osis'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="osis" value="Cukup" <?php if( isset($_POST['osis']) && $_POST['osis'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="osis" value="Kurang" <?php if( isset($_POST['osis']) && $_POST['osis'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="osis" value="Tidak sama sekali" <?php if( isset($_POST['osis']) && $_POST['osis'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>OSIS/MPK</td>
			</tr>
			<tr>
			<td><input type="radio"  name="ekskul" value="Sangat baik" <?php if( isset($_POST['ekskul']) && $_POST['ekskul'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ekskul" value="Baik" <?php if( isset($_POST['ekskul']) && $_POST['ekskul'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ekskul" value="Cukup" <?php if( isset($_POST['ekskul']) && $_POST['ekskul'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ekskul" value="Kurang" <?php if( isset($_POST['ekskul']) && $_POST['ekskul'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="ekskul" value="Tidak sama sekali" <?php if( isset($_POST['ekskul']) && $_POST['ekskul'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Kegiatan Ekstrakulikuler</td>
			</tr>
			<tr>
			<td><input type="radio"  name="olahraga" value="Sangat baik" <?php if( isset($_POST['olahraga']) && $_POST['olahraga'] == 'Sangat baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="olahraga" value="Baik" <?php if( isset($_POST['olahraga']) && $_POST['olahraga'] == 'Baik' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="olahraga" value="Cukup" <?php if( isset($_POST['olahraga']) && $_POST['olahraga'] == 'Cukup' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="olahraga" value="Kurang" <?php if( isset($_POST['olahraga']) && $_POST['olahraga'] == 'Kurang' ){ echo "checked='checked'"; }?> /></td>
			<td><input type="radio"  name="olahraga" value="Tidak sama sekali" <?php if( isset($_POST['olahraga']) && $_POST['olahraga'] == 'Tidak sama sekali' ){ echo "checked='checked'"; }?> /></td>
			<td>Rekreasi dan Olahraga</td>
			</tr>
			</table>
			</div>
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>A9</td>
				<td><b>Apa latar belakang pendidikan orang tua anda ?</td>
			</tr>
			
			<tr><td width="4%" scope="col"><font size="1"><b>Ayah</font></td><td><font size="1"><b> Ibu</font></td></tr>
			</table>
			<table  class="table table-striped">
			<tr><td width="4%" scope="col">	<input type="radio"  name="pend_ayah" value="Tidak Sekolah" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'Tidak Sekolah' ){ echo "checked='checked'"; }?> />
				</td> <td><input type="radio"  name="pend_ibu" value="Tidak Sekolah" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'Tidak Sekolah' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">Tidak Sekolah</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="SD" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'SD' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="SD" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'SD' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">SD</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="SLTP" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'SLTP' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="SLTP" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'SLTP' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">SLTP</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="SLTA" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'SLTA' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="SLTA" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'SLTA' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">SLTA</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="Diploma" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'Diploma' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="Diploma" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'Diploma' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">Diploma</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="Sarjana" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'Sarjana' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="Sarjana" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'Sarjana' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">Sarjana (S1)</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="Pascasarjana" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'Pascasarjana' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="Pascasarjana" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'Pascasarjana' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">Pascasarjana</td>
			</tr>
			<tr><td width="4%" scope="col">		<input type="radio"  name="pend_ayah" value="Tidak tahu" <?php if( isset($_POST['pend_ayah']) && $_POST['pend_ayah'] == 'Tidak tahu' ){ echo "checked='checked'"; }?> />
				</td><td><input type="radio"  name="pend_ibu" value="Tidak tahu" <?php if( isset($_POST['pend_ibu']) && $_POST['pend_ibu'] == 'Tidak tahu' ){ echo "checked='checked'"; }?> />
				</td><td width="90%" scope="col">Tidak tahu</td>
			</tr>
			</table>
			<tr><td colspan="3"><input type="submit" class="btn btn-primary"  value="Simpan" name="submit"></td></tr>
			</table>
			 </div>
		</form>
	
	 </div>
	
	
	 </body> 
	 

</html> 
