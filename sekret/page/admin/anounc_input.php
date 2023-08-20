<html>
<head>
<?php
include ('../secure/secure_admin.php');
?>
</head>
<body>
		<form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
			<div class="table-responsive">
			<table  class="table table-stripped">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut form untuk input pengumuman</h4></td>
			</tr>
				<tr>
					<td width="15%" scope="col">Judul Pengumuman</td>
					<td width="1%" scope="col">:</td>
					<td width="70%" scope="col"><div class="col-md-6"><input type="text" id="judul" name="judul" required="required" class="form-control" value="<?php
					echo isset($_POST['judul'])? $_POST['judul'] : '';?>" placeholder="isikan judul"/></div></td>
				</tr>
				<tr>
					<td>Isi Pengumuman</td>
					<td>:</td>
					<td><div class="col-md-12"><textarea class="form-control" rows="5" id="isi" required="required" name="isi" value="<?php
					echo isset($_POST['isi'])?$_POST['isi'] : '';?>" /></textarea></div></td>
				<tr>
					<td>Sumber Pengumuman</td>
					<td>:</td>
					<td><div class="col-md-7"><input type="text" id="sumber" name="sumber" required="required" class="form-control" value="<?php
					echo isset($_POST['sumber'])? $_POST['sumber'] : '';?>" placeholder="isikan sumber"/></div></td>
				</tr>
				<tr>	  
					<td>Tanggal Update</td>
					<td>:</td>
					<td><div class="col-md-5"><input type="date" id="tglupdt" name="tglupdt" required placeholder="yy-mm-dd" class="form-control" value="<?php
					echo (isset($_POST['tglupdt'])) ?	htmlspecialchars($_POST['tglupdt']) : "";?>"/></div></td>
				</tr>
	
				<tr>
					<td>File Gambar</td>
					<td>:</td>   
					<td><div class="col-md-5"><input name="nama_file" type="file" id="nama_file" size="30" /></div></td>
				</tr>				
			<tr>
					<td> <input type="submit" value="Tambahkan" name="submit" /></td>
					</tr>
			
			<?php 
			if(($_POST['submit']=="Tambahkan")){
					$judul=code($_POST["judul"]);
					$isi=code($_POST["isi"]);
					$sumber=code($_POST["sumber"]);
					$tglupdt=$_POST["tglupdt"];
					$namafolder="../images/upload/anounc/";
					$namafolders="images/upload/anounc/";
				if (!empty($_FILES["nama_file"]["tmp_name"]))
						{$jenis_gambar=$_FILES['nama_file']['type'];     
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
						{
						$gambar = $namafolder . basename($_FILES['nama_file']['name']);
						$gambars = $namafolders . basename($_FILES['nama_file']['name']);
							if (move_uploaded_file($_FILES['nama_file']['tmp_name'],$gambar)){echo "<div class='alert alert-success' role='alert'>Data berhasil dikirim </div>";             
					$sql="INSERT INTO pengumuman(judul,isi,sumber,tglupdt,foto,fotos)
							VALUES('" .$judul. "','" .$isi. "','" .$sumber. "','" .$tglupdt. "','" .$gambar. "','" .$gambars. "')";
							$result=$db->Execute($sql);
								if (!$result) {
										 print 'error inserting: '.$db->ErrorMsg().'<BR>';

								}   
							} else {echo "<div class='alert alert-danger' role='alert'>Data gagal dikirim</div>";}
						} else {echo "<div class='alert alert-danger' role='alert'>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>";}
						} else {echo "<div class='alert alert-warning' role='alert'>Anda belum memilih gambar</div>";
						}
					}
					?>

			</table>
			
		<table  class="table table-bordered">
		<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut tabel pengumuman</h4></td>
			</tr>
            <tr><th width="4%" scope="col">No</th><th width="15%" scope="col">Judul</th><th width="45%" scope="col">Isi Pengumuman</th><th width="10%" scope="col">Sumber</th><th width="10%" scope="col">Tanggal Update</th><th width="10%" scope="col">Aksi</th></tr>
            <?php
           	$sql2 = "SELECT * FROM pengumuman";
			$result2=$db->execute($sql2);
			$no="1";
			while(!$result2->EOF){
				
				$id = $result2->fields["id"];
				$jdl = $result2->fields["judul"];
				$judul=decode($jdl);
				$cont = $result2->fields["isi"];
				$isi=decode($cont);
				$smbr = $result2->fields["sumber"];
				$sumber=decode($smbr);
				$tglupdt= $result2->fields["tglupdt"];
				echo '<tr><td>'.$no.'</td><td>'.$judul.'</td><td>'.$isi.'</td><td>'.$sumber.'</td><td>'.$tglupdt.'</td><td class=eddel> <a href ="menu_admin.php?a=anounc_edit&id='.$id.'">'; ?> 
				 <span class="glyphicon glyphicon-edit" style="font-size:18px; color:#337AB7">Rubah
				<?php echo '</a>&nbsp;&nbsp;&nbsp;<a href ="admin/anounc_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
                 <span class="glyphicon glyphicon-trash" style="font-size:18px; color:#C7143A">Hapus <?php echo '</a></td></tr>';
				$no++;
				$result2->MoveNext();
            }
            
			?>
					
				</tr>
			</table>	
			<br><br>
		</div>
		</form>
	
</body>
</html>	