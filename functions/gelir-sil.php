<?php
include('../includes/db.php');

// id url uzerinden aliyoruz
$id = $_GET['id'];
$gelir_id = $_GET['gelir-id'];

// Veritabanininda gelir adli tabloda eslesen gelir_id yi sil
$sql = "DELETE FROM `gelir` WHERE `gelir_id` = $gelir_id";

if ($conn->query($sql) === TRUE) {
    header("Location: /uye-islemler.php?id=$id&durum=ok");
} else {
    echo "Veri silinirken hata oluştu: " . $conn->error;
}


$conn->close();