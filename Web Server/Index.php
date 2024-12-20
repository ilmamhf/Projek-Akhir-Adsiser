<?php
// Konfigurasi koneksi ke database
$servername = "54.209.143.1"; // Ganti dengan public IP HAProxy
$username = "root";                // Username database
$password = "1234"; // Password database
$dbname = "mydb";                  // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query database untuk mengambil pesan
$sql = "SELECT message FROM messages LIMIT 1";
$result = $conn->query($sql);

// Menampilkan hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["message"] . "</h1>";
    }
} else {
    echo "<h1>No data found</h1>";
}

// Menutup koneksi
$conn->close();
?>
