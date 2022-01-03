<?php
// session_start();
error_reporting(0);
ob_start();
// List Peta Wisata
$list_kategori=array();
$q="SELECT * FROM peta_wisata order by id_wisata";
$q=mysqli_query($con,$q);
while($h=mysqli_fetch_array($q)){
	if($h['id_wisata']==$id_wisata){$s=' selected';}else{$s='';}
	$list_wisata.='<option value="'.$h['id_wisata'].'"'.$s.'> - '.$h['nama'].'</option>';
}

$kategori_query="SELECT * FROM kategori";
$kategori_result=mysqli_query($con,$kategori_query);

while($kategori=mysqli_fetch_array($kategori_result)){
  $list_kategori.='<option value="'.$kategori['id_kategori'].'"'.$s.'> - '.$kategori['nama_kategori'].'</option>';
}


?>

<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Rute Sekolah</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="content">
	<div class="container">
		<div class="row">
			<form action="" name="" method="post" enctype="multipart/form-data">
				<input name="id" type="hidden" value="<?php echo $id;?>">
				<input name="action" type="hidden" value="<?php echo $action;?>">
<?php
if(!empty($error)){
  echo '
     <div class="alert alert-error ">
      '.$error.'
     </div>
  ';
}
?>
			<div class="col-lg-12">
        <div class="row">
  				<div class="col-lg-1"></div>
  				<div class="col-lg-2">
  				<div class="form-group">
  					<label>Lokasi Awal</label>
  				</div>
  				</div>
  				<div class="col-lg-7">
  					<div class="form-group">
  						<select name="id_lokasi_awal" class="col-xs-12 col-sm-4 col-md-4 col-lg-12" required="">
  							<option value="#">-- Tempat Sekolah Asal --</option><?php echo $list_wisata;?>
  						</select>
  					</div>
  				</div>
  				<div class="col-lg-2"></div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-2">
          <div class="form-group">
            <label>Kategori Sekolah</label>
          </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
              <select name="id_kategori" class="col-xs-12 col-sm-4 col-md-4 col-lg-12" required="">
                <option value="#">-- Kategori --</option><?php echo $list_kategori;?>
              </select>
            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>
			</div><br>
			<div class="col-lg-12">
				<div class="col-lg-1"></div>
				<div class="col-lg-2"></div>
				<div class="col-lg-7">
				<div class="form-group">
					<button type="submit" name="lihat_rute" class="btn btn-info btn-rounded btn-sm"><i class="icon-check"></i> Lihat Rute</button> 
					<button type="button" name="cancel" class="btn btn-warning btn-rounded btn-sm" onClick="location.href='<?php echo $link_list;?>'">Batal</button>
				</div>
				</div>
			</div>
	</form>
	</div>
	</div>

<?php

