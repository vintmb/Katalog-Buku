<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>

<div class="container">
	<div class="row justify-content-lg-center mt-5">
		<div class="col-lg-8 col-sm-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Tambah Data Buku</h5>
					<form action="proses/create.php" method="post"enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form-control" id="judulbuku" name="judulbuku" placeholder="Judul Buku">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Nama Pengarang">
						</div>
						<div class="form-group">
							<textarea class="form-control" id="ringkasan" name="ringkasan" rows="4"
								placeholder="Ringkasan Buku"></textarea>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="tahunterbit" name="tahunterbit" placeholder="Tahun Terbit">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku">
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="fotosampul" name="fotosampul">
							<label class="custom-file-label text-muted" for="fotosampul">Gambar Sampul Buku</label>
						</div>
						<div class="form-group mt-4">
							<input type="submit" name="formtambah" value="Simpan" class="btn btn-primary btn-block btn-lg">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('include/foot.php') ?>