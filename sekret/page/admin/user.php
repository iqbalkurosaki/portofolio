<html>
<head>
</head>
<body>
		
		<form id="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>" onSubmit="return cekLogin();"> 
		<div class="table-responsive">
		<?php
		include ('../secure/secure_admin.php');
		include 'bkk_add.php';
		?>
		
		<br><br>
		</div>
		</form>
		
</body>
</html>