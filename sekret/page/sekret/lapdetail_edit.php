    <link rel="stylesheet" type="text/css" href="../library/datepicker/bootstrap-datepicker.min.css" />
    <script src="../library/datepicker/bootstrap-datepicker.min.js"></script>

    <script src="../js/form_sekret/profesi.js"></script>
    <script src="../js/form_sekret/kota.js"></script>
    <!-- <script src="../js/form_sekret/kodepos.js"></script> -->
    <script src="../js/form_sekret/komplek.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var tgl_lahir_input = $('input[name="tgl_lahir_up"]'); //our date input has the name "date"
            var tgl_masuk_input = $('input[name="tgl_masuk_up"]'); //our date input has the name "date"
            var container = $('.container-fluid form .form-control .input-group .date').length > 0 ? $('.container form .form-control .input-group').parent() : "body";
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

        function reload_page(nis, sec) {
            var seconds = 0;
            setInterval(
                function(){
                    if (seconds >= sec) {
                        window.location = 'menu_sekret.php?a=lapdetail_edit&id='+nis;
                    }
                    else {
                        document.getElementById('secondo').innerHTML = ++seconds;
                    }
                },
                1000
            );
        }
    </script>
	<!-- <a class="btn btn-primary" href ="sekret/form_cetak.php?id=<?php echo $_GET['id']; ?>" target="_blank" style="margin: 5px"> 
                			<span class="glyphicon glyphicon-print"></span> Cetak Formulir
                		</a> -->
