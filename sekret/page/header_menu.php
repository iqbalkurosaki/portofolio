<?php
    if (!session_id()) {
        session_start();
    }
    if (isset($_SESSION['level'])) {
        if ($_SESSION['level'] == "admin") {

        } else {
            header('Location: ../index.php');
        }
    } else {
        header('Location: ../index.php');
    }
    error_reporting(0); 
    
    function decode($teks){
        return html_entity_decode($teks,ENT_QUOTES);
    };
    function code($teks){
        return htmlentities($teks,ENT_QUOTES);
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi PPMH</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/modal.js"></script>

    <style type="text/css">
        @media only screen and (max-width: 1092px) {
            #nav-kiri {
                margin-top: 50px;
            }
        }
        @media only screen and (max-width: 768px) {
            #nav-kiri {
                margin-top: 200px;
            }
            .navbar-header{
                display:flex;
                width:100vw;
                justify-content:space-between;
                margin:0px;
                flex-direction:row-reverse
            }
            .navbar{
                padding:0px;
                background-color:white
            }
            .navbar-brand{
                margin:0px
            }
            .navbar-collapse{
                border:none
            }
        }
        @media only screen and (max-width: 468px) {
            #nav-kiri {
                margin-top: 250px;
            }
        }
        .bg_hijau{
            background-color: #408140;
            color: white;
        }
        .txt_hijau{
            color: #408140
        }
        ul.navbar-right>li.dropdown>a, ul.navbar-right>li.dropdown.open>a{
            color: #408140;
            font-weight: bold
        }
        ul.navbar-right>li.dropdown>a:hover, ul.navbar-right>li.dropdown.open>a:focus{
            background-color: #6CB64B;
            color: white
        }
        .navbar-toggle{
            background-color:#408140
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top shadow-lg" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btn btn-dark" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu_sekret.php"><strong><font color="#348A2B"><img src="../img/logo.png" width="24"> SIAKAD PP. Miftahul Huda</font></strong></a>
            </div>
            <ul class="nav navbar-nav navbar-right navbar-user collapse navbar-collapse navbar-ex1-collapse" >
                <li class="dropdown messages-dropdown">
                   <a href="menu_sekret.php?m=pengumuman">
                        <span class="avatar"><i class="fa fa-bullhorn"></i></span>
                        <span class="message">Pengumuman</span>
                    </a>
                </li>
                <li class="dropdown messages-dropdown">
                    <a href="menu_sekret.php?m=pertanyaan">
                        <span class="avatar"><i class="glyphicon glyphicon-question-sign"></i></span>
                        <span class="message">Pertanyaan</span>
                    </a>
                </li>
                <li class="dropdown messages-dropdown">    
                    <a href="menu_sekret.php?m=petunjuk">
                        <span class="avatar"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <span class="message">Pentunjuk</span>
                    </a>
                </li>
                <li class="dropdown messages-dropdown">
                    <a href="menu_sekret.php?m=biaya_santri">
                        <span class="avatar"><i class="glyphicon glyphicon-usd"></i></span>
                        <span class="message">Administrasi</span>
                    </a>
                </li>
                <li class="dropdown messages-dropdown">
                    <a href="menu_sekret.php?m=kapasitas">
                        <span class="avatar"><i class=" glyphicon glyphicon-scale"></i></span>
                        <span class="message">Kapasitas</span>
                    </a>
                </li>
                <li class="dropdown user-dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " ".strtoupper($_SESSION['level'])." ".$_SESSION['username']; ?><b class="caret"></b></a>
                   <ul class="dropdown-menu">
                       <li><a href="menu_sekret.php?m=pendaftaran"><i class="fa fa-user"></i> Pendaftaran</a></li>
                       <li class="divider"></li>
                       <li><a href="menu_sekret.php?m=logout"><i class="fa fa-power-off"></i> Keluar</a></li>
                   </ul>
               </li>
            </ul>
        </nav>
