<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penilaian Karyawan - DPMPTSP SUMUT</title>
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

        .table th, .table td {
            vertical-align: middle;
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
            <div class="form-header">DAFTAR PENILAIAN KARYAWAN</div>
            <div class="card shadow-lg">
                <div class="card-body">
                    <a href="index.php" class="btn btn-primary mb-3">Tambah Karyawan</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Total Skor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                // Ambil data dari tabel
                                $sql = "SELECT * FROM penilaian";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['jabatan']) . "</td>";
                                        echo "<td>" . $row['total_skor'] . "</td>";
                                        echo "<td>
                                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\");'>Hapus</a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
