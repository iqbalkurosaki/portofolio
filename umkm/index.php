<?php
	require_once "header.php";
	koneksi();
?>
<style type="text/css">
	.boxes{
		display: flex;
		justify-content: flex-start;
		flex-wrap: wrap;
	}
	.boxin{
		margin:15px;
		background-color: white;
		border-radius: 10px;
		padding: 10px;
		width: 250px;
		margin-bottom: 30px;
		box-shadow: 1px 1px 30px lightgrey;
	}
	.imgin{
		border-bottom: 2px solid black; 
		width: 100%;
		height: 150px;
		margin-bottom: 20px;
		background-color: lightgray
	}
	.title{
		padding: 10px;
		margin-bottom: 30px;
		background-color: white;
	}
	.borderless>tbody>tr>td{
		border: none;
	}
</style>
<div class="container satu">
	<div class="jumbotron" style="background-color: red; color: white; padding: 10px 20px">
		<h4><b><i class="glyphicon glyphicon-th-list"></i> Daftar UMKM</b></h4>
	</div>
	<div class="boxes">
<?php
	$stmt = $db->prepare("SELECT pengusaha_umkm.*, kategori FROM pengusaha_umkm INNER JOIN pengusaha_umkm_kategori ON pengusaha_umkm.id_kategori = pengusaha_umkm_kategori.id AND status = 1");
	$stmt->execute();
	while ($result = $stmt->fetch()) {
?>
	<a href="profil_umkm.php?id=<?php echo $result['id']; ?>">
		<div class="boxin">
			<div class="imgin">
<?php
				$stmt2 = $db->prepare("SELECT id FROM pengusaha_umkm_produk WHERE id_pengusaha_umkm = ? LIMIT 1");
				$stmt2->bindParam(1, $result["id"]);
				$stmt2->execute();
				$res2 = $stmt2->fetch();
				echo (is_file("upload/produk/".$res2['id'].".jpg")) ? '<img src="upload/produk/'.$res2['id'].'.jpg" width="100%" height="100%">' : '<div style="padding-top:60px;text-align:center">Tidak ditemukan gambar</div>';
?>
			</div>
			<table class="table borderless">
				<tbody>
					<tr>
						<td>Nama UMKM</td>
						<td>:</td>
						<td><?php echo $result["nama"]; ?></td>
					</tr>
					<tr>
						<td>Kategori</td>
						<td>:</td>
						<td><?php echo $result["kategori"]; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</a>
<?php
	}
?>
	</div>
</div>

<?php
	require_once "footer.php";
?>