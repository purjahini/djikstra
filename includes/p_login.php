<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Login</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" id="loginformm" class="register-form" method="post" action="./login.php">
			<h2>Sign in <small>manage your account</small></h2>
			<hr class="colorgraph">

			<div class="form-group">
				<input type="text" name="username" id="email" class="form-control input-lg" placeholder="User Name" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" class="form-control input-lg" id="exampleInputPassword1" name="password" placeholder="Password">
			</div>

			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox" hidden="">
						<button type="button" class="btn" data-color="info" tabindex="7">Remember me</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" name="login" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6" hidden="">Don't have an account? <a href="register.html">Register</a></div>
			</div>
		</form>
	</div>
</div>

</div>
	</section>