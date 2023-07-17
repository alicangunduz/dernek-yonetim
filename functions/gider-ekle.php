<?php
include('../includes/db.php');

$tarih = $_POST['Tarih'];
$dekontNo = $_POST['Dekont_No'];
$miktar = $_POST['Miktar'];
$aciklama = $_POST['Aciklama'];
$tarih = date('Y-m-d', strtotime($tarih));



// Veritabanına veri ekleme
$sql = "INSERT INTO `gider`(`id`, `tarih`, `dekont_no`, `miktar`, `aciklama`)
        VALUES ('', '$tarih', '$dekontNo', '$miktar','$aciklama')";

if ($conn->query($sql) === TRUE) {
    header("Location: /gider-ekle.php?durum=ok");
} else {
    echo "Veri eklenirken hata oluştu: " . $conn->error;
}


// MySQL bağlantısını kapat
$conn->close();

?>