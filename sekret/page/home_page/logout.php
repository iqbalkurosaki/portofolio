<?php
session_destroy();
echo "<div class='alert alert-warning' role='alert'>Anda akan keluar!</div>";
echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
?>