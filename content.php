<?php include "tanggal.php"; ?>
<?php include "header.php"; ?>

<body onload="initialize(); addMarkers()">
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dashboard :: Kelola Wisata ::</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?> <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?hal=ubah_password"><i class="fa fa-gear fa-fw"></i> Ubah Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <div class="page-header"></div>
                        </li>
                        <li>
                            <a href="./"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Map Setting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="?hal=data_kategori">Kategori Peta</a></li>
                                <li><a href="?hal=data_peta">Peta Wisata</a></li>
                                <li><a href="?hal=data_rute">Setting Rute</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="?hal=data_berita"><i class="fa fa-rss fa-fw"></i> Berita</a>
                        </li>
                        <li>
                            <a href="?hal=buku_tamu"><i class="fa fa-book fa-fw"></i> Contact </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-12" id="content_wrap">
                	<!--content-->
                	<div id="content">
            		
            		<?php eval($CONTENT_["main"]);?>
            			
            		</div>
            		<div id="sidebar"></div>
            		<div class="clear"></div>
            	</div>

        	</div>

        	<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"></h3>
                    <h5 align="center">&copy; Copyright © 2019 OGGY</h5>
                </div>
            </div>
        </div>

</body>

<!-- Mirrored from charismaticmedia.com/themes/prolucrative/blue/about.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 04 Jul 2014 23:40:29 GMT -->
</html>
