<?php

include('../includes/db.php');

// id url uzerinden aliyoruz
$id = $_GET['id'];

// Veritabaninda uye_bilgi adli tabloda eslesen id yi sil
$sql = "DELETE FROM `gider` WHERE `id` = $id";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Veri silinirken hata oluştu: " . $conn->error;
}

// Uye yaptıgı odemeleri sil
$sql = "DELETE FROM `gelir` WHERE `id` = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: /gider-listele.php?durum=ok");
} else {
    echo "Veri silinirken hata oluştu: " . $conn->error;
}


$conn->close();