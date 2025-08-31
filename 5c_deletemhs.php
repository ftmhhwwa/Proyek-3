<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['nim'])) {
    $nim = $conn->real_escape_string($_GET['nim']);
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    if ($conn->query($sql)) {
        header("Location: 5c_crudmhs.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    die("NIM tidak diberikan.");
}

$conn->close();
?>
