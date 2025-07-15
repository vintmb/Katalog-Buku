<?php include('include/head.php'); ?>
<?php include('include/navbar.php'); ?>

<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'katalogbuku');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil kata kunci pencarian (jika ada)
$keyword = isset($_GET['q']) ? $_GET['q'] : '';

// Query untuk mengambil data buku
if ($keyword) {
    // Jika ada pencarian
    $stmt = $conn->prepare("SELECT * FROM buku WHERE judul LIKE ? OR pengarang LIKE ? OR penerbit LIKE ?");
    $search = "%$keyword%";
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Jika tidak ada pencarian, ambil semua buku
    $stmt = $conn->prepare("SELECT * FROM buku ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!-- Jumbotron Section yang Dipinggirkan -->
<div class="jumbotron bg-light py-5">
    <div class="container">
        <!-- Teks di pinggir kiri -->
        <h1 class="display-4 text-left">Katalog Buku</h1>
        <p class="lead text-left">Ini adalah website berisi kumpulan daftar buku-buku untuk para mahasiswa dan juga buku lovers. Jangan Lupa kalian juga menjadi anggota kami</p>
        <hr class="my-4">
        <!-- Form Pencarian Buku -->
            <form class="form-inline d-flex" action="cari.php" method="GET"> 
            <input class="form-control mr-2 w-50" type="text" placeholder="Cari Buku" name="q" value="<?php echo htmlspecialchars($keyword); ?>"> 
            <button class="btn btn-outline-success" type="submit">Cari</button> 
        </form>

        <!-- Form Pencarian Anggota -->
            <form class="form-inline d-flex mt-3" action="carianggota.php" method="GET"> 
            <input class="form-control mr-2 w-50" type="text" placeholder="Cari Anggota" name="q" value="<?php echo htmlspecialchars($keyword); ?>"> 
            <button class="btn btn-outline-success" type="submit">Cari</button> 
        </form>
    </div>
</div>

<!-- Menampilkan Buku -->
<div class="container mt-3">
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-70">
                        <img src="img/<?php echo htmlspecialchars($row['sampul']); ?>" class="card-img-right" alt="Sampul Buku">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($row['judul']); ?></h3>
                            <h4 class="card-subtitle text-muted mb-2">Pengarang: <?php echo htmlspecialchars($row['pengarang']); ?></h4>
                            <p class="card-text">Ringkasan: <?php echo htmlspecialchars($row['ringkasan']); ?></p>
                            <p class="card-text"><small class="text-muted">Tahun: <?php echo htmlspecialchars($row['tahun']); ?>, Penerbit: <?php echo htmlspecialchars($row['penerbit']); ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada buku yang ditemukan untuk kata kunci "<strong><?php echo htmlspecialchars($keyword); ?></strong>".</p>
        <?php endif; ?>
    </div>
</div>

<?php include('include/foot.php'); ?>