<?php
$link_list='?hal=data_peta';
$link_update='?hal=update_peta';

$daftar='';$no=0;
$q="SELECT * FROM peta_wisata ORDER BY id_wisata DESC";
$q=mysqli_query($con,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$id=$h['id_wisata'];
		
		$isi_berita = nl2br($h[deskripsi]); // membuat paragraf pada isi berita
      	 $isi = substr($isi_berita,0,150); // ambil sebanyak 150 karakter
     	 $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
		
		$daftar.='
		  <tr class="odd gradeX">
			<td>'.$no.'</td>
		
			<td>'.$h['nama'].'</td>
			<td>'.$isi.'</td>
			<td>'.$h['lat'].' |  '.$h['lng'].'</td>
			
			<td>'."<img src='foto_berita/$h[gambar]' width=80px height=50px >". '</td>
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
    	                        <span class="pull-left"><h4>Peta Wisata</h4></span>
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
										<th>Nama Tempat Wisata</th>
          								<th>Deskripsi</th>
           								<th>Lat-Lng</th>
          								<th>Foto</th>
		  								<th class="center">Control</th>
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