<?php
include('../includes/db.php');

$id = $_POST['id'];
$ad = $_POST['Ad'];
$soyad = $_POST['Soyad'];
$tckn = $_POST['TCKN'];
$telefon = $_POST['Telefon_Numarası'];
$uyelikNo = $_POST['Üyelik_No'];
$babaAdi = $_POST['Baba_Adı'];
$anaAdi = $_POST['Ana_Adı'];
$uyruk = $_POST['Uyruk'];
$dogumYeri = $_POST['Dogum_Yeri'];
$dogumTarihi = isset($_POST['Dogum_Tarihi']) ? DateTime::createFromFormat('d-m-Y', $_POST['Dogum_Tarihi']) : false;
$tcSeriNo = $_POST['TC_Seri_No'];
$ikametgahAdresi = $_POST['Ikametgah_Adresi'];
$meslek = $_POST['Meslek'];
$isAdresi = $_POST['Is_Adresi'];
$ilkUyelikKararNo = $_POST['Ilk_Uyelik_Karar_No'];
$ilkUyelikKararTarihi = isset($_POST['Ilk_Uyelik_Karar_Tarihi']) ? DateTime::createFromFormat('d-m-Y', $_POST['Ilk_Uyelik_Karar_Tarihi']) : false;
$defterKayitSayfaNo = $_POST['Defter_Kayit_Sayfa_No'];
$uyelikDurumu = $_POST['Uyelik_Durumu'];
$uyelikAyrilisTarihi = isset($_POST['Uyelik_Ayrilis_Tarihi']) ? DateTime::createFromFormat('d-m-Y', $_POST['Uyelik_Ayrilis_Tarihi']) : false;
$uyelikAyrilisKararTarihi = isset($_POST['Uyelik_Ayrilis_Karar_Tarihi']) ? DateTime::createFromFormat('d-m-Y', $_POST['Uyelik_Ayrilis_Karar_Tarihi']) : false;
$ayrilisKararNo = isset($_POST['Ayrilis_Karar_No']) ? $_POST['Ayrilis_Karar_No'] : '';

$dogumTarihi = $dogumTarihi !== false ? $dogumTarihi->format('Y-m-d') : '00-00-0000';
$ilkUyelikKararTarihi = $ilkUyelikKararTarihi !== false ? $ilkUyelikKararTarihi->format('Y-m-d') : '00-00-0000';
$uyelikAyrilisTarihi = $uyelikAyrilisTarihi !== false ? $uyelikAyrilisTarihi->format('Y-m-d') : '00-00-0000';
$uyelikAyrilisKararTarihi = $uyelikAyrilisKararTarihi !== false ? $uyelikAyrilisKararTarihi->format('Y-m-d') : '00-00-0000';

// Veritabanında güncelleme yapma
$sql = "UPDATE `uye_bilgi` SET
        `ad` = '$ad',
        `soyad` = '$soyad',
        `tckn` = '$tckn',
        `tel` = '$telefon',
        `uyelik_no` = '$uyelikNo',
        `baba_adi` = '$babaAdi',
        `ana_adi` = '$anaAdi',
        `uyruk` = '$uyruk',
        `dogum_yeri` = '$dogumYeri',
        `dogum_tarihi` = '$dogumTarihi',
        `tc_seri_no` = '$tcSeriNo',
        `ikametgah_adresi` = '$ikametgahAdresi',
        `meslek` = '$meslek',
        `is_adresi` = '$isAdresi',
        `ilk_uyelik_karar_no` = '$ilkUyelikKararNo',
        `ilk_uyelik_karar_tarihi` = '$ilkUyelikKararTarihi',
        `defter_kayit_sayfa_no` = '$defterKayitSayfaNo',
        `uyelik_durumu` = '$uyelikDurumu',
        `uyelik_ayrilis_tarihi` = '$uyelikAyrilisTarihi',
        `uyelik_ayrilis_karar_tarihi` = '$uyelikAyrilisKararTarihi',
        `ayrilis_karar_no` = '$ayrilisKararNo'
        WHERE `id` = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /uye-islemler.php?id=$id&durum=ok");
} else {
    echo "Veri güncellenirken hata oluştu: " . $conn->error;
}

// MySQL bağlantısını kapat
$conn->close();

// Yönlendirme
?>