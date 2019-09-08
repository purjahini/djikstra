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
	$list_wisata.='<option value="'.$h['nama'].'"'.$s.'> - '.$h['nama'].'</option>';
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
          <li class="active">Rute Wisata</li>
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
  						<select name="lokasi_awal" class="col-xs-12 col-sm-4 col-md-4 col-lg-12" required="">
  							<option value="#">-- Objek Wisata Asal --</option><?php echo $list_wisata;?>
  						</select>
  					</div>
  				</div>
  				<div class="col-lg-2"></div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-2">
          <div class="form-group">
            <label>Kategori Wisata</label>
          </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
              <select name="lokasi_awal" class="col-xs-12 col-sm-4 col-md-4 col-lg-12" required="">
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
$lokasi_awal=$_POST['lokasi_awal'];
//awal
$Awal = "SELECT lat, lng, lokasi_awal, lokasi_tujuan, km FROM rute INNER JOIN peta_wisata ON rute.lokasi_awal = peta_wisata.nama WHERE lokasi_awal = '$lokasi_awal' HAVING(km) < 10 ORDER BY km LIMIT 1";
$get_awal = mysqli_query($con, $Awal);
$res_awal = mysqli_fetch_array($get_awal);
$awal = $res_awal['lokasi_awal'];
$tujuan = $res_awal['lokasi_tujuan'];
$km = $res_awal['km'];
$opoly.='value="'.$res_awal['lat'].','.$res_awal['lng'].'"';

$a = "SELECT * FROM peta_wisata WHERE nama = '$tujuan'";
$b = mysqli_query($con, $a);
$c = mysqli_fetch_array($b);
$ppoly.='value="'.$c['lat'].','.$c['lng'].'"';

//lokasi2
$lok2 = "SELECT lat, lng, lokasi_awal, lokasi_tujuan, km FROM rute INNER JOIN peta_wisata ON rute.lokasi_awal = peta_wisata.nama WHERE lokasi_awal = '$tujuan' AND lokasi_tujuan != '$awal' HAVING(km) < 10 ORDER BY km LIMIT 1";
$get_lok2 = mysqli_query($con,$lok2);
$res_lok2 = mysqli_fetch_array($get_lok2);
$lokasi2  = $res_lok2['lokasi_awal'];
$tujuan2  = $res_lok2['lokasi_tujuan'];
$km2      = $res_lok2['km']; 
$opoly2.='value="'.$res_lok2['lat'].','.$res_lok2['lng'].'"';

$a1 = "SELECT * FROM peta_wisata WHERE nama = '$tujuan2'";
$b1 = mysqli_query($con, $a1);
$c1 = mysqli_fetch_array($b1);
$ppoly2.='value="'.$c1['lat'].','.$c1['lng'].'"';

//lokasi3
$lok3 = "SELECT lat, lng, lokasi_awal, lokasi_tujuan, km FROM rute INNER JOIN peta_wisata ON rute.lokasi_awal = peta_wisata.nama WHERE lokasi_awal = '$tujuan2' AND lokasi_tujuan != '$lokasi2' AND lokasi_tujuan != '$awal' HAVING(km) < 10 ORDER BY km LIMIT 1";
$get_lok3 = mysqli_query($con,$lok3);
$res_lok3 = mysqli_fetch_array($get_lok3);
$lokasi3  = $res_lok3['lokasi_awal'];
$tujuan3  = $res_lok3['lokasi_tujuan'];
$km3      = $res_lok3['km'];
$opoly3.='value="'.$res_lok3['lat'].','.$res_lok3['lng'].'"';

$a2 = "SELECT * FROM peta_wisata WHERE nama = '$tujuan3'";
$b2 = mysqli_query($con, $a2);
$c2 = mysqli_fetch_array($b2);
$ppoly3.='value="'.$c2['lat'].','.$c2['lng'].'"';

