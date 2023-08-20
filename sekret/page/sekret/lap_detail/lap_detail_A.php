<html>
	<head>
	<?php
		include "sekret/lap_detail.php";	
		//	require "call_class_sekret.php";
			/* <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     <title>Angket</title> 
        <style type="text/css" media="print">
		 	@page { size: potrait; }
			
        	h4 { margin : 5px 0; }
				
			.printtable td{
				border : 1px solid #000;
			}
		</style>
        <script>
			window.print();
		</script>*/
	?>
    
	
	

	
	<body>
	<div class="well sidebar-nav">
		
		  <!-- Le styles -->
		
		<div class="table-responsive">
			<table  class="table table-bordered table-condensed">
			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td colspan="15"><h4>Laporan Data Santri</h4></td>
			</tr>
			 <tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>Tempat, Tanggal Lahir</th><th>No Hp</th><th>Profesi</th><th>Nama Orang Tua</th><th>Nama Wali</th><th>Telp. Rumah</th><th>Alamat</th><th>Tanggal Masuk</th><th>Kamar</th><th>Kelas</th><th>Status</th><th>Foto</th></tr>
           
           	<?php
           
            
            $sql = "SELECT * FROM t_santri where id_komplek between '11' and '16'";
            $no = 1;
            $result=$db->execute($sql);
            while (!$result->EOF) {
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];
            	$tempat_l = $result->fields["tempat_lahir"];
				$tgl_l = $result->fields["tgl_lahir"];
				$no_hp=$result->fields["no_hp"];

				$profesi=$result->fields["profesi"];
				$sql2 = "SELECT * FROM institusi where id_institusi=$profesi";
                $result2=$db->execute($sql2);
                $nama_institusi=$result2->fields["nama_institusi"];
            
				$jurusan=$result->fields["jurusan"];
				$ayah=$result->fields["ayah"];
				$ibu=$result->fields["ibu"];
				$wali=$result->fields["wali"];
				$tlp_rumah=$result->fields["tlp_rmh"];
				$alamat = $result->fields["alamat"];
				
				$kota = $result->fields["kota"];
				$sql3 = "SELECT * FROM kota where id=$kota";
                $result3=$db->execute($sql3);
                $nama_kota = $result3->fields["kota"];

				$provinsi=$result->fields["provinsi"];
				$sql4 = "SELECT * FROM provinsi where id=$provinsi";
                $result4=$db->execute($sql4);
                $nama_provinsi = $result4->fields["provinsi"];

				$kode_pos=$result->fields["kode_pos"];
				$tgl_masuk=$result->fields["tgl_masuk"];

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $komplek = $result5->fields["nama_komplek"];

				$id_kelas=$result->fields["id_kelas"];
				$sql6 = "SELECT * FROM kelas where id_kelas=$id_kelas";
                $result6=$db->execute($sql6);
                $kelas = $result6->fields["kelas"];

				$id_status = $result->fields["id_status"];
				$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
                $result7=$db->execute($sql7);
                $status = $result7->fields["status_santri"];

				echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$no_hp.'</td><td> '.$jurusan.'.'.$nama_institusi.'</td><td>Ayah : '.$ayah.' Ibu:'.$ibu.'</td><td>'.$wali.'</td><td>'.$tlp_rumah.'</td><td>'.$alamat.','.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos.'.</td><td>'.$tgl_masuk.'</td><td>'.$komplek.'</td><td>'.$kelas.'</td><td>'.$status.'</td><td>';
				if(file_exists('../foto/'.substr($nis, 0, 1).'/'.substr($nis, 1, 1).'/'.$nis.'.jpg')) {
					echo '<a href="menu_sekret.php?b=lihat_foto&nis='.$nis.'">Lihat foto</a>';
				} else {
					echo '<a href="menu_sekret.php?b=lihat_foto&nis='.$nis.'">Upload foto</a>';
				}
				echo '</td>
				</tr>'; 
				$no++;

				$result->MoveNext();
            }

			
			?>
				
			</table>
		
				
	
     </div>
		
	 </div>
	 
	
	 </body> 
	 

</html> 
