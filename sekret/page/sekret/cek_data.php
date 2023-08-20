		<link rel="stylesheet" type="text/css" href="../css/DataTables/datatables.min.css">
		<script type="text/javascript" src="../css/DataTables/datatables.min.js"></script>
		<h1>
			<b>Cek Data Santri</b>
		</h1>
		<div class="table-responsive" style="">
			<table  class="table table-bordered table-condensed" id="myTables" style="">
			<thead>
				<tr class="success">
					<td>Aksi</td>
					<!-- <td>File Foto</td>
					<td>File KTS</td> -->
					<td>No</td>
					<td>NIS</td>
					<td>Nama</td>
					<td>Nama Panggilan</td>
					<td>Kamar</td>
					<td>Kelas</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody>
<?php 
$no=1;
			$sql="select nis, nama, nama_panggilan, komplek.id_komplek, komplek.nama_komplek, kelas.id_kelas, kelas.kelas, status_santri.id_status, status_santri.status_santri, foto, t_santri.kts, kts.status_kts from t_santri, komplek,kelas,status_santri,kts where t_santri.id_komplek=komplek.id_komplek and t_santri.id_kelas=kelas.id_kelas and t_santri.id_status=status_santri.id_status and t_santri.kts=kts.id ORDER BY nis";
              	$result=$db->Execute($sql);
			                 while (!$result->EOF) {
			                $nis= $result->fields["nis"];
							$nama = $result->fields["nama"];
							$nama_panggilan = $result->fields["nama_panggilan"];

			                $komplek = $result->fields["nama_komplek"];
			                $kelas = $result->fields["kelas"];
			                $status = $result->fields["status_santri"];

							$id_status_foto = $result->fields["foto"];
							$id_status_kts = $result->fields["kts"];
							$status_kts = $result->fields["status_kts"];
							if ($id_status_foto == 1) {
			                	$foto = "Sudah";
			                	$background_foto = "green";
			                } else {
			                	$foto = "Belum";
			                	$background_foto = "red";
			                }
						    if ($id_status_kts >= 1) {
								if ($id_status_kts == 1) {
									$background_kts = "green";
								} else {
									$background_kts = "yellow";
								}
						    } else {
						    	$background_kts = "red";
						    }

			                ?>
								<tr>
									<td>
										<!-- <a class="btn btn-primary" href ="../library/cropperjs-main/index.php?id=<?php echo $nis; ?>" target="_blank" style="margin: 5px">
			               				<span class="glyphicon glyphicon-edit"></span> Foto -->
										<a class="btn btn-success" href ="menu_sekret.php?a=lapdetail_edit&id=<?php echo $nis; ?>" style="margin: 5px">
			                				<span class="glyphicon glyphicon-edit"></span> Ubah 
			                			</a>
			                			<!-- <a class="btn btn-danger" href ="sekret/lapdetail_del.php?id=<?php echo $nis; ?>" onclick="return confirm(\'Apakah anda yakin?\');" style="margin: 5px">
			                				<span class="glyphicon glyphicon-trash"></span> Hapus 
			                			</a>  -->
			                			<!-- <a class="btn btn-primary"  style="margin: 5px" href ="sekret/form_cetak.php?id=<?php echo $nis; ?>" > 
			                				<span class="glyphicon glyphicon-print"></span> Cetak 
			                			</a> -->
			                		</td>
			                		<!-- <td style="background-color: <?php echo $background_foto; ?>; color: black;"><?php echo $foto; ?></td>
			                		<td style="background-color: <?php echo $background_kts; ?>; color: black;"><?php echo $status_kts; ?></td> -->
									<td><?php echo $no; ?></td>
									<td><?php echo $nis ?></td>
									<td><?php echo $nama ?></td>
									<td><?php echo $nama_panggilan ?></td>
									<td><?php echo $komplek ?></td>
									<td><?php echo $kelas ?></td>
									<td><?php echo $status ?></td>
								</tr>
							 <?php  
							$no++;

							$result->MoveNext();
						
              				}
 ?> 
			</tbody>
			 </table>
			</div>
			 <script type="text/javascript">
			 	$(document).ready(function () {
			 		$('#myTables').DataTable({
			 			"aLengthMenu": [[-1, 10, 50, 100], ["All", 10, 50, 100]],
			 			"scrollX" : true,
			 			"scrollY" : "350px",
			 			"fixedHeader" : true
			 		});
			 	})
			 </script>