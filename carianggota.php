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
$stmt = $conn->prepare("SELECT * FROM anggota WHERE kodeanggota LIKE ? OR namaanggota LIKE ? OR nohp LIKE ? OR jurusan LIKE ? OR alamat LIKE ?"); 
$search = "%$keyword%"; 
$stmt->bind_param("sssss", $search, $search, $search, $search, $search); 
$stmt->execute(); 
$result = $stmt->get_result(); 
?> 

<div class="container"> 
    <h1 class="mt-4">Hasil Pencarian Anggota</h1> 
    <p>Pencarian untuk: <strong><?php echo htmlspecialchars($keyword); ?></strong></p> 
    <div class="row"> 
        <?php if ($result->num_rows > 0): ?> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode Anggota</th>
                        <th>Nama Anggota</th>
                        <th>No HP</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?> 
                    <tr>
                        <td><?php echo htmlspecialchars($row['kodeanggota']); ?></td>
                        <td><?php echo htmlspecialchars($row['namaanggota']); ?></td>
                        <td><?php echo htmlspecialchars($row['nohp']); ?></td>
                        <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                    </tr>
                <?php endwhile; ?> 
                </tbody>
            </table>
        <?php else: ?> 
            <p class="text-center">Tidak ada anggota yang ditemukan untuk kata kunci "<strong><?php echo htmlspecialchars($keyword); ?></strong>".</p> 
        <?php endif; ?> 
    </div> 
    <a href="dashboardanggota.php" class="btn btn-primary mt-4">Kembali ke Halaman Anggota</a> 
</div> 

<?php include('include/foot.php'); ?> 