<?php
require 'vendor/autoload.php'; // Pastikan Dompdf sudah terinstal

use Dompdf\Dompdf;

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

// Ambil data karyawan terbaik
$sql = "SELECT * FROM penilaian ORDER BY total_skor DESC LIMIT 1";
$result = $conn->query($sql);

$karyawan_terbaik = $result->fetch_assoc();

// Fungsi untuk membuat PDF
if (isset($_GET['download_pdf'])) {
    $dompdf = new Dompdf();

    // Konten sertifikat
$html = '
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    .certificate {
        width: 80%;
        margin: 50px auto;
        padding: 40px;
        border: 10px solid #4CAF50;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .certificate-title {
        font-size: 36px;
        font-weight: bold;
        color: #4CAF50;
        margin-bottom: 20px;
    }
    .certificate-body {
        margin-top: 20px;
        font-size: 18px;
        line-height: 1.6;
        color: #333;
    }
    .certificate h2 {
        font-size: 28px;
        color: #333;
        font-weight: normal;
        margin-top: 10px;
    }
    .certificate h3 {
        font-size: 26px;
        color: #4CAF50;
        font-weight: bold;
        margin-top: 20px;
    }
    .certificate h4 {
        font-size: 22px;
        color: #555;
        font-weight: normal;
        margin-top: 10px;
    }
    .certificate p {
        font-size: 18px;
        color: #333;
        margin-top: 10px;
    }
    .certificate-footer {
        margin-top: 40px;
        font-size: 16px;
        color: #555;
    }
    .certificate-footer p {
        font-size: 16px;
        color: #333;
    }
    .certificate-signature {
        margin-top: 40px;
        font-size: 18px;
        font-weight: bold;
        color: #4CAF50;
    }
</style>
<div class="certificate">
    <h1 class="certificate-title">Sertifikat Penghargaan</h1>
    <p>Dipersembahkan oleh</p>
    <h2>DPMPTSP Provinsi Sumatera Utara</h2>
    <p>Dengan bangga memberikan penghargaan ini kepada:</p>
    <h3><strong>' . htmlspecialchars($karyawan_terbaik['nama']) . '</strong></h3>
    <p>Atas dedikasi dan kinerja luar biasa sebagai</p>
    <h4>' . htmlspecialchars($karyawan_terbaik['jabatan']) . '</h4>
    <p>Total Skor Penilaian: <strong>' . $karyawan_terbaik['total_skor'] . '</strong></p>
    <div class="certificate-footer">
        <p>Semoga penghargaan ini dapat memotivasi Anda untuk terus berprestasi.</p>
    </div>
    <div class="certificate-signature">
        <p>Manajer DPMPTSP Provinsi Sumatera Utara</p>
    </div>
</div>';

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size (A4 landscape)
$dompdf->setPaper('A4', 'landscape');

// Render PDF (first pass)
$dompdf->render();


    // Unduh file PDF
    $dompdf->stream("sertifikat_karyawan_terbaik.pdf", ["Attachment" => true]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan Terbaik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-light border" style="width: 250px; min-height: 100vh;">
            <div class="p-4">
                <h4 class="text-center">Menu Navigasi</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="index.php" class="text-decoration-none">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="list.php" class="text-decoration-none">Daftar Penilaian</a>
                    </li>
                    <li class="list-group-item">
                        <a href="karyawan_terbaik.php" class="text-decoration-none">Karyawan Terbaik</a>
                    </li>
                    <li class="list-group-item">
                        <a href="about.php" class="text-decoration-none">Tentang</a>
                    </li>
                    <li class="list-group-item">
                        <a href="contact.php" class="text-decoration-none">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <h1 class="text-center">Karyawan Terbaik</h1>
            <?php if ($karyawan_terbaik): ?>
                <div class="text-center mt-5">
                    <h2>Sertifikat Penghargaan</h2>
                    <p>Dipersembahkan kepada:</p>
                    <h3><strong><?= htmlspecialchars($karyawan_terbaik['nama']); ?></strong></h3>
                    <p>Jabatan: <?= htmlspecialchars($karyawan_terbaik['jabatan']); ?></p>
                    <p>Total Skor: <strong><?= $karyawan_terbaik['total_skor']; ?></strong></p>
                    <a href="karyawan_terbaik.php?download_pdf=true" class="btn btn-primary mt-3">Unduh Sertifikat PDF</a>
                </div>
            <?php else: ?>
                <p class="text-center mt-5">Belum ada data karyawan terbaik.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
