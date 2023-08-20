<html>
	<head>
	<body>
	<div class="table-responsive">
					
					<<table  class="table table-bordered">
					<tr><td><a href ="sekret/lap_cetak/lap_form_cetak_E.php" target="blank"> <span class='glyphicon glyphicon-print' style='font-size:20px; color:blue'> Cetak </span></a>	</td></tr>
					<tr class="success">
						<td width="4%" scope="col"><h4>E</h4></td>
						<td colspan="6"><h4>Laporan Data Santri Komplek Sunan Qudus(E)</h4></td></tr>
<?php
	          	include "sekret/lap_form.php";
	          	
	          	//kamar: e1
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>1.</h4></td>
						<td colspan="2"><h4>Kamar : E1</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '51'";
	            $no = 1;
	            $result=$db->execute($sql);
	            while (!$result->EOF) {
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
	            	$tempat_l = $result->fields["tempat_lahir"];
					$tgl_l = $result->fields["tgl_lahir"];

					$no_hp = $result->fields["no_hp"];
					$alamat = $result->fields["alamat"];

					$kota = $result->fields["kota"];
					$sql3 = "SELECT * FROM kota where id=$kota";
	                $result3=$db->execute($sql3);
	                $nama_kota = $result3->fields["kota"];

					$provinsi=$result->fields["provinsi"];
					$sql4 = "SELECT * FROM provinsi where id=$provinsi";
	                $result4=$db->execute($sql4);
	                $nama_provinsi = $result4->fields["provinsi"];

					$id_status = $result->fields["id_status"];
					$id_status = $result->fields["id_status"];
					$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
	                $result7=$db->execute($sql7);
	                $status = $result7->fields["status_santri"];
					$tgl_masuk = $result->fields["tgl_masuk"];
					
					
					echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$no_hp.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$alamat.'.<br>'.$nama_kota.'.'.$nama_provinsi.'</td><td>'.$status.'</td></tr>'; 
					$no++;

					$result->MoveNext();
	            }
	        		
	        	//kamar: e2
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>2.</h4></td>
						<td colspan="2"><h4>Kamar : E2</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '52'";
	            $no = 1;
	            $result=$db->execute($sql);
	            while (!$result->EOF) {
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
	            	$tempat_l = $result->fields["tempat_lahir"];
					$tgl_l = $result->fields["tgl_lahir"];

					$no_hp = $result->fields["no_hp"];
					$alamat = $result->fields["alamat"];

					$kota = $result->fields["kota"];
					$sql3 = "SELECT * FROM kota where id=$kota";
	                $result3=$db->execute($sql3);
	                $nama_kota = $result3->fields["kota"];

					$provinsi=$result->fields["provinsi"];
					$sql4 = "SELECT * FROM provinsi where id=$provinsi";
	                $result4=$db->execute($sql4);
	                $nama_provinsi = $result4->fields["provinsi"];

					$id_status = $result->fields["id_status"];
					$id_status = $result->fields["id_status"];
					$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
	                $result7=$db->execute($sql7);
	                $status = $result7->fields["status_santri"];
					$tgl_masuk = $result->fields["tgl_masuk"];
					
					
					echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$no_hp.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$alamat.'.<br>'.$nama_kota.'.'.$nama_provinsi.'</td><td>'.$status.'</td></tr>'; 
					$no++;

					$result->MoveNext();
	            }
	          
	          //kamar: e3
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>3.</h4></td>
						<td colspan="2"><h4>Kamar : E3</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '53'";
	            $no = 1;
	            $result=$db->execute($sql);
	            while (!$result->EOF) {
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
	            	$tempat_l = $result->fields["tempat_lahir"];
					$tgl_l = $result->fields["tgl_lahir"];

					$no_hp = $result->fields["no_hp"];
					$alamat = $result->fields["alamat"];

					$kota = $result->fields["kota"];
					$sql3 = "SELECT * FROM kota where id=$kota";
	                $result3=$db->execute($sql3);
	                $nama_kota = $result3->fields["kota"];

					$provinsi=$result->fields["provinsi"];
					$sql4 = "SELECT * FROM provinsi where id=$provinsi";
	                $result4=$db->execute($sql4);
	                $nama_provinsi = $result4->fields["provinsi"];

					$id_status = $result->fields["id_status"];
					$id_status = $result->fields["id_status"];
					$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
	                $result7=$db->execute($sql7);
	                $status = $result7->fields["status_santri"];
					$tgl_masuk = $result->fields["tgl_masuk"];
					
					
					echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$no_hp.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$alamat.'.<br>'.$nama_kota.'.'.$nama_provinsi.'</td><td>'.$status.'</td></tr>'; 
					$no++;

					$result->MoveNext();
	            }
			
			//kamar: e4
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>4.</h4></td>
						<td colspan="2"><h4>Kamar : E4</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '54'";
	            $no = 1;
	            $result=$db->execute($sql);
	            while (!$result->EOF) {
					$nis= $result->fields["nis"];
					$nama = $result->fields["nama"];
	            	$tempat_l = $result->fields["tempat_lahir"];
					$tgl_l = $result->fields["tgl_lahir"];

					$no_hp = $result->fields["no_hp"];
					$alamat = $result->fields["alamat"];

					$kota = $result->fields["kota"];
					$sql3 = "SELECT * FROM kota where id=$kota";
	                $result3=$db->execute($sql3);
	                $nama_kota = $result3->fields["kota"];

					$provinsi=$result->fields["provinsi"];
					$sql4 = "SELECT * FROM provinsi where id=$provinsi";
	                $result4=$db->execute($sql4);
	                $nama_provinsi = $result4->fields["provinsi"];

					$id_status = $result->fields["id_status"];
					$id_status = $result->fields["id_status"];
					$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
	                $result7=$db->execute($sql7);
	                $status = $result7->fields["status_santri"];
					$tgl_masuk = $result->fields["tgl_masuk"];
					
					
					echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$no_hp.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$alamat.'.<br>'.$nama_kota.'.'.$nama_provinsi.'</td><td>'.$status.'</td></tr>'; 
					$no++;

					$result->MoveNext();
	            }

	       			?>
				
			</table>
		
			</form>	
	
     </div>
		
	 </div>
	 
	
	 </body> 
	 

</html> 