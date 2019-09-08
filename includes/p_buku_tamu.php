<?php
$link_list='?hal=buku_tamu';
$link_update='?hal=update_buku_tamu';

$daftar='';$no=0;
$q="select * from buku_tamu order by id_buku_tamu";
$q=mysqli_query($con,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$id=$h['id_buku_tamu'];
		
		$daftar.='
		  <tr class="odd gradeX">
			<td>'.$no.'</td>
			<td>'.$h['nama'].'</td>
			<td>'.$h['email'].'</td>
			<td>'.$h['company'].'</td>
			<td>'.$h['subjek'].'</td>
			<td>'.$h['pesan'].'</td>

			<td align="center"><a href="#" onclick="DeleteConfirm(\''.$link_update.'&amp;id='.$id.'&amp;action=delete\');return(false);" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash fa-fw"></i></a></td>
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
    	                        <span class="pull-left"><h4>Buku Tamu</h4></span>
                        		</div>
                        	</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengirim</th>
                                        <th>E-mail</th>
                                        <th>Company</th>
                                        <th>Subjek</th>
                                        <th>Pesan</th>
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