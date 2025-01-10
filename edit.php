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

// Ambil data berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM penilaian WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='list.php';</script>";
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penilaian Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background-color: #d5e9ff;
            padding: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar h5 {
            font-weight: bold;
            color: rgb(152, 197, 245);
        }

        .sidebar a {
            display: block;
            color: rgb(11, 73, 139);
            text-decoration: none;
            padding: 10px 10px;
            border-radius: 10px;
            font-weight: bold;
        }

        .sidebar a:hover {
            color: white;
            background-color: rgb(152, 197, 245);
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            max-width: 80%;
            height: auto;
            cursor: pointer;
        }

        /* Content */
        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .form-header {
            background-color: rgb(22, 76, 255);
            color: white;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card {
            border-radius: 0 0 10px 10px;
        }

        .btn-primary {
            background-color: rgb(36, 50, 250);
            border-color: #004085;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #002752;
            border-color: #002752;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <a href="index.php"><img src="logo-dpmptsp.png" alt="DPMPTSP"></a>
        </div>
        <div class="pt-3">
            <a href="list.php">Daftar Nilai</a>
            <a href="karyawan_terbaik.php">Karyawan Terbaik</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="form-header">EDIT PENILAIAN KARYAWAN</div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="<?= htmlspecialchars($row['jabatan']); ?>" required>
                        </div>
                        <!-- Form input untuk nilai -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="disiplin" class="form-label">Disiplin</label>
                                <input type="number" step="0.1" class="form-control" name="disiplin" value="<?= $row['disiplin']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="pelayanan" class="form-label">Orientasi Pelayanan</label>
                                <input type="number" step="0.1" class="form-control" name="pelayanan" value="<?= $row['pelayanan']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="inovatif" class="form-label">Inovatif</label>
                                <input type="number" step="0.1" class="form-control" name="inovatif" value="<?= $row['inovatif']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="penampilan" class="form-label">Penampilan</label>
                                <input type="number" step="0.1" class="form-control" name="penampilan" value="<?= $row['penampilan']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="kecakapan" class="form-label">Kecakapan</label>
                                <input type="number" step="0.1" class="form-control" name="kecakapan" value="<?= $row['kecakapan']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="kerjasama" class="form-label">Kerjasama</label>
                                <input type="number" step="0.1" class="form-control" name="kerjasama" value="<?= $row['kerjasama']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tanggungjawab" class="form-label">Tanggung Jawab</label>
                                <input type="number" step="0.1" class="form-control" name="tanggungjawab" value="<?= $row['tanggungjawab']; ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="list.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>