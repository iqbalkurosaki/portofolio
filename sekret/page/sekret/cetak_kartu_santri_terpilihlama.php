<?php
if (!session_id()) {
	session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cetak Kartu Santri</title>

	    <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
	    <link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css" />
	    <!-- <link rel="stylesheet" type="text/css" href="../../css/local.css" /> -->

	    <script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>
	    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

	    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
	    <link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
	    <script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
	    <script type="text/javascript" src="https://www.prepbootstrap.com/Content/js/gridData.js"></script>

        <style type="text/css" media="print">
		 	@page { size: 21mm 29.7mm portrait;}
		</style>
		<style type="text/css">
			tr {
		 		vertical-align: top;
		 	}
		 	.namadata {
		 		width: 10mm;
		 	}
		 	.data {
		 		width: 52mm;
		 	}
		</style>

	</head>
	<body>
		  <!-- Le styles -->
		
		<div class="table-responsive">
<!--			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td colspan="15"><h4>Laporan Data Santri</h4></td>
			</tr>
			 <tr class="active"><th>No</th><th>Nis</th><th>Nama</th><th>Tempat, Tanggal Lahir</th><th>No Hp</th><th>Profesi</th><th>Nama Orang Tua</th><th>Nama Wali</th><th>Telp. Rumah</th><th>Alamat</th><th>Tanggal Masuk</th><th>Kamar</th><th>Kelas</th><th>Status</th><th>Foto</th></tr>
-->           
           	<?php
    	if (isset($_SESSION['cetak']) && count($_SESSION['cetak']) > 0) {
    		require_once '../../config/config.php';
           	$nis_cetak = $_SESSION['cetak'];
            for ($i=0; $i<count($nis_cetak); $i++) {
	            $sql = "SELECT * FROM t_santri WHERE nis = '".$nis_cetak[$i]."'";
	            $result=$db->execute($sql);
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];

				$alamat = $result->fields["alamat"];
				$kota = $result->fields["kota"];
				$sql3 = "SELECT * FROM kota where id=$kota";
                $result3=$db->execute($sql3);
                $nama_kota = $result3->fields["kota"];
				$provinsi=$result->fields["provinsi"];
				$sql4 = "SELECT * FROM provinsi where id=$provinsi";
                $result4=$db->execute($sql4);
                $nama_provinsi = $result4->fields["provinsi"];

				$tgl_masuk=$result->fields["tgl_masuk"];

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $komplek = $result5->fields["nama_komplek"];
?>
					<table border='0' cellspacing='0' style='display: inline-block; margin: 2px; padding: 2px; border: 1px black solid; height: 54mm; width: 85mm; font-size: 8px;'>
						<tr class='success' style='background-color: #86eb47; vertical-align: middle;'>
							<th colspan='4' style='text-align:center;' width='400px' height="30px">
								Kartu Tanda Santri<br>
								Pondok Pesantren Miftaful Huda Gading - Malang
							</th>
						</tr>
						<tr><td colspan="4" height="7px"></td></tr>
						<tr style="height: 2mm; vertical-align: middle;">
							<td class="namadata">NIS</td>
							<td width="4px" align="center">:</td>
							<td class="data"><?php echo $nis ?></td>
							<td class="foto-santri" rowspan="5" align="center" style="width: 19mm; height: 20mm;"><img src='<?php echo "../../foto/".substr($nis, 0, 1)."/".substr($nis, 1, 1)."/".$nis.".jpg";?>' style="width: 100%; padding: 0.7mm;">
							</td>
						</tr>
						<tr style="height: 2mm;">
							<td class="namadata">Nama</td>
							<td width="4px" align="center">:</td>
							<td class="data"><?php echo $nama; ?></td>
						</tr>
						<tr style="height: 1mm;">
							<td class="namadata">Kamar</td>
							<td width="4px" align="center">:</td>
							<td class="data"><?php echo $komplek;?></td>
						</tr>
						<tr style="height: 10mm;">
							<td class="namadata">Alamat</td>
							<td width="4px" align="center">:</td>
							<td class="data"><?php echo $alamat.', '.$nama_kota.'. '.$nama_provinsi; ?></td>
						</tr>
						<tr>
							<td class="namadata">Tgl. Masuk</td>
							<td width="4px" align="center">:</td>
							<td class="data"><?php echo date("d-m-Y", strtotime($tgl_masuk)); ?></td>
						</tr>
						<tr>
							
						</tr>
						<tr style="height: 2mm;">
							<td colspan="4" align="center">Pengasuh PPMH-Malang</td>
						</tr>
						<tr style="vertical-align: middle;">
							<td colspan="4" align="center" style="height: 13mm;"><img src="../../img/ttd.jpg" style="height: 100%; padding: 0.5mm;"></td>
						</tr>
						<tr style="height: 2mm;">
							<td colspan="4" align="center">KH. Abdurrohman Yahya</td>
						</tr>
					</table>
<?php
/*				echo '<tr><td>'.$no.'</td><td>'.$nis.'</td><td>'.$nama.'</td><td>'.$tempat_l.','.$tgl_l.'</td><td>'.$no_hp.'</td><td> '.$jurusan.'.'.$nama_institusi.'</td><td>Ayah : '.$ayah.' Ibu:'.$ibu.'</td><td>'.$wali.'</td><td>'.$tlp_rumah.'</td><td>'.$alamat.','.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos.'.</td><td>'.$tgl_masuk.'</td><td>'.$komplek.'</td><td>'.$kelas.'</td><td>'.$status.'</td><td>';
				if(file_exists('../foto/'.substr($nis, 0, 1).'/'.substr($nis, 1, 1).'/'.$nis.'.jpg')) {
					echo '<a href="menu_sekret.php?b=lihat_foto&nis='.$nis.'">Lihat foto</a>';
				} else {
					echo '<a href="menu_sekret.php?b=lihat_foto&nis='.$nis.'">Upload foto</a>';
				}
				echo '</td>
				</tr>';
*/ 
            }

			
			?>
				
	
     </div>

<script>
	window.print();
	window.close();
</script>
<?php
		} else {
			echo "Tidak ada santri yang dipilih untuk mencetak kartu.<br>";
			echo "<meta http-equiv='refresh' content='3; url=close.php'>";
		}
?>
	 </body> 
</html> 