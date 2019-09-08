<?php
$link_list='?hal=detail_info';
$q="SELECT * FROM berita order by id_berita LIMIT 3";
$q=mysqli_query($con,$q); ?>

  
<section id="featured" class="bg">
      
  <!-- start slider -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
  <!-- Slider -->
  
        <div id="main-slider" class="main-slider flexslider">
            <ul class="slides">
             <?php while($h=mysqli_fetch_array($q)){ ?>
             <?php
             $id=$h['id_berita'];
             $isi_berita = nl2br($h['berita']); // membuat paragraf pada isi berita
             $isi = substr($isi_berita,0,200); // ambil sebanyak 150 karakter
             $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat ?>
              <li>
                <img src=foto_berita/<?php echo $h['gambar']; ?> alt="" style="height : 500px;" />
                <div class="flex-caption">
                    <h3><?php echo $h['judul']; ?></h3> 
                    <p><?php echo $isi; ?></p> 
                    <a href="pengunjung.php?hal=detail_info_wisata&id=<?php echo $id ?>" class="btn btn-theme">Read More</a>
                </div>
              </li>
              <?php } ?>
            </ul>
        </div>
  <!-- end slider -->
      </div>
    </div>
  </div>  


  </section>