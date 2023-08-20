<html>
	<head>
	<?php
			
	?>
<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kuisioner.js"></script>
	<script src="../js/custom.js"></script>
	 <!-- Le styles -->
	
	</head> 
	<?php
		if(($_POST['submit']=="kirim")){
					$user=$_SESSION['FULLNAME'];
					$kampus=$_POST["kampus"];
					$nama_kampus=code($_POST["nama_kampus"]);
					$id_provinsi=$_POST["provinsi"];
						$sql5 = "SELECT * FROM provinsi WHERE `id` = '$id_provinsi'";
						$result5=$db->Execute($sql5);
						$provinsi = $result5->fields["provinsi"];						
					$id_kot=$_POST["kota"];
						$sql4 = "SELECT * FROM kota WHERE `id` = '$id_kot'";
						$result4=$db->Execute($sql4);
						$kota = $result4->fields["kota"];
						
					$program=code($_POST["program"]);
					$masuk=$_POST["masuk"];
					$lulus=$_POST["lulus"];
					$res_tinggal= code($_POST["tinggal"]?$_POST["tinggal"]:$_POST["lainnya_b5"]);
					
					$res_dana=code( $_POST["dana_kul"]?$_POST["dana_kul"]:$_POST["lainnya_b6"]);
										
					$nem=code($_POST["nem"]);
					$organisasi=$_POST["organisasi"];
					$keaktifan=$_POST["keaktifan"];
					
					$kursus= $_POST["kursus"];
					$nama_kursus=code($_POST["kursus_b7"]);
					
				
					// Insert
					$sql="INSERT INTO kuisioner_b(id_kuisB,program,masuk,lulus,tmpt_tinggl,dana_kul,nem,organisasi,keaktifan,kursus,nama_kursus,kampus,nama_kampus,provinsi,kota)
							VALUES('".$user."','".$program."','".$masuk."',	'".$lulus."','".$res_tinggal."','".$res_dana."','".$nem."','".$organisasi."','".$keaktifan."','".$kursus."','".$nama_kursus."','".$kampus."','".$nama_kampus."','".$provinsi."','".$kota."')";
								
					$result=$db->Execute($sql);
					if($result){
						echo "<div class='alert alert-success' role='alert'>Selamat telah terkirim. <a href='menu_alumni.php?a=kuisioner_C'>Selanjutnya</a></div>";
					}else{
						echo "<div class='alert alert-warning' role='alert'>Gagal Menambah data<br/></div>";
						 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."<BR></div>";
					}
					}
		?>
	<body>
	<div  class="well sidebar-nav">
	
		  <!-- Le styles -->
		<form class="form-inline" role="form" id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td><h4>B</h4></td>
				<td colspan="5"><h4>KEGIATAN PENDIDIKAN</h4></td>
			</tr>
			<tr></tr>
			<tr>
				<td width="4%" scope="col"><b>B1</td>
				<td><b>Jenis Universitas (kampus)</td>
			</tr>
			<tr>
				<td width="4%" scope="col"></td>
				<td>
					<div class="radio"><label>
				<input type="radio" name="kampus" value="Negeri" <?php if( isset($_POST['kampus']) && $_POST['kampus'] == 'Negeri' ){ echo "checked='checked'"; }?> />Negeri
					</label>
					</div>
				</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td>
			<div class="radio"><label>
			<input type="radio"  name="kampus" value="Swasta" <?php if( isset($_POST['kampus']) && $_POST['kampus'] == 'Swasta' ){ echo "checked='checked'"; }?> />Swasta
			</label></div></td></tr>
			<tr></tr>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>B1In</td>
				<td><b>Apa nama kampus anda</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td><input type="text"  class="input-xlarge" id="kampus" name="nama_kampus" value="<?php
					echo isset ($_POST['nama_kampus']) ? $_POST['nama_kampus'] : '';?>" placeholder="mohon tuliskan"/>
			</tr>
		
			</tr>
			<tr>
				<td width="4%" scope="col"><b>B2</td>
				<td ><b>Dimana lokasi kampus anda ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td >
			 <!--provinsi-->
            <select id="provinsi" name="provinsi">
                <option value="">Pilih Provinsi</option>
                <?php
           
				$sql = "SELECT * FROM provinsi ORDER BY provinsi";
				$result=$db->Execute($sql);
				 while (!$result->EOF) {
            	$id = $result->fields["id"];
				$provinsi = $result->fields["provinsi"];
				?>
                    <option value="<?php echo $id; ?>">
                        <?php echo $provinsi; ?>
                    </option>
                <?php
				$result->MoveNext();
                }
				?>
            </select>
            <tr><td width="4%" scope="col"></td><td >
            <!--kota-->
            <select id="kota" name="kota">
                <option value="">Pilih Kota/Kabupaten : </option>
           
            </select>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>B3</td>
				<td colspan="5"><b>Anda kuliah di program keahlian apa?</td>
			</tr>
			<tr><td></td><td colspan="5"><input type="text" id="program" name="program" class="form-control" value="<?php
					echo isset ($_POST['program']) ? $_POST['program'] : '';?>" placeholder="Mohon tuliskan"/></td>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>B4</td>
				<td colspan="5"><b>Kapan anda masuk dan lulus?</td>
			</tr>
			<tr><td></td><td colspan="5">Masuk : <select id="masuk" name="masuk" class="form-control">
				<?php 
				$tahun=date('Y');
				for($p=$tahun; $p>=2003; $p--){ ?>
				<option value="<?php echo $p ?>">
				<?php echo $p ?></option><?php }  ?>
				</select></td> 
			</tr>
			<tr><td></td><td colspan="5">Lulus : <select id="lulus" name="lulus" class="form-control">
				<?php 
				$thn=date('Y');
				$tahun=$thn+3;
				for($p=$tahun; $p>=2006; $p--){ ?>
				<option value="<?php echo $p ?>">
				<?php echo $p ?></option><?php }  ?>
				</select></td>
			</tr>
			</table>
			</div>
			<div class="table-responsive">			
			
			<table  class="table table-striped">
			<tr><td width="4%" scope="col"><b>B5</td>
				<td colspan="5"><b>Selama kuliah kebanyakan anda tinggal.....</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" value="Sendiri di asrama" checked="checked"/>Sendiri di asrama
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" value="Sendiri di kos"/>Sendiri di kos
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" value="Bersama orang tua/keluarga"/>Bersama orang tua/keluarga
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" value="Bersama keluarga"/>Bersama keluarga
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" value="Berbagi kamar kos/apartemen"/>Berbagi kamar kos/apartemen
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="tinggal" id="tinggal_lain" value="0"/>Lainnya : <input type="text" name="lainnya_b5" id="lainnya_b5" disabled="true" placeholder="masukan tempat tinggal anda" class="form-control"/>
			</label></div></td></tr>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			<div class="table-responsive">			
			<table  class="table table-striped">
					<tr><td width="4%" scope="col"><b>B6</td>
				<td colspan="5"><b>Siapa yang terutama membayar uang kuliah anda?</td>
			</tr>
			
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="dana_kul" value="Beasiswa (misalnya dari pemerintah, universitas)" checked="checked"/>Beasiswa (misalnya dari pemerintah, universitas)
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="dana_kul" value="Sebagian beasiswa"/>Sebagian beasiswa
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="dana_kul" value="Orangtua/keluarga"/>Orangtua/keluarga
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="dana_kul" value="Biaya sendiri"/>Biaya sendiri
			</label></div></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			<div class="radio"><label>
			<input type="radio" name="dana_kul" id="dana_lain" value="0" />Lainnya  : <input type="text" name="lainnya_b6" id="lainnya_b6" disabled="true" class="form-control" placeholder="masukan sumber biaya"/>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			</label></div></td></tr>
			<tr><td width="4%" scope="col"><b>B6Ui</td>
				<td colspan="5"><b>Berapa nilai NEM anda?</td>
			</tr>
			<tr><td></td><td colspan="5"><input type="text" id="nem" name="nem" class="form-control" value="<?php
					echo isset ($_POST['nem']) ? $_POST['nem'] : '';?>" /></td>
			</tr>
			
			<tr>
				<td width="4%" scope="col"><b>B6In</td>
				<td colspan="5"><b>Selama kuliah, apakah anda menjadi anggota dari suatu organisasi (sosial,pemuda,organisasi keagamaan) dalam atau luar kampus ?</b></td>
			</tr>
			<tr><td></td><td colspan="5"><div class="radio"><label>	<input type="radio"  name="organisasi" id="org_ya" value="Ya" <?php if( isset($_POST['organisasi']) && $_POST['organisasi'] == 'Ya' ){ echo "checked='checked'"; }?> />Ya</label></div></td></tr>
			<tr><td></td><td colspan="5"><div class="radio"><label>	<input type="radio"  name="organisasi" id="org_tdk" value="Tidak" <?php if( isset($_POST['organisasi']) && $_POST['organisasi'] == 'Tidak' ){ echo "checked='checked'"; }?> />Tidak<i><font size="2">==>Lanjut ke pertanyaan B7</label></div></td>
			</tr>
			
			<tbody id="tbodybuang2">
			<tr>
				<td width="4%" scope="col"><b>B7In</td>
				<td colspan="5"><b>Seberapa aktif anda di organisasi tersebut ?</td>
			</tr>
			
			<tr><td colspan="4"><font size="2">Sangat aktif</font></td>
			<td><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td><font size="1"><font size="1">2</font></td>
			<td><font size="1"><font size="1">3</font></td>
			<td><font size="1"><font size="1">4</font></td>
			<td><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr><td ><input type="radio"  name="keaktifan" value="Sangat aktif" <?php if( isset($_POST['keaktifan']) && $_POST['keaktifan'] == 'Sangat aktif' ){ echo "checked='checked'"; }?> /></td>
			<td ><input type="radio"  name="keaktifan" value="Aktif" <?php if( isset($_POST['keaktifan']) && $_POST['keaktifan'] == 'Aktif' ){ echo "checked='checked'"; }?> /></td>
			<td ><input type="radio"  name="keaktifan" value="Cukup aktif" <?php if( isset($_POST['keaktifan']) && $_POST['keaktifan'] == 'Cukup aktif' ){ echo "checked='checked'"; }?> /></td>
			<td ><input type="radio"  name="keaktifan" value="kurang aktif" <?php if( isset($_POST['keaktifan']) && $_POST['keaktifan'] == 'Kurang aktif' ){ echo "checked='checked'"; }?> /></td>
			<td ><input type="radio"  name="keaktifan" value="Pasif" <?php if( isset($_POST['keaktifan']) && $_POST['keaktifan'] == 'Pasif' ){ echo "checked='checked'"; }?> /></td>
			<td width="70%" scope="col"></td></tr>
			</table>
			</tbody>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>B7</td>
				<td><b>Pada saat anda kuliah di UM, apakah anda mengambil kursus atau pendidikan tambahan?</td>
			</tr>
			<tr><td></td><td><div class="radio"><label>	
			<input type="radio" name="kursus" id="kursus_ya" value="Ya"/>Ya, tuliskan nama kursus atau pendidikan tambahan tersebut: <input type="text" name="kursus_b7" id="kursus_b7" class="form-control" disabled="true" placeholder="masukan nama kursus anda"/>
			</label></div></td></tr>
			<tr><td></td><td><div class="radio"><label>
			<input type="radio" name="kursus" value="Tidak" checked="checked"/>Tidak
			</label></div></td>
			</tr>
			<tr><td colspan="2"></td></tr>
			</table>
			</div>
			<div class="table-responsive">			
			<table  class="table table-striped">
			</table>
			</div>
				<input type="submit" class="btn btn-primary"  value="kirim" name="submit">
			
		</form>
	 </div>
	
	 </body> 
</html> 