<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Contact</li>
        </ul>
      </div>
    </div>
  </div>
  </section>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
  
    <form role="form" class="register-form" method="post" id="commentForm">
      <h2>Contact us <small>get in touch with us by filling form below</small></h2>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="form-group">
            <input type="text" name="nama" id="nama" class="form-control input-md" placeholder="First Name" tabindex="1" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="form-group">
            <input type="text" name="email" id="email" class="form-control input-md" placeholder="Email" tabindex="2" required="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="form-group">
            <input type="text" name="company" id="company" class="form-control input-md" placeholder="Company" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="subjek" id="subjek" class="form-control" placeholder="Subjek" required="">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="pesan" rows="8" placeholder="* Your comment here" required=""></textarea>
      </div>

      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-4"><input type="submit" name="save" value="Submit message" class="btn btn-theme btn-block btn-md" tabindex="7"></div>
        <div class="col-xs-12 col-md-8">* Please fill all required form field, thanks!</div>
      </div>
    </form>

      </div>
    </div>
  </div>
  </section>

  <?php

if(isset($_POST['save'])){
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $company=$_POST['company'];
  $subjek=$_POST['subjek'];
  $pesan=$_POST['pesan'];

  $q="insert into buku_tamu(nama,email,company,subjek,pesan) values('".$nama."', '".$email."','".$company."','".$subjek."','".$pesan."')";
  mysqli_query($con,$q);
  echo "<script>window.alert('Data Buku Tamu Berhasil');
                window.location=('pengunjung.php?hal=hubungi')</script>";
              }  
?>