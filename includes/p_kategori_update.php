<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

<?php
error_reporting(0);
ob_start();
$link_list='?hal=data_kategori';
$link_update='?hal=update_kategori';
include "fungsi_thumb.php";
$kode='';
$nama='';
if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	//echo $action;
	//exit;
	
	$nama_kategori=$_POST['nama_kategori'];
	
	

	 	$lokasi_file    = $_FILES['fupload']['tmp_name'];
 	 	$tipe_file      = $_FILES['fupload']['type'];
  		$nama_file      = $_FILES['fupload']['name'];
 	
  
	
	if(empty($nama_kategori)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
	
				UploadIcon($nama_file);
				$q="insert into kategori(nama_kategori,jenis) values('".$nama_kategori."', '".$nama_file."')";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			
		}
		if($action=='edit'){
			$q=mysqli_query($con,"select * from kategori where id_kategori='".$id."'");
			$h=mysqli_fetch_array($q);
			if (!empty($lokasi_file)){
  				UploadIcon($nama_file);
				$q="update kategori set nama_kategori='".$nama_kategori."',jenis='".$nama_file."' where id_kategori='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
			else{
			
		$q="update kategori set nama_kategori='".$nama_kategori."' where id_kategori='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($con,"select * from kategori where id_kategori='".$id."'");
		$h=mysqli_fetch_array($q);
		$nama_kategori=$h['nama_kategori'];
		$aktif=$h['aktif'];
		$jenis=$h['jenis'];
		
		
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($con,"delete from kategori where id_kategori='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
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
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?php echo $cetak ?> Kategori Peta</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
                                        <input name="id" type="hidden" value="<?php echo $id;?>">
                                        <input name="action" type="hidden" value="<?php echo $action;?>">
                                        <?php
                                        if(!empty($error)){ 
                                            echo '<div class="alert alert-danger alert-dismissable">'.$error.'</div>';
                                        } ?>
                                        <div class="form-group">
                                            <label>Nama Kategori <span class="required">*</span> </label>
                                            <input class="form-control" placeholder="Enter text" name="nama_kategori" type="text" size="50" value="<?php echo $nama_kategori;?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name='fupload'>
                                            <p class="help-block">* Tipe Icon Harus Tipe PNG</p>
                                        </div>
                                        <br>
                                        <button type="submit" name="save" class="btn btn-success"><i class="icon-ok"></i> Simpan</button> 
                                        <button type="button" name="cancel" class="btn btn-warning" onClick="location.href='<?php echo $link_list;?>'">Batal</button>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <span class="fa-fw"></span>
                                </div>

                                                <?php
                                                if($_GET['action'] == 'edit'){
                                                    ?>
                                <div class="col-lg-3">
                                    <form>
                                        <div class="well">
                                            <div class="form-group">
                                                <label>Icon Peta</label><br><br>
                                                    <img src=icon/<?php echo $h[jenis];?> width=180px height=150px >
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>