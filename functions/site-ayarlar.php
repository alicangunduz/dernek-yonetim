<?php
include('../includes/db.php');

$tema_renk = $_POST['Tema_Modu'];
$dernek_adi = $_POST['Dernek_Adi'];
$dernek_aciklama = $_POST['Dernek_Aciklama'];
$logo_link = $_POST['Dernek_Logo_Link'];
$aidat_kac_gun = $_POST['Aidat_Kac_Gun'];


// Veritabanına veri ekleme
$sql = "UPDATE `site_ayarlar` SET `tema_renk`='$tema_renk',`dernek_adi`='$dernek_adi',`dernek_aciklama`='$dernek_aciklama',`logo_link`='$logo_link' , `aidat_kac_gun`='$aidat_kac_gun' WHERE `id` = 0";

if ($conn->query($sql) === TRUE) {
    header("Location: /site-ayarlar.php?durum=ok");
} else {
    echo "Veri eklenirken hata oluştu: " . $conn->error;
}


// MySQL bağlantısını kapat
$conn->close();

?>