<?php

if (isset($_POST['simpan'])) {
    $nama_kamar = code($_POST["nama_kamar"]);
    $kapasitas = $_POST["kapasitas"];
    $id_komplek = $_POST['id_komplek'];
    $sql = "SELECT nama_komplek FROM nama_komplek WHERE id_namakomplek = ".$id_komplek;
    $result=$db->Execute($sql);
    $nama_komplek = $result->fields["nama_komplek"];
    
    //membuat id kamar
    $id_kamar_baru = $id_komplek.substr($nama_kamar, 1);

    $sql="UPDATE komplek SET id_komplek=".$id_kamar_baru.", nama_komplek='".$nama_kamar."', keterangan='".$nama_komplek."', kapasitas=".$kapasitas." WHERE id_komplek=".$_POST['id_kamar_lama'];
    $result=$db->Execute($sql);
    if ( !$result) {
             print "error updating: '.$db->ErrorMsg().'<BR>";
    } else {
        require_once "kamar_redirect.php";
    }
}
if (isset($_GET['id'])) {
    $id_kamar = $_GET['id'];
    $sql = "SELECT * FROM komplek where id_komplek = ".$id_kamar;
    $result=$db->execute($sql);
    $nama_kamar = $result->fields["nama_komplek"];
    $keterangan = $result->fields["keterangan"];
    $kapasitas= $result->fields["kapasitas"];
}
?>
    <form method="post" action="">
    <div class="table-responsive">
            <table  class="table table-stripped">
            <tr class="active"><td width="3%" scope="col"><h5>1</h5></td><td colspan="3"><h5>Edit Kamar</h5></td>
            </tr>
                <tr>
                <td></td>
                    <td width="20%" scope="col">Komplek</td>
                    <td width="1%" scope="col"> : </td>
                    <td width="70%" scope="col"><div class="col-md-5"> <select id="komplek" name="id_komplek" class="form-control" required="">
                        <option disabled="">Pilih Komplek</option>
                       <?php
           
                $sql = "SELECT * FROM nama_komplek ORDER BY id_namakomplek";
                $result=$db->Execute($sql);
                while (!$result->EOF) {
                    $id = $result->fields["id_namakomplek"];
                    $nama_komplek = $result->fields["nama_komplek"];
                ?>
                    <option value="<?php echo $id; ?>" <?php if ($keterangan == $nama_komplek) { echo "selected"; } ?> >
                        <?php echo $nama_komplek; ?>
                    </option>
                <?php
                $result->MoveNext();
                }
                ?>
                    </select></div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20%" scope="col">Nama Kamar</td>
                    <td width="1%" scope="col"> : </td>
                    <td width="70%" scope="col"><div class="col-md-10"><input type="text" name="nama_kamar" value="<?php echo $nama_kamar ?>" required="required" class="form-control" placeholder="Isikan nama kamar"/></div>
                    <input type="hidden" name="id_kamar_lama" value=<?php echo $_GET['id']; ?>>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kapasitas</td>
                    <td> : </td>
                    <td><div class="col-md-5"><input type="number" name="kapasitas" required="required" min="1" class="form-control" value="<?php
                    echo $kapasitas;?>" placeholder="Isikan jumlah kapasitas"/>
                    </div></td>
                </tr>
                
                <tr>
                    <td colspan="4"> <input type="submit" value="Simpan" name="simpan" class="btn btn-primary" />
            </td></tr>
        </table>
    </div>
    </form>