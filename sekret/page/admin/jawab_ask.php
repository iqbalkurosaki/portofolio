<html>
    <head>
        <noscript>
            <meta http-equiv="Refresh" content="3;url=show_ask.php">	
        </noscript>

         <title>Jawab Pertanyaan</title>
        
    </head>

<body>
	<?php
	include ('../secure/secure_admin.php');
	$id =$_REQUEST['id'];
	$sql = "SELECT * FROM pertanyaan where id_ask=$id";
	$result=$db->execute($sql);
	$no="1";
	while(!$result->EOF){
	$asker = $result->fields["email"];
	$sbj = $result->fields["subject"];
	$isi = $result->fields["isi"];				
	$no++;
	$result->MoveNext();
	}	
	if(($_POST['submit']=="simpan")){
		$jawaban=code($_POST["jawab"]);
		$sql3="UPDATE pertanyaan set jawaban = '$jawaban',status=1 where id_ask='$id'";
		$result3=$db->Execute($sql3);
		if( !$result3) {
		  trigger_error('Wrong SQL: ' . $sql3 . ' Error: ' . $db->ErrorMsg(), E_USER_ERROR);
		} else {
		  $affected_rows = $db->Affected_Rows();
		}
		require_once("jawab_redirect.php");
		$db->Close();
	}
?>

		<form method="post">
    <div class="table-responsive">
		<table class="table table-striped">
            <tr class="success">
			<td colspan="3"><h4 class="judul">Berikut form menjawab pertanyaan</h4></td>
			</tr>
			<tr>
                <td width="10%" scope="col">Penanya</td><td width="1%" scope="col">:</td>
                <td width="80%" scope="col"> <div class="col-md-5"> <input type="text" name="email" class="form-control" value="<?php echo $asker ?>"/></div></td>
            </tr>
            <tr>
                <td>Subject</td><td>:</td>
                <td>  <div class="col-md-7">  <input type="text" name="subject" class="form-control" value="<?php echo $sbj ?>"/></div></td>
            </tr>
			<tr>
                <td>Pertanyaan</td><td>:</td>
                <td> <div class="col-md-12"> <input type="text" name="isi" class="form-control" value="<?php echo $isi ?>"/></textarea></div></td>
            </tr>
            <tr>
                <td>Jawaban</td><td>:</td>
                <td> <div class="col-md-12"> <textarea rows="5" id="jawab" required="required" name="jawab" class="form-control" value="<?php echo $low ?>"/></textarea></div></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="simpan" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Dengan memilih tombol simpan, berarti anda menyetujui untuk menampilkannya dalam website" /></td><td colspan="2"></td>
            </tr>
        </table>
	</div>
    	</form>
    </body>
</html>
