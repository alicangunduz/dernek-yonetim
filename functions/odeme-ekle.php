<?php
include('../includes/db.php');

$id = $_POST['id'];
$tarih = $_POST['Tarih'];
$dekontNo = $_POST['Dekont_No'];
$miktar = $_POST['Miktar'];
$gelir_turu = $_POST['Gelir_Turu'];
$aciklama = $_POST['Aciklama'];
$tarih = date('Y-m-d', strtotime($tarih));



// Veritabanına veri ekleme
$sql = "INSERT INTO `gelir`(`id`, `tarih`, `dekont_no`, `miktar`, `gelir_turu` , `aciklama`)
        VALUES ('$id', '$tarih', '$dekontNo', '$miktar', '$gelir_turu' ,'$aciklama')";

if ($conn->query($sql) === TRUE) {
    header("Location: /uye-islemler.php?id=$id&durum=ok");
} else {
    echo "Veri eklenirken hata oluştu: " . $conn->error;
}


// MySQL bağlantısını kapat
$conn->close();

?>