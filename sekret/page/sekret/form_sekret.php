	<link rel="stylesheet" type="text/css" href="../library/datepicker/bootstrap-datepicker.min.css" />
    <script src="../library/datepicker/bootstrap-datepicker.min.js"></script>
	
	<script src="../js/form_sekret/profesi.js"></script>
   	<script src="../js/form_sekret/kota.js"></script>
   	<!-- <script src="../js/form_sekret/kodepos.js"></script> -->
   	<script src="../js/form_sekret/komplek.js"></script>
   	<!-- <script src="../js/effec.js"></script> -->

<!-- 	<link  href="../js/cropperjs-master/cropper.min.css" rel="stylesheet">
	<script src="../js/cropperjs-master/cropper.min.js"></script> -->
    <script>
        $(document).ready(function() {
            var tgl_lahir_input = $('input[name="tgl_lahir"]'); //our date input has the name "date"
            var tgl_masuk_input = $('input[name="tgl_masuk"]'); //our date input has the name "date"
            var container = $('.container-fluid form').length > 0 ? $('.container-fluid form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
                orientation: 'bottom'
            };

            tgl_lahir_input.datepicker(options);
            tgl_masuk_input.datepicker(options);
        })
    </script>
	<style type="text/css">
	.form-control{
		margin: 5px;
	}
	</style>   

		<?php
		
		// url_encode() url_decode()
		if(($_POST['submit']=="Simpan")){
					//$user=$_SESSION['FULLNAME'];
					$nama= strtoupper(code($_POST["nama"]));
					$nik=code($_POST["nik"]);
					$nama_panggilan=strtoupper(code($_POST["nama_panggilan"]));
					$tempat_lahir=code($_POST["tempat_lahir"]);

					$tgl_lahir = DateTime::createFromFormat("d/m/Y", $_POST["tgl_lahir"]);
					$tgl_lahir = $tgl_lahir->format("Y-m-d");
					$tgl_lahir = code($tgl_lahir);

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

					$tgl_masuk = DateTime::createFromFormat("d/m/Y", $_POST["tgl_masuk"]);
					$tgl_masuk = $tgl_masuk->format("Y-m-d");
					$tgl_masuk = code($tgl_masuk);

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
					$sql="INSERT INTO t_santri(nis,nik,nama,nama_panggilan,tempat_lahir,tgl_lahir,no_hp,profesi,jurusan,ayah,ibu,wali,tlp_rmh,alamat,kelurahan,kecamatan,kota,provinsi,kode_pos,tgl_masuk,id_komplek,id_kelas,id_status,lunas_administrasi)
							VALUES('".$nis."','".$nik."','".$nama."','".$nama_panggilan."','".$tempat_lahir."','".$tgl_lahir."','".$no_hp."','".$institusi."','".$jurusan."','".$ayah."','".$ibu."','".$wali."','".$telp_rmh."','".$alamat."','".$kelurahan."','".$kecamatan."','".$kota."','".$provinsi."','".$kode_pos."','".$tgl_masuk."','".$kamar."','".$kelas."','".$status_santri."','".$lunas_administrasi."')";
					
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
		
	<div class="container-fluid">
        <div class="row">
			<div class="col-sm-12">
				<div class="form-group row">
					<div class="col-sm-12 bg_hijau" style="padding:10px">
						<label class="control-label col-sm-2" for="nik">Data Santri </label>
					</div>
				</div>
			</div>
            <div class="col-sm-12">
                <form class="form" role="form" id="form_santri_baru" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="nik">NIK </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nik" name="nik" required="required" pattern="[0-9]*" minlength="16" maxlength="16" title="16 Digit Angka" value="<?php echo isset($_POST['nik']) ? $_POST['nik'] : ''; ?>" placeholder="NIK sesuai KTP/KK (Misal: 357302190201XXXX)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="nama">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" required="required" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="nama_panggilan">Nama Panggilan </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" required="required" value="<?php echo isset($_POST['nama_panggilan']) ? $_POST['nama_panggilan'] : ''; ?>" placeholder="Nama Panggilan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="tempat_lahir">Tempat, Tanggal Lahir </label>
                            <div class="col-sm-3 col-xs-12" style="margin-bottom: 5px;">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required="required" pattern="[A-Z a-z]*" title="Hanya nama tempat" value="<?php echo isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : ''; ?>" placeholder="Tempat Lahir">
                            </div>

                            <div class="col-sm-3 col-xs-12 ">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="tgl_lahir" required="required" name="tgl_lahir" value="<?php echo (isset($_POST['tgl_lahir'])) ? htmlspecialchars($_POST['tgl_lahir']) : ""; ?>" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="no_hp">No. HP </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required="required" pattern="[0-9]*" minlength="10" maxlength="15" title="Maksimal 15 Digit Angka" value="<?php echo isset($_POST['no_hp']) ? $_POST['no_hp'] : ''; ?>" placeholder="Nomor HP (Misal: 085723859XXX)" />
                                <label style="color: red;">Nomor HP Sendiri (Wajib diisi)</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="profesi">Profesi </label>
                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" id="profesi" name="profesi" required="required">
                                    <option disabled="" selected="" value="">--Pilih profesi--</option>
                                    <?php

                                    $sql = "SELECT * FROM profesi ORDER BY nama_profesi";
                                    $result = $db->Execute($sql);
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
                            </div>

                            <div class="col-sm-5 col-xs-6">
                                <select class="form-control" id="institusi" name="institusi" required="required">
                                    <option disabled="" selected="" value="">--Pilih Institusi--</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="jurusan">Jurusan </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo isset($_POST['jurusan']) ? $_POST['jurusan'] : ''; ?>" placeholder="Jurusan" />
                                <label style="color: red;">Jika Kuliah/Sekolah</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-xs-12 ">
                            <label class="control-label col-sm-2" for="ayah">Nama Orang Tua </label>
                            <div class="col-sm-5 col-xs-12">
                                <label class="control-label col-sm-2 " for="ayah">Ayah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ayah" name="ayah" required="required" value="<?php echo isset($_POST['ayah']) ? $_POST['ayah'] : ''; ?>" placeholder="Nama Ayah" />
                                </div>
                            </div>

                            <div class="col-sm-5 col-xs-12">
                                <label class="control-label col-sm-2" for="ibu">Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ibu" name="ibu" required="required" value="<?php echo isset($_POST['ibu']) ? $_POST['ibu'] : ''; ?>" placeholder="Nama Ibu" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="wali">Nama Wali </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="wali" name="wali" value="<?php echo isset($_POST['wali']) ? $_POST['wali'] : ''; ?>" placeholder="Nama Wali" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="tlp_rmh">No. HP Orang Tua</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tlp_rmh" name="tlp_rmh" required="required" minlength="5" maxlength="15" title="Maksimal 15 Digit" value="<?php echo isset($_POST['tlp_rmh']) ? $_POST['tlp_rmh'] : ''; ?>" placeholder="No. HP Orang Tua/Telp. Rumah" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-1">
                            <label class="control-label col-sm-2" for="provinsi">Alamat</label>
                        </div>
                        <div class="col-sm-4 col-xs-12 col-sm-offset-1">

                            <label class="control-label col-sm-3 col-xs-12" for="provinsi">Provinsi</label>
                            <div class="col-sm-10 col-xs-12 ">

                                <select class="form-control" id="provinsi" name="provinsi" required="required">
                                    <option disabled="" selected="" value="">Pilih Provinsi</option>
                                    <?php

                                    $sql = "SELECT * FROM provinsi ORDER BY provinsi";
                                    $result = $db->Execute($sql);
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

                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-12 ">
                            <label class="control-label col-sm-3 col-xs-12" for="kota">Kabupaten/Kota</label>
                            <div class="col-sm-10 col-xs-12">
                                <select class="form-control" id="kota" name="kota" required="required">
                                    <option disabled="" selected="" value="">--Pilih Kabupaten/Kota--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-12 col-sm-offset-2">
                            <label class="control-label col-sm-3 col-xs-12" for="kecataman">Kecamatan</label>
                            <div class="col-sm-10 col-xs-12">
                                <select class="form-control" id="kecamatan" name="kecamatan" required="required">
                                    <option disabled="" selected="" value="">--Pilih Kecamatan--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-12 ">
                            <label class="control-label col-sm-3 col-xs-12" for="kelurahan">Kelurahan/Desa</label>
                            <div class="col-sm-10 col-xs-12">
                                <select class="form-control" id="kelurahan" name="kelurahan" required="required">
                                    <option disabled="" selected="" value="">--Pilih Desa/Kelurahan--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-10 col-xs-12 col-sm-offset-2">
                            <label class="control-label col-sm-1" for="alamat">Detail</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat" name="alamat" required="required" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : ''; ?>" placeholder="Detail Lain" />
                            </div>
                            <label for="" class="col-sm-10" style="color: red;">Hanya nama jalan, Nomor jalan, Gang, RT, RW, Dusun</label>
                        </div>

                        <div class="col-sm-8 col-xs-12 col-sm-offset-2">
                            <label class="control-label col-sm-3" for="kodepos">Kode Pos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodepos" name="kode_pos" required="required" pattern="[0-9]*" minlength="5" maxlength="6" title="Maksimal 6 Digit Angka" value="<?php echo isset($_POST['kode_pos']) ? $_POST['kode_pos'] : ''; ?>" placeholder="Kode Pos" />
                            </div>
                            <label for="" class="col-sm-10" style="color: red;">Terisi otomatis setelah memilih alamat, silahkan koreksi bila ada kesalahan</label>
                        </div>


                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="tgl_masuk">Tanggal Masuk</label>
                            <div class="col-sm-2">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" id="tgl_masuk" name="tgl_masuk" required="required" value="<?php echo (isset($_POST['tgl_masuk'])) ? htmlspecialchars($_POST['tgl_masuk']) : ""; ?>" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="komplek">Komplek</label>
                            <div class="col-sm-4 col-xs-6">
                                <select class="form-control" id="komplek" name="komplek" required="required">
                                    <option disabled="" selected="" value="">Pilih Komplek</option>
                                    <?php

                                    $sql = "SELECT DISTINCT keterangan FROM komplek";
                                    $result = $db->Execute($sql);
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
                            </div>

                            <div class="col-sm-2 col-xs-6">
                                <select class="form-control" id="kamar" name="kamar" required="required">
                                    <option disabled="" selected="" value="">--Pilih Kamar--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="kelas">Kelas</label>
                            <div class="col-sm-4 col-xs-6">
                                <select class="form-control" id="kelas" name="kelas" required="required">
                                    <option disabled="" selected="" value="">Pilih kelas</option>
                                    <?php

                                    $sql = "SELECT * FROM kelas ORDER BY id_kelas";
                                    $result = $db->Execute($sql);
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
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="status_santri">Status</label>
                            <div class="col-sm-4 col-xs-6">
                                <select class="form-control" id="status_santri" name="status_santri" required="required">
                                    <option disabled="" selected="" value="">Pilih Status</option>
                                    <?php

                                    $sql = "SELECT * FROM status_santri ORDER BY id_status";
                                    $result = $db->Execute($sql);
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
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2 col-xs-12" for="lunas_administrasi">Kelunasan Administrasi Santri Baru</label>
                            <div class="col-sm-4 col-xs-6">
                                <select id="lunas_administrasi" name="lunas_administrasi" required="required" class="form-control">
                                    <option disabled="" selected="" value="">Pilih Kelunasan</option>
                                    <option value="0">Belum</option>
                                    <option value="1">Sudah</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-2" for="verval">Kode Verifikasi </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="verval" name="verval" required="required" value="" placeholder="Kode Verifikasi">
                            </div>
                            <label class="control-label col-sm-10 col-sm-offset-2" for="" style="color: red;">Silahkan minta kode verfikasi kepada pengurus yang bertugas menerima anda.</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-1 col-sm-offset-2 text-center">
                            <button type="submit" class="btn btn-primary" value="Simpan" name="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
	
	 </div>
