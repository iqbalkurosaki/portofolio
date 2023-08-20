<?php
	require_once "akses_admin.php";
	require_once "header.php";
	koneksi();
	if (isset($_POST["id_verifikasi"])) {
		$stmt = $db->prepare("UPDATE pengusaha_umkm SET status = 1 WHERE id = ?");
		$stmt->bindParam(1, $_POST["id_verifikasi"]);
		$stmt->execute();
	}
?>
<div class="container satu">
	<div class="jumbotron" style="background-color: red; color: white; padding: 10px 20px">
		<h2><b><i class="glyphicon glyphicon-edit"></i> Konfirmasi Pendaftaran</b></h2>
	</div>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>ID</th>
			<th>Nama UMKM</th>
			<th>E-mail</th>
			<th>Nomor Telepon</th>
			<th>Alamat</th>
			<th>Kategori</th>
			<th>Deskripsi</th>
			<th>Surat Keterangan UMKM</th>
			<th>Status Akun</th>
			<th>Verifikasi Akun</th>
		</tr>
		</thead>
<?php
	$stmt = $db->prepare("SELECT pengusaha_umkm.*, kategori FROM pengusaha_umkm INNER JOIN pengusaha_umkm_kategori ON pengusaha_umkm.id_kategori = pengusaha_umkm_kategori.id");
	$stmt->execute();
	while ($result = $stmt->fetch()) {
?>
		<tr>
			<td><?php echo $result["id"]; ?></td>
			<td><?php echo $result["nama"]; ?></td>
			<td><?php echo $result["email"]; ?></td>
			<td><?php echo $result["nomor_telepon"]; ?></td>
			<td><?php echo $result["alamat"]; ?></td>
			<td><?php echo $result["kategori"]; ?></td>
			<td><?php echo $result["deskripsi"]; ?></td>
			<td>
<?php
		if (is_file("upload/surat/".$result['id'].".pdf")) {
?>
				<a target="_blank" class="btn btn-info" href="upload/surat/<?php echo $result['id']; ?>.pdf" ><b><i class="glyphicon glyphicon-eye-open"></i> Lihat Surat</b></a>
<?php			
		}
?>
			</td>
<?php
		if ($result["status"] == 1) {
?>
			<td>Sudah diverifikasi</td>
			<td align="center"><i class="glyphicon glyphicon-check" style="color: green;font-size: 18px"></i></td>
<?php
		} else {
?>
			<td>Belum diverifikasi</td>
			<td>
				<form action="" method="post">
					<button class="btn btn-success" type="submit" name="id_verifikasi" value=<?php echo $result["id"]; ?> ><i class="glyphicon glyphicon-check"></i> Verifikasi</button>
				</form>
			</td>
<?php
		}
?>
		</tr>
<?php		
	}
?>
	</table>
	
</div>
<?php
	require_once "footer.php";
?>