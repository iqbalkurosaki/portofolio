<?php
	require_once "../config/config.php";
	require_once "../page/home_page/header.php";
	?>
	<div class="container">
		<?php
			$pages_dir='../page/home_page';
	    	if(!empty($_GET['m'])) {
				$home_page = scandir($pages_dir,0);
				unset($home_page[0], $home_page[1]);

				$m = $_GET['m'];
				if(in_array($m.'.php', $home_page)) {
	    			include($pages_dir.'/'.$m.'.php');
				} else {
	    			echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
				}
			} else {
				include('../page/home_page/salam.php');
			}
		?>
	</div><!-- /.container -->
</body>
</html>
