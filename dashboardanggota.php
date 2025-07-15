<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>

<div class="container">
	<div class="row mt-5">
		<div class="col">
			<a href="tambahanggota.php" class="btn btn-primary float-right">Tambah Data Anggota</a>
		</div>
	</div>
	<div class="row justify-content-lg-center mt-4">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Daftar Data Anngota</h5>
					<!-- tabel daftar buku -->
					<table class="table table-hover table-responsive-md">
						<thead>
							<tr>
								<th scope="col">Kode Anggota</th>
								<th scope="col">Nama Anggota</th>
								<th scope="col">No hp</th>
								<th scope="col">Jurusan</th>
								<th scope="col">Alamat</th>
							</tr>
						</thead>
						<tbody>
<?php
// pemanggilan file read
require_once('proses/readanggota.php');
// cek jika ada data anggota tersimpan
if (mysqli_num_rows($hasil) > 0) :  $no = 1;
  while ($anggota = mysqli_fetch_assoc($hasil)) :
    // mulai tampilkan data
    echo "<tr>";
	echo "<td>".$anggota['kodeanggota']."</td>";
    echo "<td>". $anggota['namaanggota']."</td>";
    echo "<td>" .$anggota['nohp'] ."</td>";
    echo "<td>" .$anggota['jurusan'] ."</td>";
	 echo "<td>" .$anggota['alamat'] ."</td>";
   echo  "<td>";
    echo "<a href='ubahanggota.php?kodeanggota=".$anggota['kodeanggota']."'>ubah</a> | ";
            echo "<a href='proses/deleteanggota.php?kodeanggota=".$anggota['kodeanggota']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
			
  
  echo"</td>";
echo "</tr>";
?>
<?php
      // increment no
      $no++;
    endwhile;
  // jika tidak ada data anggota tersimpan
  else : 
?>
<tr>
  <td colspan="7" class="text-center">Tidak ada data anggota tersimpan.</td>
</tr>
<?php
endif;
?>
</tbody>
					</table>
					<!-- end tabel -->
				</div>
			</div>
		</div>
	</div>
</div>
					
<?php include('include/foot.php') ?>