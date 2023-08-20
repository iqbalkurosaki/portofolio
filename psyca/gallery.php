<!DOCTYPE html>
<head>
<title>Gallery</title>
<!-- library CSS fancybox -->
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
<!-- library JS -->
<script src="//code.jquery.com/jquery-3.2.0.min.js"></script>
<!-- library JS fancybox -->
<script src="fancybox/jquery.fancybox.js"></script>

<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>

<style type="text/css">
body {
  margin: auto;
}

.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
nav {
  top: 0px;
  background-color: #474443;
  height: 70px;
  width: 100%;
  display: flex;
  align-items: center;
  position: relative;
}

.logo {
  margin-left: 20px;
  float: left;
  width: 32%;
}

.menu_bar {
  top: 33%;
  position: absolute;
  text-decoration: none;
  color: white;
  font-family: montserrat;
}

.footer {
  color: white;
  background-color: #474443;
  position: fixed;
  height: 50px;
  bottom: 0px;
  width: 100%;
  text-align: center;
  line-height: 50px;
  font-family: montserrat;
}
</style>
</head>
<body>
<nav>
  <a href="index.php"><img src="LOGO FONT.png" class="logo"></a>
  <a href="edukasi.php" class="menu_bar" style="right: 15px;">Edukasi</a>
</nav>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=735461323279579";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
<div class="container" style="margin-left: 17%; margin-top: 7%">
    <div class="gallery">
        <?php
        //Menyertakan file konfigurasi database
        include('konfigDb.php');

        //mengambil gambar dari database
        $query = $db->query("SELECT * FROM gambar ORDER BY diupload DESC");

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageThumbURL = 'gambar/thumb/'.$row["nama_file"];
                $imageURL = 'gambar/'.$row["nama_file"];
        ?>
            <a href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["judul"]; ?>" >
                <img src="<?php echo $imageThumbURL; ?>" alt="" />
            </a>
        <?php }
        } ?>
    </div>
</div>
<div class="footer">PSYCA 2017</div>
</body>
</html>
