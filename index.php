<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk</title>
</head>
<body>
    <h2>Daftar Data Penduduk</h2>

    <?php
    // Pengaturan koneksi ke MySQL
    $servername = "localhost";
    $username = "root";  // Sesuaikan dengan username MySQL Anda
    $password = "";  // Sesuaikan dengan password MySQL Anda
    $dbname = "pg-web8";  // Menggunakan nama database pg-web8

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Mengecek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil semua data dari tabel penduduk
    $sql = "SELECT * FROM sleman";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Membuat header tabel
        echo "<table border='1px'><tr>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas (km²)</th>
        <th>Jumlah Penduduk</th></tr>";

        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["kecamatan"]."</td><td>".
            $row["longitude"]."</td><td>".
            $row["latitude"]."</td><td>".
            $row["luas"]."</td><td align='right'>".
            $row["jumlah_penduduk"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</body>
</html>
