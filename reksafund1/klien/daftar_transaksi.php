<?php 
if (!session_id()) {
	session_start();
}

require_once 'cek_akses.php';
require_once '../dynamic_nab.php';
require_once '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Transaksi</title>
</head>
<body>
<?php
$stmt = $db->prepare("SELECT transaksi.id, jenis_transaksi.jenis_transaksi, transaksi.waktu, reksadana.reksadana, transaksi.total, status_transaksi.status_transaksi FROM klien INNER JOIN transaksi INNER JOIN jenis_transaksi INNER JOIN reksadana INNER JOIN status_transaksi ON transaksi.id_jenis_transaksi = jenis_transaksi.id && transaksi.id_reksadana = reksadana.id && transaksi.id_status_transaksi = status_transaksi.id && transaksi.id_klien = klien.id && klien.id = ? && transaksi.id_status_transaksi != 0 ORDER BY transaksi.id_status_transaksi ASC, transaksi.waktu DESC");
$stmt->bindParam(1, $_SESSION['id']);
$stmt->execute();
?>
<table>
	<tr>
		<th>ID Transaksi</th>
		<th>Waktu Transaksi</th>
		<th>Jenis Transaksi</th>
		<td>Nama Reksadana</td>
		<th>Total Nilai Transaksi</th>
		<th>Status Transaksi</th>
	</tr>
	<tr>
<?php
while ($res = $stmt->fetch()) {
	echo "
	<tr>"; ?>
		<td><a href="struk.php?id=<?php echo $res['id']; ?>"><?php echo $res['id']."</a></td>
		<td>".$res['waktu']."</td>
		<td>".$res['jenis_transaksi']."</td>
		<td>".$res['reksadana']."</td>
		<td>".$res['total']."</td>
		<td>".$res['status_transaksi']."</td>
	</tr>";
}
?>
</table>
<br />
<a href="../logout.php">Logout</a>
</body>
</html>