<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "penilaian_karyawan";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus data berdasarkan ID
$id = $_GET['id'];
$sql = "DELETE FROM penilaian WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
