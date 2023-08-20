   	<script src="../js/form_sekret/profesi.js"></script>
   	<script src="../js/form_sekret/kota.js"></script>
   	<!-- <script src="../js/form_sekret/kodepos.js"></script> -->
   	<script src="../js/form_sekret/komplek.js"></script>
   	<!-- <script src="../js/effec.js"></script> -->

<!-- 	<link  href="../js/cropperjs-master/cropper.min.css" rel="stylesheet">
	<script src="../js/cropperjs-master/cropper.min.js"></script> -->

	<style type="text/css">
	.form-control{
		margin: 5px;
	}
	</style>   

		<?php
		
		// url_encode() url_decode()
		if(($_POST['submit']=="Simpan")){
					//$user=$_SESSION['FULLNAME'];
					$nama=code($_POST["nama"]);
					$nama_panggilan=code($_POST["nama_panggilan"]);
					$tempat_lahir=code($_POST["tempat_lahir"]);
					$tgl_lahir=code($_POST["tgl_lahir"]);
					$no_hp=code($_POST["no_hp"]);
					
					$profesi=code($_POST["profesi"]);
					$institusi=code($_POST["institusi"]);
					$jurusan=code($_POST["jurusan"]);
					$ayah=code($_POST["ayah"]);
					$ibu=code($_POST["ibu"]);
					$wali=code($_POST["wali"]);
					$telp_rmh=code($_POST["telp_rmh"]);
					$alamat=code($_POST["alamat"]);
					$provinsi=code($_POST["provinsi"]);
					$kota=code($_POST["kota"]);
					$kecamatan = code($_POST["kecamatan"]);
					$kelurahan = code($_POST["kelurahan"]);
					$kode_pos=code($_POST["kode_pos"]);
					$tgl_masuk=code($_POST["tgl_masuk"]);
					$kamar=code($_POST["kamar"]);
					$kelas=code($_POST["kelas"]);
					$status_santri=code($_POST["status_santri"]);
					$lunas_administrasi=code($_POST["lunas_administrasi"]);
					$nis=$kamar.substr($tgl_lahir,-2).substr($tgl_lahir,2,2).substr($tgl_masuk,0,4).substr($tgl_masuk,5,2)."0";
					do {
						$nis = $nis + 1;
						$sql2 = "SELECT COUNT(nis) AS ada FROM t_santri WHERE nis = '".$nis."'";
						$result2 = $db->Execute($sql2);
					} while ($result2->fields["ada"] > 0);
					// Insert
					$sql="INSERT INTO t_santri(nis,nama,nama_panggilan,tempat_lahir,tgl_lahir,no_hp,profesi,jurusan,ayah,ibu,wali,tlp_rmh,alamat,kelurahan,kecamatan,kota,provinsi,kode_pos,tgl_masuk,id_komplek,id_kelas,id_status,lunas_administrasi,foto,kts)
							VALUES('".$nis."','".$nama."','".$nama_panggilan."','".$tempat_lahir."','".$tgl_lahir."','".$no_hp."','".$institusi."','".$jurusan."','".$ayah."','".$ibu."','".$wali."','".$telp_rmh."','".$alamat."','".$kelurahan."','".$kecamatan."','".$kota."','".$provinsi."','".$kode_pos."','".$tgl_masuk."','".$kamar."','".$kelas."','".$status_santri."','".$lunas_administrasi."','1','1')";
					
					$result=$db->Execute($sql);

					// if (isset($_POST["foto"])) {
				 //        if (strlen($nis) == 13) {
				 //            $upload_komplek = substr($nis, 0, 1);
				 //            $upload_kamar = substr($nis, 1, 1);
				 //        } else {
				 //            $upload_komplek = substr($nis, 0, 2);
				 //            $upload_kamar = substr($nis, 2, 1);
				 //        }
					// 	if (@file_put_contents("../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg", base64_decode(explode(",", $_POST['foto'])[1]))) {
					// 		$sql2 = "UPDATE t_santri SET foto = 1 WHERE nis = '".$nis."'";
					// 		$db->Execute($sql2);
					// 	}
					// }
					/*
					if (is_file($_FILES["foto"]["tmp_name"])) {
				        if (strlen($nis) == 13) {
				            $upload_komplek = substr($nis, 0, 1);
				            $upload_kamar = substr($nis, 1, 1);
				        } else {
				            $upload_komplek = substr($nis, 0, 2);
				            $upload_kamar = substr($nis, 2, 1);
				        }
						$target_dir = "../foto/".$upload_komplek."/".$upload_kamar."/"; //menyimpan file foto perkamar
						$nama_file = basename($_FILES["foto"]["name"]);
						$target_file = $target_dir.$nama_file;
						$ekstensi = '.jpg';
						$uploadok = 1;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
					    $check = getimagesize($_FILES["foto"]["tmp_name"]);
					    if($check !== false) {
					        echo "File is an image - " . $check["mime"] . ".";
					        $uploadOk = 1;
					    } else {
					        echo "File is not an image.";
					        $uploadOk = 0;
					    }

						$target_file = $target_dir.$nis.$ekstensi; //membuat nama file foto sesuai nis
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
						    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
							$sql2 = "UPDATE t_santri SET foto = 1 WHERE nis = '".$nis."'";
							$db->Execute($sql2);
						        echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
						    } else {
						        echo "Sorry, there was an error uploading your file.";
						    }
						}
					}
*/
					if($result){
			            ?>
			            <script type="text/javascript">
			                // window.open('../../bendahara/cetak/terakhir_pembayaran?nis=<?php echo $nis ?>');
			            </script>
			            <?php
						echo "<br><div class='alert alert-success' role='alert'>Selamat telah terkirim. </div>";
				?>		
<!-- 						<a class="btn btn-primary" href ="sekret/form_cetak.php?id=<?php echo $nis; ?>" target="blank" style="margin: 5px"> 
                			<span class="glyphicon glyphicon-print"></span> Cetak Formulir
                		</a> -->
						Data sudah tersimpan. Silahkan
						<a class="btn btn-primary" href ="menu_sekret.php?a=cek_data" style="margin: 5px"> 
                			<span class="glyphicon glyphicon-print"></span> Cek Data
                		</a>
                <?php
                		require_once("lapdetail_redirect.php");
					}else{
						echo "<br><div class='alert alert-warning' role='alert'>Gagal Menambah data</div>";
						 print "<br><div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."<BR></div>";
					}
				}
		?>
    
	<body>
	<div class="sidebar-nav">
		
		  <!-- Le styles -->
		<form class="form-inline" role="form"  id="login" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		
		<div class="table-responsive">
			<table  class="table table-striped">
			<thead>
				<tr class="bg_hijau">
					<th width="4%" scope="col"><h4>A</h4></th>
					<th colspan="2"><h4>Data Santri</h4></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="4%" scope="col"><b>A1</td>
					<td ><b>Nama</td>
					<td><input type="text" class="form-control" id="nama" name="nama" size="80" required="required" value="<?php
						echo isset ($_POST['nama']) ? $_POST['nama'] : '';?>" placeholder="Nama Lengkap"/></td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A2</td>
					<td ><b>Nama Panggilan</td>
					<td><input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" required="required" value="<?php
						echo isset ($_POST['nama_panggilan']) ? $_POST['nama_panggilan'] : '';?>" placeholder="Nama Panggilan"/></td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A3</td>
					<td><b>Tempat, Tanggal Lahir</td>
					<td>
						<input type="text"  class="form-control"  id="tempat_lahir" name="tempat_lahir" required="required" value="<?php
						echo isset ($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';?>" placeholder="Tempat Lahir"/>, 
						<input type="date" name="tgl_lahir" required="required" placeholder="yy-mm-dd" class="form-control" value="<?php echo (isset($_POST['tgl_lahir'])) ?	htmlspecialchars($_POST['tgl_lahir']) : "";?>"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A4</td>
					<td><b>Nomor HP</td>
					<td>
						<input type="text" pattern="[0-9]*" class="form-control"  id="no_hp" name="no_hp" required="required" value="<?php echo isset ($_POST['no_hp']) ? $_POST['no_hp'] : '';?>" placeholder="Nomor Hp"/>
						 <font color="#E45656">*Nomor HP Sendiri (Wajib diisi)</font>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A5</td>
					<td ><b>Apa Profesi Anda ?</td>
					<td >
						 <!--profesi-->
			            <select id="profesi" name="profesi" required="required" class="form-control">
			                <option disabled="" selected="">--Pilih profesi--</option>
			                <?php
			           
							$sql = "SELECT * FROM profesi ORDER BY nama_profesi";
							$result=$db->Execute($sql);
							 while (!$result->EOF) {
			            	$id = $result->fields["id_profesi"];
							$profesi = $result->fields["nama_profesi"];
							?>
			                    <option value="<?php echo $id; ?>">
			                        <?php echo $profesi; ?>
			                    </option>
			                <?php
							$result->MoveNext();
			                }
							?>
			            </select> 
			             <select name="institusi" id="institusi" required="required" class="form-control">
							<option disabled="" selected="">--Pilih Institusi--</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"></td>
					<td><b>Jurusan Anda? <br><font size="1" color="#E45656">*Jika Kuliah/Sekolah</font></td>
					<td>
						<input type="text"  class="form-control"  id="jurusan" name="jurusan" value="<?php
								echo isset ($_POST['jurusan']) ? $_POST['jurusan'] : '';?>" placeholder="Jurusan"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A6</td>
					<td><b>Nama Orang Tua</td>
					<td>Ayah : <input type="text"  class="form-control"  id="ayah" name="ayah" required="required" value="<?php
						echo isset ($_POST['ayah']) ? $_POST['ayah'] : '';?>" placeholder="Nama Ayah"/>
					Ibu : <input type="text"  class="form-control"  id="ibu" name="ibu" required="required" value="<?php
						echo isset ($_POST['ibu']) ? $_POST['ibu'] : '';?>" placeholder="Nama Ibu"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A7</td>
					<td><b>Nama Wali</td>
					<td><input type="text"  class="form-control"  id="wali" name="wali" value="<?php
						echo isset ($_POST['wali']) ? $_POST['wali'] : '';?>" placeholder="Nama Wali"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A8</td>
					<td><b>Nomor HP Orang Tua / Telepon Rumah</td>
					<td><input type="text"  class="form-control" pattern="[0-9]*" id="telp_rmh" name="telp_rmh"   value="<?php
						echo isset ($_POST['telp_rmh']) ? $_POST['telp_rmh'] : '';?>" placeholder="Telp Rumah/Orang Tua"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A9</td>
					<td ><b>Dimana alamat anda ?</td>
					<td ><input type="text"  class="form-control"  id="alamat" name="alamat" required="required" value="<?php
						echo isset ($_POST['alamat']) ? $_POST['alamat'] : '';?>" placeholder="Alamat Rumah"/>
			            <font color="#E45656">*Hanya nama jalan, nomor jalan, gang, RT, RW, Dusun</font>
			            <br>
						<select id="provinsi" name="provinsi" required="required" class="form-control">
			                <option disabled="" selected="">Pilih Provinsi</option>
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
		                <select name="kota" id="kota" required="required" class="form-control">
							<option disabled="" selected="">--Pilih Kabupaten/Kota--</option>
						</select>
		                <select name="kecamatan" id="kecamatan" required="required" class="form-control">
							<option disabled="" selected="">--Pilih Kecamatan--</option>
						</select>
		                <select name="kelurahan" id="kelurahan" required="required" class="form-control">
							<option disabled="" selected="">--Pilih Desa/Kelurahan--</option>
						</select>
						<br>
			            <input type="number" class="form-control"  id="kodepos" name="kode_pos" required="required" value="<?php echo isset ($_POST['kode_pos']) ? $_POST['kode_pos'] : '';?>" placeholder="Kode Pos"/>
			            <font size="1" color="#E45656">*terisi otomatis setelah mengisi alamat, silahkan koreksi bila ada kesalahan</font>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A10</td>
					<td><b>Tanggal Masuk</td>
					<td><input type="date" name="tgl_masuk" required="required" placeholder="yy-mm-dd" class="form-control" value="<?php
						echo (isset($_POST['tgl_masuk'])) ?	htmlspecialchars($_POST['tgl_masuk']) : "";?>"/>
					</td>
				</tr>
				<tr>
					<td width="4%" scope="col"><b>A11</td>
					<td ><b>Apa Kamar Anda ?</td>
					<td > <!--komplek-->
			            <select id="komplek" name="komplek" required="required" class="form-control">
			                <option disabled="" selected="">Pilih Komplek</option>
			                <?php
			           
							$sql = "SELECT DISTINCT keterangan FROM komplek";
							$result=$db->Execute($sql);
							 while (!$result->EOF) {
			            	//$id_komplek = $result->fields["id_komplek"];
							$keterangan = $result->fields["keterangan"];
							?>
			                    <option value="<?php echo $keterangan; ?>">
			                        <?php echo $keterangan; ?>
			                    </option>
			                <?php
							$result->MoveNext();
			                }
							?>
			            </select>
			            <select name="kamar" id="kamar" required="required" class="form-control">
							<option disabled="" selected="">--Pilih Kamar--</option>
						</select>
					</td>
				</tr>
				<tr>
	                <td width="4%" scope="col"><b>A12</td>
	                <td ><b>Apa kelas Anda ?</td>
	                <td>
			             <!--kelas-->
			            <select id="kelas" name="kelas" required="required" class="form-control">
			                <option disabled="" selected="">Pilih kelas</option>
			                <?php
			           
			                $sql = "SELECT * FROM kelas ORDER BY id_kelas";
			                $result=$db->Execute($sql);
			                while (!$result->EOF) {
				                $id = $result->fields["id_kelas"];
				                $kelas = $result->fields["kelas"];
				            ?>
			                    <option value="<?php echo $id; ?>">
			                        <?php echo $kelas; ?>
			                    </option>
				            <?php
				                $result->MoveNext();
				            }
			                ?>	
			            </select>
					</td>
	            </tr>
	            <tr>
	                <td width="4%" scope="col"><b>A13</td>
	                <td ><b>Apa Status Anda ?</td>
	                <td >
			             <!--status_santri-->
			            <select id="status_santri" name="status_santri" required="required" class="form-control">
			                <option disabled="" selected="">Pilih Status</option>
			                <?php
			           
			                $sql = "SELECT * FROM status_santri ORDER BY id_status";
			                $result=$db->Execute($sql);
			                while (!$result->EOF) {
				                $id = $result->fields["id_status"];
				                $status_santri = $result->fields["status_santri"];
			                ?>
			                    <option value="<?php echo $id; ?>">
			                        <?php echo $status_santri; ?>
			                    </option>
			                <?php
			                	$result->MoveNext();
			                }
			                ?>
			            </select>
			        </td>
	            </tr>
	            <tr>
	                <td width="4%" scope="col"><b>A14</td>
	                <td ><b>Apa Anda sudah lunas administrasi santri baru ?</td>
	                <td >
			            <select id="lunas_administrasi" name="lunas_administrasi" required="required" class="form-control">
			            	<option disabled="" selected="">Pilih Kelunasan</option>
			                <option value="0">Belum</option>
			                <option value="1">Sudah</option>
			            </select>
			            <font color="#E45656">*Administrasi biaya pendaftaran santri baru (Rp. 650.000)</font>
			        </td>
	            </tr>
	          <!--   <tr >
	            	<td width="4%" scope="col"><b>A15</td>
	            	<td><b>Upload Foto Santri</b></td>
	            	<td scope="col">
	            		Upload Foto Santri (ukuran gambar maks. 2MB, ekstensi .jpg)<!-- <font color="#E45656"> *DILEWATI saja</font> -->
					<!-- 	<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
	            		<input id="foto" name="foto" type="file" accept="image/*">
<!-- 	            		<input id="foto" type="hidden" name="foto" value="">
	            		<img id="image_display" src="" style="width: 200px; height: 250px;"></td>
				</tr> -->
					
<!-- 				<tr>
					<td>
					</td>
					<td>
					</td>
					<td>
					    <button id="modal_button" type="button" data-toggle="modal" data-target="#myModal">Upload Foto</button> 
					      
					        <div class="modal fade bg-modal modal-full" id="myModal">
					          <div class="modal-dialog">
					            <div class="modal-content">
					            
					              <div class="modal-header">
					                <h4 class="modal-title">Modal Heading</h4>
					                <button type="button" class="close" data-dismiss="modal">&times;</button>
					              </div>
					              
					              <div class="modal-body">
										<div class="row text-center " id="dropbukti" style="margin:20px;padding: 50px 0px;border: 3px dotted #CFCECE" ondrop="upload_file(event)" ondragover="return false">
											<div id="text">
												<h1><i class="glyphicon glyphicon-picture"></i></h1>
												<button type="button" class="btn btn-primary" onclick="file_explorer('foto_santri')"><i class="glyphicon glyphicon-briefcase"></i> Upload Foto</button>

											<h6 class="small">Ukuran foto maksimal. 2MB,<br> dengan ekstensi .JPG</h6>
											</div>
											<div style="display: none;margin: 0px auto;" id="foto_modal">
												<div style="width: 400px; height: 500px;">
													<img id="file_foto_modal" src="" style="max-width: 100%;">
												</div>
												<button type="button" class="btn btn-danger" onclick="batal()"><i class="glyphicon glyphicon-trash" data-dismiss="modal"></i> Hapus Gambar</button>
											</div>
											<br>
											<h4 id="namaFile" style="white-space: nowrap; text-overflow: ellipsis; width: 150px; font-weight: bold;margin: 0px auto"></h4> <br>
												<input type='hidden' name='id_transaksi' value='file_foto'?>
												<input type="file" id="fotos" name="fotos" accept="image/*" style="display: none;" />
												<input type="reset" id="reset1" style="display: none;">
												<button type="button" id="bukti1" style="display: none;margin:0px auto" class="btn btn-success" onclick="selesai()"><i class="glyphicon glyphicon-send"></i> Selesai</button>
										</div>
					              </div>
					              
					              <div class="modal-footer">
					                <button id="close_button" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					              </div>
					              
					            </div>
					          </div>
					        </div>
	            	</td>
	            </tr> -->	
				<tr>
					<td></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary" value="Simpan" name="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button></td>
				</tr>
			</tbody>
			</table>
			 </div>
		</form>
	
	 </div>
