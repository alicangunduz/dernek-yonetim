<?php
include('../includes/db.php');
$ad = $_POST['Ad'];
$soyad = $_POST['Soyad'];
$tckn = $_POST['TCKN'];
$telefon = $_POST['Telefon_Numarası'];
$uyelikNo = $_POST['Üyelik_No'];
$babaAdi = $_POST['Baba_Adı'];
$anaAdi = $_POST['Ana_Adı'];
$uyruk = $_POST['Uyruk'];
$dogumYeri = $_POST['Dogum_Yeri'];
$dogumTarihi = $_POST['Dogum_Tarihi'];
$tcSeriNo = $_POST['TC_Seri_No'];
$ikametgahAdresi = $_POST['Ikametgah_Adresi'];
$meslek = $_POST['Meslek'];
$isAdresi = $_POST['Is_Adresi'];
$ilkUyelikKararNo = $_POST['Ilk_Uyelik_Karar_No'];
$ilkUyelikKararTarihi = $_POST['Ilk_Uyelik_Karar_Tarihi'];
$defterKayitSayfaNo = $_POST['Defter_Kayit_Sayfa_No'];
$uyeDurumu = $_POST['Uyelik_Durumu'];
$uyeAyrilisTarihi = $_POST['Uyelik_Ayrilis_Tarihi'];
$uyeAyrilisKararTarihi = $_POST['Uyelik_Ayrilis_Karar_Tarihi'];
$ayrilisKararNo = $_POST['Ayrilis_Karar_No'];


$dogumTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $dogumTarihi)));
$ilkUyelikKararTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $ilkUyelikKararTarihi)));
$uyeAyrilisTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $uyeAyrilisTarihi)));
$uyeAyrilisKararTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $uyeAyrilisKararTarihi)));

if (empty($uyeAyrilisTarihi) || $uyeAyrilisTarihi == '1970-01-01' || $uyeAyrilisTarihi == '0000-00-00') {
    $uyeAyrilisTarihi = '';
}

if (empty($uyeAyrilisKararTarihi) || $uyeAyrilisKararTarihi == '1970-01-01' || $uyeAyrilisKararTarihi == '0000-00-00') {
    $uyeAyrilisKararTarihi = '';
}


// Veritabanına veri ekleme
$sql = "INSERT INTO `uye_bilgi`(`ad`, `soyad`, `tckn`, `tel`, `uyelik_no`, `baba_adi`, `ana_adi`, `uyruk`, `dogum_yeri`, `dogum_tarihi`, `tc_seri_no`, `ikametgah_adresi`, `meslek`, `is_adresi`, `ilk_uyelik_karar_no`, `ilk_uyelik_karar_tarihi`, `defter_kayit_sayfa_no`, `uyelik_durumu`, `uyelik_ayrilis_tarihi`, `uyelik_ayrilis_karar_tarihi`, `ayrilis_karar_no`) 
VALUES ('$ad', '$soyad', '$tckn', '$telefon', '$uyelikNo', '$babaAdi', '$anaAdi', '$uyruk', '$dogumYeri', '$dogumTarihi', '$tcSeriNo', '$ikametgahAdresi', '$meslek', '$isAdresi', '$ilkUyelikKararNo', '$ilkUyelikKararTarihi', '$defterKayitSayfaNo', '$uyeDurumu', '$uyeAyrilisTarihi', '$uyeAyrilisKararTarihi', '$ayrilisKararNo')";

if ($conn->query($sql) === TRUE) {
    echo "Veri başarıyla eklendi.";
} else {
    echo "Veri eklenirken hata oluştu: " . $conn->error;
}


// MySQL bağlantısını kapat
$conn->close();

// Yönlendirme
header("Location: /uye-listele.php");
?>