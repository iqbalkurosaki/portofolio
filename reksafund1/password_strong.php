<?php 
		require_once('koneksi.php');
		$sql2 = "SELECT (sha1(md5(password(crc32(hex('12345678'))))))";
		$res2 = mysqli_query($cnn, $sql2);
		$data2 = mysqli_fetch_row($res2);
		echo $data2[0];
/*
password :
adminreksadana1	: 12345678
adminbank1		: 87654321
adminbank2		: 11111111
klien1			: 77777777
klien2			: 10101010
rizqiirfan23	: 23081998

//buat akun admin reksadana :		INSERT INTO admin_reksadana(nama, email, password) values('adminreksadana2', 'adminreksadana2@gmail.com', sha1(md5(password(crc32(hex('00000000'))))));
////buat akun admin bank :		INSERT INTO admin_bank(nama, email, password) values('adminbank2', 'adminbank2@gmail.com', sha1(md5(password(crc32(hex('11111111'))))));
*/
?>