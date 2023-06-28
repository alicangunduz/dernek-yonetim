<?php
include '../includes/db.php';

$sql = "SELECT kullanici_adi, sifre FROM admin WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Sadece bir satır olduğunu varsayarak ilk satırı alıyoruz
    $row = $result->fetch_assoc();

    $adminUsername = $row["kullanici_adi"];
    $adminPassword = $row["sifre"];
} else {
    echo "0 results";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $adminUsername && $password === $adminPassword) {
        // Giriş başarılı olduğunda oturum bilgilerini sakla
        session_start();
        $_SESSION['username'] = $username;
        header('Location: /index.php');
        exit();
    } else {
        echo 'Hatalı kullanıcı adı veya şifre!';
    }
}
?>