
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="dist/cropper.js">import Cropper from 'cropperjs';</script>
<link  href="dist/cropper.css" rel="stylesheet">
<script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="effec.js"></script>

<style type="text/css">
/* Ensure the size of the image fit the container perfectly */
img {
  display: block;

  /* This rule is very important, please don't ignore this */
  max-width: 100%;
}
</style>

<body>
    <div class="row text-center " id="dropimage" style="margin:20px;padding: 50px 0px;border: 3px dotted #CFCECE" ondrop="upload_file(event)" ondragover="return false">
        <div id="text">
            <h1><i class="glyphicon glyphicon-picture"></i></h1>
            <button class="btn btn-primary" onclick="file_explorer('<?php echo $_GET['id']; ?>')"><i class="glyphicon glyphicon-open-file"></i> Pilih File</button>
            <h6 class="small">File foto dengan ekstensi .jpg</h6>
        </div>
        <div class="text-right" style="display: none;width: 320px; height: 400px;margin: 0px auto;" id="gambar">
            <button class="btn btn-danger" onclick="batal()"><i class="glyphicon glyphicon-remove-circle"></i></button>
        </div>
        <br>
        <h4 id="namaFile" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; font-weight: bold;margin: 0px auto"></h4> <br>
        <form method='post' enctype='multipart/form-data' \>
            <input type="file" id="foto" name="foto" accept="image/*" style="display: none;" />
            <input type="reset" id="reset1" style="display: none;">
            <button type="button" id="bukti1" style="display: none;margin:0px auto" class="btn btn-success" data-toggle="modal" data-target="#confirm"><i class="glyphicon glyphicon-scissors"></i> Crop</button>
            <button type="button" id="bukti2" style="display: none;margin:0px auto" class="btn btn-primary" onclick="savecanvas(<?php echo $_GET['id']; ?>)"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>

            <div id="confirm" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <!-- Wrap the image or canvas element with a block element (container) -->
                        <div style="width:100%; height:80%">
                            <img id="image" src="">
                        </div>
                    </div>
                    <div class="modal-footer"> 
                        <!-- <button type="submit" name="bukti" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Ya</button> -->
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="cropcanvas()"><i class="glyphicon glyphicon-scissors"></i> Crop</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cropper.destroy()"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</body>