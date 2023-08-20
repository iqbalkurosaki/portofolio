<?php
require_once "koneksi.php";
koneksi();
$stmt = $db->prepare("SELECT COUNT(email) AS jumlah FROM pengusaha_umkm WHERE email = ?");
$stmt->bindParam(1, $_POST["email"]);
$stmt->execute();
$result = $stmt->fetch();
echo $result["jumlah"];
?>