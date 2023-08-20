<!DOCTYPE html>
<html>

<head>
	<script src="../js/jquery.js"></script>
</head>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Kirimkan lokasi</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var tes = position.coords.latitude;
	var tes2 = position.coords.longitude;
	
		$.ajax({
			url: '../insert_langlo.php', 
			type: "POST",
			data:{ tes:tes, tes2:tes2 },
			dataType: "html",
			success : function() {
				alert("Lokasi anda sukses ditambahkan ke peta");
	
		},
			error : function(){
				alert("Lokasi anda gagal ditambahkan ke peta");
			}
		});
}
</script>

</body>
</html>