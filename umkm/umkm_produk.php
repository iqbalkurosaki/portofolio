<?php
	require_once "akses_umkm.php";
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
		margin:15px;
		background-color: white;
		border-radius: 10px;
		width: 250px;
		margin-bottom: 30px;
		box-shadow: 1px 1px 50px lightgrey;
	}
	.plus{
		margin:15px;
		border-radius: 10px;
		padding: 100px 30px;
		text-align: center;
		height: 250px;
		font-size: 18px;
		cursor:pointer;
	}
	.plus>a{
		text-decoration: none;
		color: black;
	}
	.plus:hover{
		background-color: #ECECEC;
	}
	.imgin{
		border-bottom: 2px solid black; 
		border-radius: 10px;
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
	.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
		border-radius: 10px;
		background-color: #B90000;
		color: white
	}
	.satu>.navbar-default .navbar-nav>li>a{
		margin: 0px 5px;
	}
	.satu>.navbar-default .navbar-nav>li>a:hover{
		border-radius: 10px;
		background-color: #B90000;
		color: white;
	}
</style>
<div class="container satu">
	<nav class="navbar navbar-default">
			<ul class="nav navbar-nav">
				<li class="active"><a><i class="glyphicon glyphicon-th-list"></i> <b>Daftar Produk Anda</b></a></li>
				<li><a href="umkm_upload_produk.php"><i class="glyphicon glyphicon-bullhorn"></i> <b>Upload Produk</b></a></li>
			</ul>
	</nav>
	<div class="boxes">

<?php
	$stmt = $db->prepare("SELECT * FROM pengusaha_umkm_produk WHERE id_pengusaha_umkm = ?");
	$stmt->bindParam(1, $_SESSION["id"]);
	$stmt->execute();
	while ($result = $stmt->fetch()) {
?>
		<div class="boxin">
			<div class="imgin">
				<img src="upload/produk/<?php echo $result['id']; ?>.jpg" width="100%" height="100%">
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
	}
?>
		<div class="plus">
			<a href="umkm_upload_produk.php"><i class="glyphicon glyphicon-plus"></i><br>Tambahkan Produk</a>
		</div>
	</div>
</div>

<?php
	require_once "footer.php";
?>