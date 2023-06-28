<?php
$servername = "localhost"; // Sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "dernek"; // Veritabanı adı

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}
?>