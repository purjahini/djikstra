<?php
$link_list='?hal=data_rute';
$link_update='?hal=update_rute';

$daftar='';$no=0;
$q="SELECT * FROM rute_wisata ORDER BY id_rute DESC";
$q=mysqli_query($con,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$id=$h['id_rute'];
		
		
		
		$daftar.='
		  <tr class="odd gradeX">
			<td>'.$no.'</td>
			<td>'.$h['lokasi_awal'].'</td>
			<td>'.$h['lokasi_tujuan'].'</td>
			<td>'.$h['lat'].'-'.$h['lng'].'</td>
			<td>'.$h['alamat'].'</td>
			
			<td class="center"><a href="'.$link_update.'&amp;id='.$id.'&amp;action=edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> <a href="#" onclick="DeleteConfirm(\''.$link_update.'&amp;id='.$id.'&amp;action=delete\');return(false);" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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
    	                        <span class="pull-left"><h4>Setting Rute Sekolah</h4></span>
	                        	<span class="pull-right"><a href="<?php echo $link_update;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></span>
                        		</div>
                        	</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
		  								<th>Lokasi Awal</th>
          								<th>Lokasi Tujuan</th>
          								<th>Lat-Lng</th>
          								<th>Alamat Sekolah</th>
		  								<th>Control</th>
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
            <!-- /.row -->