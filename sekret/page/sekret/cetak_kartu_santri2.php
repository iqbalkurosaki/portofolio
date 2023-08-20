<?php
if (!session_id()) {
	session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cetak Kartu Santri</title>
<script type="text/javascript">
$(document).ready(function() {
  $('table').on('scroll', function() {
    $("#" + this.id + " > *").width($(this).width() + $(this).scrollLeft());
  });
  makeEqualWidthofTDTH('table1');
  makeEqualWidthofTDTH('table2');
});

function makeEqualWidthofTDTH(id) {
  var rows = $('#' + id + ' tr');
  var index = $('#' + id).index();
  //rows.find(':nth-child(' + (index + 1) + ')').css('background-color', '#abff96');
  var len = $('#' + id).find("tr:last td").length;
  var count = 1;
  $('#' + id + '>tbody>tr>td').each(function() {
    if (count > len) {
      return false;
    } else {
      //console.log($(this).width() + "----" + rows.find(':nth-child(' + (index + count) + ')').width());
      if ($(this).width() > rows.find(':nth-child(' + (index + count) + ')').width()) {
        rows.find(':nth-child(' + (index + count) + ')').css('max-width', $(this).width());
        rows.find(':nth-child(' + (index + count) + ')').css('min-width', $(this).width());
      } else {
        $(this).css('max-width', rows.find(':nth-child(' + (index + count) + ')').width());
        $(this).css('min-width', rows.find(':nth-child(' + (index + count) + ')').width());
      }
      count++;
    }
  });
}
</script>
<style type="text/css">
html {
    font-family: verdana;
    font-size: 10pt;
    line-height: 25px;
}
table {
    border-collapse: collapse;
    width: 300px;
    overflow-x: scroll;
    display: block;
}
thead {
    background-color: #EFEFEF;
}
thead, tbody {
    display: block;
}
tbody {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 400px;
}
td, th {
    min-width: 100px;
    height: 25px;
    border: dashed 1px lightblue;
    overflow:hidden;
    text-overflow: ellipsis;
    max-width: 100px;
}
.niscss {
	min-width: 110px;
	max-width: 110px;
}
.namacss {
	min-width: 200px;
	max-width: 200px;
}
.pilihcss {
	min-width: 47px;
	max-width: 47px;
}
.kamarcss {
	min-width: 60px;
	max-width: 60px;
}
.statuscss {
	min-width: 160px;
	max-width: 160px;
}
</style>

	</head>
	<body>
<?php 
if (isset($_POST['reset'])) {
	unset($_POST['tambah']);
	unset($_SESSION['cetak']);
}
           	if (isset($_POST['tambah'])) {
           		if (!isset($_SESSION['cetak'])) {
           			$_SESSION['cetak'] = array();
           		}
           		$tambah = $_POST['tambah'];
       			for ($i=0; $i<count($tambah) ; $i++) { 
       				array_push($_SESSION['cetak'], $tambah[$i]);
       			}
           	}

 ?>

<!-- 	<div class="well sidebar-nav">
		<nav>
		  <ul class="pager">
		    <li>
		      
		    </li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=1">Komplek A</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=2">Komplek B</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=3">Komplek C</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=4">Komplek D</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=5">Komplek E</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=6">Komplek F</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=7">Komplek G</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=8">Komplek H</a></li>
		    <li><a href ="menu_sekret.php?a=cetak_kartu_santri&k=9">Komplek I</a></li>
		  
		    </li>
		  </ul>
		</nav>
	 </div> -->
<div class="container">
  <div class="row">
	<form method="post" action="">
    <div class="col-sm-5 col-md-5">
      <div class="table-responsive">
        <table class="table" id="table1">
          <thead>
            <tr>
             <th class="pilihcss">Pilih</th><th class="niscss">Nis</th><th class="namacss">Nama</th><th class="kamarcss">Kamar</th><th>Kelas</th><th class="statuscss">Status</th>
            </tr>
          </thead>
          <tbody>
           	<?php
	            $sql = "SELECT * FROM t_santri";
	            $result=$db->execute($sql);
	            while (!$result->EOF) {
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $komplek = $result5->fields["nama_komplek"];

				$id_kelas=$result->fields["id_kelas"];
				$sql6 = "SELECT * FROM kelas where id_kelas=$id_kelas";
                $result6=$db->execute($sql6);
                $kelas = $result6->fields["kelas"];

				$id_status = $result->fields["id_status"];
				$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
                $result7=$db->execute($sql7);
                $status = $result7->fields["status_santri"];

				echo '<tr><td class="pilihcss"><input type="checkbox" name="tambah[]" value="'.$nis.'" '; echo (in_array($nis, $_SESSION["cetak"])) ? "checked" : ""; echo (isset($_POST['pilih_semua'])) ? "checked" : ""; echo ' ></td><td class="niscss">'.$nis.'</td><td class="namacss">'.$nama.'</td><td class="kamarcss">'.$komplek.'</td><td>'.$kelas.'</td><td class="statuscss">'.$status.'</td>
				</tr>';

				$result->MoveNext();
            }
			?>
          </tbody>
        </table>
        <button type="submit" name="submit_tambah" value="tambah" style="display: inline-block;">Tambahkan</button>
</form>
<form method="post" style="display: inline-block;">
    <button type="submit" name="pilih_semua" value="pilih_semua">Pilih Semua</button>
</form>
      </div>
    </div>

<form method="post" action="../page/sekret/cetak_kartu_santri_terpilih.php" target="blank">
    <div class="col-sm-5 col-md-5">
      <div class="table-responsive">
        <table class="table" id="table2">
          <thead>
            <tr>
             <th class="niscss">Nis</th><th class="namacss">Nama</th><th class="kamarcss">Kamar</th><th>Kelas</th><th class="statuscss">Status</th>
            </tr>
          </thead>
          <tbody>
           	<?php
        if (isset($_SESSION['cetak'])) {
           	$cetak = $_SESSION['cetak'];
            for ($i=0; $i<count($cetak); $i++) {
	            $sql = "SELECT * FROM t_santri WHERE nis = $cetak[$i]";
	            $result=$db->execute($sql);
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $komplek = $result5->fields["nama_komplek"];

				$id_kelas=$result->fields["id_kelas"];
				$sql6 = "SELECT * FROM kelas where id_kelas=$id_kelas";
                $result6=$db->execute($sql6);
                $kelas = $result6->fields["kelas"];

				$id_status = $result->fields["id_status"];
				$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
                $result7=$db->execute($sql7);
                $status = $result7->fields["status_santri"];

				echo '<tr><td class="niscss">'.$nis.'</td><td class="namacss">'.$nama.'</td><td class="kamarcss">'.$komplek.'</td><td>'.$kelas.'</td><td class="statuscss">'.$status.'</td>
				</tr>';

			}
		}
			?>
          </tbody>
        </table>
        <button type="submit" name="submit_cetak" value="Cetak" style="display: inline-block;">Cetak</button>
</form>
<form method="post" style="display: inline-block;"> <button type="submit" name="reset" value="reset">Hapus</button> </form>
      </div>
    </div>
  </div>
</div>

	 </body> 
</html> 
