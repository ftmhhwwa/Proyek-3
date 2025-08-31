<?php
// Konfigurasi koneksi
$host = "localhost";
$user = "root";        // ganti jika user MySQL berbeda
$pass = "";            // ganti jika ada password
$db   = "akademik_db";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil NIM dari URL
if (isset($_GET['nim'])) {
    $nim = $conn->real_escape_string($_GET['nim']);

    // Query detail mahasiswa
    $sql = "SELECT nim, nama, umur FROM mahasiswa WHERE nim = '$nim' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        die("Data mahasiswa dengan NIM $nim tidak ditemukan.");
    }
} else {
    die("NIM tidak diberikan di URL.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
</head>
<body>
<h2>Detail Mahasiswa</h2>

<p><b>NIM:</b> <?= htmlspecialchars($data['nim']); ?></p>
<p><b>Nama:</b> <?= htmlspecialchars($data['nama']); ?></p>
<p><b>Umur:</b> <?= htmlspecialchars($data['umur']); ?></p>

<a href="5b_displaymhs.php">← Kembali ke daftar</a>

</body>
</html>

<?php $conn->close(); ?>
