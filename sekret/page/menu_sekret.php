<?php
    require_once "../config/config.php";
    require_once "header_menu.php";
    /*include ('secure/secure_admin.php');
    $admin ="SELECT * FROM admin where email = '".$_SESSION['FULLNAME']."'";
    $result_al=$db->execute($admin);
    $admin_foto = $result_al->fields["foto"]; 
	 <li>
                <a href="../../bendahara/rekap.xlsx">Bendahara</a>
            </li>
   */
?>
<style type="text/css">
    body{margin-top: 60px}
    ul.side-nav>li>a, .side-nav>li.dropdown>ul.dropdown-menu>li>a{
        padding-top: 20px;
        padding-bottom: 20px;
        color: white;
        font-size: 16px
    }
    ul.side-nav>li>a:hover, li.user-dropdown.open>a:focus,li.user-dropdown>a:focus, li.user-dropdown.open>a:active{
        background-color: #6CB64B;
        color: white
    }
    .container-nav{
        padding:20px;
    }
    .sekret-side{
        background-color: #408140 !important;
        margin-bottom:0px;
    }
    @media only screen and (max-width: 768px) {
        .sekret-side{
            display:flex;
            overflow-x:scroll;
            -ms-overflow-style: none; /* for Internet Explorer, Edge */
            scrollbar-width: none; /* for Firefox */
            overflow-y: scroll; 
        }
        .sekret-side>li{
            flex:1;
            width:fit-content;
        }
        .sekret-side>li>a{
            display:inline-block;
            white-space:nowrap;
            gap:2px;
        }
        .container-nav{
            padding:0px;
            padding-top:10px;
        }
        .sekret-side>.user-dropdown>.dropdown-menu{
            background-color: #408140 !important;
            margin-bottom:0px;
            position: relative;
            top:0;
            box-shadow:none;
            border:none
        }
        .sekret-side>.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover{
            background-color: #6CB64B;
        }
    }
</style>
<div id="wrapper">
    <div class="" >
        <ul class="nav navbar side-nav sekret-side">
			<li>
                <a href="menu_sekret.php?a=data_saba"><i class="fa fa-dashboard"></i> Data Santri Baru</a>
            </li>
           <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list-ol"></i> Input Data <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li> <a href="menu_sekret.php?a=form_sekret">Input Data Santri</a></li>
					<li><a href="menu_sekret.php?a=import_santri"> Import Data Santri</a></li>
                                      
                </ul>
            </li>
			 <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i> Update Data <b class="caret"></b></a>
                <ul class="dropdown-menu">
            
				<li>
					<a href="menu_sekret.php?a=form_kelas"><i class="glyphicon glyphicon-search"></i> Update Data Kelas</a>
				</li>
				<li>
					<a href="menu_sekret.php?a=cek_data"><i class="glyphicon glyphicon-search"></i> Update Data Diri</a>
				</li>
            </ul>
			</li>
            <li>
                <a href="menu_sekret.php?a=form_cek"><i class="glyphicon glyphicon-search"></i> Cek Data</a>
            </li>
            <li>
                <a href="menu_sekret.php?a=form_keluar"><i class="fa fa-power-off"></i> Penjejakan</a>
            </li>
			<li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i> Laporan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="sekret/import_data_santri_malang_pasuruan_blitar.php" target="_blank">Jaga Ramadhan</a></li>
                   	<li><a href="menu_sekret.php?c=lap_form_M"> Data Mutakhorijin</a></li>
				    <li> <a href="menu_sekret.php?a=lap_detail&k=1"> Detail Data Santri</a></li>
                    <li> <a href="menu_sekret.php?a=cetak_kartu_santri"> Cetak Kartu Santri</a></li>
                </ul>
            </li>
            
			<li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard"></i> Unduh<b class="caret"></b></a>
                <ul class="dropdown-menu">
				<li><a href="menu_sekret.php?a=lap_form&k=1">Santri PPMH(pdf)</a></li>
                <li><a href="sekret/santri_ppmh.php">Santri PPMH(xls)</a></li>
				<li><a href="sekret/santri_baru.php">Santri Baru PPMH(xls)</a></li>
				<li><a href="sekret/santri_baru_lib.php">Anggota Perpus Baru(xls)</a></li>
				<li><a href="sekret/siswa_mmh.php">Siswa MMH</a></li>
				<li><a href="sekret/import_data_wisudawan_mmh.php">Wisudawan MMH</a></li>
            </ul>
			</li>
           
            <li>
                <a href="sekret/laporan_kts.php" target="_blank"><i class="glyphicon glyphicon-print"></i> Laporan KTS</a>
            </li>
            
            <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench fa-fw"></i> Admin <b class="caret"></b></a>
                <ul class="dropdown-menu" style="padding-bottom: 100px">
                    <li> <a href="menu_sekret.php?a=user">Pengguna</a> </li>
                    <li> <a href="menu_sekret.php?a=add_komplek">Komplek</a></li>
                    <li> <a href="menu_sekret.php?a=add_kamar">Kamar</a></li>
                    <li> <a href="menu_sekret.php?a=kelas">Kelas</a> </li>
                    <li> <a href="menu_sekret.php?a=status">Status Santri</a>  </li>
                    <li> <a href="menu_sekret.php?a=kegiatan">Kegiatan</a> </li>
                    <li> <a href="menu_sekret.php?a=pelanggaran">Pelanggaran</a>  </li>       
                </ul>
            </li>
           
        </ul>
    </div>
    <div class="container-nav">
        <?php
			if(!empty($_GET['a'])){
                $pages_dir='sekret';
                $sekret = scandir($pages_dir,0);
                unset($sekret[0], $sekret[1]);
                
                $a = $_GET['a'];
                if(in_array($a.'.php', $sekret)){
                    include($pages_dir.'/'.$a.'.php');
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
                }
            }else if(!empty($_GET['m'])){
                $pages_dir='home_page';
                $sekret = scandir($pages_dir,0);
                unset($sekret[0], $sekret[1]);
                
                $m = $_GET['m'];
                if(in_array($m.'.php', $sekret)){
                    include($pages_dir.'/'.$m.'.php');
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
                }
            
            }else if(!empty($_GET['b'])){
                $pages_dir='sekret/lap_detail';
                $lap_detail = scandir($pages_dir,0);
                unset($lap_detail[0], $lap_detail[1]);
                
                $b = $_GET['b'];
                if(in_array($b.'.php', $lap_detail)){
                    include($pages_dir.'/'.$b.'.php');
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
                }
            }else if(!empty($_GET['c'])){
                $pages_dir='sekret/lap_form';
                $lap_form = scandir($pages_dir,0);
                unset($lap_form[0], $lap_form[1]);
                
                $c = $_GET['c'];
                if(in_array($c.'.php', $lap_form)){
                    include($pages_dir.'/'.$c.'.php');
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
                }
            }else{
                include('sekret/form_sekret.php');
            }
        ?>
    </div>
</div>
</body>
</html>