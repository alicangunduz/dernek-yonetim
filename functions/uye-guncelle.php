<?php
include('../includes/db.php');

// Form verilerini alın
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
$dogumTarihi = $_POST['Dogum_Tarihi'];
$tcSeriNo = $_POST['TC_Seri_No'];
$ikametgahAdresi = $_POST['Ikametgah_Adresi'];
$meslek = $_POST['Meslek'];
$isAdresi = $_POST['Is_Adresi'];
$ilkUyelikKararNo = $_POST['Ilk_Uyelik_Karar_No'];
$ilkUyelikKararTarihi = $_POST['Ilk_Uyelik_Karar_Tarihi'];
$defterKayitSayfaNo = $_POST['Defter_Kayit_Sayfa_No'];
$uyelikDurumu = $_POST['Uyelik_Durumu'];
$uyelikAyrilisTarihi = $_POST['Uyelik_Ayrilis_Tarihi'];
$uyelikAyrilisKararTarihi = $_POST['Uyelik_Ayrilis_Karar_Tarihi'];
$ayrilisKararNo = $_POST['Ayrilis_Karar_No'];

$dogumTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $dogumTarihi)));
$ilkUyelikKararTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $ilkUyelikKararTarihi)));
$uyeAyrilisTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $uyeAyrilisTarihi)));
$uyeAyrilisKararTarihi = date('Y-m-d', strtotime(str_replace('-', '/', $uyeAyrilisKararTarihi)));

if ($uyelikAyrilisKararTarihi == '') {
    $uyelikAyrilisKararTarihi = '0000-00-00';
}
if ($uyelikAyrilisTarihi == '') {
    $uyelikAyrilisTarihi = '0000-00-00';
}

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