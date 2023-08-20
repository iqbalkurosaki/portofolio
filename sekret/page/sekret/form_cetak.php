<?php
if (!isset($_GET['id'])) {
	echo "<script>window.close();</script>";
}
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Formulir Santri <?php echo $_GET['id']; ?></title> 
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
    <style type="text/css" media="print">
	 	@page { size: portrait; }
		
    	h4 { margin : 3px 0; }
		.later{
			page-break-before: always;
		}	
		.printtable td{
			border : 1px solid #000;
		}
		.table{
			width: 100%;
			margin-top: 40px;
			margin-bottom: 50px;
			border: 1px solid black 
		}
		.table>tbody>tr>td {
			white-space: nowrap;
			border-top: 1px solid black;
		}
		.right-td{
			white-space: pre-wrap !important;
			width: 100%;
		}
	</style>
    </head>
	<body>
		<div class="later">
			<div class="row">
				<table width="100%">
					<tr>
						<td rowspan="3" width="20%" align="right">
							<img src="../../img/logo.png" class="img-responsive" alt="Responsive image" width="100">
						</td>
						<td align="center" >
							<center><b style="font-size: 20px">Formulir Pendaftaran Santri</b></center></td>
						<td rowspan="3" width="20%"></td>
					</tr>
					<tr>
						<td align="center" valign="middle"><center><b style="font-size: 24px">Pondok Pesantren Miftahul Huda</b></center></td>
					</tr>
					<tr>
						<td align="center" valign="top"><center><b style="font-size: 14px">Sekertariat : Jl. Gading Pesantren 38 Malang. Telp (0341) 582174</b></center></td>
					</tr>
				</table>
			</div>
			<div class="container-fluid">
		  		<table class="table">	
					<?php
					error_reporting(0); 
					require_once "../../config/config.php";
					$id =$_GET['id'];
	              	$sql="select * from t_santri, komplek,kelas,institusi,status_santri,provinsi,kota where t_santri.id_komplek=komplek.id_komplek and t_santri.id_kelas=kelas.id_kelas and t_santri.profesi=institusi.id_institusi and t_santri.id_status=status_santri.id_status and t_santri.kota=kota.id and t_santri.provinsi=provinsi.id and t_santri.nis = '$id' ";
	              	$result=$db->Execute($sql);
		            while (!$result->EOF) {
		                $nis= $result->fields["nis"];
						$nama = $result->fields["nama"];
		            	$tempat_l = $result->fields["tempat_lahir"];
						$tgl_l = $result->fields["tgl_lahir"];
						$no_hp=$result->fields["no_hp"];

						$institusi=$result->fields["profesi"];
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
						
						$nama_kota = $result->fields["kota"];

						
		                $nama_provinsi = $result->fields["provinsi"];

						$kode_pos=$result->fields["kode_pos"];
						$tgl_masuk=$result->fields["tgl_masuk"];

						
		                $komplek = $result->fields["nama_komplek"];

						
		                $kelas = $result->fields["kelas"];

						
		                $status = $result->fields["status_santri"];
						echo '<tr class="success"><td colspan="2"><b>A.IDENTITAS SANTRI</td></tr>
						<tr><td>1. NIS </td><td class="right-td">: '.$nis.'</td></tr>
						<tr><td>2. Nama Lengkap </td><td class="right-td">: '.$nama.'</td></tr>
						<tr><td>3. Tempat, Tanggal Lahir </td><td class="right-td">: '.$tempat_l.','.$tgl_l.'</td></tr>
						<tr><td>4. Alamat Rumah </td><td class="right-td">: '.$alamat.','.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos.'.</td></tr>
						<tr><td>5. No HP </td><td class="right-td">: '.$no_hp.'</td></tr>
						<tr><td>6. Profesi </td><td class="right-td">: ';
						if ($nama_profesi == "Mahasiswa" || $nama_profesi == "Siswa") {
							echo $nama_institusi.".".$jurusan;
						} else if ($nama_profesi == "Santri") {
							echo $nama_profesi.".".$nama_institusi;
						} else {
							echo $nama_profesi;
						}
						echo '</td></tr>
						<tr><td>7. Tanggal Terdaftar </td><td class="right-td">: '.$tgl_masuk.'</td></tr>
						<tr><td>8. Kamar </td><td class="right-td">: '.$komplek.'</td></tr>
						<tr><td>9. Kelas </td><td class="right-td">: '.$kelas.'</td></tr>
						<tr><td>10. Status </td><td class="right-td">: '.$status.'<br></td></tr>
						<tr class="success"><td colspan="2"><b>B.IDENTITAS ORANG TUA</td></tr>
						<tr><td>1. Ayah </td><td class="right-td">: '.$ayah.'</td></tr>
						<tr><td>2. Ibu </td><td class="right-td">: '.$ibu.'</td></tr>
						<tr><td>3. Wali </td><td class="right-td">: '.$wali.'</td></tr>
						<tr><td>4. Telp. Rumah </td><td class="right-td">: '.$tlp_rumah.'</td></tr>
						'; 
						$result->MoveNext();	              
		              	} 
			        ?>
		       	</table>
	       		<div class="row">
				  	<div class="col-xs-5 col-sm-3">
				  		<center>Santri Pendaftar</center><br>
						<br>
						<br>
						<br><center>__________________________</center><br>
						<center>( Nama Terang dan Tanda Tangan) </center>
					</div>
					<div class="col-xs-2 col-sm-3">
						<br><br>foto 3x4
					</div>
	  				<div class="col-xs-5 col-sm-3">
	  					<center>Sie Sekretariatan/Penerima</center><br>
						<br>
						<br>
						<br><center>__________________________</center><br>
						<center>( Nama Terang dan Tanda Tangan) </center>
	  				</div>
				</div>
			</div>
		</div>
		<div class="later">		
       		<div class="row">
			  	<table width="100%">
					<tr>
						<td rowspan="3" width="20%" align="right">
							<img src="../../img/logo.png" class="img-responsive" alt="Responsive image" width="100">
						</td>
						<td align="center" >
							<center><b style="font-size: 20px">Formulir Pendaftaran Santri</b></center></td>
						<td rowspan="3" width="20%"></td>
					</tr>
					<tr>
						<td align="center" valign="middle"><center><b style="font-size: 24px">Pondok Pesantren Miftahul Huda</b></center></td>
					</tr>
					<tr>
						<td align="center" valign="top"><center><b style="font-size: 14px">Sekertariat : Jl. Gading Pesantren 38 Malang. Telp (0341) 582174</b></center></td>
					</tr>
				</table>
			</div><br><br>
			<div class="table-responsive">
	  			<table class="table">
		  			<tr>
		  				<td > NIS </td>
		  				<td class="right-td">: <?php echo $nis; ?></td>
		  			</tr>
					<tr>
						<td> Nama Lengkap </td>
						<td class="right-td">: <?php echo $nama ?></td>
					</tr>
					<tr>
						<td> Tempat, Tanggal Lahir </td>
						<td class="right-td">: <?php echo $tempat_l.', '.$tgl_l; ?></td>
					</tr>
					<tr>
						<td> Alamat Rumah </td>
						<td class="right-td">: <?php echo $alamat.','.$nama_kota.'. '.$nama_provinsi.'. Kode Pos :'.$kode_pos; ?></td>
					</tr>
				</table>
			</div>
			<p><i>Bismillahirrohmanirrohim</i>
				<br>
			Setelah diterima sebagai santri Pondok Pesantren Miftahul Huda Malang dengan sesungguhnya dan penuh kesadaran<br>
			<center><b>MENYATAKAN</b></center><br>
			Bahwa saya sebagai santri PPMH sanggup untuk :<br>
			1.	Belajar dengan tekun dan penuh semangat<br>
			2.	Mentaati semua peraturan dan tata tertib PPMH<br>
			3.	Menjaga nama baik diri sendiri,  keluarga dan keluarga besar PPMH<br>
			4.	Mengikuti kegiatan yang diselenggarakan PPMH sesuai dengan peraturan dan tata tertib yang berlaku<br>
			5.	Menerima sanksi sesuai ketentuan yang berlaku, apabila saya melanggar tata tertib dan peraturan yang telah ditetapkan oleh PPMH<br>

			Dan benar-benar belum dapat memenuhi persyaratan santri baru berupa :<br>
			a.	Surat Keterangan Catatan Kepolisian (SKCK)<br>
			b.	Pas foto berkopyah 3 x 4 sebanyak 1 lembar cetak dan <i>softfile</i> <br>
			c.	Uang Pendaftaran sebesar Rp................................<br>
			Kekurangan persyaratan tersebut akan segera saya penuhi paling lambat tanggal <br>....................................<br>

			Demikian pernyataan ini kami buat dengan sebenarnya dan penuh tanggung jawab,<br> dengan disaksikan atau diketahui oleh orang tua / wali saya sendiri.</p>
			Mengetahui<br>

			<div class="row">
			  	<div class="col-xs-5 col-sm-3">
			  	<center>Yang membuat Pernyataan</center><br>
					<br>
					<br>
					<br><center>__________________________</center><br>
					<center>( Nama Terang dan Tanda Tangan) </center>
			 	</div>
			 	<div class="col-xs-5 col-sm-3">
  					<center>Orang Tua / Wali</center><br>
					<br>
					<br>
					<br><center>__________________________</center><br>
					<center>( Nama Terang dan Tanda Tangan) </center>
  				</div>
			</div>
		</div>
		<div class="later">	
			<div class="row">
			  	<table width="100%">
					<tr>
						<td rowspan="3" width="20%" align="right">
							<img src="../../img/logo.png" class="img-responsive" alt="Responsive image" width="100">
						</td>
						<td align="center" >
							<center><b style="font-size: 20px">Lembaga Pembina Jiwa Taqwallah</b></center></td>
						<td rowspan="3" width="20%"></td>
					</tr>
					<tr>
						<td align="center" valign="middle"><center><b style="font-size: 24px">Pondok Pesantren Miftahul Huda</b></center></td>
					</tr>
					<tr>
						<td align="center" valign="top"><center><b style="font-size: 14px">Jl. Gading Pesantren 38 Malang. Telp (0341) 582174</b></center></td>
					</tr>
				</table>
			</div>
			<br>			
			Nomor 	: ____ / PSB/ Sekret/ PPMH/ ______ 	      <font style="float: right;">Malang, _____________________</font><br>
			Lamp 		: <br>
			Perihal 	: Permohonan Penempatan Santri Baru<br>

			Kepada<br>
			Yth. Bapak Ketua Komplek _______________<br>
			Di Tempat <br><br>

			Assalamu’alaikum Wr. Wb.<br>
			Dengan hormat, <br>
			Bersama dengan ini kami memohon kepada Bapak Ketua Komplek untuk menerima santri baru di komplek Bapak dengan identitas berikut :<br><br>
			<table width="100%" style="font-size: 14px">
				<tr>
					<td>Nama Lengkap</td>
					<td> : <?php echo $nama ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td> : <?php echo $alamat.', '.$nama_kota ?></td>
				</tr>
				<tr>
					<td>Ditempatkan di kamar</td>
					<td> : <?php echo $komplek ?></td>
				</tr>
			</table><br>

			Demikian surat permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terimakasih. Jazaakumulloh Ahsanal Jaza.<br>
			Wassalamu’alaikum Wr.Wb.<br><br>
			<table width="100%">
				<tr>
					<td rowspan="6" valign="top" >Catatan : </td>
					<td>__________________________</td>
					<td align="center">Penerima / Sie Sekretariatan</td>
				</tr>
				<tr>
					<td>__________________________</td>
					<td> </td>
				</tr>
				<tr>	
					<td>__________________________</td>
					<td> </td>	
				</tr>
				<tr>
					<td>__________________________</td>
					<td> </td>	
				</tr>
				<tr>
					<td></td>
					<td align="center">__________________________</td>
				</tr>
				<tr>
					<td></td>
					<td align="center">( Nama Terang dan Tanda Tangan)</td>
				</tr>
			</table>			
			<hr style="border-top: dotted 3px;">
			<div class="row">
			  	<table width="100%">
					<tr>
						<td rowspan="3" width="20%" align="right">
							<img src="../../img/logo.png" class="img-responsive" alt="Responsive image" width="100">
						</td>
						<td align="center" >
							<center><b style="font-size: 20px">Lembaga Pembina Jiwa Taqwallah</b></center></td>
						<td rowspan="3" width="20%"></td>
					</tr>
					<tr>
						<td align="center" valign="middle"><center><b style="font-size: 24px">Pondok Pesantren Miftahul Huda</b></center></td>
					</tr>
					<tr>
						<td align="center" valign="top"><center><b style="font-size: 14px">Jl. Gading Pesantren 38 Malang. Telp (0341) 582174</b></center></td>
					</tr>
				</table>
			</div>
			<br>
			Nomor 	: ____ / PSB/ Sekret/ PPMH/ ____    	<font style="float: right;">Malang, _____________________</font><br>
			Lamp 		: <br>
			Perihal 	: Permohonan Penempatan Santri Baru<br>
			Kepada<br>
			Yth. Ketua Kamar _______________<br>
			Di Tempat <br>
			<br>
			Assalamu’alaikum Wr. Wb.<br>
			Dengan hormat, <br>
			Bersama dengan ini kami memohon kepada Saudara Ketua Kamar untuk menerima santri baru di kamar Saudara dengan identitas berikut :<br><br>
			<table width="100%" style="font-size: 14px">
				<tr>
					<td>Nama Lengkap</td>
					<td> : <?php echo $nama ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td> : <?php echo $alamat.', '.$nama_kota ?></td>
				</tr>
				<tr>
					<td>Ditempatkan di kamar</td>
					<td> : <?php echo $komplek ?></td>
				</tr>
			</table><br>
			Demikian surat permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terimakasih. Jazaakumulloh Ahsanal Jaza.<br>
			Wassalamu’alaikum Wr.Wb.<br>
			<br>
			<table width="100%" >
				<tr>
					<td rowspan="6" valign="top" >Catatan : </td>
					<td>__________________________</td>
					<td align="center">Penerima / Sie Sekretariatan</td>
				</tr>
				<tr>
					<td>__________________________</td>
					<td> </td>
				</tr>
				<tr>	
					<td>__________________________</td>
					<td> </td>	
				</tr>
				<tr>
					<td>__________________________</td>
					<td> </td>	
				</tr>
				<tr>
					<td></td>
					<td align="center">__________________________</td>
				</tr>
				<tr>
					<td></td>
					<td align="center">( Nama Terang dan Tanda Tangan)</td>
				</tr>
			</table> 
		</div>
	</body>
</html>
<script>
	 window.print();
	 // window.close();
</script>