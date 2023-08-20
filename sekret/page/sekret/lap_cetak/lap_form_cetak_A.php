<html>
	<head>
	
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     <title>Laporan Komplek A</title> 
        <style type="text/css" media="print">
		 	@page { size: landscape; }
			
        	h4 { margin : 3px 0; }
				
			.printtable td{
				border : 1px solid #000;
			}
		</style>
        <script>
			window.print();
		</script>
<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css" />
    </head>
	
	

	
	<body>
	<div class="well sidebar-nav">
		
		  <!-- Le styles -->
		
		
			<center><h4>Laporan Data Santri Komplek Sunan Bonang (A)</h4></center>
		
			<div class="table-responsive">
			<table class="table table-bordered">
			
				<?php
            include "../../../config/config.php";
            	//kamar: a1
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>1.</h4></td>
						<td colspan="2"><h4>Kamar : A1</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '11'";
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
	        		
	        	//kamar: a2
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>2.</h4></td>
						<td colspan="2"><h4>Kamar : A2</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '12'";
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
	          
	          //kamar: a3
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>3.</h4></td>
						<td colspan="2"><h4>Kamar : A3</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '13'";
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
			
			//kamar: a4
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>4.</h4></td>
						<td colspan="2"><h4>Kamar : A4</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '14'";
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

	         //kamar: a5
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>5.</h4></td>
						<td colspan="2"><h4>Kamar : A5</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '15'";
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

	            //kamar: a6
	        	echo '</table><table  class="table table-stripped">';
	          	echo '<tr class="success"><td width="3%" scope="col"><h4>6.</h4></td>
						<td colspan="2"><h4>Kamar : A6</h4></td><td colspan="4" align="right"><h4>Ketua Kamar : _________________</h4></td></tr>
						</table>
						<table  class="table table-bordered">
							<tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>No HP</th><th>Tempat, Tanggal Lahir</th><th>Alamat</th><th>Status</th></tr>';
			
	            $sql = "SELECT * FROM t_santri where id_komplek LIKE '16'";
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
		
				
	
     </div>
		
	 </div>
	 
	
	 </body> 
	 

</html> 
