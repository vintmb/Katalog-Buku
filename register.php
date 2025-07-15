<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>

<div class="container">
	<div class="row justify-content-lg-center mt-5">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Daftar Akun</h5>
					<!-- form register -->
					<form action="proses/userregister.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="conf_password" name="conf_password"
								placeholder="Konfirmasi Password">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap">
						</div>
						<div class="form-group mt-4">
							<input type="submit" name="formregister" value="Register" class="btn btn-primary btn-block btn-lg">
						</div>
					</form>
					<!-- end form -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('include/foot.php') ?>