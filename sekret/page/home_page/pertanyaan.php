	<div class="well sidebar-nav">
		<div class="table-responsive">
			<table class="table table-striped">
			<tr class="success">
			<br><td colspan="3"><h4 class="judul">Berikut beberapa pertanyaan dan jawaban</h4></td>
			</tr>
			<?php
            
            
            $sql = "SELECT * FROM pertanyaan where status=1";
            $no = 1;
            $result=$db->execute($sql);
            while (!$result->EOF) {
				$nama = $result->fields["nama"];
            	$subject = $result->fields["subject"];
				$isi = $result->fields["isi"];
				$jawaban = $result->fields["jawaban"];
				echo '<tr><td colspan="3"><b>'.$no.'). Penanya : '.$nama.'. Topik : '.$subject.'</b></td><tr><td colspan="3">Pertanyaan : '.$isi.'<br>Jawaban : '.$jawaban.'</td></tr>'; 
				$no++;

				$result->MoveNext();
            }


			?>
	
	
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
			<tr class="success">
			<td colspan="4"><h5 class="judul">Silahkan masukkan pertanyaan pada form berikut</h5></td>
			</tr>
			
				<tr>	  
					<td width="8%" scope="col">E-mail</td>
					<td width="1%" scope="col">:</td>
					<td width="70%" scope="col"><div class="col-md-5">
					<input type="email" name="email" class="form-control" value="
						<?php echo (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";?>" placeholder="email penanya" class="form-control" required="required">
					</div></td>
					
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td ><div class="col-md-8"><input type="text" name="nama" class="form-control" required="required" value="<?php
					echo isset($_POST['nama'])? $_POST['nama'] : '';?>" placeholder="Nama penanya"/></div></td>
				</tr>
				<tr>
					<td>Subject</td>
					<td>:</td>
					<td ><div class="col-md-8"><input type="text" name="subject" class="form-control" required="required" value="<?php
					echo isset($_POST['subject'])? $_POST['subject'] : '';?>" placeholder="Subject Pertanyaan"/></div></td>
				</tr>
				<tr>		
					<td>Pertanyaan</td>
					<td>:</td>
					<td > <div class="col-md-10"><textarea class="form-control" rows="5"  required="required" name="isi" value="<?php
					echo isset($_POST['isi'])?$_POST['isi'] : '';?>"></textarea>
					</div></td>
				</tr>
				<tr>
					<td colspan="3"> <input type="submit" class="btn btn-success"  value="Kirim" name="submit">
				
				
					</td>
				</tr>
				</table>
			</div>
	   </form>
	   <?php 

				if(($_POST['submit']=="Kirim")){
					$email=code($_POST["email"]);
					$subject=code($_POST["subject"]);
					$nama=code($_POST["nama"]);
					$isi=code($_POST["isi"]);
					$jawaban="belum terjawab";
					
					$sql="INSERT INTO pertanyaan(email,nama,subject,isi,jawaban,status)
							VALUES('".$email."','".$nama."','".$subject."','".$isi."','".$jawaban."','0')";
					
					$result=$db->Execute($sql);
					if($result){
						echo "<div class='alert alert-success' role='alert'>Selamat ! telah terkirim. Silahkan menunggu jawaban</div>";
					}else{
						echo "<div class='alert alert-warning' role='alert'>Gagal Menambah pertanyaan<br/></div>";
					}
					}
				?>