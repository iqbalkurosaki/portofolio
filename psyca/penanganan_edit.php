<?php
if (!session_id()) {
	session_start();
}

if (!$_SESSION['admin'] == true) {
	header('Location: penanganan.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<form action="edit_penanganan.php" method="POST">
			<table border="1" cellpadding="4" cellspacing="0">
<?php
require_once 'koneksi_database.php';
if (isset($_SESSION['depresi'])) {
	$sql = 'SELECT * FROM depresi_'.$_SESSION['depresi'];
	$res = mysqli_query($cnn, $sql);
	while ($row = mysqli_fetch_row($res)) {
				$episode = $row[0];
				$penanganan = $row[1];
	?>
					<tr>
						<td width="100">Episode</td>
						<td><?php echo $episode;?></td>
					</tr>
					<tr>
						<td>Penanganan</td>
						<td height="200"><textarea name="update[]" cols='100' rows='10' tabindex='4' size="100"><?php echo $penanganan;?></textarea></td>
					</tr>
	<?php
		}
	?>
					<tr>
						<td> </td>
						<td><input type="submit" value="Submit">
						<input type="button" value="Cancel" onclick="location.href='penanganan.php'"></td>
					</tr>
				</table>
			</form>
<?php
} else{
	header('Location: penanganan.php');
}
?>
</body>
</html>