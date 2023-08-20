<?php
// if (!session_id()) {
  session_start();
  unset($_SESSION['cetak_kts']);
// }
?>
<!DOCTYPE html>
<html>
<head>
<title>Cetak Kartu Santri</title>
<link rel="stylesheet" type="text/css" href="../css/DataTables/datatables.min.css">
<script type="text/javascript" src="../css/DataTables/datatables.min.js"></script>
<style type="text/css">
  table{
    display: block;
    max-height: 370px;
    overflow-y: scroll; 
  }
</style>
</head>
<body>
<div class="row">
  <div class="col-sm-6">
    <h2>
      Pilih Data Santri
    </h2>
    <table class="table " id="table_select">
      <thead> 
        <tr class="success">
          <th></th>
          <th>Nis</th>
          <th>Nama</th>
          <th>Kamar</th>
          <th>Status</th>
          <th>KTS</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM t_santri, komplek, kelas, status_santri, kts WHERE kts = 2 AND t_santri.id_komplek = komplek.id_komplek AND t_santri.id_kelas = kelas.id_kelas AND t_santri.id_status = status_santri.id_status AND t_santri.kts = kts.id";
              $result=$db->execute($sql);
              while (!$result->EOF) {
                $nis= $result->fields["nis"];
                if (strlen($nis) == 13) {
                  $upload_komplek = substr($nis, 0, 1);
                  $upload_kamar = substr($nis, 1, 1);
    
                } else {
                  $upload_komplek = substr($nis, 0, 2);
                  $upload_kamar = substr($nis, 2, 1);
                }
                if (is_file("../img/qr/".$upload_komplek."/".$upload_kamar."/".$nis.".png")) {
                  $result->MoveNext();
                  continue;
                }
                $nama = $result->fields["nama"];

                $komplek = $result->fields["nama_komplek"];
                $status = $result->fields["status_santri"];
                $kts = $result->fields["status_kts"];
                $kelas = $result->fields["kelas"];
          ?> 
          <tr id="<?php echo $nis ?>">
            <td >
              <input type="checkbox" id="<?php echo $nis ?>">
            </td>
            <td class="as"><?php echo $nis ?></td>
            <td ><?php echo $nama ?></td>
            <td ><?php echo $komplek ?></td>
            <td ><?php echo $status ?></td>
            <td ><?php echo $kts ?></td>
            <td><?php echo $kelas ?></td>
          </tr>
              <?php
              $result->MoveNext();
            }
      ?>
      </tbody>
    </table>
      <button class="btn btn-danger" style="display:inline-block;margin-top: 20px;width: 49%;padding: 10px" onclick="ulang()"><b>
        <i class="glyphicon glyphicon-repeat"></i> Uncheck All </b>
      </button>
      <button class="btn btn-success" style="display:inline-block;margin-top: 20px;width: 49%;padding: 10px" onclick="funca()"><b>
        <i class="glyphicon glyphicon-check"></i> Check All </b>
      </button>
  </div>
  <div class="col-sm-6">
    <h2>
      Data Santri Siap Cetak
    </h2>
    <form action="sekret/cetak_kartu_santri_terpilih.php" method="post" target="_blank">
      <table class="table" id="table_apointment">
        <thead >  
          <tr class="info" >
            <th></th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kamar</th>
            <th>Status</th>
            <th>KTS</th>
            <th>Kelas</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <button type="submit" name="kts" value="update" class="btn btn-primary" style="margin-top: 20px;width: 100%;padding: 10px"><b>
        <i class="glyphicon glyphicon-print"></i> UPDATE dan Cetak KTS </b>
      </button>
    </form>
  </div>
</div>
<script type="text/javascript">

  var vardata = $("#table_select").DataTable({
    "bPaginate": false
  });
  var vardata2 = $("#table_apointment").DataTable({
    "bPaginate": false
  });
  
  $(document).ready(function(){
    $("#table_select>tbody>tr>td>input[type=checkbox]").prop('checked',false)
  })

  function ulang(){
    $("#table_select>tbody>tr>td>input[type=checkbox]").prop('checked',false);
    $('#table_select>tbody>tr').each(function(){
      vardata2.row('#table_apointment>tbody>tr#'+$(this).attr('id')).remove().draw()
    })
  }

  function funca(){
    $('#table_select>tbody>tr').each(function(){
      if (!$(this).prop('checked')) { 
        var td = [];
        var flag = true;
        $('td',this).each(function(index){
            if (index>0 ) {
              td.push($(this).text())
            } else {
              if ($(this).children().prop('checked')) {
                flag = false;
                return false
              } else {
                $(this).children().prop('checked',true)
              }
            }    
        });
        if (flag) {
          inputcek = '<input type="checkbox" id="'+td[0]+'" name="array_nis[]" value="'+td[0]+'" onclick="hapus('+td[0]+')" checked>';
          vardata2.row.add([
            inputcek,
            td[0],
            td[1],
            td[2],
            td[3],
            td[4],
            td[5]
          ]).node().id = td[0];
          vardata2.draw(false);
        }
      }
    })
  }

  function hapus(var_hapus){
    if (!$('#'+var_hapus).prop('checked')) {
      vardata2.row('#table_apointment>tbody>tr#'+var_hapus).remove().draw();
      $("#table_select>tbody>tr#"+var_hapus+">td>input[type=checkbox]").prop('checked',false)
    }
  }

  $("#table_select>tbody>tr>td>input[type=checkbox]").click(function(){
    var id = $(this).attr('id');
    if ($(this).prop('checked')) {
      var tr= "#table_select>tbody>tr#"+id;
      var td = $(tr+">td").map(function(_,td){
        return $(td).text(); 
      }).get();
      inputcek = '<input type="checkbox" id="'+td[1]+'" name="array_nis[]" value="'+td[1]+'" onclick="hapus('+td[1]+')" checked>';
      vardata2.row.add([
        inputcek,
        td[1],
        td[2],
        td[3],
        td[4],
        td[5]
      ]).node().id = td[1];
      vardata2.draw(false);

    } else{
      vardata2.row('#table_apointment>tbody>tr#'+id).remove().draw();
    }
  });
</script>
</body> 
</html> 