<!-- <a href="https://drive.google.com/drive/folders/16f2QhUgfjiGKHbPqU4kDzo__sc5kiJY2">https://drive.google.com/drive/folders/16f2QhUgfjiGKHbPqU4kDzo__sc5kiJY2</a> -->
<?php
// session_cache_limiter("nocache");
// header("Content-Type: application/json");
// header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-cache, must-revalidate");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
$flag = false;
if(isset($_POST['save'])){
	
    $id =$_GET['id'];
    $nama_up = strtoupper(code($_POST["nama_up"]));
    $nik_up = code($_POST["nik_up"]);
    $nama_panggilan_up = strtoupper(code($_POST["nama_panggilan_up"]));
    $tempat_l_up = code($_POST["tempat_l_up"]);

    $tgl_lahir_up = DateTime::createFromFormat("d/m/Y", $_POST["tgl_lahir_up"]);
    $tgl_lahir_up = $tgl_lahir_up->format("Y-m-d");
    $tgl_lahir_up = code($tgl_lahir_up);

    $no_hp_up = code($_POST["no_hp_up"]);

    $profesi_up = code($_POST["profesi_up"]);
    $institusi_up=code($_POST["institusi_up"]);
    $jurusan_up = code($_POST["jurusan_up"]);
    $ayah_up=code($_POST["ayah_up"]);
    $ibu_up=code($_POST["ibu_up"]);
    $wali_up = code($_POST["wali_up"]);
    $tlp_rumah_up = code($_POST["tlp_rumah_up"]);
    $alamat_up = code($_POST["alamat_up"]);
    $provinsi_up=code($_POST["provinsi_up"]);
    $kota_up=code($_POST["kota_up"]);
    $kecamatan_up = code($_POST["kecamatan_up"]);
    $kelurahan_up = code($_POST["kelurahan_up"]);
    $kode_pos_up = code($_POST["kode_pos_up"]);

    $tgl_masuk_up = DateTime::createFromFormat("d/m/Y", $_POST["tgl_masuk_up"]);
    $tgl_masuk_up = $tgl_masuk_up->format("Y-m-d");
    $tgl_masuk_up = code($tgl_masuk_up);
    
    $kamar_up=code($_POST["kamar_up"]);
    $kelas_up=code($_POST["kelas_up"]);
    $status_santri_up=code($_POST["status_santri_up"]);
    $lunas_administrasi_up=code($_POST["lunas_administrasi_up"]);
    $nis_up=$kamar_up.substr($tgl_lahir_up,-2).substr($tgl_lahir_up,2,2).substr($tgl_masuk_up,0,4).substr($tgl_masuk_up,5,2).substr($id, strlen($id)-1, 1);
    if ($id != $nis_up) {
        $nis_up = $kamar_up.substr($tgl_lahir_up,-2).substr($tgl_lahir_up,2,2).substr($tgl_masuk_up,0,4).substr($tgl_masuk_up,5,2)."0";
        $nis_lama = $id;
        do {
            $nis_up = $nis_up + 1;
            $sql2 = "SELECT COUNT(nis) AS ada FROM t_santri WHERE nis = '".$nis_up."'";
            $result2 = $db->Execute($sql2);
        } while ($result2->fields["ada"] > 0);
    }
    $nis = $nis_up;
    // update
     $sql3="UPDATE t_santri SET nis='$nis_up',nik='$nik_up',nama='$nama_up',nama_panggilan='$nama_panggilan_up',tempat_lahir='$tempat_l_up',tgl_lahir='$tgl_lahir_up',no_hp='$no_hp_up',profesi='$institusi_up',jurusan='$jurusan_up',ayah='$ayah_up',ibu='$ibu_up',wali='$wali_up',tlp_rmh='$tlp_rumah_up',alamat='$alamat_up',kelurahan='$kelurahan_up',kecamatan='$kecamatan_up',kota='$kota_up',provinsi='$provinsi_up',kode_pos='$kode_pos_up',tgl_masuk='$tgl_masuk_up',id_komplek='$kamar_up',id_kelas='$kelas_up',id_status='$status_santri_up',lunas_administrasi='$lunas_administrasi_up' WHERE nis=$id";
        $result3=$db->Execute($sql3);
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
                if (isset($nis_lama)) {
                    if (strlen($nis_lama) == 13) {
                        $upload_komplek_lama = substr($nis_lama, 0, 1);
                        $upload_kamar_lama = substr($nis_lama, 1, 1);  
                    } else {
                        $upload_komplek_lama = substr($nis_lama, 0, 2);
                        $upload_kamar_lama = substr($nis_lama, 2, 1);
                    }
                    if (is_file("../foto/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg")) {
                        unlink("../foto/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg");
                    }
                }
                echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
                $sql9 = "UPDATE t_santri SET foto = 1 WHERE nis = $nis";
                $db->Execute($sql9);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        if (isset($nis_lama)) {
            if (strlen($nis_lama) == 13) {
                $upload_komplek_lama = substr($nis_lama, 0, 1);
                $upload_kamar_lama = substr($nis_lama, 1, 1);  
            } else {
                $upload_komplek_lama = substr($nis_lama, 0, 2);
                $upload_kamar_lama = substr($nis_lama, 2, 1);
            }
            if (strlen($nis) == 13) {
                $upload_komplek = substr($nis, 0, 1);
                $upload_kamar = substr($nis, 1, 1);
            } else {
                $upload_komplek = substr($nis, 0, 2);
                $upload_kamar = substr($nis, 2, 1);
            }
            if (is_file("../foto/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg")) {
                rename("../foto/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg", "../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg");
            }
        }
    }

    if (isset($nis_lama)) {
        if (strlen($nis_lama) == 13) {
            $upload_komplek_lama = substr($nis_lama, 0, 1);
            $upload_kamar_lama = substr($nis_lama, 1, 1);  
        } else {
            $upload_komplek_lama = substr($nis_lama, 0, 2);
            $upload_kamar_lama = substr($nis_lama, 2, 1);
        }
        if (strlen($nis) == 13) {
            $upload_komplek = substr($nis, 0, 1);
            $upload_kamar = substr($nis, 1, 1);
        } else {
            $upload_komplek = substr($nis, 0, 2);
            $upload_kamar = substr($nis, 2, 1);
        }
        if (is_file("../img/kts/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg")) {
            rename("../img/kts/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg", "../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg");
        }
        if (is_file("../img/kts_resize/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg")) {
            rename("../img/kts_resize/".$upload_komplek_lama."/".$upload_kamar_lama."/".$nis_lama.".jpg", "../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg");
        }
    }
    if(!$result3) {
      trigger_error('Wrong SQL: ' . $sql3 . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
    } else {
        $affected_rows = $db->Affected_Rows();
        $flag = true;
    }

}
    if (isset($nis_up) && ($_GET['id'] != $nis_up)) {
        require_once "../config/config_aman.php";
            $sql_aman="UPDATE izinkhusus SET nis = '".$nis_up."' WHERE nis = '".$_GET['id']."'";
            $result_aman=$db_aman->Execute($sql_aman);
        require_once "../config/config_bendahara.php";
            $sql_bendahara="UPDATE transaksi SET nis = '".$nis_up."' WHERE nis = '".$_GET['id']."'";
            $result_bendahara=$db_bendahara->Execute($sql_bendahara);
    ?>
        <script type="text/javascript">window.location = 'menu_sekret.php?a=lapdetail_edit&id=<?php echo $nis_up; ?>'</script>
<?php
    }
    $nis = $_GET['id'];
