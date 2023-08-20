<html>
	<head>
	<?php
			
			require "call_class_kuisA.php";
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
			<table  class="table table-striped">
			<tr class="success">
				<td width="4%" scope="col"><h4>A</h4></td>
				<td colspan="4"><h4>KARAKTERISTIK SOSIO-BIOGRAFI, PENDIDIKAN DAN PEKERJAAN SEBELUM KULIAH</h4></td>
			</tr>
			
			<tr></tr>
			<tr>
				<td width="4%" scope="col"><b>A1</td>
				<td colspan="4"><b>Jenis Kelamin</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Laki - Laki : ".$laki['jumlah']."<br>";
			$persen_laki=$laki['jumlah']*100/($laki['jumlah']+$peremp['jumlah']);
			echo "Persentase laki-laki dari pendaftar : ".$persen_laki." %";
			?>
			</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Perempuan : ".$peremp['jumlah']."<br>";
			$persen_peremp=$peremp['jumlah']*100/($laki['jumlah']+$peremp['jumlah']);
			echo "Persentase perempuan dari pendaftar : ".$persen_peremp." %";
			
			?>
			</td></tr>
			<tr></tr>
						
			<tr>
				<td width="4%" scope="col"><b>A2</td>
				<td colspan="4"><b>Tahun Lahir</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Maksimal : ".$max_lhr['jumlah'];
			?>
			</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Minimal : ".$min_lhr['jumlah'];
			?>
			</td></tr>
				<tr><td width="4%" scope="col"><b>A3</td>
				<td colspan="4"><b>Status Pernikahan</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Menikah : ".$menikah['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Bercerai : ".$bercerai['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Lajang / Tidak menikah : ".$lajang['jumlah'];
			?>
			</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Pisah rumah : ".$pisah['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Tinggal bersama : ".$bersama['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Janda / Duda : ".$janda['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">			
			
			<?php
			echo "Lainnya : ".$lainnya;
			?>
				<!-- Button trigger modal -->
			<button type="button" class="btn btn-success btn-xs btn-lainnya" data-toggle="modal" data-target="#myModal" data-kolom="A3">
						  Lihat Isian
						</button>

			</td></tr>
			
			<tr>
				<td width="4%" scope="col"><b>A4</td>
				<td colspan="4"><b>Jurusan yang anda ambil pada saat di SLTA? </td>
			</tr>
			
			<tr><td width="4%" scope="col"></td><td><button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModala5in">
			  klik disini
			</button></tr>
			<tr>
				<td width="4%" scope="col"><b>A5</td>
				<td colspan="4" ><b>Tahun berapa anda lulus SLTA ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="4" >
			<?php echo "Maksimal : ".$max_lulus['jumlah'];
			?>
			</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Minimal : ".$min_lulus['jumlah'];
			?>
			</td>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>A5In</td>
				<td colspan="4" ><b>Berapa nilai NEM anda ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Maksimal : ".$max_nem['jumlah'];
			?>
			</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Minimal : ".$min_nem['jumlah'];
			echo "<br>Rerata : ".round($avg_nem['jumlah'],1);
			?>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>A6</td>
				<td colspan="4" ><b>Kebangsaan</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "Asing : ".$asing;
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			
			<?php echo "WNI : ".$wni['jumlah'];
			?><tr></tr>
</table>
			<table  class="table table-striped">
			<tr>
			 	<td width="4%" scope="col"><b>A7</td>
				<td><b>Bagaimana penilaian anda terhadap kondisi fasilitas belajar di bawah ini?</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr><td colspan="4"><font size="2">Sangat besar</font></td>
			<td ><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td ><font size="1"><font size="1">2</font></td>
			<td ><font size="1"><font size="1">3</font></td>
			<td ><font size="1"><font size="1">4</font></td>
			<td ><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr>
			<td><?php echo $perpus_sb['jumlah'];
			?>
			</td>
			<td><?php echo $perpus_b['jumlah'];
			?>
			</td>
			<td><?php echo $perpus_c['jumlah'];
			?>
			</td>
			<td><?php echo $perpus_k['jumlah'];
			?>
			</td>
			<td><?php echo $perpus_t['jumlah'];
			?>
			</td><td  width="70%" scope="col">Perpustakaan</td>
			</tr>
			<tr>
			<td><?php echo $tik_sb['jumlah'];
			?>
			</td>
			<td><?php echo $tik_b['jumlah'];
			?>
			</td>
			<td><?php echo $tik_c['jumlah'];
			?>
			</td>
			<td><?php echo $tik_k['jumlah'];
			?>
			</td>
			<td><?php echo $tik_t['jumlah'];
			?>
			</td><td>Teknologi Informasi dan Komunikasi</td>
			</tr>
			<tr>
			<td><?php echo $modul_sb['jumlah'];
			?>
			</td>
			<td><?php echo $modul_b['jumlah'];
			?>
			</td>
			<td><?php echo $modul_c['jumlah'];
			?>
			</td>
			<td><?php echo $modul_k['jumlah'];
			?>
			</td>
			<td><?php echo $modul_t['jumlah'];
			?>
			</td><td>Modul Belajar</td>
			</tr>
			<tr>
			<td><?php echo $ruang_sb['jumlah'];
			?>
			</td>
			<td><?php echo $ruang_b['jumlah'];
			?>
			</td>
			<td><?php echo $ruang_c['jumlah'];
			?>
			</td>
			<td><?php echo $ruang_k['jumlah'];
			?>
			</td>
			<td><?php echo $ruang_t['jumlah'];
			?>
			</td><td>Ruang Belajar</td>
			</tr>
			<tr>
		<td><?php echo $lab_sb['jumlah'];
			?>
			</td>
			<td><?php echo $lab_b['jumlah'];
			?>
			</td>
			<td><?php echo $lab_c['jumlah'];
			?>
			</td>
			<td><?php echo $lab_k['jumlah'];
			?>
			</td>
			<td><?php echo $lab_t['jumlah'];
			?>
			</td><td>Laboratorium</td>
			</tr>
			<tr>
			<td><?php echo $variasi_sb['jumlah'];
			?>
			</td>
			<td><?php echo $variasi_b['jumlah'];
			?>
			</td>
			<td><?php echo $variasi_c['jumlah'];
			?>
			</td>
			<td><?php echo $variasi_k['jumlah'];
			?>
			</td>
			<td><?php echo $variasi_t['jumlah'];
			?>
			</td><td>Variasi pembelajaran yang digunakan</td>
			</tr>
			<tr>
			<td><?php echo $akomodasi_sb['jumlah'];
			?>
			</td>
			<td><?php echo $akomodasi_b['jumlah'];
			?>
			</td>
			<td><?php echo $akomodasi_c['jumlah'];
			?>
			</td>
			<td><?php echo $akomodasi_k['jumlah'];
			?>
			</td>
			<td><?php echo $akomodasi_t['jumlah'];
			?>
			</td><td>Akomodasi</td>
			</tr>
			<tr>
			<td><?php echo $kantin_sb['jumlah'];
			?>
			</td>
			<td><?php echo $kantin_b['jumlah'];
			?>
			</td>
			<td><?php echo $kantin_c['jumlah'];
			?>
			</td>
			<td><?php echo $kantin_k['jumlah'];
			?>
			</td>
			<td><?php echo $kantin_t['jumlah'];
			?>
			</td>	<td>Kantin</td>
			</tr>
			<tr>
			<td><?php echo $rekreasi_sb['jumlah'];
			?>
			</td>
			<td><?php echo $rekreasi_b['jumlah'];
			?>
			</td>
			<td><?php echo $rekreasi_c['jumlah'];
			?>
			</td>
			<td><?php echo $rekreasi_k['jumlah'];
			?>
			</td>
			<td><?php echo $rekreasi_t['jumlah'];
			?>
			</td><td>Pusat kegiatan siswa dan fasilitasnya, ruang rekreasi</td>
			</tr>
			<tr>
			<td><?php echo $uks_sb['jumlah'];
			?>
			</td>
			<td><?php echo $uks_b['jumlah'];
			?>
			</td>
			<td><?php echo $uks_c['jumlah'];
			?>
			</td>
			<td><?php echo $uks_k['jumlah'];
			?>
			</td>
			<td><?php echo $uks_t['jumlah'];
			?>
			</td>	<td>Fasilitas layanan kesehatan</td>
			</tr>
			<tr>
			<td><?php echo $fasilitas_lain_sb['jumlah'];
			?>
			</td>
			<td><?php echo $fasilitas_lain_b['jumlah'];
			?>
			</td>
			<td><?php echo $fasilitas_lain_c['jumlah'];
			?>
			</td>
			<td><?php echo $fasilitas_lain_k['jumlah'];
			?>
			</td>
			<td><?php echo $fasilitas_lain_t['jumlah'];
			?>
			</td><td>Lainnya :
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalb10">
			  klik disini
			</button>	
			</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>A8</td>
				<td><b>Bagaimana penilaian anda terhadap pengalaman belajar di bawah ini?</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr><td colspan="4"><font size="2">Sangat besar</font></td>
			<td ><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td ><font size="1"><font size="1">2</font></td>
			<td ><font size="1"><font size="1">3</font></td>
			<td ><font size="1"><font size="1">4</font></td>
			<td ><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr>
			<td><?php echo $pemb_kelas_sb['jumlah'];
			?>
			</td>
			<td><?php echo $pemb_kelas_b['jumlah'];
			?>
			</td>
			<td><?php echo $pemb_kelas_c['jumlah'];
			?>
			</td>
			<td><?php echo $pemb_kelas_k['jumlah'];
			?>
			</td>
			<td><?php echo $pemb_kelas_t['jumlah'];
			?>
			</td><td width="70%" scope="col">Pembelajaran di kelas</td>
			</tr>
			<tr>
			<td><?php echo $praktek_sb['jumlah'];
			?>
			</td>
			<td><?php echo $praktek_b['jumlah'];
			?>
			</td>
			<td><?php echo $praktek_c['jumlah'];
			?>
			</td>
			<td><?php echo $praktek_k['jumlah'];
			?>
			</td>
			<td><?php echo $praktek_t['jumlah'];
			?>
			</td><td>Peraktek Industri/Praktek</td>
			</tr>
			<tr>
			<td><?php echo $osis_sb['jumlah'];
			?>
			</td>
			<td><?php echo $osis_b['jumlah'];
			?>
			</td>
			<td><?php echo $osis_c['jumlah'];
			?>
			</td>
			<td><?php echo $osis_k['jumlah'];
			?>
			</td>
			<td><?php echo $osis_t['jumlah'];
			?>
			</td><td>OSIS/MPK</td>
			</tr>
			<tr>
			<td><?php echo $ekskul_sb['jumlah'];
			?>
			</td>
			<td><?php echo $ekskul_b['jumlah'];
			?>
			</td>
			<td><?php echo $ekskul_c['jumlah'];
			?>
			</td>
			<td><?php echo $ekskul_k['jumlah'];
			?>
			</td>
			<td><?php echo $ekskul_t['jumlah'];
			?>
			</td>			
			<td>Kegiatan Ekstrakulikuler</td>
			</tr>
			<tr>
			<td><?php echo $olahraga_sb['jumlah'];
			?>
			</td>
			<td><?php echo $olahraga_b['jumlah'];
			?>
			</td>
			<td><?php echo $olahraga_c['jumlah'];
			?>
			</td>
			<td><?php echo $olahraga_k['jumlah'];
			?>
			</td>
			<td><?php echo $olahraga_t['jumlah'];
			?>
			</td><td>Rekreasi dan Olahraga</td>
			</tr>
			</table>
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>A9</td>
				<td colspan="4"><b>Apa latar belakang pendidikan orang tua anda ?</td>
			</tr>
			
			<tr>
			<td width="7%" scope="col"><b>Ayah</font></td> <td width="20%" scope="col"><b> Ibu</font></td><td width="70%" scope="col"></td></tr>
			</table>
			<table  class="table table-striped">
			<tr>
				<td width="7%" scope="col"><?php echo $tdk_skul1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $tdk_skul2['jumlah'];
				?>	</td>
				<td>Tidak Sekolah</td>
			</tr>
			<tr>
				<td><?php echo $SD1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $SD2['jumlah'];
				?>	</td>
				<td>SD</td>
			</tr>
			<tr>
				<td><?php echo $smp1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $smp2['jumlah'];
				?>	</td>
			<td>SLTP</td>
			</tr>
			<tr>
				<td><?php echo $sma1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $sma2['jumlah'];
				?>	</td>
				<td>SLTA</td>
			</tr>
			<tr>
				<td><?php echo $dip1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $dip2['jumlah'];
				?>	</td>
				<td>Diploma</td>
			</tr>
			<tr>
				<td><?php echo $sar1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $sar2['jumlah'];
				?>	</td>
				<td>Sarjana (S1)</td>
			</tr>
			<tr>
				<td><?php echo $pasca1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $pasca2['jumlah'];
				?>	</td>
				<td>Pascasarjana</td>
			</tr>
			<tr>
				<td><?php echo $tdk_tahu1['jumlah'];
				?>	</td>
				<td width="7%" scope="col"><?php echo $tdk_tahu2['jumlah'];
				?>	</td>
				<td>Tidak tahu</td>

				</tr>
			
			</table>
		
				
	
     </div>
		
	 </div>
	 
	
	 </body> 
	 

</html> 
