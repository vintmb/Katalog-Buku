<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>

<div class="container">
	<div class="row justify-content-lg-center mt-5">
		<div class="col-lg-8 col-sm-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Tambah Data Anggota</h5>
					<form action="proses/createanggota.php" method="post"enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form-control" id="kodeanggota" name="kodeanggota" placeholder="Kode Anggota">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="namaanggota" name="namaanggota" placeholder="Nama anggota">
						</div>
						
						<div class="form-group">
							<input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
						</div>
						<div class="form-group">
							<textarea class="form-control" id="alamat" name="alamat" rows="4"
								placeholder="alamat"></textarea>
						</div>
						
						<div class="form-group mt-4">
							<input type="submit" name="formtambahanggota" value="Simpan" class="btn btn-primary btn-block btn-lg">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('include/foot.php') ?>