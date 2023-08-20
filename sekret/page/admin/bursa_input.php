<html>
<head>
 
</head>
<body>
		
		<form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td colspan="3"><h4 class="judul">Berikut form untuk input bursa kerja</h4></td>
			</tr>
				<tr>
					<td width="25%" scope="col">Judul Lowongan Kerja</td>
					<td width="1%" scope="col">:</td>
					<td width="70%" scope="col"><div class="col-md-6"><input type="text" id="judul" name="judul" required="required" class="form-control" value="<?php
					echo isset($_POST['judul'])? $_POST['judul'] : '';?>" placeholder="isikan judul lowongan"/></div></td>
				</tr>
				<tr>
					<td>Informasi Lowongan Kerja</td>
					<td>:</td>
					<td><div class="col-md-12"><textarea class="form-control" rows="5" id="lowker" required="required" name="lowker" value="<?php
					echo isset($_POST['lowker'])?$_POST['lowker'] : '';?>" /></textarea></div></td>
				</tr>
				<tr>
					<td>Sumber Lowongan Kerja</td>
					<td>:</td>
					<td width="70%" scope="col">
					<div class="col-md-6"><input type="text" name="sumber" required="required" class="form-control" value="<?php
					echo isset($_POST['sumber'])? $_POST['sumber'] : '';?>" placeholder="isikan sumber lowongan"/></div></td>
				</td>
				</tr>
				<tr>	  
					<td>Tanggal Update</td>
					<td>:</td>
					<td><div class="col-md-4">
					<input type="date" name="tglupdate" required placeholder="yy-mm-dd" class="form-control" value="<?php
					echo (isset($_POST['tglupdate'])) ?	htmlspecialchars($_POST['tglupdate']) : "";?>"/></div></td>
				</tr>
				<tr>
					<td>File Gambar</td>
					<td>:</td>   
					<td><div class="col-md-5"><input name="nama_file" type="file" id="nama_file" size="30" /></div></td>
				</tr>
					
			<tr>
					<td> <input class="btn btn-primary" type="submit" value="Tambahkan" name="submit" /></td>
			<?php 
					if(($_POST['submit']=="Tambahkan")){
						$judul=code($_POST["judul"]);
						$lowker=code($_POST["lowker"]);
						$sumber=code($_POST["sumber"]);
						$tglupdate=$_POST["tglupdate"];						
						$namafolder="../images/upload/bursa/";
						$namafolders="images/upload/bursa/";
					if (!empty($_FILES["nama_file"]["tmp_name"]))
						{$jenis_gambar=$_FILES['nama_file']['type'];     
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
						{
						$gambar = $namafolder . basename($_FILES['nama_file']['name']);
						$gambars = $namafolders. basename($_FILES['nama_file']['name']);
							if (move_uploaded_file($_FILES['nama_file']['tmp_name'],$gambar)){echo "<div class='alert alert-success' role='alert'>Data berhasil dikirim </div>";             
								$sql="INSERT INTO bursa_kerja(judul,lowker,sumber,tglupdate,foto,fotos)
								VALUES('" .$judul. "','" .$lowker. "','" .$sumber. "','" .$tglupdate. "','" .$gambar. "','" .$gambars. "')";
								
								if ($db->Execute($sql) === false) {

										 print "<div class='alert alert-warning' role='alert'>error inserting: ".$db->ErrorMsg()."</div><BR>";

								}   
							} else {echo "<div class='alert alert-danger' role='alert'>Data gagal dikirim</div>";}
						} else {echo "<div class='alert alert-danger' role='alert'>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>";}
						} else {echo "<div class='alert alert-warning' role='alert'>Anda belum memilih gambar</div>";
						}
					
				}
							
			?>				
			</tr>
			</table>
		
			<table  class="table table-bordered">
			<tr class="success">
				<td colspan="6"><h4 class="judul">Berikut tabel bursa kerja</h4></td>
			</tr>
            <tr><th width="4%" scope="col">No</th><th width="15%" scope="col">Judul</th><th width="45%" scope="col">Lowongan Kerja</th><th width="10%" scope="col">Sumber</th><th width="10%" scope="col">Tanggal Update</th><th width="10%" scope="col">Aksi</th></tr>
            <?php        
            $sql = "SELECT * FROM bursa_kerja";
			$result=$db->execute($sql);
			$no="1";
			while(!$result->EOF){
				
				$id =$result->fields["id"];
				$jdl = $result->fields["judul"];
				$judul=decode($jdl);
				$lwkr = $result->fields["lowker"];
				$lowker=decode($lwkr);
				$smbr = $result->fields["sumber"];
				$sumber=decode($smbr);
				$tglupdate= $result->fields["tglupdate"];
				echo '<tr><td>'.$no.'</td><td>'.$judul.'</td><td>'.$lowker.'</td><td>'.$sumber.'</td><td>'.$tglupdate.'</td><td class=eddel> <a href ="menu_admin.php?a=bursa_edit&id='.$id.'">'; ?> 
                 <span class="glyphicon glyphicon-edit" style="font-size:18px; color:#337AB7">Rubah
				<?php echo '</a>&nbsp;&nbsp;&nbsp;<a href ="admin/bursa_del.php?id='.$id.'" onclick="return confirm(\'Apakah anda yakin?\');">'; ?> 
                 <span class="glyphicon glyphicon-trash" style="font-size:18px; color:#C7143A">Hapus <?php echo '</a></td></tr>';
				$no++;
			
				$result->MoveNext();
			}
			
			
			
			
			?>
		</table>
		<br><br>
		</div>
		</form>
	
</body>
</html>