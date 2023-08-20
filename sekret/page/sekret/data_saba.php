<link rel="stylesheet" type="text/css" href="../css/DataTables/datatables.min.css">
		<script type="text/javascript" src="../css/DataTables/datatables.min.js"></script>
		<h3>
			<b>Cek Data Pendaftaran*</b>
		</h3>
		<h5>*Pada tabel ini berisi data santri baru 2 tahun terakhir. Silakan Cek data terlebih dahulu. Jika :<br> 
		1. Ada kesalahan, silakan pilih <b>Ubah</b> lalu ubah data yang salah.<br>
		2. Ada data ganda, silakan pilih menu <b>Hapus</b></h5>
		<div class="table-responsive" style="">
			<table  class="table table-bordered table-condensed" id="myTables" style="">
			<thead>
				<tr class="success">
					<td>Aksi</td>
					<td>File Foto</td>
					<td>File KTS</td>
					<td>No</td>
					<td>NIS</td>
					<td>NIK</td>
					<td>Nama</td>
					<td>Nama Panggilan</td>
					<td>TTL</td>
					<td>No Hp</td>
					<td>Profesi</td>
					<td>Ayah</td>
					<td>Ibu</td>
					<td>Wali</td>
					<td>Tlp Rumah</td>
					<td>Alamat</td>
					<td>Tgl Masuk</td>
					<td>Kamar</td>
					<td>Kelas</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody>
<?php 
$no=1;
$year=date("Y")-1;
			$sql="select * from t_santri, komplek,kelas,status_santri,provinsi,kota,kecamatan,kelurahan,institusi,kts where Year(t_santri.tgl_masuk) >= $year and t_santri.id_komplek=komplek.id_komplek and t_santri.id_kelas=kelas.id_kelas and t_santri.profesi=institusi.id_institusi and t_santri.id_status=status_santri.id_status and t_santri.kelurahan=kelurahan.id and t_santri.kecamatan=kecamatan.id and t_santri.kota=kota.id and t_santri.provinsi=provinsi.id and t_santri.kts=kts.id ORDER BY tgl_masuk DESC";
              	$result=$db->Execute($sql);
			                 while (!$result->EOF) {
			                $nis= $result->fields["nis"];
							$nik= $result->fields["nik"];
							$nama = $result->fields["nama"];
							$nama_panggilan = $result->fields["nama_panggilan"];
			            	$tempat_l = $result->fields["tempat_lahir"];
							$tgl_l = $result->fields["tgl_lahir"];
							$no_hp=$result->fields["no_hp"];

			                $institusi = $result->fields["id_institusi"];
			                $sql2 = "select * from profesi, institusi where profesi.id_profesi = institusi.id_profesi and institusi.id_institusi = $institusi";
			                $result2 = $db->Execute($sql2);
			                $nama_institusi = $result2->fields["nama_institusi"];
			                $profesi = $result2->fields["id_profesi"];
			                $nama_profesi = $result2->fields["nama_profesi"];

							$jurusan=$result->fields["jurusan"];
							$ayah=$result->fields["ayah"];
							$ibu=$result->fields["ibu"];
							$wali=$result->fields["wali"];
							$tlp_rumah=$result->fields["tlp_rmh"];
							$alamat = $result->fields["alamat"];
							
							$nama_kelurahan = $result->fields["kelurahan"];
							$nama_kecamatan = $result->fields["kecamatan"];
							$nama_kota = $result->fields["kota"];
			                $nama_provinsi = $result->fields["provinsi"];
							$kode_pos=$result->fields["kode_pos"];

							$tgl_masuk=$result->fields["tgl_masuk"];
			                $komplek = $result->fields["nama_komplek"];							
			                $kelas = $result->fields["kelas"];
			                $status = $result->fields["status_santri"];
							
							$id_status_foto = $result->fields["foto"];
							$id_status_kts = $result->fields["kts"];
							$status_kts = $result->fields["status_kts"];
			        		// if (strlen($nis) == 13) {
					        // 	$upload_komplek = substr($nis, 0, 1);
					        // 	$upload_kamar = substr($nis, 1, 1);

			        		// } else {
					        // 	$upload_komplek = substr($nis, 0, 2);
					        // 	$upload_kamar = substr($nis, 2, 1);
			        		// }
			                // if (is_file("../foto/".$upload_komplek."/".$upload_kamar."/".$nis.".jpg")) {
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
										<a class="btn btn-success" href ="menu_sekret.php?a=lapdetail_edit&id=<?php echo $nis; ?>" style="margin: 5px">
			                				<span class="glyphicon glyphicon-edit"></span> Ubah 
			                			</a>
										<!-- <a class="btn btn-info" href ="menu_sekret.php?a=data_saba_verval&id=<?php echo $nis; ?>" style="margin: 5px">
			                				<span class="glyphicon glyphicon-edit"></span> Setujui 
			                			</a>-->
										<a class="btn btn-danger" href ="menu_sekret.php?a=data_saba_del&id=<?php echo $nis; ?>" style="margin: 5px">
			                				<span class="glyphicon glyphicon-trash"></span> Hapus 
			                			</a>
<!-- 			                			<a class="btn btn-danger" href ="sekret/lapdetail_del.php?id=<?php echo $nis; ?>" onclick="return confirm(\'Apakah anda yakin?\');" style="margin: 5px">
			                				<span class="glyphicon glyphicon-trash"></span> Hapus 
			                			</a>  -->
			                			
			                		</td>
			                		<td style="background-color: <?php echo $background_foto; ?>; color: black;"><?php echo $foto; ?></td>
			                		<td style="background-color: <?php echo $background_kts; ?>; color: black;"><?php echo $status_kts; ?></td>
									<td><?php echo $no; ?></td>
									<td><?php echo $nis ?></td>
									<td><?php echo $nik ?></td>
									<td><?php echo $nama ?></td>
									<td><?php echo $nama_panggilan ?></td>
									<td><?php echo $tempat_l.','.$tgl_l ?></td>
									<td><?php echo $no_hp ?></td>
									<td>
								<?php
									if ($nama_profesi == "Mahasiswa" || $nama_profesi == "Siswa") {
										echo $nama_institusi.".".$jurusan;
									} else if ($nama_profesi == "Santri") {
										echo $nama_profesi.".".$nama_institusi;
									} else {
										echo $nama_profesi;
									}
								?>
									</td>
									<td><?php echo $ayah ?></td>
									<td><?php echo $ibu ?></td>
									<td><?php echo $wali ?></td>
									<td><?php echo $tlp_rumah ?></td>
									<td><?php echo $alamat.' '.$nama_kelurahan.' '.$nama_kecamatan.' '.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos ?></td>
									<td><?php echo $tgl_masuk ?></td>
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