?>
     <form action="sekret/cetak_kartu_santri_terpilih.php" method="post" target="_blank"> 
        <input type="hidden" name="array_nis[]" value=<?php echo $nis; ?>>
<?php
    if (strlen($nis) == 13) {
        $upload_komplek = substr($nis, 0, 1);
        $upload_kamar = substr($nis, 1, 1);
        
    } else {
        $upload_komplek = substr($nis, 0, 2);
        $upload_kamar = substr($nis, 2, 1);
    }
    $sql = "SELECT * FROM t_santri, kts WHERE t_santri.kts = kts.id AND nis = $nis";
    $result = $db->execute($sql);
    $id_status_kts = $result->fields["kts"];
    $status_kts = $result->fields["status_kts"];
    if ($id_status_kts >= 1) {
        if ($id_status_kts == 1) {
            $background_kts = "green";
        } else {
            $background_kts = "yellow";
        }
    } else {
        $background_kts = "red";
    }
?>
    <div style="background-color: <?php echo $background_kts; ?>; color: black;"><?php echo $status_kts; ?></div>
<?php
    if (!is_file("../img/kts/".$upload_komplek."/".$upload_kamar."/".$nis.".png") && !is_file("../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
?>
        <button type="submit" name="kts" value="buat" onclick="reload_page(<?php echo $nis; ?>, 13)">Buat File KTS</button>
<?php
    } else {
        if (isset($_POST['kts'])) {
            if ($_POST['kts'] == "lihat") {
                $kts_resize_loc = "../img/kts_resize/".$upload_komplek."/".$upload_kamar."/".$nis.".png";

?>              <a href="#">
                    <img class="preview_kts" onclick="window.open('../img/kts/<?php echo $upload_komplek; ?>/<?php echo $upload_kamar; ?>/<?php echo $nis; ?>.png?rand=<?php echo rand(); ?>')" src="<?php echo $kts_resize_loc.'?v'.filemtime($kts_resize_loc); ?>" width="428cm" height="269.9cm">
                </a>
                <br>
                <font color="#E45656" size="1">Klik gambar untuk perbesar</font>
<?php
            } else if ($_POST['kts'] == "verifikasi") {
                $sql2 = "UPDATE t_santri SET kts = 3 WHERE nis = ".$nis;
                $result2 = $db->execute($sql2);
                echo "<script>reload_page(".$nis.", 1)</script>";
            }
        }
?>
        <br>
        <button type="submit" name="kts" value="update" onclick="reload_page(<?php echo $nis; ?>, 15)">Update File KTS</button>
        <button type="submit" name="kts" value="hapus" onclick="reload_page(<?php echo $nis; ?>, 4)">Hapus KTS</button>
        <button type="submit" name="kts" value="lihat" formaction="" formmethod="post" formtarget="">Lihat KTS</button>
        <button type="submit" name="kts" value="verifikasi" formaction="" formmethod="post" formtarget=""
<?php
        if ($id_status_kts != 4) {
            echo "disabled";
        }
?>
        >Verifikasi KTS</button>
<?php
    }
?>
     </form> 

<?php
            while (!$result->EOF) {
               $nis= $result->fields["nis"];
               $nik= $result->fields["nik"];
				$nama = $result->fields["nama"];
                $nama_panggilan = $result->fields["nama_panggilan"];
            	$tempat_l = $result->fields["tempat_lahir"];

                $tgl_l = DateTime::createFromFormat("Y-m-d", $result->fields["tgl_lahir"]);
                $tgl_l = $tgl_l->format("d/m/Y");
                $tgl_l = code($tgl_l);
                
				$no_hp=$result->fields["no_hp"];

				$institusi=$result->fields["profesi"];
                $sql8 = "select * from profesi, institusi where profesi.id_profesi = institusi.id_profesi and institusi.id_institusi = $institusi";
                $result8 = $db->Execute($sql8);
                $nama_institusi = $result8->fields["nama_institusi"];
                $profesi = $result8->fields["id_profesi"];
                $nama_profesi = $result8->fields["nama_profesi"];
            
				$jurusan=$result->fields["jurusan"];
				$ayah=$result->fields["ayah"];
				$ibu=$result->fields["ibu"];
				$wali=$result->fields["wali"];
				$tlp_rumah=$result->fields["tlp_rmh"];
				$alamat = $result->fields["alamat"];
				
                $kelurahan = $result->fields["kelurahan"];
                $kecamatan = $result->fields["kecamatan"];

				$kota = $result->fields["kota"];
				$sql3 = "SELECT * FROM kota where id=$kota";
                $result3=$db->execute($sql3);
                $nama_kota = $result3->fields["kota"];

				$provinsi=$result->fields["provinsi"];
				$sql4 = "SELECT * FROM provinsi where id=$provinsi";
                $result4=$db->execute($sql4);
                $nama_provinsi = $result4->fields["provinsi"];

				$kode_pos=$result->fields["kode_pos"];

                $tgl_masuk = DateTime::createFromFormat("Y-m-d", $result->fields["tgl_masuk"]);
                $tgl_masuk = $tgl_masuk->format("d/m/Y");
                $tgl_masuk = code($tgl_masuk);

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $keterangan = $result5->fields["keterangan"];
                $komplek = $result5->fields["nama_komplek"];

				$id_kelas=$result->fields["id_kelas"];
				$sql6 = "SELECT * FROM kelas where id_kelas=$id_kelas";
                $result6=$db->execute($sql6);
                $kelas = $result6->fields["kelas"];

				$id_status = $result->fields["id_status"];
				$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
                $result7=$db->execute($sql7);
                $status = $result7->fields["status_santri"];
                
                $lunas = $result->fields["lunas_administrasi"];
                $result->MoveNext();
            }

  
?>

   <div class="container-fluid">
   <form class="form" method="post" action="" enctype="multipart/form-data">
    <div class="table-responsive">
            <table  class="table table-stripped">
            </tr>
        <tr class="success">
                <td width="4%" scope="col"><h4>A</h4></td>
                <td><h4>Data Santri</h4></td>
            </tr>
            
            <tr></tr>
            <tr>
                <td width="4%" scope="col"><b>A0</td>
                <td><b>NIK</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="nik_up" class="form-control" value="<?php echo $nik ?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A1</td>
                <td><b>Nama</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="nama_up" required="required" class="form-control" value="<?php echo $nama ?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A2</td>
                <td><b>Nama Panggilan</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="nama_panggilan_up" required="required" class="form-control" value="<?php echo $nama_panggilan ?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A3</td>
                <td><b>Tempat, Tanggal Lahir</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="tempat_l_up" required="required" class="form-control" value="<?php echo $tempat_l ?>"/>
            <!-- <input type="date" name="tgl_lahir_up" required placeholder="yy-mm-dd" class="form-control" value="<?php echo $tgl_l ?>"/></div></td> -->
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
                <input type="text" class="form-control datepicker" id="tgl_lahir_up" required="required" name="tgl_lahir_up" value="<?php echo (isset($tgl_l)) ? htmlspecialchars($tgl_l) : ''; ?>" placeholder="DD/MM/YYYY">
            </div>            
            </td>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A4</td>
                <td><b>Nomor HP <font color="#E45656">*Nomor HP Sendiri (Wajib diisi)</font></td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="no_hp_up" required="required" class="form-control" value="<?php echo $no_hp ?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A5</td>
                <td ><b>Apa Profesi Anda ?</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td >
             <!--profesi-->
            <select id="profesi" name="profesi_up">
                <option value="" disabled="disabled">Pilih profesi</option>
                <?php
           
                $sql = "SELECT * FROM profesi ORDER BY id_profesi";
                $result=$db->Execute($sql);
                while (!$result->EOF) {
                $id = $result->fields["id_profesi"];
                $nama_profesi2 = $result->fields["nama_profesi"];
                ?>
                    <option value="<?php echo $id; ?>" <?php echo ($id == $profesi) ? "selected" : "";?> >
                        <?php echo $nama_profesi2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </td></tr>
            </tr>
             <tr><td width="4%" scope="col"></td><td >
            <!--institusi-->
            <select name="institusi_up" id="institusi">
            <option disabled="disabled">--Pilih Institusi--</option>
           >
                <?php
           
                $sql = "SELECT * FROM institusi WHERE id_profesi = $profesi ORDER BY nama_institusi";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_institusi"];
                $nama_institusi2 = $result->fields["nama_institusi"];
                ?>
                    <option value="<?php echo $id; ?>" <?php echo ($id == $institusi ) ? "selected" : "" ?> >
                        <?php echo $nama_institusi2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </tr>
            <tr>
                <td width="4%" scope="col"></td>
                <td><b>Jurusan Anda? <font size="1" color="#E45656">*Jika Kuliah/Sekolah</font></td>
            </tr>
            <tr></tr>
            <td width="4%" scope="col"></td><td>
           <input type="text" name="jurusan_up" class="form-control" value="<?php echo $jurusan ?>"/>
            </td>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A6</td>
                <td><b>Nama Orang Tua</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td>Ayah : <input type="text" name="ayah_up" required="required" class="form-control" value="<?php echo $ayah ?>"/>
                Ibu : <input type="text" name="ibu_up" required="required" class="form-control" value="<?php echo $ibu ?>"/>
            </td>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A7</td>
                <td><b>Nama Wali</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="wali_up" class="form-control" value="<?php echo $wali ?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A8</td>
                <td><b>Nomor HP Orang Tua / Telepon Rumah</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td><input type="text" name="tlp_rumah_up" class="form-control" value="<?php echo $tlp_rumah?>"/>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A9</td>
                <td ><b>Dimana alamat anda ?</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td ><input type="text" name="alamat_up" required="required" class="form-control" value="<?php echo $alamat ?>"/>
                <font color="#E45656">*Hanya nama jalan, nomor jalan, gang, RT, RW, Dusun</font>
            <tr><td width="4%" scope="col"></td><td > <!--provinsi-->
            <select id="provinsi" name="provinsi_up" required="required">
                <option value="" disabled="disabled">Pilih Provinsi</option>
             
                <?php
           
                $sql = "SELECT * FROM provinsi ORDER BY provinsi";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id"];
                $nama_provinsi2 = $result->fields["provinsi"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $provinsi) {echo "selected";} ?> >
                        <?php echo $nama_provinsi2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            <tr><td width="4%" scope="col"></td><td >
            <!--kota-->
            <select name="kota_up" id="kota" required="required">
            <option value="" disabled="disabled">Pilih Kabupaten/Kota</option>
             
                <?php
           
                $sql = "SELECT * FROM kota WHERE id_prov = $provinsi ORDER BY kota";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id"];
                $nama_kota2 = $result->fields["kota"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $kota) {echo "selected";} ?> >
                        <?php echo $nama_kota2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>          
            </tr>
            <tr><td width="4%" scope="col"></td><td >
            <!--kota-->
            <select name="kecamatan_up" id="kecamatan" required="required">
            <option value="" disabled="disabled">Pilih Kecamatan</option>
             
                <?php
           
                $sql = "SELECT * FROM kecamatan WHERE id_kota = $kota ORDER BY kecamatan";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id"];
                $nama_kecamatan2 = $result->fields["kecamatan"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $kecamatan) {echo "selected";} ?> >
                        <?php echo $nama_kecamatan2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>         
            </tr>
            <tr><td width="4%" scope="col"></td><td >
            <!--kota-->
            <select name="kelurahan_up" id="kelurahan" required="required">
            <option value="" disabled="disabled">Pilih Desa/Kelurahan</option>
             
                <?php
           
                $sql = "SELECT * FROM kelurahan WHERE id_kecamatan = $kecamatan ORDER BY kelurahan";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id"];
                $nama_kelurahan2 = $result->fields["kelurahan"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $kelurahan) {echo "selected";} ?> >
                        <?php echo $nama_kelurahan2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>         
            </tr>
            <tr><td width="4%" scope="col"></td><td >
            <!--kota-->
            <font color="#E45656">*Jika kabupaten/kota atau kecamatan atau desa/kelurahan tidak ada, silahkan ganti ke provinsi lain terlebih dahulu</font>  
            </tr>
             <tr><td width="4%" scope="col"></td><td><b>Kode Pos : <font size="1" color="#E45656">*terisi otomatis setelah mengisi alamat, silahkan koreksi bila ada kesalahan</font></b>
            <input type="text" id="kodepos" name="kode_pos_up" required="required" class="form-control" value="<?php echo $kode_pos ?>"/>
                    </td> 
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A10</td>
                <td><b>Tanggal Masuk</td>
            </tr>
            <tr><td width="4%" scope="col"></td>
            <td>
                <!-- <input type="date" name="tgl_masuk_up" required placeholder="yy-mm-dd" class="form-control" value="<?php echo $tgl_masuk ?>" /></div> -->
                <div class="input-group date">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <input type="text" class="form-control datepicker" id="tgl_masuk_up" name="tgl_masuk_up" required="required" value="<?php echo (isset($tgl_masuk)) ? htmlspecialchars($tgl_masuk) : ''; ?>" placeholder="DD/MM/YYYY">
                </div>
            </td>
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A11</td>
                <td ><b>Apa Kamar Anda ?</td>
            </tr>
            </tr>
            <tr><td width="4%" scope="col"></td><td > <!--komplek-->
            <select id="komplek" name="komplek_up">
                <option value="" disabled="disabled">Pilih Komplek</option>
                <?php
                $sql = "SELECT DISTINCT keterangan FROM komplek";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                    $nama_komplek2 = $result->fields["keterangan"];
                ?>
                    <option value="<?php echo $nama_komplek2; ?>" <?php if ($keterangan == $nama_komplek2) {echo "selected";} ?> >
                        <?php echo $nama_komplek2; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            <tr><td width="4%" scope="col"></td><td >
            <!--kamar-->
            <select name="kamar_up" id="kamar">
            <option disabled="disabled">--Pilih Kamar--</option>
             
            <?php
           
                $sql = "SELECT * FROM komplek ORDER BY nama_komplek";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_komplek"];
                $komplek = $result->fields["nama_komplek"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $id_komplek) {echo "selected";} ?>>
                        <?php echo $komplek; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
             
                        
            </tr>
            <tr>
                <td width="4%" scope="col"><b>A12</td>
                <td ><b>Apa kelas Anda ?</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td >
             <!--kelas-->
            <select id="kelas" name="kelas_up">
                <option value="" disabled="disabled">Pilih kelas</option>
                <?php
           
                $sql = "SELECT * FROM kelas ORDER BY id_kelas";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_kelas"];
                $kelas = $result->fields["kelas"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $id_kelas) {echo "selected";} ?> >
                        <?php echo $kelas; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </td></tr>  
            <tr>
                <td width="4%" scope="col"><b>A13</td>
                <td ><b>Apa Status Anda ?</td>
            </tr>
            <tr><td width="4%" scope="col"></td><td >
             <!--status_santri-->
            <select id="status_santri" name="status_santri_up">
                <option value="" disabled="disabled">Pilih Status</option>
                <?php
           
                $sql = "SELECT * FROM status_santri ORDER BY id_status";
                $result=$db->Execute($sql);
                 while (!$result->EOF) {
                $id = $result->fields["id_status"];
                $status_santri = $result->fields["status_santri"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($id == $id_status) {echo "selected";} ?> >
                        <?php echo $status_santri; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
            </select>
            </td></tr>
            <tr>
                <td width="4%" scope="col"><b>A14</td>
                <td ><b>Apa Anda sudah lunas administrasi santri baru ? <font color="#E45656">*Administrasi biaya pendaftaran santri baru</font></td>
            </tr>
            <tr><td width="4%" scope="col"></td><td >
            
            <select id="lunas_administrasi" name="lunas_administrasi_up">
                <option value="" disabled="disabled">Pilih Kelunasan</option>
                    <option value="0" <?php echo ($lunas == 0) ? "selected" : ""; ?> >Belum  </option>
                    <option value="1" <?php echo ($lunas == 1) ? "selected" : ""; ?> >Sudah  </option>
               
            </select>
            </td></tr>
            <tr >
                <td width="4%" scope="col"><b>A15</b></td>
                <td><b>Upload Foto Santri</b></td>
            </tr>
            <tr>
                <td
<?php
                if (is_file("../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
?>
                    <a href="#">
                        <img class="preview_foto" onclick="window.open('../foto/<?php echo $upload_komplek; ?>/<?php echo $upload_kamar; ?>/<?php echo $nis; ?>.jpg?rand=<?php echo rand(); ?>')" src="../foto/<?php echo $upload_komplek; ?>/<?php echo $upload_kamar; ?>/<?php echo $nis; ?>.jpg?rand=<?php echo rand(); ?>" style="max-width:100%">
                    </a>
                    <font color="#E45656" size=1>*Klik gambar untuk perbesar</font>
<?php
                }
?>
                </td>
                <td scope="col">
                    <!--<input type="hidden" name="MAX_FILE_SIZE" value="2097152">-->
                    <!--<input id="foto" name="foto" type="file" accept="image/*" />-->
                    <a class="btn btn-primary" href ="../library/cropperjs-main/index.php?id=<?php echo $nis; ?>" target="_blank" style="margin: 5px">
                    <span class="glyphicon glyphicon-edit"></span> Upload Foto</a>
                    Upload Foto Santri (ukuran gambar maks. 2MB, ekstensi .jpg)<font color="#E45656"> *DILEWATI saja</font>
                </td>
            </tr>
            <tr>
                <td><input class="btn btn-success" type="submit" name="save" value="Simpan" /></td>
            </tr>
            <?php
            if($flag){
        		require_once("lapdetail_redirect.php");
            }
            ?>
        </table>
        </div>
        </form>
   </div>