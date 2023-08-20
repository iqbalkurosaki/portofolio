		<style type="text/css">
		ul.lis{
			display: flex;
			flex-grow: 1;
			flex-wrap: wrap;
			padding: 8px;
			padding-top: 10px;
			width: 100%;
			list-style: none;
		}
		ul.lis>li{
			text-align: center;
			flex-grow: 1;
		}
		ul.lis>li>a{
			border-radius: 5px 5px 0px 0px;
			font-weight: bold;
			background-color: white;
			font-size: 16px;
			color: grey;
			padding:10px;
			text-align: center;
			flex-grow: 1;
			text-decoration: none;
		}
		ul.lis>li>a:hover{
			color: #40873A;
			border-bottom: 3px solid #40873A;
		}
		ul.lis>li>a.aktif{
			color: #40873A;
			border-bottom: 3px solid #40873A;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../css/DataTables/dataTables.min.css">
	<script type="text/javascript" src="../css/DataTables/dataTables.min.js"></script>
		
<?php
if (isset($_GET['k'])) {
	$alfa = array('A','B','C','D','E','F','G','H','I','J');
	function kelas_aktif($input){
	$alfa = array('A','B','C','D','E','F','G','H','I','J');
		if ( $alfa[$_GET['k']-1] == $input) {
			return "aktif";
		}
	}
?>
		<div class="position-relative">
		<ul class="lis">
			<li><a class="<?php echo kelas_aktif('A') ?>" href ="menu_sekret.php?a=lap_detail&k=1">Komplek A</a></li>
			<li><a class="<?php echo kelas_aktif('B') ?>" href ="menu_sekret.php?a=lap_detail&k=2">Komplek B</a></li>
			<li><a class="<?php echo kelas_aktif('C') ?>" href ="menu_sekret.php?a=lap_detail&k=3">Komplek C</a></li>
			<li><a class="<?php echo kelas_aktif('D') ?>" href ="menu_sekret.php?a=lap_detail&k=4">Komplek D</a></li>
			<li><a class="<?php echo kelas_aktif('E') ?>" href ="menu_sekret.php?a=lap_detail&k=5">Komplek E</a></li>
			<li><a class="<?php echo kelas_aktif('F') ?>" href ="menu_sekret.php?a=lap_detail&k=6">Komplek F</a></li>
			<li><a class="<?php echo kelas_aktif('G') ?>" href ="menu_sekret.php?a=lap_detail&k=7">Komplek G</a></li>
			<li><a class="<?php echo kelas_aktif('H') ?>" href ="menu_sekret.php?a=lap_detail&k=8">Komplek H</a></li>
			<li><a class="<?php echo kelas_aktif('I') ?>" href ="menu_sekret.php?a=lap_detail&k=9">Komplek I</a></li>
			<li><a class="<?php echo kelas_aktif('J') ?>" href ="menu_sekret.php?a=lap_detail&k=10">Komplek J</a></li>
		</ul>
		</div>
		<div class="">
			<h4>
				<b>Detail Data Santri Komplek <?php echo $alfa[$_GET['k']-1]; ?></b>
			</h4>
			<table  class="table table-bordered table-condensed" id="myTable">
			<thead>
			 <tr class="success">
			 	<th>No</th>
			 	<th>Nis</th>
			 	<th>Nama</th>
			 	<th>Tempat, Tanggal Lahir</th>
			 	<th>No Hp</th>
			 	<th>Profesi</th>
			 	<th>Nama Orang Tua</th>
			 	<th>Nama Wali</th>
			 	<th>Telp. Rumah</th>
			 	<th>Alamat</th>
			 	<th>Tanggal Masuk</th>
			 	<th>Kamar</th>
			 	<th>Kelas</th>
			 	<th>Status</th>
			 	<th>Foto</th>
			 </tr>
           	</thead>
           	<tbody>
           	<?php
           
            
            $sql = "SELECT * FROM t_santri where id_status not like 'B' and id_komplek between '".$_GET['k']."1' and '".$_GET['k']."6'";
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

				echo '<tr><td>'.$no.'</td><td>'.$nis.'
				<form method="post" action="menu_sekret.php?a=coba_qr">
					<button type="submit" name="nis" value="'.$nis.'">qr</button>
				</form>
				</td><td>'.$nama.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$no_hp.'</td><td> '.$jurusan.'.'.$nama_institusi.'</td><td>Ayah : '.$ayah.' Ibu:'.$ibu.'</td><td>'.$wali.'</td><td>'.$tlp_rumah.'</td><td>'.$alamat.','.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos.'.</td><td>'.$tgl_masuk.'</td><td>'.$komplek.'</td><td>'.$kelas.'</td><td>'.$status.'</td><td>';
				if(file_exists('../foto/'.substr($nis, 0, 1).'/'.substr($nis, 1, 1).'/'.$nis.'.jpg')) {
					echo '<a href="menu_sekret.php?a=lihat_foto&nis='.$nis.'">Lihat foto</a>';
				} else {
					echo '<a href="menu_sekret.php?a=lihat_foto&nis='.$nis.'">Upload foto</a>';
				}
				echo '</td>
				</tr>'; 
				$no++;

				$result->MoveNext();
            }

			
			?>
			</tbody>
			</table>
		
				
	
     </div>
<?php
}
?>
		

	 
<script type="text/javascript">
 	$(document).ready(function () {
 		$('#myTable').DataTable({
 			"aLengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
 			"scrollX" : true,
 			"scrollY" : "350px",
 			"fixedHeader" : true
 		});
 	})
 </script>