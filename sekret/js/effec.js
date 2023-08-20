function ajax_file_upload(){
	if (fileobj != undefined) {
		var form_data = new FormData();
		form_data.append('file', fileobj);
		ajax.open("POST", "upload.php");
		ajax.send(form_data);
	}
}

function file_explorer(transaksi){
			document.getElementById("fotos").click();
			document.getElementById("fotos").onchange=function() {
				fileobj = document.getElementById("fotos").files[0];
				if (fileobj!=undefined) {
					document.getElementById("fotos").files[0].name = transaksi;
					var id = document.getElementById("fotos").files[0].name; 
					var arr_nama = id.split('\\');
					var nama = arr_nama[arr_nama.length-1];
					var ext = nama.split('.');
					var reader = new FileReader();
					if (ext[ext.length-1] != "jpg" && ext[ext.length-1] != "jpg") {
						alert("Format gambar harus jpg");
						fileobj = undefined;
						reset1.click();
					} else{	
							text.style.display = "none";
							bukti1.style.display = "block";
							foto_modal.style.display = "block";
							reader.readAsDataURL(fileobj);
							reader.onload = function(reader) {
							  // file_foto_modal.style.maxHeigt="100%";
						      file_foto_modal.src = reader.target.result;

								image = file_foto_modal;
								cropper = new Cropper(image, {
								  aspectRatio: 2 / 3,
								  crop(event) {
								    console.log(event.detail.x);
								    console.log(event.detail.y);
								    console.log(event.detail.width);
								    console.log(event.detail.height);
								    console.log(event.detail.rotate);
								    console.log(event.detail.scaleX);
								    console.log(event.detail.scaleY);
								  },
								});

						    };
						}
				} else{
					
				}
			};	
		}

		function upload_file(e) {
			e.preventDefault();
			fileobj = e.dataTransfer.files[0];
			var id = e.dataTransfer.files[0].name;
			var arr_nama = id.split('\\');
			var nama = arr_nama[arr_nama.length-1];
			var ext = nama.split('.');
			var reader = new FileReader();
			
			if (ext[ext.length-1] != "jpg"  && ext[ext.length-1] != "jpg") {
				alert("Format gambar harus jpg");
				fileobj = undefined;
				reset1.click();
			} else{
				if (fileobj!=undefined) {
					text.style.display = "none";
					bukti1.style.display = "block";
					foto_modal.style.display = "block";
					reader.readAsDataURL(fileobj);
					reader.onload = function(reader) {
					  // file_foto_modal.maxHeigt="100%";
				      file_foto_modal.src = reader.target.result;

						image = file_foto_modal;
						cropper = new Cropper(image, {
						  	aspectRatio : 4 / 1,
						  crop(event) {
						    console.log(event.detail.x);
						    console.log(event.detail.y);
						    console.log(event.detail.width);
						    console.log(event.detail.height);
						    console.log(event.detail.rotate);
						    console.log(event.detail.scaleX);
						    console.log(event.detail.scaleY);
						  },
						});

				    };
				}
			 }
		}

		function batal(){
			text.style.display = "block";
			foto_modal.style.display = "none";
			bukti1.style.display = "none";
			file_foto_modal.src = '';
			cropper.destroy();
			reset1.click();
		}

		function selesai(){
			image_display.src = cropper.getCroppedCanvas({width : 800, height : 1000}).toDataURL('image/jpeg');
			foto.value = cropper.getCroppedCanvas().toDataURL('image/jpeg');
			close_button.click();
		}