if(isset($_POST['lihat_rute'])){

  $awal_query="SELECT * from peta_wisata WHERE id_wisata = ".$_POST['id_lokasi_awal'];
  $awal_result = mysqli_query($con,$awal_query);
  $awal=mysqli_fetch_assoc($awal_result);


  $kategori_result=mysqli_query($con,$rute_query);
  $rutes = [];
  while($rute=mysqli_fetch_array($kategori_result)){
    $temp = [];
    $temp['id_wisata'] = $rute['id_kategori'];
    $temp['nama'] = $rute['nama'];
    $temp['lat'] = $rute['lat'];
    $temp['lng'] = $rute['lng'];
    $temp['alamat'] = $rute['alamat'];
    $temp['gambar'] = $rute['gambar'];
    $temp['km'] = $rute['km'];
    $temp['waktu'] = $rute['waktu'];

    $rutes[] = $temp;
  }

  $all_rute_query="SELECT *, CAST(TRIM(TRAILING ' km' FROM km) AS DECIMAL(10,1)) as km_angka FROM rute
  LEFT JOIN peta_wisata AS tujuan ON rute.id_lokasi_tujuan = tujuan.id_wisata
  WHERE tujuan.id_kategori = ".$_POST['id_kategori']."
  ORDER BY km_angka ASC";

  $all_rute_result=mysqli_query($con,$all_rute_query);
  $all_rute = [];
  while($route=mysqli_fetch_array($all_rute_result)){
    $temp = [
      'id_lokasi_awal' => $route['id_lokasi_awal'],
      'id_lokasi_tujuan' => $route['id_lokasi_tujuan'],
      'waktu' => $route['waktu'],
      'km' => $route['km'],
      'lokasi_awal' => $route['lokasi_awal'],
      'lokasi_tujuan' => $route['lokasi_tujuan'],
      'lat' => $route['lat'],
      'lng' => $route['lng'],
    ];
    $all_rute[$route['id_lokasi_awal']][] = $temp;
  }

?>

   <div class="container">
     <hr class="colorgraph">
     <div class="row">
       <div class="col-lg-12">
         <div class="form-group">
           <br>
           <h3 align="center">Solusi Sekolah Kunjungan Berikutnya</h3>
           <table class="table table-striped table-hover table-bordered" width="1017">
             <thead>
               <tr>
                 <th>NO</th>
                 <th>Sekolah Awal</th>
                 <th>Sekolah Tujuan</th>
                 <th>Jarak Tempuh</th>
                 <th>#</th>
               </tr>
             </thead>
             <tbody>
              <?php
              $visited = [];
              $stop = false;
              $no = 1;
              while (!$stop) {
                if (!$before) {
                  $before = $awal;
                  $before['id_lokasi_awal'] = $awal['id_wisata'];
                  $before['lokasi_tujuan'] = $awal['nama'];
                  $visited[] = $awal['id_wisata'];
                  if (isset($all_rute[$awal['id_wisata']][0])) {
                    $next = $all_rute[$awal['id_wisata']][0];
                    
                  }
                  continue;
                }

                $now = $next;
                $next = NULL;

                ?>
                <tr>
                 <td><?php echo $no; ?></td>
                 <td><?php echo $before['lokasi_tujuan']; ?></td>
                 <td><?php echo $now['lokasi_tujuan']; ?></td>
                 <td><?php echo $now['km']; ?></td>
                 <td>
                  <button class="btn btn-primary btn-rounded btn-sm" onClick="calcRoute('<?php echo $before['lat']; ?>', '<?php echo $before['lng']; ?>', '<?php echo $now['lat']; ?>', '<?php echo $now['lng']; ?>')">Lihat Jalur</button></td>
                </tr>
                <?php


                $visited[] = $now['id_lokasi_tujuan'];
                $before = $now;
                foreach ($all_rute[$now['id_lokasi_tujuan']] as $tujuan) {
                  if (!in_array($tujuan['id_lokasi_tujuan'], $visited)) {
                    $next = $tujuan;
                    break;
                  }
                }
                if ($next == NULL) {
                  break;
                }
                $no++;
              }

              ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>

   </div>
   <div id="map" style="width: 100%; height: 600px;"></div>
      <!--map-->
      
      <?php } else {

      $locations = mysql_query("SELECT * FROM peta_wisata,kategori where peta_wisata.id_kategori=kategori.id_kategori");
      while ($locat = mysql_fetch_array($locations))
      {
      
        $ids .= $locat['id_wisata'].";;";
        $juds .= $locat['judul_seo'].";;";
        $lats .= $locat['lat'].";;";
        $lngs .= $locat['lng'].";;";
        $addresses .= $locat['alamat'].";;";
        $names .= $locat['nama'].";;";
        $descrs .= $locat['deskripsi'].";;";
        $gambars .= $locat['gambar'].";;";
        $jens .= $locat['jenis'].";;";      
        $i++;
        
      
      }
      
      echo " 
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

        echo '<div id="map_canvas2" style="width: 100%; height: 500px;"></div>
              '; }
       ?>
  </section> <!--ENDSECTION CONTent-->

<script crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript"  async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Xd4GJtDxGPUI7nlMV-I99x5EQqYqhGc&callback=init"></script>
<script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


<?php if(isset($_POST['lihat_rute'])){?>
<script type="text/javascript">
  var awal;

  var geocoder;
  var map;

  var directionsDisplay;
  var directionsService;

  var center;
  $(document).ready(function() {
    awal = <?php echo json_encode($awal);?>;
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();
    center = new google.maps.LatLng(awal.lat, awal.lng);
    // define map options
    var myOptions = {
      zoom: 14,
      center: center,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      
    };
    // initialize map
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    directionsDisplay.setMap(map);

    var asal = {lat: awal.lat, lng: awal.lng};
    var marker = new google.maps.Marker({position: center, map: map});

    // menambahkan pendengar acara ketika pengguna mengklik pada peta
    google.maps.event.addListener(map, 'click', function(event) {

    });
  });
  function calcRoute(latAsal,lngAsal, latTujuan, lngTujuan) {
      var start = new google.maps.LatLng(latAsal, lngAsal);
      var end = new google.maps.LatLng(latTujuan, lngTujuan);;
      var request = {
        origin: start,
        destination: end,
        travelMode: 'DRIVING'
      };
      directionsService.route(request, function(result, status) {
        if (status == 'OK') {
          directionsDisplay.setDirections(result);
        }
      });
    }
</script>

<?php } ?>