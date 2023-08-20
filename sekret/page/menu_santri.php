<!DOCTYPE html>
 <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php
include "header_menu.php";
session_start();
	include('../config/config.php');
	/*
	
	include ('secure/secure_santri.php');
	
		$santri ="SELECT * FROM santri where email = '".$_SESSION['FULLNAME']."'";
		$result_al=$db->execute($santri);
		$santri_foto = $result_al->fields["foto"]; 
		include "header_menu.php";
	
					if(!empty($_GET['a'])){
						$pages_dir='santri';
                		$santri = scandir($pages_dir,0);
						unset($santri[0], $santri[1]);
						
						$a = $_GET['a'];
						if(in_array($a.'.php', $santri)){
                			include($pages_dir.'/'.$a.'.php');
            			} else {
                			echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
            			}
					}else if(!empty($_GET['m'])){
						$pages_dir='home_page';
                		$santri = scandir($pages_dir,0);
						unset($santri[0], $santri[1]);
						
						$m = $_GET['m'];
						if(in_array($m.'.php', $santri)){
                			include($pages_dir.'/'.$m.'.php');
            			} else {
                			echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
            			}
					
					}else if(empty($_GET['m'])&&empty($_GET['a'])){
            			include('santri/default.php');
       				}
					*/
				?>
				 <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
			<a href="menu_santri.php">
					<i class="fa fa-dashboard fa-3x"></i>
                 </a>   
				</li>
			
			 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">3</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="menu_santri.php?m=pengumuman">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Pengumuman
                                </div>
                            </a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="menu_santri.php?m=pertanyaan">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Pertanyaan
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Petunjuk
                                    
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>
			<li>
			 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="menu_santri.php?m=logout"><i class="fa fa-user fa-fw"></i> Keluar</a>
                        </li>
                        
                    </ul>
                    <!-- end dropdown-user -->
                </li>
							
                            
			 <!-- main dropdown -->
                <li class="dropdown">
                   
					</li>
			
            </ul>
            <!-- end navbar-top-links -->
		
        </nav>
        <!-- end navbar top -->
		<!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div>Jonny <strong>Deen</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris Charts</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="timeline.html"><i class="fa fa-flask fa-fw"></i>Timeline</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i>Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i>Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- third-level-items -->
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
		<!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
 <?php
 if(!empty($_GET['a'])){
						$pages_dir='santri';
                		$santri = scandir($pages_dir,0);
						unset($santri[0], $santri[1]);
						
						$a = $_GET['a'];
						if(in_array($a.'.php', $santri)){
                			include($pages_dir.'/'.$a.'.php');
            			} else {
                			echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
            			}
					}else if(!empty($_GET['m'])){
						$pages_dir='home_page';
                		$santri = scandir($pages_dir,0);
						unset($santri[0], $santri[1]);
						
						$m = $_GET['m'];
						if(in_array($m.'.php', $santri)){
                			include($pages_dir.'/'.$m.'.php');
            			} else {
                			echo "<div class='alert alert-danger' role='alert'>Halaman tidak ditemukan! :(</div>";
            			}
					
					}else if(empty($_GET['m'])&&empty($_GET['a'])){
            			include('santri/default.php');
       				}
 ?>
 </div></div></div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57144da80702fb561cdaa6f3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