?>

   <div class="container">
     <hr class="colorgraph">
     <div class="row">
       <div class="col-lg-12">
         <div class="form-group">
           <br>
           <h3 align="center">Solusi Wisata Kunjungan Berikutnya</h3>
           <table class="table table-striped table-hover table-bordered" width="1017">
             <thead>
               <tr>
                 <th>NO</th>
                 <th>Wisata Awal</th>
                 <th>Wisata Tujuan</th>
                 <th>Jarak Tempuh</th>
                 <th>#</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>1</td>
                 <td><?php echo $awal; ?></td>
                 <td><?php echo $tujuan; ?></td>
                 <td><?php echo $km; ?></td>
                 <td>
                  <input type="hidden" id="start"  <?php echo $opoly; ?>>
                  <input type="hidden" id="end" <?php echo $ppoly; ?>>
                  <button id="onChangeHandler" class="btn btn-primary btn-rounded btn-sm">Lihat Jalur</button></td>
               </tr>
               <tr>
                 <td>2</td>
                 <td><?php echo $lokasi2; ?></td>
                 <td>
                    <?php echo $tujuan2; ?></td>
                 <td><?php echo $km2; ?></td>
                 <td>
                  <input type="hidden" id="start"  <?php echo $opoly2; ?>>
                  <input type="hidden" id="end" <?php echo $ppoly2; ?>>
                  <button id="onChangeHandler1" class="btn btn-primary btn-rounded btn-sm">Lihat Jalur</button></td>
               </tr>
               <tr>
                 <td>3</td>
                 <td><?php echo $lokasi3; ?></td>
                 <td><?php echo $tujuan3; ?></td>
                 <td><?php echo $km3; ?></td>
                 <td>
                  <input type="hidden" id="start" <?php echo $opoly3; ?>>
                  <input type="hidden" id="end" <?php echo $ppoly3; ?>>
                  <button id="onChangeHandler2" class="btn btn-primary btn-rounded btn-sm">Lihat Jalur</button>
                </td>
               </tr>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
      <!--map-->
      <div>
        <div class="col-md-8">
          <div class="card" id="map" style="width: 100%; height: 500px;"></div>
          </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-block" id="panel" style="overflow-y: scroll;height: 490px;"></div>
          </div> 
        </div>
      </div>
      <?php }

      else {
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
  </section>

<script crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript"  async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Xd4GJtDxGPUI7nlMV-I99x5EQqYqhGc&callback=init"></script>
<script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script>
        function init() {
        var polyOptions = [];
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -6.989719, lng: 110.422726}

        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('panel'));

        var onChangeHandler = function() {
        removeLine(polyOptions,directionsDisplay);
        polyOptions = [];
        calculateAndDisplayRoute(directionsDisplay, directionsService,map,polyOptions);
            };
        document.getElementById('onChangeHandler').addEventListener('click', onChangeHandler);

        var onChangeHandler1 = function() {
        removeLine(polyOptions,directionsDisplay);
        polyOptions = [];
        calculateAndDisplayRoute(directionsDisplay, directionsService,map,polyOptions);
            };
        document.getElementById('onChangeHandler1').addEventListener('click', onChangeHandler1);

        var onChangeHandler2 = function() {
        removeLine(polyOptions,directionsDisplay);
        polyOptions = [];
        calculateAndDisplayRoute(directionsDisplay, directionsService,map,polyOptions);
            };
        document.getElementById('onChangeHandler2').addEventListener('click', onChangeHandler2);
      }

      function calculateAndDisplayRoute(directionsDisplay, directionsService, map,polyOptions) {
  directionsService.route({
    origin: document.getElementById('start').value,
    destination: document.getElementById('end').value,
    travelMode: 'DRIVING',
    optimizeWaypoints: false,
    provideRouteAlternatives: true,
    avoidTolls: true,
  }, function(response, status) {
    if (status === 'OK') {
        var pathPoints ;
        var routeLeg;
        for (var i = 0, len = response.routes.length; i < len; i++) {
          routeLeg = response.routes[i].legs[0];
          pathPoints = response.routes[i].overview_path;
          var polyPath = new google.maps.Polyline({
            path: pathPoints,
            strokeColor: "#16a085",
            strokeOpacity: 1.0,
            strokeWeight: 5,
            map: map,
            clickable:true,
          });
          polyOptions.push(polyPath);
          if (i == 0) polyOptions[0].setOptions({
            strokeColor: '#c0392b',
            strokeOpacity: 1.0,
            zIndex: 1
          });
          polyOptions[polyOptions.length - 1].setPath(pathPoints);
          directionsDisplay.setRouteIndex(i);
          directionsDisplay.setDirections(response);
          directionsDisplay.setOptions({ 
            polylineOptions: polyOptions,
            suppressPolylines : true,
          });
          directionsDisplay.setPanel(document.getElementById('panel'));
          directionsDisplay.setMap(map);
          clickLine(polyOptions,directionsDisplay,i);
      }
      clickPanel(polyOptions,directionsDisplay); 
      $("#error").empty();
      $("#error").removeClass();
    } else {
      directionsDisplay.setMap(null);
      directionsDisplay.setPanel(null);
      $("#error").addClass("badge badge-danger");
      $("#error").text("Tidak dapat menemukan nama lokasi, status error: "+status);
    }
  });
}

function removeLine(options,directionsDisplay) {
  for(var i = 0; i < options.length; i++){
    options[i].setMap(null);
    options[i].setVisible(false);
  }
  directionsDisplay.setMap(null);
}

function clickPanel(polyline,directionsDisplay){
  console.log(directionsDisplay.getRouteIndex());
  google.maps.event.addListener(directionsDisplay,'routeindex_changed',function(){
    for (var i = 0; i < polyline.length; i++) {
      polyline[i].setOptions({
        strokeOpacity: 1.0,
        strokeColor: "#16a085",
        zIndex: 0
      });
    }
    if (this.getRouteIndex() < polyline.length) {
      polyline[this.getRouteIndex()].setOptions({
        strokeOpacity: 1.0,
        strokeColor: "#c0392b",
        zIndex: 1
      });
    }
      
  });        
}

function clickLine(polyline,directionsDisplay,index){
 google.maps.event.addListener(polyline[polyline.length - 1], 'click', function(evt) {
   for (var i = 0; i < polyline.length; i++) {
        polyline[i].setOptions({
          strokeOpacity: 1.0,
          strokeColor: "#16a085",
          zIndex: 0
        });
      }
      this.setOptions({
        strokeOpacity: 1.0,
        strokeColor: "#c0392b",
        zIndex: 1
      });
  directionsDisplay.setRouteIndex(index);  
  });
}
    </script>

