
<script src="dist/cropper.js">import Cropper from 'cropperjs';</script>
<script src="../jquery-1.10.2.min.js"></script>
<link  href="dist/cropper.css" rel="stylesheet">

<style type="text/css">
/* Ensure the size of the image fit the container perfectly */
img {
  display: block;

  /* This rule is very important, please don't ignore this */
  max-width: 100%;
}
</style>
<!-- Wrap the image or canvas element with a block element (container) -->
<div style="width:80%; height:100%">
    <img id="image" src="2630012020071.jpg">
</div>
<button onclick="savecanvas()">save</button>
<script>
    const image = document.getElementById('image');
    const cropper = new Cropper(image, {
        viewMode: 1,
        aspectRatio: 4 / 5
    });
    function savecanvas() {
        var dataUrl = cropper.getCroppedCanvas().toDataURL('image/jpeg');
        // const formData = new FormData();
        // Pass the image file name as the third parameter if necessary.
        // formData.append('croppedImage', dataUrl, '2630012020071.jpg')
    
        // Use `jQuery.ajax` method for example
        $.ajax({
            method: 'POST',
            url: 'save_foto.php',
            data: {jpegDataCropped: dataUrl, filenames:'2630012020071.jpg'},
            // processData: false,
            // contentType: false,
            success() {
            console.log('success');
            },
            error() {
            console.log('error');
            }
        });
    }
</script>