<?php
$link_list='?hal=data_kategori';
$link_update='?hal=update_kategori';

$daftar='';$no=0;
$q="select * from kategori order by id_kategori";
$q=mysqli_query($con,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$id=$h['id_kategori'];
		
		$daftar.='
		  <tr>
			<td>'.$no.'</td>
			<td>'.$h['nama_kategori'].'</td>
		
			<td>'.$h['aktif'].'</td>
		
			<td>'."<img src='icon/$h[jenis]' width=50px height=50px >". '</td>
			
			
			<td><a href="'.$link_update.'&amp;id='.$id.'&amp;action=edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> <a href="#" onclick="DeleteConfirm(\''.$link_update.'&amp;id='.$id.'&amp;action=delete\');return(false);" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
		  </tr>
		';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Anda yakin akan menghapus data ini ?")){
		window.location.href=url;
	}
}
</script>
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                            	<div class="col-md-12">
    	                        <span class="pull-left"><h4>Kategori Peta</h4></span>
	                        	<span class="pull-right"><a href="<?php echo $link_update;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></span>
                        		</div>
                        	</div>
                    	</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="77" align="center">No</th>
		  									<th width="258" align="center">Nama Kategori</th>
											<th width="178" align="center">Aktif</th>
          									<th width="298" align="center">Jenis</th>
          									<th width="182" align="right">Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $daftar;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>