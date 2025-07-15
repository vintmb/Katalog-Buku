<?php include('include/head.php') ?>
<?php include('include/navbar.php') ?>
<?php
// pemanggilan file dbconfig
require_once('proses/dbconfig.php');
// ambil id dari parameter URL
$idbuku = $_GET['id'];
// query MySQL cari berdasarkan id
$query  = "SELECT * FROM buku WHERE id = $idbuku";
// tampung hasil pencarian dalam variabel
$buku   = mysqli_fetch_assoc(
  // eksekusi query
  mysqli_query($koneksi, $query)
);
// jika buku tidak ditemukan
if ($buku == 0) :
  echo ('Buku tidak ditemukan!');
  // hentikan program
  exit();
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form ubah data buku</title>
</head>
<body>
					<h5>FORM UBAH DATA BUKU</h5>
           	<form action="proses/update.php" method="post">
					 <fieldset>
			<input type="hidden" name="id" value="<?php echo $buku['id'] ?>" >
			 <p>
            <label for ="judul     ">Judul Buku    : </label>
            <input type="text" name="judul" value="<?php echo $buku['judul'] ?>" >
        </p>
       <p>
          <label for="pengarang  ">Nama Pengarang: </label>
          <input type="text" name="pengarang" value="<?php echo $buku['pengarang'] ?>" >
        </p>
	   <p> 
            <label for="penerbit   ">Penerbit      : </label>
            <input type="text" name="penerbit" value="<?php echo $buku['penerbit'] ?>" >  
        </p>
	    <p>
			<label for="ringkasan  ">Ringkasan     : </label>
            <input type="text" name="ringkasan" value="<?php echo $buku['ringkasan'] ?>" >
			</p> 
		<p>
            <label for="tahun      ">Tahun Terbit  : </label>
            <input type="text" name="tahun" value="<?php echo $buku['tahun'] ?>" >
        </p>
	  <p>
            <label for="sampul     ">Sampul Buku    : </label>
            <input type="text" name="sampul" value="<?php echo $buku['sampul'] ?>" >
        </p>
  	   <p>
            <input type="submit" value="ubah" name="ubah" >
        </p>
        </fieldset>
    </form>
    </body>
</html>   		
<?php include('include/foot.php') ?>