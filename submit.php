<?php
// Koneksi ke database
$host = "localhost";  // Pastikan host sesuai dengan pengaturan database
$user = "root";       // Username database
$pass = "";           // Password database
$db   = "penilaian_karyawan";  // Nama database yang digunakan

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah data sudah dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $disiplin = $_POST['disiplin'];
    $pelayanan = $_POST['pelayanan'];
    $inovatif = $_POST['inovatif'];
    $penampilan = $_POST['penampilan'];
    $kecakapan = $_POST['kecakapan'];
    $kerjasama = $_POST['kerjasama'];
    $tanggungjawab = $_POST['tanggungjawab'];

    // Hitung total skor dengan bobot
    $totalSkor = ($disiplin * 0.2) + ($pelayanan * 0.15) + ($inovatif * 0.1) +
                 ($penampilan * 0.1) + ($kecakapan * 0.2) + ($kerjasama * 0.15) +
                 ($tanggungjawab * 0.1);


    // Mengambil data untuk validasi jika orangnya sudah ada atau belum
$queryCekUser = mysqli_query($conn, "SELECT * FROM penilaian WHERE nama='$nama'");
$resultUser = mysqli_num_rows($queryCekUser);

// cek apakah user yang diinputkan sudah ada di database
if($resultUser > 0){
    echo "<script>
        window.alert('Data sudah ada');
        window.location.href = 'index.php'; // Arahkan ke halaman index setelah gagal
    </script>";
} else {
    // Menyimpan data ke dalam database
    $sql = "INSERT INTO penilaian (nama, jabatan, disiplin, pelayanan, inovatif, penampilan, kecakapan, kerjasama, tanggungjawab, total_skor) 
            VALUES ('$nama', '$jabatan', '$disiplin', '$pelayanan', '$inovatif', '$penampilan', '$kecakapan', '$kerjasama', '$tanggungjawab', '$totalSkor')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            window.alert('Data berhasil disimpan');
            window.location.href = 'index.php'; // Arahkan ke halaman index setelah sukses
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

    }
    
    


// Menutup koneksi
$conn->close();
?>
