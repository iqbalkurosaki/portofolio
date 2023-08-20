<?php
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['level'])) {
} else {
    if ($_SESSION['level'] == "admin") {
        header('Location: ../page/menu_sekret.php');
    }
}
error_reporting(0);

function decode($teks)
{
    return html_entity_decode($teks, ENT_QUOTES);
};
function code($teks)
{
    return htmlentities($teks, ENT_QUOTES);
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik PPMH</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script> -->

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
        }

        @media only screen and (max-width: 468px) {
            #nav-kiri {
                margin-top: 250px;
            }
        }

        ul.navbar-right>li.dropdown>a:hover,
        ul.navbar-right>li.dropdown.open>a:focus {
            background-color: #6CB64B;
            color: white
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: white;padding-right:  40px;padding-left:  10px;vertical-align: middle;box-shadow: -12px -12px 40px grey">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><strong>
                    <font color="black">Sistem Informasi Akademik PP. Miftahul Huda</font>
                </strong></a>
        </div>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">

                <a href="index.php?m=pengumuman">
                    <span class="avatar"><i class="fa fa-bullhorn"></i></span>
                    <span class="message">Pengumuman</span>
                </a>
            </li>
            <li class="dropdown messages-dropdown">

                <a href="index.php?m=pertanyaan">
                    <span class="avatar"><i class="fa fa-bell"></i></span>
                    <span class="message">Pertanyaan</span>
                </a>
            </li>
            <li class="dropdown messages-dropdown">

                <a href="index.php?m=petunjuk">
                    <span class="avatar"><i class="fa fa-bell"></i></span>
                    <span class="message">Petunjuk</span>
                </a>
            </li>

            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Pengguna<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../index.php"><i class="fa fa-user"></i> Pendaftaran</a></li>

                    <li class="divider"></li>
                    <li><a href="index.php?m=login"><i class="fa fa-power-off"></i> Masuk</a></li>
                </ul>
            </li>
        </ul>

    </nav>