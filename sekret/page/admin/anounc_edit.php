<html>
    <head>
        <noscript>
            <meta http-equiv="Refresh" content="3;url=inputpengumuman.php">	
        </noscript>

         <title>Edit Pengumuman</title>
        
    </head>
    
    <body>

<?php
	include ('../secure/secure_admin.php');
	$id =$_REQUEST['id'];
	$sql = "SELECT * FROM pengumuman where id=$id";
	$result=$db->execute($sql);
	$no="1";
	while(!$result->EOF){
	$judul = $result->fields["judul"];
	$jdl=decode($judul);
	$cont = $result->fields["isi"];
	$isi=decode($cont);
	$sumber = $result->fields["sumber"];
	$smb=decode($sumber);
	$tgl = $result->fields["tglupdt"];
	$result->MoveNext();
	}
	
	if(isset($_POST['save'])){
		$jdlup =code($_POST["judul"]);
		$isiup =code($_POST["isi"]);
		$smbup = code($_POST["sumber"]);
		$tglup = $_POST["tglupdt"];
		
		
		$sql="UPDATE pengumuman SET judul ='$jdlup', isi ='$isiup', sumber ='$smbup', tglupdt ='$tglup' WHERE id = '$id'";
		$result=$db->Execute($sql);
		if(!$result) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
		require_once("redirect_anounc.php");
	}
	$db->Close();
?>

	<form method="post">
    <div class="table-responsive">
			<table  class="table table-striped">
			<tr class="success"><td colspan="3"><h4 class="judul">Form edit pengumuman</h4></td>
		</tr>       
		<tr>
                <td width="15%" scope="col">Judul</td><td width="1%" scope="col">:</td>
                <td width="70%" scope="col"><div class="col-md-7">  <input type="text" name="judul" class="form-control" value="<?php echo $jdl ?>"/></div></td>
            </tr>
            <tr>
                <td>Isi Pengumuman</td><td>:</td>
                <td><div class="col-md-12"><textarea class="form-control" rows="5" id="isi" required="required" name="isi" value="<?php echo $isi ?>"/></textarea></td>
            </tr>
            <tr>
                <td>Sumber</td><td>:</td>
                <td><div class="col-md-7"><input type="text" name="sumber" class="form-control" value="<?php echo $smb ?>"/></div></td>
            </tr>
            <tr>
                <td>Tanggal Update</td><td>:</td>
                <td><div class="col-md-4"><input type="date" name="tglupdt" class="form-control" value="<?php echo $tgl ?>"/></div></td>
            </tr>
            <tr>
                <td><input class="btn btn-primary" type="submit" name="save" value="Simpan" /></td>
            </tr>
        </table>
		</div>
    	</form>
    </body>
</html>
