<?php
error_reporting(0);
ob_start();
$link_list='?hal=data_peta';
$link_update='?hal=update_peta';
include "fungsi_thumb.php";
$kode='';
$nama='';
if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	//echo $action;
	//exit;
	
	$nama=$_POST['nama'];
	$deskripsi=$_POST['deskripsi'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$alamat=$_POST['alamat'];
	$id_kategori=$_POST['kategori'];
	$jenis='wisata.png';
	
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
 	$tipe_file      = $_FILES['fupload']['type'];
  	$nama_file      = $_FILES['fupload']['name'];
 	
  
	
	if(empty($nama) or empty($deskripsi) or empty($id_kategori) or empty($lat) or empty($lng)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
	
				UploadImage($nama_file);
				$q="insert into peta_wisata(id_kategori,nama,deskripsi,lat,lng,alamat,gambar) values('".$id_kategori."','".$nama."', '".$deskripsi."','".$lat."','".$lng."','".$alamat."','".$nama_file."')";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			
		}
		if($action=='edit'){
			$q=mysqli_query($con,"select * from peta_wisata where id_wisata='".$id."'");
			$h=mysqli_fetch_array($q);
			if (!empty($lokasi_file)){
  				UploadImage($nama_file);
				$q="update peta_wisata set id_kategori='".$id_kategori."',nama='".$nama."', deskripsi='".$deskripsi."',lat='".$lat."',lng='".$lng."',alamat='".$alamat."',gambar='".$nama_file."' where id_wisata='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
			else{
		$q="update peta_wisata set id_kategori='".$id_kategori."',nama='".$nama."', deskripsi='".$deskripsi."',lat='".$lat."',lng='".$lng."',alamat='".$alamat."' where id_wisata='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($con,"select * from peta_wisata where id_wisata='".$id."'");
		$h=mysqli_fetch_array($q);
		$nama=$h['nama'];
		$id_kategori=$h['id_kategori'];
		$deskripsi=$h['deskripsi'];
		$lat=$h['lat'];
		$lng=$h['lng'];
		$alamat=$h['alamat'];
		$gambar=$h['gambar'];
		
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($con,"delete from peta_wisata where id_wisata='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


// List Kategori 
$list_kategori=array();
$q="select * from kategori order by id_kategori";
$q=mysqli_query($con,$q);
while($h=mysqli_fetch_array($q)){
	if($h['id_kategori']==$id_kategori){$s=' selected';}else{$s='';}
	$list_kategori.='<option value="'.$h['id_kategori'].'"'.$s.'>'.$h['id_kategori'].' - '.$h['nama_kategori'].'</option>';
}
?>

<?php 
if($_GET['action'] == 'edit'){
$cetak='Edit';
}
else{
$cetak='Tambah';

}

?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<style type="text/css">
	img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 180px;
  height : 150px;
</style>

<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?php echo $cetak ?> Data Peta Sekolah</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
                                    <input name="id" type="hidden" value="<?php echo $id;?>">
                                    <input name="action" type="hidden" value="<?php echo $action;?>">
                                    <?php
                                        if(!empty($error)){ 
                                            echo '<div class="alert alert-danger alert-dismissable">'.$error.'</div>';
                                        } ?>
                                    	<div class="form-group">
                                            <label>Nama Sekolah </label>
                                            <input class="form-control" type="text" value="<?php echo $nama;?>" name="nama" required>
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori Sekolah</label>
                                            <select class="form-control" name="kategori">
                                                <option value>--Pilih Kategori Sekolah--</option>
                                                <?php echo $list_kategori;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" rows="3" name="deskripsi" id="textarea"><?php echo $deskripsi;?></textarea>
                                        </div>
                                        <div class="row">
                                        	<div class="col-lg-12">
                                        	<div class="pull-left">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" name="lat" id="lat" type="text" value="<?php echo $lat;?>" readonly="readonly" >
                                        </div>
                                    		</div>
                                        	<div class="pull-right">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" name="lng" type=text id="long" value="<?php echo $lng;?>" readonly="readonly" >
                                        </div>
                                    		</div>
                                    	</div>
                                    	</div>
                                        <div class="form-group">
                                            <label>Alamat Lokasi</label>
                                            <input class="form-control" name="alamat" type="text"  id="address" value="<?php echo $alamat;?>" readonly="readonly" >
                                            <p class="form-control-static">* Lat-Lang serta Alamat otomatis tampil ketika peta di Atas Anda Klik</p>
                                        </div>
                                        <?php
                                         if($_GET['action'] == 'edit'){
                                         	?>
                                         		<div class="form-group">
                                         			<label>Gambar</label><br>
                                                    <img img src="foto_berita/<?php echo $gambar;?>" >
                                                </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Upload Gambar</label>
                                            <input type="file" name='fupload'>
                                            <p class="form-control-static">* Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</p>
                                        </div>
                                        <button type="submit" name="save" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button> 
                                        <button type="button" name="cancel" class="btn btn-warning" onClick="location.href='<?php echo $link_list;?>'">Batal</button>
                                    </form>
                                </div>
                                <br>
                                <div class="col-lg-6">
                                	<div id="map_canvas" style="border: 1px solid #ddd; border-radius: 4px; padding: 3px;">
                                	</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
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