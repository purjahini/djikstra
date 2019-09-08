<?php
$link_list='?hal=detail_info';
$q="select * from berita order by id_berita";
$q=mysqli_query($con,$q);

$locations = mysql_query("SELECT * FROM peta_wisata,kategori where peta_wisata.id_kategori=kategori.id_kategori");
		
			// take the locations from the db one by one
			while ($locat = mysql_fetch_array($locations))
			{
				// add lcoation data to info strings
			
			    $ids .= $locat['id_wisata'].";;";
				$juds .= $locat['judul_seo'].";;";
				$lats .= $locat['lat'].";;";
				$lngs .= $locat['lng'].";;";
				$addresses .= $locat['alamat'].";;";
				$names .= $locat['nama'].";;";
				$descrs .= $locat['deskripsi'].";;";
				$gambars .= $locat['gambar'].";;";
				$jens .= $locat['jenis'].";;";

				 
				// show the location name in the right of the map with link that calls the highlightMarker function
			
				$i++;
				
			
			}
			// hidden inputs for saving the info for all the locations in the db
			
            echo" 
			<input type=hidden value='$ids;' id='ids' name='ids'/>
			<input type=hidden value='$juds;' id='juds' name='juds'/>
			<input type=hidden value='$lats;' id='lats' name='lats'/>
			<input type=hidden value='$lngs;' id='lngs' name='lngs'/>
			<input type=hidden value='$addresses;' id='addresses' name='addresses'/>
			<input type=hidden value='$jadwal;' id='jadwal' name='jadwal'/>
			<input type=hidden value='$status;' id='status' name='status'/>
			<input type=hidden value='$names;' id='names' name='names'/>
			<input type=hidden value='$descrs;' id='descrs' name='descrs'/>
			<input type=hidden value='$nops;' id='nops' name='nops'/>
			<input type=hidden value='$gambars;' id='gambars' name='gambars'/>
			<input type=hidden value='$jens;' id='jens' name='jens'/>";
?>
<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Info Lokasi Wiasata</li>
        </ul>
      </div>
    </div>
  </div>
  <div id="map_canvas2" style="width: 100%; height: 550px;"></div>
  </section>
 <section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Berita Wisata</h4>
			</div>
	<?php while($h=mysqli_fetch_array($q)){ ?>
			<div class="col-lg-4">
	<?php	
		$id=$h['id_berita'];
		$isi_berita = nl2br($h[berita]); // membuat paragraf pada isi berita
    	$isi = substr($isi_berita,0,200); // ambil sebanyak 150 karakter
    	$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat ?>
				<h4><?php echo $h['judul']; ?></h4>
				<img src=foto_berita/<?php echo $h['gambar']; ?> alt="" class="img-responsive" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 350px; height : 250px;"/>
				<p><?php echo $isi; ?>
				<a href="pengunjung.php?hal=detail_info_wisata&id=<?php echo $id ?>">Selengkapnya</a>
				</p>

			</div>
	<?php } ?>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
	</div>
</div>
</section>
