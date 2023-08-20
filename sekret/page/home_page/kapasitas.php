<?php
require_once "../config/config.php";
// require_once "../page/home_page/header.php";

if (!session_id()) {
	session_start();
}
?>

<div class="well sidebar-nav">
<div class="table-responsive">
	<table class="table table-bordered table-condensed">
		<thead>
			<tr class="success">
				<th>No</th>
				<th>Komplek</th>
				<th>Kapasitas Maksimal</th>
				<th>Kapasitas Terisi</th>
				<th>Kapasitas Kosong</th>
				<th>Detail Perkamar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM nama_komplek";
			$res = $db->execute($sql);
			while (!$res->EOF) {
				$id_komplek = $res->fields["id_namakomplek"];
				echo '<tr>
				<td>' . $res->fields["id_namakomplek"] . '</td>
				<td>' . $res->fields["nama_komplek"] . '</td>';
				$sql2 = "SELECT SUM(kapasitas) AS kapasitas_maks FROM komplek WHERE id_komplek LIKE '" . $id_komplek . "_'";
				$res2 = $db->execute($sql2);
				$kapasitas_maks = $res2->fields['kapasitas_maks'];
				echo	'	<td>' . $kapasitas_maks . '</td>';
				$sql2 = "SELECT COUNT(*) AS kapasitas_isi FROM t_santri WHERE nis LIKE '" . $id_komplek . "____________' AND id_status != 'B'";
				$res2 = $db->execute($sql2);
				$kapasitas_isi = $res2->fields['kapasitas_isi'];
				echo	'<td>' . $kapasitas_isi . '</td>
				<td>' . ($kapasitas_maks - $kapasitas_isi) . '</td>
				<td>';
			?>
				<button class="btn btn-success" onclick="window.location.href='menu_sekret.php?m=kapasitas_perkamar&k=<?php echo $id_komplek; ?>'">Lihat Detail</button>
				</td>
				</tr>
			<?php
				$res->MoveNext();
			}
			?>
		</tbody>
	</table>
</div>	
</div>