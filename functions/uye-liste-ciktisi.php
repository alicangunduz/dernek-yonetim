<?php
require '../vendor/autoload.php'; // PhpSpreadsheet'i projenize eklediğiniz dosya yolu
include '../includes/db.php'; // Veritabanı bağlantısı için gerekli dosyayı ekleyin.

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// PhpSpreadsheet'i kullanarak bir Excel dosyası oluşturun
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Başlık satırını ayarlayın ve kalın fontla yazın başlık genişliğinde ayarlayın

$sheet->setCellValue('A1', 'ID')
    ->setCellValue('B1', 'Ad')
    ->setCellValue('C1', 'Soyad')
    ->setCellValue('D1', 'TC Kimlik No')
    ->setCellValue('E1', 'Telefon')
    ->setCellValue('F1', 'Uyelik No')
    ->setCellValue('G1', 'Baba Adı')
    ->setCellValue('H1', 'Ana Adı')
    ->setCellValue('I1', 'Uyruk')
    ->setCellValue('J1', 'Doğum Yeri')
    ->setCellValue('K1', 'Doğum Tarihi')
    ->setCellValue('L1', 'TC Seri No')
    ->setCellValue('M1', 'İkametgah Adresi')
    ->setCellValue('N1', 'Meslek')
    ->setCellValue('O1', 'İş Adresi')
    ->setCellValue('P1', 'İlk Uyelik Karar No')
    ->setCellValue('Q1', 'İlk Uyelik Karar Tarihi')
    ->setCellValue('R1', 'Defter Kayıt Sayfa No')
    ->setCellValue('S1', 'Uyelik Durumu')
    ->setCellValue('T1', 'Uyelik Ayrilis Tarihi')
    ->setCellValue('U1', 'Uyelik Ayrilis Karar Tarihi')
    ->setCellValue('V1', 'Ayrilis Karar No')
    ->getStyle('A1:V1')->getFont()->setBold(true)->setSize(12);
    
    
// Veritabanından verileri alın
$sql = "SELECT * FROM uye_bilgi";
$result = $conn->query($sql);

$rowCount = 2; // İlk veri satırı

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowCount, $row['id'])
            ->setCellValue('B' . $rowCount, $row['ad'])
            ->setCellValue('C' . $rowCount, $row['soyad'])
            ->setCellValue('D' . $rowCount, $row['tckn'])
            ->setCellValue('E' . $rowCount, $row['tel'])
            ->setCellValue('F' . $rowCount, $row['uyelik_no'])
            ->setCellValue('G' . $rowCount, $row['baba_adi'])
            ->setCellValue('H' . $rowCount, $row['ana_adi'])
            ->setCellValue('I' . $rowCount, $row['uyruk'])
            ->setCellValue('J' . $rowCount, $row['dogum_yeri'])
            ->setCellValue('K' . $rowCount, $row['dogum_tarihi'])
            ->setCellValue('L' . $rowCount, $row['tc_seri_no'])
            ->setCellValue('M' . $rowCount, $row['ikametgah_adresi'])
            ->setCellValue('N' . $rowCount, $row['meslek'])
            ->setCellValue('O' . $rowCount, $row['is_adresi'])
            ->setCellValue('P' . $rowCount, $row['ilk_uyelik_karar_no'])
            ->setCellValue('Q' . $rowCount, $row['ilk_uyelik_karar_tarihi'])
            ->setCellValue('R' . $rowCount, $row['defter_kayit_sayfa_no'])
            ->setCellValue('S' . $rowCount, $row['uyelik_durumu'])
            ->setCellValue('T' . $rowCount, $row['uyelik_ayrilis_tarihi'])
            ->setCellValue('U' . $rowCount, $row['uyelik_ayrilis_karar_tarihi'])
            ->setCellValue('V' . $rowCount, $row['ayrilis_karar_no']);

        $rowCount++;
    }
}

// Excel dosyasını oluşturun
$writer = new Xlsx($spreadsheet);

// Dosyayı indirin 
$filename = 'uye-listesi.xlsx';
$writer->save($filename);


// Dosyayı indirme başlatın
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

// Yonlendir
header("Location: ../uye-listesi.php");
// Veritabanı bağlantısını kapatın
$conn->close();
?>