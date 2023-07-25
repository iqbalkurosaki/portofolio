function ajax_file_upload(){
	if (fileobj != undefined) {
		var form_data = new FormData();
		form_data.append('file', fileobj);
		ajax.open("POST", "upload.php");
		ajax.send(form_data);
	}
}

function file_explorer(transaksi){
			document.getElementById('berkas').click();
			document.getElementById('berkas').onchange=function() {
				fileobj = document.getElementById('berkas').files[0];
				if (fileobj!=undefined) {
					document.getElementById('berkas').files[0].name = transaksi;
					var id = document.getElementById('berkas').files[0].name; 
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
							gambar.style.display = "block";
							reader.readAsDataURL(fileobj);
							reader.onload = function(reader) {
							  gambar.style.backgroundSize="100% 100%";
						      gambar.style.backgroundImage = "url("+reader.target.result+")";
						    };
							namaFile.innerHTML = nama;
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
					gambar.style.display = "block";
					reader.readAsDataURL(fileobj);
					reader.onload = function(reader) {
					  gambar.style.backgroundSize="100% 100%";
				      gambar.style.backgroundImage = "url("+reader.target.result+")";
				    };
					namaFile.innerHTML = nama;
				}
			 }
		}
		function batal(){
			text.style.display = "block";
			gambar.style.display = "none";
			bukti1.style.display = "none";
			namaFile.innerHTML = '';
			reset1.click();
		}