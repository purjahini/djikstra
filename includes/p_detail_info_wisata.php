
<?php
$link_list='?hal=detail_info';
$q="select * from berita  where id_berita=$_GET[id]";
$q=mysqli_query($con,$q);
?>

<?php 
		$h=mysqli_fetch_array($q);
		$id=$h['id_berita'];
    $isi_berita = nl2br($h[berita]); ?>
 <section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
          <li><a href="#">Detail Berita Wisata</a></li>
        </ul>
      </div>
    </div>
  </div>
  </section>

<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <article>
            <div class="post-image">
              <div class="post-heading">
                <h3><a href="#"><?php echo $h['judul']; ?></a></h3>
              </div>
              <img src=foto_berita/<?php echo $h['gambar']; ?> alt="" class="img-responsive" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 800px; height : 550px;"/>
            </div>
            <p>
               <?php echo $isi_berita; ?>
            </p>
            <div class="bottom-article">
              <ul class="meta-post">
                <li><i class="fa fa-calendar"></i><a href="#"><?php echo $h['tanggal']; ?></a></li>
                <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
              </ul>
              <a href="pengunjung.php?hal=info_wisata" class="readmore pull-right"><i class="fa fa-angle-left"></i> Back </a>
            </div>
        </article>
      </div>
    </div>
  </div>
</section>
