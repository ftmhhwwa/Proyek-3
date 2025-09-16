<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['nim'])) {
    die("NIM tidak ditemukan.");
}

$nim = $conn->real_escape_string($_GET['nim']);

// Ambil data lama
$result = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = intval($_POST['umur']);

    $sql = "UPDATE mahasiswa SET nama='$nama', umur=$umur WHERE nim='$nim'";
    if ($conn->query($sql)) {
        header("Location: 5c_crudmhs.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
<h2>Edit Mahasiswa</h2>
<form method="post">
    NIM: <input type="text" value="<?= $data['nim']; ?>" disabled><br>
    Nama: <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
    Umur: <input type="number" name="umur" value="<?= $data['umur']; ?>" required><br>
    <button type="submit">Update</button>
</form>
<a href="5c_crudmhs.php">← Kembali</a>
</body>
</html>

<?php $conn->close(); ?>
