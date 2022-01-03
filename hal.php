<?php
// session_start();
unset($_SESSION['username']);
require_once 'config.php';
require_once 'page.php';
include "tanggal.php";
include 'head.php';
?>

<body onload="initialize(); addMarkers()" >
<div id="wrapper">
  <!-- start header -->
  <header>
      <div class="top" hidden="">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="topleft-info">
                <li><i class="fa fa-phone"></i> +62 088 999 123</li>
              </ul>
            </div>
            <div class="col-md-6">
            <div id="sb-search" class="sb-search">
              <form>
                <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                <input class="sb-search-submit" type="submit" value="">
                <span class="sb-icon-search" title="Click to start searching"></span>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>  
      
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="user/img/logo.png" alt="" width="100" height="70" /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><i class="fa fa-home fa-sw"></i> Beranda </a></li>
                        <li><a href="pengunjung.php?hal=rute_wisata_user"> Rute Sekolah </a></li>
                        <li><a href="pengunjung.php?hal=info_wisata"> Info Lokasi Sekolah </a></li>
                        <li><a href="pengunjung.php?hal=hubungi"> Contact </a></li>
                        <li><a href="pengunjung.php?hal=login"> Login <i class="fa fa-user"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
  </header>
  <!-- end header -->

  <!--content-->
<?php include 'slider.php'; ?>



  <footer>
  <div class="container">
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>
              <span>&copy; Copyright © 2022 FALIS</span>            
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="social-network">
            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


<?php include 'script.php'; ?>