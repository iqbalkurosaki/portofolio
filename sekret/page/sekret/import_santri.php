<html>
<?php
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
     }
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into t_santri (nis,nama,tempat_lahir,tgl_lahir,no_hp,profesi,jurusan,ayah,ibu,wali,tlp_rmh,alamat,kota,provinsi,kode_pos,tgl_masuk,id_komplek,id_kelas,id_status,lunas_administrasi,foto)
values('".code($data[0])."','".code($data[1])."','".code($data[2])."','".code($data[3])."','".code($data[4])."','".code($data[5])."','".code($data[6])."','".code($data[7])."','".code($data[8])."','".code($data[9])."','".code($data[10])."','".code($data[11])."','".code($data[12])."','".code($data[13])."','".code($data[14])."','".code($data[15])."','".code($data[16])."','".code($data[17])."','".code($data[18])."','".code($data[19])."','".code($data[20])."')"; 
//data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        $db->Execute($import) or die($db->ErrorMsg()); //Melakukan Import
    }
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. 
?>
<!-- Form Untuk Upload File CSV-->
   Silahkan masukan file csv yang ingin diupload<br />
   <form enctype='multipart/form-data' action='' method='post'>
    Cari CSV File anda:<br />
        <input type='file' name='filename' size='100'>
   <input type='submit' name='submit' value='Upload'></form>
<?php } 
?>
</html>