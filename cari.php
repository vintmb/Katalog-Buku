<?php include('include/head.php'); ?>
<?php include('include/navbar.php'); ?>

<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'katalogbuku');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil kata kunci pencarian
$keyword = isset($_GET['q']) ? $_GET['q'] : '';

// Query pencarian
$stmt = $conn->prepare("SELECT * FROM buku WHERE judul LIKE ? OR pengarang LIKE ? OR penerbit LIKE ?");
$search = "%$keyword%";
$stmt->bind_param("sss", $search, $search, $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container">
    <h1 class="mt-4">Hasil Pencarian</h1>
    <p>Pencarian untuk: <strong><?php echo htmlspecialchars($keyword); ?></strong></p>
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="img/<?php echo htmlspecialchars($row['sampul']); ?>" class="card-img-top" alt="Sampul Buku">
                        <div class="card-body">
                            <h5 class="card-title">Judul Buku: <?php echo htmlspecialchars($row['judul']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Pengarang: <?php echo htmlspecialchars($row['pengarang']); ?></h6>
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
    <a href="index.php" class="btn btn-primary mt-4">Kembali ke Halaman Utama</a>
</div>

<?php include('include/foot.php'); ?>