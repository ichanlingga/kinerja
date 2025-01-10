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

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$disiplin = $_POST['disiplin'];
$pelayanan = $_POST['pelayanan'];
$inovatif = $_POST['inovatif'];
$penampilan = $_POST['penampilan'];
$kecakapan = $_POST['kecakapan'];
$kerjasama = $_POST['kerjasama'];
$tanggungjawab = $_POST['tanggungjawab'];

// Hitung total skor
$total_skor = ($disiplin * 0.2) + ($pelayanan * 0.15) + ($inovatif * 0.1) + 
              ($penampilan * 0.1) + ($kecakapan * 0.2) + ($kerjasama * 0.15) + 
              ($tanggungjawab * 0.1);

// Update data di tabel
$sql = "UPDATE penilaian SET 
        nama = '$nama', 
        jabatan = '$jabatan', 
        disiplin = '$disiplin', 
        pelayanan = '$pelayanan', 
        inovatif = '$inovatif', 
        penampilan = '$penampilan', 
        kecakapan = '$kecakapan', 
        kerjasama = '$kerjasama', 
        tanggungjawab = '$tanggungjawab', 
        total_skor = '$total_skor' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location='list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
