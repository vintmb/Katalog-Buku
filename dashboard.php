<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>

<div class="container">
	<div class="row mt-5">
		<div class="col">
			<a href="tambah.php" class="btn btn-primary float-right">Tambah Data Buku</a>
		</div>
	</div>
	<div class="row justify-content-lg-center mt-4">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4">Daftar Data Buku</h5>
					<!-- tabel daftar buku -->
					<table class="table table-hover table-responsive-md">
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Sampul</th>
								<th scope="col">Judul</th>
								<th scope="col">Pengarang</th>
								<th scope="col">Penerbit</th>
								<th scope="col">ringkasan</th>
								<th scope="col">Tahun</th>
								<th scope="col">Opsi</th>
							</tr>
						</thead>
						<tbody>
<?php
// pemanggilan file read
require_once('proses/read.php');
// cek jika ada data buku tersimpan
if (mysqli_num_rows($hasil) > 0) :  $no = 1;
  while ($buku = mysqli_fetch_assoc($hasil)) :
    // mulai tampilkan data
    echo "<tr>";
	echo "<td>".$buku['id']."</td>";
    echo "<td>". $buku['sampul']."</td>";
    echo "<td>" .$buku['judul'] ."</td>";
    echo "<td>" .$buku['pengarang'] ."</td>";
	 echo "<td>" .$buku['penerbit'] ."</td>";
	  echo "<td>" .$buku['ringkasan'] ."</td>";
	  echo "<td>" .$buku['tahun'] ."</td>";
   echo  "<td>";
    echo "<a href='ubah.php?id=".$buku['id']."'>ubah</a> | ";
            echo "<a href='proses/delete.php?id=".$buku['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
			
  
  echo"</td>";
echo "</tr>";
?>
<?php
      // increment no
      $no++;
    endwhile;
  // jika tidak ada data buku tersimpan
  else : 
?>
<tr>
  <td colspan="7" class="text-center">Tidak ada data buku tersimpan.</td>
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