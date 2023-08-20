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
	$redirect = "sekret/lap_form_cetak.php?k=".$_GET['k'];
	function kelas_aktif($input){
	$alfa = array('A','B','C','D','E','F','G','H','I','J','M');
		if ( $alfa[$_GET['k']-1] == $input) {
			return "aktif";
		}
	}
?>
		<ul class="lis">
			<li><a class="<?php echo kelas_aktif('A') ?>" href ="menu_sekret.php?a=lap_form&k=1">Komplek A</a></li>
			<li><a class="<?php echo kelas_aktif('B') ?>" href ="menu_sekret.php?a=lap_form&k=2">Komplek B</a></li>
			<li><a class="<?php echo kelas_aktif('C') ?>" href ="menu_sekret.php?a=lap_form&k=3">Komplek C</a></li>
			<li><a class="<?php echo kelas_aktif('D') ?>" href ="menu_sekret.php?a=lap_form&k=4">Komplek D</a></li>
			<li><a class="<?php echo kelas_aktif('E') ?>" href ="menu_sekret.php?a=lap_form&k=5">Komplek E</a></li>
			<li><a class="<?php echo kelas_aktif('F') ?>" href ="menu_sekret.php?a=lap_form&k=6">Komplek F</a></li>
			<li><a class="<?php echo kelas_aktif('G') ?>" href ="menu_sekret.php?a=lap_form&k=7">Komplek G</a></li>
			<li><a class="<?php echo kelas_aktif('H') ?>" href ="menu_sekret.php?a=lap_form&k=8">Komplek H</a></li>
			<li><a class="<?php echo kelas_aktif('I') ?>" href ="menu_sekret.php?a=lap_form&k=9">Komplek I</a></li>
			<li><a class="<?php echo kelas_aktif('I') ?>" href ="menu_sekret.php?a=lap_form&k=10">Komplek J</a></li>
			</ul>
		<div style="height: 440px;overflow-y: scroll;">
<?php
				$sql1 = "SELECT id_komplek, nama_komplek FROM komplek WHERE id_komplek LIKE '".$_GET['k']."_'";
				$result1 = $db->execute($sql1);
	            while (!$result1->EOF) {
	            	?>
	            	<div style="display: flex;width: 100%;justify-content: space-between;">
	            		<div><h4>Kamar : <?php echo $result1->fields["nama_komplek"] ?></h4></div>
	            		<div><h4>Ketua Kamar : _________________</h4></div>
	            	</div>
	            	<table  class="table table-bordered">
							<tr class="success">
								<th>No</th>
								<th>Nis</th>
								<th>Nama</th>
								<th>No HP</th>
								<th>Tempat, Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Status</th>
							</tr>
	            	<?php
	            	$id_komplek= $result1->fields["id_komplek"];
		            $sql = "SELECT * FROM t_santri WHERE id_komplek LIKE '".$id_komplek."'";
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
		            };
		            ?>
		        	</table>
		            <?php
		        	$result1->MoveNext();
		     	}
}
 ?>
	 
	</div>
	<a href ="<?php echo $redirect ?>" target="blank" class="btn btn-primary" style="margin-top:5px;width:100%;padding:10px;font-size:20px"><span class='glyphicon glyphicon-print'></span> Cetak</a>
