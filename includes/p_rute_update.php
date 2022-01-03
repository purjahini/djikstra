<?php
error_reporting(0);
ob_start();
$link_list='?hal=data_rute';
$link_update='?hal=update_rute';
include "fungsi_thumb.php";
$kode='';
$nama='';
if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	//echo $action;
	//exit;
	$lokasi_awal=$_POST['lokasi_awal'];
	$lokasi_tujuan=$_POST['lokasi_tujuan'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$alamat=$_POST['alamat'];
	if(empty($alamat) or empty($lokasi_awal) or empty($lokasi_tujuan) or empty($lat)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}
	
	else{
		if($action=='add'){
				$q="insert into rute_wisata(lokasi_awal,lokasi_tujuan,lat,lng,alamat) values('".$lokasi_awal."','".$lokasi_tujuan."','".$lat."','".$lng."','".$alamat."')";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			
		}
		if($action=='edit'){
			$q=mysqli_query($con,"select * from rute_wisata where id_rute='".$id."'");
			$h=mysqli_fetch_array($q);
			
			
		$q="update rute_wisata set lokasi_awal='".$lokasi_awal."',lokasi_tujuan='".$lokasi_tujuan."',lat='".$lat."',lng='".$lng."',alamat='".$alamat."' where id_rute='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");	
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($con,"select * from rute_wisata where id_rute='".$id."'");
		$h=mysqli_fetch_array($q);
		
		
		$id_wisata1=$h['lokasi_awal'];
		$id_wisata2=$h['lokasi_tujuan'];
		$lat=$h['lat'];
		$lng=$h['lng'];
		$alamat=$h['alamat'];
		
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($con,"delete from rute_wisata where id_rute='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}

// Lokasi awal 

$list_awal=array();
$q="select * from peta_wisata order by id_wisata";
$q=mysqli_query($con,$q);
while($h=mysqli_fetch_array($q)){
	if($h['nama']==$id_wisata1){$s=' selected';}else{$s='';}
	$list_awal.='<option value="'.$h['nama'].'"'.$s.'> '.$h['nama'].'</option>';
}

$list_tujuan=array();
$q="select * from peta_wisata order by id_wisata";
$q=mysqli_query($con,$q);
while($h=mysqli_fetch_array($q)){
	if($h['nama']==$id_wisata2){$s=' selected';}else{$s='';}
	$list_tujuan.='<option value="'.$h['nama'].'"'.$s.'>'.$h['nama'].'</option>';
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
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?php echo $cetak ?> Rute Sekolah</h3>
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
                                            <label>Lokasi Awal</label>
                                            <select class="form-control" name="lokasi_awal">
                                                <option value="#">-- Pilih Lokasi Awal --</option>
                                                <?php echo $list_awal;?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Lokasi Tujuan</label>
                                            <select class="form-control" name="lokasi_tujuan">
                                                <option value="#">-- Pilih Lokasi Tujuan --</option>
                                                <?php echo $list_tujuan;?>
                                            </select>
                                        </div>
                                        <div class="row">
                                        	<div class="col-lg-12">
                                        	<div class="pull-left">
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" name="lat" id="lat" type="text" value="<?php echo $lat;?>" readonly />
                                        </div>
                                    		</div>
                                        	<div class="pull-right">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input class="form-control" name="lng" type=text id="long" value="<?php echo $lng;?>" readonly />
                                        </div>
                                    		</div>
                                    	</div>
                                    	</div>
                                        <div class="form-group">
                                            <label>Alamat Sekolah</label>
                                            <input class="form-control" name="alamat" type="text"  id="address" value="<?php echo $alamat;?>" readonly />
                                            <p class="form-control-static">* Lat-Lang serta Alamat otomatis tampil ketika peta di Atas Anda Klik</p>
                                        </div>
                                        <?php
                                        if($_GET['action'] == 'edit'){
                                        	?>
                                        <?php } ?>
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