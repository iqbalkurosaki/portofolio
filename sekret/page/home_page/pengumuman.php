<div class="well sidebar-nav">
	<h4 class="page-header"><b>Berikut Pengumuman terkini SMKN 1 Pasuruan:</h4>
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
			echo '<a href ="?m=pengumuman_detail&id='.$id.'"><h3>'.$no.'. '.$judul. '</b></h3></a>'; 
			echo '<font size="2"> Sumber : ' .$sumber.'<font><br>';
			echo '<font size="2">' .substr($isi,0,25).'...</font>'; 
			echo '<br><font size="1">Tanggal Update : ' .$tglupdate. '</font><br>';
			$no++;
			$result->MoveNext();
		}
	?>		
</div><!--/.well -->
