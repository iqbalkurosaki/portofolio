<?php
if (isset($_GET['k']) && $_GET['k'] != '') {
	$sql = "SELECT * FROM nama_komplek WHERE id_namakomplek = ".$_GET['k'];
	$res = $db->execute($sql);
	if ($res->rowCount() > 0) { ?>
<div class="table-responsive">
	<table  class="table table-bordered">
		<thead>
			<tr class="success">
				<th>Komplek</th>
				<th>Kapasitas Maksimal</th>
				<th>Kapasitas Terisi</th>
				<th>Kapasitas Kosong</th>
			</tr>
		</thead>
		<tbody>
<?php
		$id_komplek = $res->fields["id_namakomplek"];
		echo	'<tr>
					<td>'.$res->fields["nama_komplek"].'</td>';
		$sql2 = "SELECT SUM(kapasitas) AS kapasitas_maks FROM komplek WHERE id_komplek LIKE '".$id_komplek."_'";
		$res2 = $db->execute($sql2);
		$kapasitas_maks = $res2->fields['kapasitas_maks'];
		echo	'	<td>'.$kapasitas_maks.'</td>';
		$sql2 = "SELECT COUNT(*) AS kapasitas_isi FROM t_santri WHERE nis LIKE '".$id_komplek."____________'";
		$res2 = $db->execute($sql2);
		$kapasitas_isi = $res2->fields['kapasitas_isi'];
		echo	'	<td>'.$kapasitas_isi.'</td>
					<td>'.($kapasitas_maks-$kapasitas_isi).'</td>';
?>
				</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive">
	<table  class="table table-condensed">
		<thead>
			<tr class="active">
				<th>Kamar</th>
				<th>Kapasitas Maksimal</th>
				<th>Kapasitas Terisi</th>
				<th>Kapasitas Kosong</th>
			</tr>
		</thead>
		<tbody>
<?php
$sql = "SELECT * FROM komplek WHERE id_komplek LIKE '".$id_komplek."_'";
$res = $db->execute($sql);
while (!$res->EOF) {
	$kamar_maks = $res->fields['kapasitas'];
	echo	'<tr>
				<td>'.$res->fields['nama_komplek'].'</td>
				<td>'.$kamar_maks.'</td>';
	$sql2 = "SELECT COUNT(*) AS kamar_isi FROM t_santri WHERE nis LIKE '".$res->fields['id_komplek']."___________' AND id_status != 'B'";
	$res2 = $db->execute($sql2);
	$kamar_isi = $res2->fields['kamar_isi'];
	echo		'<td>'.$kamar_isi.'</td>
				<td>'.($kamar_maks-$kamar_isi).'</td>
			</tr>';
	$res->MoveNext();
}
?>
		</tbody>
	</table>
</div>
<?php
	} else {
		echo "komplek dengan id ".$_GET['k']." tidak tersedia";
		echo "<meta http-equiv='refresh' content='1; url=menu_sekret.php?m=kapasitas'>";		
	}
} else {
	echo "komplek tidak tersedia";
	echo "<meta http-equiv='refresh' content='1; url=menu_sekret.php?m=kapasitas'>";
}
?>