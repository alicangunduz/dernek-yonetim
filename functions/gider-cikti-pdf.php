<?php
require_once('../fpdf/fpdf.php'); // FPDF kütüphanesini projenize göre uygun yere dahil edin

require_once('../includes/db.php');

// Formdan yıl verisini alın
if (isset($_POST['Yil'])) {
    $yil = intval($_POST['Yil']); // Veri güvenliği için integer'a çeviriyoruz
} else {
    die("Yıl bilgisi alınamadı.");
}

// PDF dosyasını oluşturmak için FPDF nesnesini oluşturun
$pdf = new FPDF();
$pdf->AddPage();

// Gider tablosundan tarih sütunundaki tarihler içinden yıl olanları seçin
$sql = "SELECT * FROM gider WHERE YEAR(tarih) = $yil";

$result = $conn->query($sql);

// PDF içeriği için stil ayarları 
// PDF Sayfaya tam sığdırma
$pdf->SetDisplayMode('fullpage', 'single');
$pdf->SetAutoPageBreak(true, 0);
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(30, 10, "Tarih", 1);
$pdf->Cell(30, 10, "Dekont No", 1);
$pdf->Cell(30, 10, "Miktar", 1);
$pdf->Cell(100, 10, "Aciklama", 1);
$pdf->Ln();

while ($row = $result->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 12);
    // Tarihi tr formatında yaz
    $pdf->Cell(30, 10, date('d.m.Y', strtotime($row['tarih'])), 1); // Tarih değeri eklendi
    $pdf->Cell(30, 10, $row['dekont_no'], 1); // Dekont No değeri eklendi
    $pdf->Cell(30, 10, $row['miktar'], 1); // Miktar değeri eklendi
    // Açıklamayı optimize et 
    // Açıklama değeri çok uzun olduğu için tablo hücresine sığmıyor
    // Bu yüzden 100px'lik bir hücreye sığdırıyoruz
    // Eğer açıklama değeri 100px'den uzunsa 100px'lik kısmını gösterip sonuna ... ekliyoruz
    // Gelen açıklama türkçe karakterler içeriyor bozulmaması için düzenliyoruz
    $row['aciklama'] = str_replace(array('ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ş', 'Ş', 'ö', 'Ö', 'ç', 'Ç'), array('i', 'I', 'g', 'G', 'u', 'U', 's', 'S', 'o', 'O', 'c', 'C'), $row['aciklama']);
    if (strlen($row['aciklama']) > 100) {
        $pdf->Cell(100, 10, substr($row['aciklama'], 0, 100) . '...', 1); // 
    } else {
        $pdf->Cell(100, 10, $row['aciklama'], 1);
    }
    $pdf->Ln();
}

// Veritabanı bağlantısını kapatın
$conn->close();

// PDF dosyasını oluşturun ve gösterin
$pdf->Output('GiderRaporu_' . $yil . '.pdf', 'D');