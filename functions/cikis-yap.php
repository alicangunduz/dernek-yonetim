<?php
session_start();

// Oturumu sonlandır
session_unset();
session_destroy();

// Kullanıcıyı çıkış sayfasına yönlendir
header('Location: /login.php');
exit();
?>