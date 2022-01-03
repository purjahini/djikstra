<?php
session_start();
$link_update='?hal=ubah_password';

if(isset($_POST['save'])){

	$id_login=$_SESSION['LOGIN_ID'];
	if(empty($_POST['password']) or empty($_POST['password_baru']) or empty($_POST['ulangi'])){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($_POST['password_baru']!=$_POST['ulangi']){
			$error='Password baru tidak sama. Silahkan ulangi lagi.';
		}else{
			$id_login=$_SESSION['LOGIN_ID'];
			if(mysqli_num_rows(mysqli_query($con,"select * from admin where id_admin='".$id_login."' and password='".md5($_POST['password'])."'"))>0){
				mysqli_query($con,"update admin set password='".md5($_POST['password_baru'])."' where id_admin='".$id_login."'");
				$success='Password anda berhasil diubah.';
			}else{
				$error='Password anda salah. Silahkan ulangi lagi.';
			}
		}
	}
}


?>
 			<div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Ubah Password</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
                                        <input name="id" type="hidden" value="<?php echo $id;?>">
                                        <input name="action" type="hidden" value="<?php echo $action;?>">
                                        <?php
                                        if(!empty($error)){
                                        	echo '<div class="alert alert-danger alert-dismissable">'.$error.'</div>';
                                        	}	if(!empty($success)){
                                        		echo '<div class="alert alert-success alert-dismissable">'.$success.'</div>'; 
                                        		}
                                        	?>

                                        <div class="form-group">
                                            <label>Password Anda <span class="required">*</span> </label>
                                            <input class="form-control" name="password" type="password" size="40" required="">
                                        </div>
                                        <div class="form-group">
                                        	<label>Password Baru</label>
                                        	<input type="password" name="password_baru" size="40" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                        	<label>Ulangi</label>
                                        	<input type="password" name="ulangi" size="40" class="form-control" required="">
                                        </div>
                                        <br>
                                        <button type="submit" name="save" class="btn btn-success"><i class="icon-ok"></i> Simpan</button> 
                                        <button type="button" name="cancel" class="btn btn-warning" onclick="location.href='<?php echo $www;?>'">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>