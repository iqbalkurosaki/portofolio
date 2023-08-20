<?php if (isset($_POST['array_nis'])) {
	print_r($_POST['array_nis']);
} ?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
	$(".button_tr").click(function(){
        alert('asa')
	});
	</script>
</head>
<body>
	<div style="padding: 10px;background-color: lightgray" class="button_tr">a</div>
	<table border="1">
			<tr id="a1">
				<td class="button_tr">1</td>
				<td>satu</td>
				<td><button  id="1" >sa</button></td>
			</tr>
			<tr id="a2">
				<td class="button_tr">2</td>
				<td>dua</td>
				<td><button  id="2" >sa</button></td>
			</tr>
			<tr id="a3">
				<td class="button_tr">3</td>
				<td>tiga</td>
				<td><button  id="3" >sa</button></td>
			</tr>
	</table>
</body>
<script type="text/javascript">
	var arrayi = [[1,2,4],['s',2,4],[9,2,4],[9,2,4]]
	var index = $.map(arrayi,function(name,idx){
		if (name[0]=="s") { return idx }
	})
	arrayi.splice(index,1) 
	alert(arrayi)
	// var index = arrayi.filter(function(vari){ return vari[0] == "s"})
	// arrayi.splice(index-1,1)
	// alert(arrayi)
	// if (index!='') {alert(index[0][1])}
</script>
</html> -->