<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Karyawan - DPMPTSP SUMUT</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
            color:rgb(152, 197, 245);
        }

        .sidebar a {
            display: block;
            color:rgb(11, 73, 139);
            text-decoration: none;
            padding: 10px 10px;
            border-radius: 10px;
            font-weight: bold;
        }

        .sidebar a:hover {
            color:rgb(152, 197, 245);
            color: white;
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
            background-color:rgb(22, 76, 255);
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
            background-color:rgb(36, 50, 250);
            border-color: #004085;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #002752;
            border-color: #002752;
        }

        .form-label {
            font-weight: bold;
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
            <div class="form-header">FORM PENILAIAN KARYAWAN</div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <form id="penilaian-form" action="submit.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Staff">Staff</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>

                        <!-- Kriteria Penilaian -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="disiplin" class="form-label">Disiplin (Bobot 20%)</label>
                                <input type="number" class="form-control" id="disiplin" name="disiplin" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pelayanan" class="form-label">Orientasi Pelayanan (Bobot 15%)</label>
                                <input type="number" class="form-control" id="pelayanan" name="pelayanan" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inovatif" class="form-label">Inovatif (Bobot 10%)</label>
                                <input type="number" class="form-control" id="inovatif" name="inovatif" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penampilan" class="form-label">Penampilan (Bobot 10%)</label>
                                <input type="number" class="form-control" id="penampilan" name="penampilan" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kecakapan" class="form-label">Kecakapan (Bobot 20%)</label>
                                <input type="number" class="form-control" id="kecakapan" name="kecakapan" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kerjasama" class="form-label">Kerja Sama (Bobot 15%)</label>
                                <input type="number" class="form-control" id="kerjasama" name="kerjasama" min="0" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggungjawab" class="form-label">Tanggung Jawab (Bobot 10%)</label>
                                <input type="number" class="form-control" id="tanggungjawab" name="tanggungjawab" min="0" max="100" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit Penilaian <i class="fas fa-check-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
