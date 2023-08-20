<html>
	<head>
	<?php
			
			require "call_class_kuisB.php";
	?>
<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kuisioner.js"></script>
	 <!-- Le styles -->
	
    

	</head> 
	<body>
	<div>
	
		  <!-- Le styles -->
		<div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success">
				<td><h4>B</h4></td>
				<td colspan="5"><h4>KEGIATAN PENDIDIKAN</h4></td>
			</tr>
			<tr></tr>
			<tr>
				<td width="4%" scope="col"><b>B1</td>
				<td colspan="5"><b>Jenis Universitas (kampus)</td>
			</tr>
			<tr>
				<td width="4%" scope="col"></td>
				<td colspan="5">
					
					<?php echo "Negeri : ".$negeri['jumlah'];
					?>
				</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			<?php echo "Swasta : ".$swasta['jumlah'];
			?>	
			</td></tr>
			<tr></tr>
			<tr>
				<td width="4%" scope="col"><b>B1In</td>
				<td colspan="5"><b>Apa nama kampus anda ?</td>
			</tr>
			<tr>
			<td></td><td>
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal2">
			  klik disini
			</button>	
			</td></tr>
				<tr>
				<td width="4%" scope="col"><b>B2</td>
				<td colspan="5" ><b>Dimana lokasi kampus anda ?</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="4">
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal3">
			  klik disini
			</button>
			</td></tr>
			<tr>
				<td width="4%" scope="col"><b>B3</td>
				<td colspan="5"><b>Anda kuliah di program keahlian apa?</td>
			</tr>
			<tr><td></td><td colspan="5">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalb1">
			  klik disini
			</button>	
	
			</td>
			</tr>
			<tr>
				<td width="4%" scope="col"><b>B4</td>
				<td colspan="5"><b>Kapan anda masuk dan lulus?</td>
			</tr>
			<tr><td></td><td colspan="5"> 
			<?php echo "Maksimal Masuk : ".$max_masuk['jumlah'];
			?><br>
			<?php echo "Minimal Masuk : ".$min_masuk['jumlah'];
			?>
			</td> 
			</tr>
			<tr><td></td><td colspan="5"><?php echo "Maksimal Lulus : ".$max_lulus['jumlah'];
			?><br>
			<?php echo "Minimal Lulus : ".$min_lulus['jumlah'];
			?></td>
			</tr>
			<table  class="table table-striped">
			<tr><td width="4%" scope="col"><b>B5</td>
				<td colspan="5"><b>Selama kuliah kebanyakan anda tinggal.....</td>
			</tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Sendiri di asrama : <?php echo $tinggal_sb['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Sendiri di kos : <?php echo $tinggal_b['jumlah'];
			?>
			</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Bersama orang tua/keluarga : <?php echo $tinggal_c['jumlah'];
			?>	</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Bersama keluarga : <?php echo $tinggal_k['jumlah'];
			?>	</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Berbagi kamar kos/apartemen : <?php echo $tinggal_t['jumlah'];
			?></td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			Lainnya : <?php echo $tinggal_lain;
			?>
			
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalb5">
			  klik disini
			</button>	
			
			
			</td></tr>
					<tr><td width="4%" scope="col"><b>B6</td>
				<td colspan="5"><b>Siapa yang terutama membayar uang kuliah anda?</td>
			</tr>
			
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Beasiswa (misalnya dari pemerintah, universitas) : <?php echo $dana_kul_sb['jumlah'];
			?>	</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Sebagian beasiswa : <?php echo $dana_kul_b['jumlah'];
			?> </td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Orangtua/keluarga : <?php echo $dana_kul_c['jumlah'];
			?>	</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			
			Biaya sendiri : <?php echo $dana_kul_k['jumlah'];
			?>	</td></tr>
			<tr><td width="4%" scope="col"></td><td colspan="5">
			Lainnya : <?php echo $danakul_lain;
			?>		
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalb6">
			  klik disini
			</button>	
			
			</td></tr>
			<tr><td width="4%" scope="col"><b>B6Ui</td>
				<td colspan="5"><b>Berapa nilai NEM anda?</td>
			</tr>
			<tr><td></td><td colspan="5">
			<?php echo "Maksimal : ".$max_nem['jumlah'];
			?>
			</td>
			</tr>
			<tr><td width="4%" scope="col"></td>
			<td colspan="4"> 
			<?php echo "Minimal : ".$min_nem['jumlah'];
			echo "<br>Rerata : ".round($avg_nem['jumlah'],1);
			?></td>
			</tr>
			
			<tr>
				<td width="4%" scope="col"><b>B6In</td>
				<td colspan="5"><b>Selama sekolah, apakah anda menjadi anggota dari suatu organisasi (sosial,pemuda,organisasi keagamaan) dalam atau luar kampus ?</b></td>
			</tr>
			<tr><td></td><td colspan="5">
			Ya : <?php echo $organisasi_y['jumlah'];
			?></td></tr>
			<tr><td></td><td colspan="5">	
			Tidak :  <?php echo $organisasi_t['jumlah'];
			?></td>
			</tr>
			
			<tbody id="tbodybuang2">
			<tr>
				<td width="4%" scope="col"><b>B7In</td>
				<td colspan="5"><b>Seberapa aktif anda di organisasi tersebut ?</td>
			</tr>
			
			<tr><td colspan="4"><font size="2">Sangat aktif</font></td>
			<td><font size="1"><font size="2">Tidak sama sekali</font></td>
			<td ></td></tr>
			<tr><td colspan="1"><font size="1">1</font></td>
			<td><font size="1"><font size="1">2</font></td>
			<td><font size="1"><font size="1">3</font></td>
			<td><font size="1"><font size="1">4</font></td>
			<td><font size="1"><font size="1">5</font></td>
			<td ></td></tr>
			<tr>
			<td><?php echo $keaktifan_sb['jumlah'];
			?>
			</td>
			<td><?php echo $keaktifan_b['jumlah'];
			?>
			</td>
			<td><?php echo $keaktifan_c['jumlah'];
			?>
			</td>
			<td><?php echo $keaktifan_k['jumlah'];
			?>
			</td>
			<td><?php echo $keaktifan_t['jumlah'];
			?>
			</td><td width="70%" scope="col"></td></tr>
			</table>
			</tbody>
			<table  class="table table-striped">
			<tr>
				<td width="4%" scope="col"><b>B7</td>
				<td><b>Pada saat anda kuliah, apakah anda mengambil kursus atau pendidikan tambahan?</td>
			</tr>
			<tr><td></td><td>	
			Ya : <?php echo $kursus_ya['jumlah'];
			?> , nama kursus atau pendidikan tambahan tersebut: 
			<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModalb7">
			  klik disini
			</button>	
			</td></tr>
			<tr><td></td><td>
			Tidak :<?php echo $kursus_tdk['jumlah'];
			?>
			</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			
			</table>
			</div>

	 </div>
	 <br><br><br>
	 </body> 
</html> 