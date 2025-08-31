<?php
// Konfigurasi koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Koneksi gagal: " . $conn->connect_error); }

// Query semua data
$allData = $conn->query("SELECT nim, nama, umur FROM mahasiswa ORDER BY nim ASC");

// Jika ada pencarian
$searchResult = null;
$keyword = "";
if (isset($_GET['search']) && $_GET['search'] != "") {
    $keyword = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT nim, nama, umur FROM mahasiswa 
            WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' 
            ORDER BY nim ASC";
    $searchResult = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
<h2>Daftar Mahasiswa</h2>

<!-- Form Pencarian -->
<form method="get" action="">
    <input type="text" name="search" placeholder="Cari NIM atau Nama..." value="<?= htmlspecialchars($keyword) ?>">
    <button type="submit">Cari</button>
    <a href="5c_crudmhs.php">Reset</a>
</form>
<br>
<a href="5c_inputmhs.php">+ Tambah Mahasiswa</a>
<br><br>

<!-- Layout 2 kolom -->
<div style="display:flex; gap:40px; align-items:flex-start;">

    <!-- Kolom kiri: Semua data -->
    <div style="flex:1;">
        <h3>Semua Mahasiswa</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = $allData->fetch_assoc()): ?>
            <tr>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['umur']; ?></td>
                <td>
                    <a href="5b_displaydetailmhs.php?nim=<?= urlencode($row['nim']); ?>">View</a> | 
                    <a href="5c_editmhs.php?nim=<?= urlencode($row['nim']); ?>">Edit</a> | 
                    <a href="5c_deletemhs.php?nim=<?= urlencode($row['nim']); ?>" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- Kolom kanan: Hasil search -->
    <div style="flex:1;">
        <h3>Hasil Pencarian</h3>
        <?php if ($searchResult): ?>
            <?php if ($searchResult->num_rows > 0): ?>
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                    <?php while($row = $searchResult->fetch_assoc()): ?>
                    <tr style="background:#e0f7fa;">
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['umur']; ?></td>
                        <td>
                            <a href="5b_displaydetailmhs.php?nim=<?= urlencode($row['nim']); ?>">View</a> | 
                            <a href="5c_editmhs.php?nim=<?= urlencode($row['nim']); ?>">Edit</a> | 
                            <a href="5c_deletemhs.php?nim=<?= urlencode($row['nim']); ?>" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p><i>Tidak ada hasil ditemukan.</i></p>
            <?php endif; ?>
        <?php else: ?>
            <p><i>Silakan ketik kata kunci lalu klik Cari.</i></p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
<?php $conn->close(); ?>
