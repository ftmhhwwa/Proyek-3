<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim  = $conn->real_escape_string($_POST['nim']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $umur = intval($_POST['umur']);

    $sql = "INSERT INTO mahasiswa (nim, nama, umur) VALUES ('$nim','$nama',$umur)";
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
    <title>Tambah Mahasiswa</title>
</head>
<body>
<h2>Tambah Mahasiswa</h2>
<form method="post">
    NIM: <input type="text" name="nim" required><br>
    Nama: <input type="text" name="nama" required><br>
    Umur: <input type="number" name="umur" required><br>
    <button type="submit">Simpan</button>
</form>
<a href="5c_crudmhs.php">← Kembali</a>
</body>
</html>

<?php $conn->close(); ?>
