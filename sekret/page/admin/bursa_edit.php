<html>
    <head>
        <noscript>
            <meta http-equiv="Refresh" content="3;url=inputbursa.php">	
        </noscript>
		
        <title>Edit Bursa</title>
  
    </head>
    
    <body>

<?php
	
	$id =$_REQUEST['id'];
	$sql = "SELECT * FROM bursa_kerja where id=$id";
	$result=$db->execute($sql);
	$no="1";
	while(!$result->EOF){
	$judul = $result->fields["judul"];
	$jdl=decode($judul);
	$lowker = $result->fields["lowker"];
	$low=decode($lowker);
	$sumber = $result->fields["sumber"];
	$smb=decode($sumber);
	$tgl = $result->fields["tglupdate"];
	$result->MoveNext();
	}
	if(($_POST['submit']=="Simpan")){	
		$jdlup = code($_POST['judul']);
		$lowup = code($_POST['lowker']);
		$smbup = code($_POST['sumber']);
		$tglup = $_POST['tglupdate'];
		$sql="UPDATE bursa_kerja SET judul ='$jdlup', lowker ='$lowup', sumber ='$smbup', tglupdate ='$tglup' WHERE id = '$id'";
		$result=$db->Execute($sql);
		if(!$result) {
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
		require_once("bursa_redirect.php");
		$db->Close();
	}
	
?>

    <form method="post">
    <div class="table-responsive">
		<table  class="table table-striped">
			<tr class="success"><td colspan="3"><h4 class="judul">Form edit bursa kerja</h4></td>
		</tr>       
            <tr>
                <td width="20%" scope="col">Judul</td><td width="1%" scope="col">:</td>
                <td width="70%" scope="col"><div class="col-md-6">  <input type="text" name="judul" class="form-control" value="<?php echo $jdl ?>"/></div></td>
            </tr>
            <tr>
                <td>Lowongan Kerja</td><td>:</td>
                <td> <div class="col-md-12">  <textarea class="form-control" rows="7" id="lowker" required="required" name="lowker" value="<?php echo $low ?>"/></textarea></td>
            </tr>
            <tr>
                <td>Sumber</td><td>:</td>
                <td><div class="col-md-7">  <input type="text" name="sumber" class="form-control" value="<?php echo $smb ?>"/></div></td>
            </tr>
            <tr>
                <td>Tanggal Update</td><td>:</td>
                <td><div class="col-md-4"> <input type="date" name="tglupdate" class="form-control" value="<?php echo $tgl ?>"/></div></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-primary" name="submit" value="Simpan" /></td>
            </tr>
        </table>
	</div>
    	</form>
    </body>
</html>
