<?php
if (!isset($_GET['k'])) {
	echo "<script>window.close();</script>";
}
	require_once "../../config/config.php";
	$sql1 = "SELECT nama_komplek FROM nama_komplek WHERE id_namakomplek = ".$_GET['k'];
	$result1 = $db->execute($sql1);
?>
<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     <title>Laporan Komplek <?php echo $result1->fields['nama_komplek']; ?></title> 
        <style type="text/css" media="print">
		 	@page { 
		 		size: landscape; 
				margin-top: 100px;
		 	}
			.table-bordered>tbody>tr>td, .table>tbody>tr.success>td, .table>tbody>tr.active>th{
				border: 1px solid black !important
			}
			.lembar{
				page-break-after: always;
			}
			.printtable td{
				border : 1px solid #000;
			}
        	h4 { margin : 3px 0; }
				
			.printtable td{
				border : 1px solid #000;
			}
		</style>
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
    </head>
	
	

	
	<body>
	<div class="">
		<center><h4>Laporan Data Santri Komplek <?php echo $result1->fields['nama_komplek']; ?></h4></center>
	<?php
		$sql2 = "SELECT id_komplek, nama_komplek FROM komplek WHERE id_komplek LIKE '".$_GET['k']."_'";
		$result2 = $db->execute($sql2);
	            while (!$result2->EOF) {
	            	?>
	            <div class="lembar">
	            	<div style="display: flex;width: 100%;justify-content: space-between;">
	            		<div><h4>Kamar : <?php echo $result2->fields["nama_komplek"] ?></h4></div>
	            		<div><h4>Ketua Kamar : _________________</h4></div>
	            	</div>
	            	<table  class="table table-bordered">
							<tr class="success">
								<td>No</td>
								<td>Nis</td>
								<td>Nama</td>
								<td>No HP</td>
								<td>Tempat, Tanggal Lahir</td>
								<td>Alamat</td>
								<td>Status</td>
							</tr>
	            	<?php
	            	$id_komplek= $result2->fields["id_komplek"];
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
     			</div>
		            <?php
		        	$result2->MoveNext();
		     	}
			?>
</body> 
	 

</html> 
<script>
	window.print();
	window.close();
</script>