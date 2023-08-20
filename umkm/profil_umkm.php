<?php
	// require_once "akses_umkm.php";
	require_once "header.php";
	koneksi();
?>
<style type="text/css">
	.satu{
		background-color: #ECECEC;
		padding: 0px
	}
	.boxes{
		display: flex;
		justify-content: flex-start;
		flex-wrap: wrap;
	}
	.boxin{
		margin:5px;
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
		background-color: gray
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
	<div class="jumbotron text-center" style="color: white; background-color: red">
		<font size="20px"><b>
			<i class="glyphicon glyphicon-user"></i> Detail Pengusaha UMKM</b></font>
	</div>
	<div class="container">
		<div class="col-sm-6">
			<h1><b>Profil</b></h1>
			<table class="table table-striped">
<?php
	$stmt = $db->prepare("SELECT pengusaha_umkm.*, kategori FROM pengusaha_umkm INNER JOIN pengusaha_umkm_kategori ON pengusaha_umkm.id_kategori = pengusaha_umkm_kategori.id WHERE pengusaha_umkm.id = ?");
	$stmt->bindParam(1, $_GET['id']);
	$stmt->execute();
	$res = $stmt->fetch();
?>	
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $res['nama']; ?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
					<td><?php echo $res['kategori']; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $res['email']; ?></td>
				</tr>
				<tr>
					<td>No Telp</td>
					<td>:</td>
					<td><?php echo $res['nomor_telepon']; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $res['alamat']; ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td><?php echo $res['deskripsi']; ?></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6">
			<h2><b>Daftar Produk</b></h2>
			<div class="boxes">

<?php
	$stmt = $db->prepare("SELECT * FROM pengusaha_umkm_produk WHERE id_pengusaha_umkm = ?");
	$stmt->bindParam(1, $_GET["id"]);
	$stmt->execute();
	$countGambar=1;
	while ($result = $stmt->fetch()) {
?>
				<div class="boxin">
					<div class="imgin">
						<a href="#" data-toggle="modal" data-target="#gambarFull<?php echo $countGambar ?>"><img src="upload/produk/<?php echo $result['id']; ?>.jpg" width="100%" height="100%"></a>
						<div id="gambarFull<?php echo $countGambar ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<img src="upload/produk/<?php echo $result['id']; ?>.jpg" width="100%" height="100%" >
							</div>
						</div>
					</div>
					<table class="table borderless">
						<tbody>
							<tr>
								<td>Nama Produk</td>
								<td>:</td>
								<td><?php echo $result["nama"]; ?></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>:</td>
								<td><?php echo $result["harga"]; ?></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td><?php echo $result["deskripsi"]; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			
<?php
	$countGambar++;
	}
?>			
			</div>
		</div>
	</div>
</div>

<?php
	require_once "footer.php";
?>