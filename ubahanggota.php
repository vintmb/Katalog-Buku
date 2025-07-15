<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>
<?php
// pemanggilan file dbconfig
require_once('proses/dbconfig.php');
// ambil id dari parameter URL
$idanggota = $_GET['kodeanggota'];
// query MySQL cari berdasarkan kodeanggota
$query  = "SELECT * FROM anggota WHERE kodeanggota =$idanggota";
// tampung hasil pencarian dalam variabel
$anggota   = mysqli_fetch_assoc(
  // eksekusi query
  mysqli_query($koneksi, $query)
);
// jika anggota tidak ditemukan
if ($anggota == 0) :
  echo ('anggota tidak ditemukan!');
  // hentikan program
  exit();
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form ubah data anggota</title>
</head>
<body>
					<h5>FORM UBAH DATA ANGGOTA</h5>
           	<form action="proses/updateanggota.php" method="post">
					 <fieldset>
					 <p>
			<label for="Kode Anggota">      Kode anggota: </label>
			<input type="kodeanggota" name="kodeanggota" value="<?php echo $anggota['kodeanggota'] ?>" >
			 </p>
			 <p>
            <label for ="namaanggota     ">    Nama  Anggota   : </label>
            <input type="text" name="namaanggota" value="<?php echo $anggota['namaanggota'] ?>" >
        </p>
       <p>
          <label for="no hp  ">    Nomor hp: </label>
          <input type="text" name="nohp" value="<?php echo $anggota['nohp'] ?>" >
        </p>
	   <p> 
            <label for="jurusan   ">    Jurusan      : </label>
            <input type="text" name="jurusan" value="<?php echo $anggota['jurusan'] ?>" >  
        </p>
	    <p>
			<label for="alamat  ">      Alamat     : </label>
            <input type="text" name="alamat" value="<?php echo $anggota['alamat'] ?>" >
			</p> 
		<p>
           
            <input type="submit" value="UBAH ANGGOTA" name="ubahdata" >
        </p>
        </fieldset>
    </form>
    </body>
</html>   		
<?php include('include/foot.php') ?>