$( document ).ready(function() {
	const image = document.getElementById('image');
});

// function ajax_file_upload(){
// 	if (fileobj != undefined) {
// 		var form_data = new FormData();
// 		form_data.append('file', fileobj);
// 		ajax.open("POST", "upload.php");
// 		ajax.send(form_data);
// 	}
// }

function file_explorer(transaksi){
	document.getElementById('foto').click();
	bukti1.click();
	document.getElementById('foto').onchange=function() {
		fileobj = document.getElementById('foto').files[0];
		if (fileobj!=undefined) {
			document.getElementById('foto').files[0].name = transaksi;
			var id = document.getElementById('foto').files[0].name; 
			var arr_nama = id.split('\\');
			nama = arr_nama[arr_nama.length-1];
			var ext = nama.split('.');
			var reader = new FileReader();
			if (ext[ext.length-1] != "jpg" && ext[ext.length-1] != "JPG") {
				alert("Format gambar harus jpg");
				fileobj = undefined;
				reset1.click();
			} else{	
					reader.readAsDataURL(fileobj);
					reader.onload = function(reader) {
						image.setAttribute("src", reader.target.result);
						cropper = new Cropper(image, {
							viewMode: 2,
							aspectRatio: 4 / 5,
							autoCropArea: 1
						});
						// gambar.style.backgroundSize="100% 100%";
						// gambar.style.backgroundImage = "url("+reader.target.result+")";
					};
				}
		} else{
			
		}
	};	
}

function upload_file(e) {
	e.preventDefault();
	bukti1.click();
	fileobj = e.dataTransfer.files[0];
	var id = e.dataTransfer.files[0].name;
	var arr_nama = id.split('\\');
	nama = arr_nama[arr_nama.length-1];
	var ext = nama.split('.');
	var reader = new FileReader();
	
	if (ext[ext.length-1] != "jpg"  && ext[ext.length-1] != "JPG") {
		alert("Format gambar harus jpg");
		fileobj = undefined;
		reset1.click();
	} else{
		if (fileobj!=undefined) {
			reader.readAsDataURL(fileobj);
			reader.onload = function(reader) {
				image.setAttribute("src", reader.target.result);
				cropper = new Cropper(image, {
					viewMode: 2,
					aspectRatio: 4 / 5,
					autoCropArea: 1
				});
				// gambar.style.backgroundSize="100% 100%";
				// gambar.style.backgroundImage = "url("+reader.target.result+")";
			};
		}
	}
}

function batal(){
	reset1.click();
	text.style.display = "block";
	gambar.style.display = "none";
	bukti1.style.display = "none";
	bukti2.style.display = "none";
	namaFile.innerHTML = '';
	image.setAttribute("src", "");
	gambar.style.backgroundImage = "url()";
	cropper.destroy();
}

function cropcanvas() {
	text.style.display = "none";
	bukti1.style.display = "inline-block";
	bukti2.style.display = "inline-block";
	gambar.style.display = "block";
	namaFile.innerHTML = nama;
	dataUrl = cropper.getCroppedCanvas({width: 800, height: 1000}).toDataURL('image/jpeg');
	gambar.style.backgroundSize="100% 100%";
	gambar.style.backgroundImage = "url("+dataUrl+")";
	// var vFoto = document.getElementById("foto").value();
	// vFoto = dataUrl;
    // $('.foto').html($(this).val()) = dataUrl;
	// $('#foto').val(dataUrl);


	// const formData = new FormData();
	// Pass the image file name as the third parameter if necessary.
	// formData.append('croppedImage', dataUrl, '2630012020071.jpg')
}

function savecanvas(id) {	
	// Use `jQuery.ajax` method for example
	$.ajax({
	    method: 'POST',
	    url: 'save_foto.php',
	    data: {jpegCropped: dataUrl, nis:id},
	    // processData: false,
	    // contentType: false,
	    success: function (data) {
			alert('success');
			window.close();
	    },
	    error() {
			alert('error');
	    }
	});
}
