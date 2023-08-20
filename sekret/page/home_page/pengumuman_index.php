<div class="halaman">
	<div class="container">
        <div class="span12">
          <div class="well sidebar-nav">
		<h4 class="page-header"><b>Berikut Pengumuman terkini SMKN 1 Pasuruan:</b></h4>
		<?php 
		
			
			$sql = "SELECT * FROM pengumuman";
			$result = $db->Execute($sql);
			$no = 1;

			while (!$result->EOF) {
				$id=$result->fields["id"];
				$judul=$result->fields["judul"];
				$isi=$result->fields["isi"];
				$sumber=$result->fields["sumber"];
				$tglupdate=$result->fields["tglupdt"];
				echo '<a href ="?m=pengumuman_indexdetail&id='.$id.'"><h3>'.$no.'. '.$judul. '</h3></a>'; 
				echo '<font size="2"> Sumber : ' .$sumber.'<font><br>';
				echo '<font size="2">' .substr($isi,0,25).'...</font>'; 
				echo '<br><font size="1">Tanggal Update : ' .$tglupdate. '</font><br>';
				$no++;

				$result->MoveNext();
			}

		?>
			
		 </div><!--/.well -->
        </div><!--/span-->
		
	</div>
</div>
