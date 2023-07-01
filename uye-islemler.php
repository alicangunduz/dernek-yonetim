<?php include('includes/header.php'); ?>

<?php
// URL'den ID parametresini al
$id = $_GET['id'];

// ID'ye bağlı olarak verileri sorgula
$sql = "SELECT * FROM uye_bilgi WHERE id = $id";
$result = $conn->query($sql);

// Sonuçları kontrol et ve ekrana yazdır
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ad = $row['ad'];
        $soyad = $row['soyad'];
        $tckn = $row['tckn'];
        $tel = $row['tel'];
        $uyelik_no = $row['uyelik_no'];
        $baba_adi = $row['baba_adi'];
        $ana_adi = $row['ana_adi'];
        $uyruk = $row['uyruk'];
        $dogum_yeri = $row['dogum_yeri'];
        $dogum_tarihi = $row['dogum_tarihi'];
        $tc_seri_no = $row['tc_seri_no'];
        $ikametgah_adresi = $row['ikametgah_adresi'];
        $meslek = $row['meslek'];
        $is_adresi = $row['is_adresi'];
        $ilk_uyelik_karar_no = $row['ilk_uyelik_karar_no'];
        $ilk_uyelik_karar_tarihi = $row['ilk_uyelik_karar_tarihi'];
        $defter_kayit_sayfa_no = $row['defter_kayit_sayfa_no'];
        $uyelik_durumu = $row['uyelik_durumu'];
        $uyelik_ayrilis_tarihi = $row['uyelik_ayrilis_tarihi'];
        $uyelik_ayrilis_karar_tarihi = $row['uyelik_ayrilis_karar_tarihi'];
        $ayrilis_karar_no = $row['ayrilis_karar_no'];


        $dogum_tarihi = date('d-m-Y', strtotime($dogum_tarihi));
        $ilk_uyelik_karar_tarihi = date('d-m-Y', strtotime($ilk_uyelik_karar_tarihi));


    }
} else {
    ?>
    <div class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
        <i class="fas fa-triangle-exclamation flex-shrink-0 text-red-700"></i>
        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
            Hatalı yönlendirme sizi yönlendiriyorum...
        </div>
        <button type="button"
                class="justify-center items-center ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300 alert-hidden">

            <i class="fas fa-xmark"></i>
        </button>
    </div>
    <?php
    header("Refresh: 5; url=/uye-listele.php");

}

// MySQL bağlantısını kapat
$conn->close();

?>

<div class="container  mx-auto px-2">
    <div class="flex flex-wrap">
        <div class="flex items-center py-4 w-full">
            <div class="w-full">
                <div class="">

                </div>
            </div>
        </div>
    </div>
</div>
<!--end container-->

<div class="container mx-auto px-2 min-h-[calc(100vh-138px)]  relative pb-14 ">
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="sm:col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-3">
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $ad . ' ' . $soyad . ' adlı üyenin bilgi sayfası' ?></h4>
                        </div>
                        <!--end card-header-->
                        <div class="card-body">
                            <form action="/functions/uye-guncelle.php" method="POST">
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group" style="display: none;">
                                        <input type="text" name="id" id="id"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $id ?>" required/>
                                        <label for="id"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Id</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Ad" id="Ad"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $ad ?>" required/>
                                        <label for="Ad"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Ad</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Soyad" id="Soyad"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $soyad ?>" required/>
                                        <label for="Soyad"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Soyad</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="TCKN" id="TCKN"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $tckn ?>" required/>
                                        <label for="TCKN"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            TCKN</label>
                                    </div>

                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="tel" name="Telefon_Numarası" id="Telefon_Numarası"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $tel ?>" required/>
                                        <label for="Telefon_Numarası"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Telefon Numarası</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Üyelik_No" id="Üyelik_No"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $uyelik_no ?>" required/>
                                        <label for="Üyelik_No"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Üyelik No</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Baba_Adı" id="Baba_Adı"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $baba_adi ?>" required/>
                                        <label for="Baba_Adı"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Baba Adı</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Ana_Adı" id="Ana_Adı"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $ana_adi ?>" required/>
                                        <label for="Ana_Adı"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Ana Adı</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Uyruk" id="Uyruk"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $uyruk ?>" required/>
                                        <label for="Uyruk"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Uyruk</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dogum_Yeri" id="Dogum_Yeri"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $dogum_yeri ?>" required/>
                                        <label for="Dogum_Yeri"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Doğum Yeri</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dogum_Tarihi" id="Dogum_Tarihi"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $dogum_tarihi ?>" required/>
                                        <label for="Dogum_Tarihi"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Doğum Tarihi</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="TC_Seri_No" id="TC_Seri_No"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $tc_seri_no ?>" required/>
                                        <label for="TC_Seri_No"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            TC Seri No</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Ikametgah_Adresi" id="Ikametgah_Adresi"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $ikametgah_adresi ?>" required/>
                                        <label for="Ikametgah_Adresi"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            İkametgah Adresi</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Meslek" id="Meslek"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $meslek ?>" required/>
                                        <label for="Meslek"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Meslek</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Is_Adresi" id="Is_Adresi"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $is_adresi ?>" required/>
                                        <label for="Is_Adresi"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            İş Adresi</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Ilk_Uyelik_Karar_No" id="Ilk_Uyelik_Karar_No"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $ilk_uyelik_karar_no ?>" required/>
                                        <label for="Ilk_Uyelik_Karar_No"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            İlk Üyelik Karar No</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Ilk_Uyelik_Karar_Tarihi" id="Ilk_Uyelik_Karar_Tarihi"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $ilk_uyelik_karar_tarihi ?>" required/>
                                        <label for="Ilk_Uyelik_Karar_Tarihi"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            İlk Üyelik Karar Tarihi</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Defter_Kayit_Sayfa_No" id="Defter_Kayit_Sayfa_No"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $defter_kayit_sayfa_no ?>" required/>
                                        <label for="Defter_Kayit_Sayfa_No"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Defter Kayıt Sayfa No</label>
                                    </div>

                                    <div class="relative z-0 mb-6 w-full group">

                                        <select id="Uyelik_Durumu" name="Uyelik_Durumu" for="Uyelik_Durumu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 dark:focus-visible:outline-none">
                                            <option value="Aktif"
                                                <?php if ($uyelik_durumu == "Aktif") {
                                                    echo "selected";
                                                } ?>>
                                                Aktif
                                            </option>
                                            <option value="Pasif"
                                                <?php if ($uyelik_durumu == "Pasif") {
                                                    echo "selected";
                                                } ?>>
                                                Pasif
                                            </option>
                                            <option value="Vefat"
                                                <?php if ($uyelik_durumu == "Vefat") {
                                                    echo "selected";
                                                } ?>>
                                                Vefat
                                            </option>
                                            <option value="İhraç"
                                                <?php if ($uyelik_durumu == "İhraç") {
                                                    echo "selected";
                                                } ?>>
                                                İhraç
                                            </option>
                                            <option value="İstifa"
                                                <?php if ($uyelik_durumu == "İstifa") {
                                                    echo "selected";
                                                } ?>>
                                                İstifa
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <!-- Uyelik durumu aktif harici secili veya seilci ise acilmasi gereken alan-->
                                <?php if ($uyelik_durumu != "Aktif") { ?>
                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 mb-6 w-full group">
                                            <input style="display: none;" type="text" name="Uyelik_Ayrilis_Tarihi"
                                                   id="Uyelik_Ayrilis_Tarihi"
                                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" "
                                                   value="<?php
                                                   // Uyelik tarihi yil-ay-gun olarak geliyor bunu gun-ay-yil olarak degistiriyoruz
                                                   $uyelik_ayrilis_tarihi = explode("-", $uyelik_ayrilis_tarihi);
                                                   $uyelik_ayrilis_tarihi = $uyelik_ayrilis_tarihi[2] . "-" . $uyelik_ayrilis_tarihi[1] . "-" . $uyelik_ayrilis_tarihi[0];


                                                   echo ($uyelik_ayrilis_tarihi == '00-00-0000') ? '' : $uyelik_ayrilis_tarihi; ?>"/>
                                            <label for="Uyelik_Ayrilis_Tarihi"
                                                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Üyelik Ayrılış Tarihi</label>
                                        </div>

                                        <div class="relative z-0 mb-6 w-full group">
                                            <input type="text" name="Uyelik_Ayrilis_Karar_Tarihi"
                                                   id="Uyelik_Ayrilis_Karar_Tarihi"
                                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" "
                                                   value="<?php
                                                   // Uyelik tarihi yil-ay-gun olarak geliyor bunu gun-ay-yil olarak degistiriyoruz
                                                   $uyelik_ayrilis_karar_tarihi = explode("-", $uyelik_ayrilis_karar_tarihi);
                                                   $uyelik_ayrilis_karar_tarihi = $uyelik_ayrilis_karar_tarihi[2] . "-" . $uyelik_ayrilis_karar_tarihi[1] . "-" . $uyelik_ayrilis_karar_tarihi[0];

                                                   echo ($uyelik_ayrilis_karar_tarihi == '00-00-0000') ? '' : $uyelik_ayrilis_karar_tarihi; ?>"/>
                                            <label for="Uyelik_Ayrilis_Karar_Tarihi"
                                                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Üyelik Ayrılış Karar Tarihi</label>
                                        </div>
                                    </div>

                                    <div class="grid xl:grid-cols-2 xl:gap-6">
                                        <div class="relative z-0 mb-6 w-full group">
                                            <input type="text" name="Ayrilis_Karar_No" id="Ayrilis_Karar_No"
                                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" " value="<?php echo $ayrilis_karar_no; ?>"/>
                                            <label for="Ayrilis_Karar_No"
                                                   class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                                Ayrılış Karar No</label>
                                        </div>
                                    </div>
                                <?php } ?>


                                <button type="submit"
                                        class="btn bg-blue-500 text-white hover:bg-blue-600">Güncelle
                                </button>
                            </form>

                            <br>
                            <button onclick="uyeSil()"
                                    class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Sil
                                (Dikkat Bu
                                işlem geri alınamaz)
                            </button>
                            <button type="button" onclick="executeExample('success')" id="success-button"
                                    class="focus:outline-none  focus:text-black hover:text-black dark:bg-slate-700 dark:text-slate-300 dark:hover:text-slate-200  text-indigo-700 hover:bg-opacity-50 bg-gray-100 text-sm font-medium py-2 px-3 rounded"
                                    style="display: none;">Success
                            </button>
                        </div>


                        <!--end card-body-->


                    </div>


                    <!--end card-->

                </div>
                <br><br>
                <div class="card" id="odeme-alani">
                    <div class="card-header">
                        <h4 class="card-title">Ödeme Ekle
                        </h4>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <form action="/functions/odeme-ekle.php" method="POST">
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 mb-6 w-full group" style="display: none;">
                                    <input type="text" name="id" id="id"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=" " value="<?php echo $id ?>" required/>
                                    <label for="id"
                                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Id</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="Tarih" id="Tarih"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=" " required/>
                                    <label for="Tarih"
                                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Tarih</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="Dekont_No" id="Dekont_No"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=" " required/>
                                    <label for="Dekont_No"
                                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Dekont No</label>
                                </div>
                            </div>
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="Miktar" id="Miktar"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=" " required/>
                                    <label for="Miktar"
                                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Miktar</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">

                                    <select id="Gelir_Turu" name="Gelir_Turu" for="Gelir_Turu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 dark:focus-visible:outline-none">
                                        <option value="Aidat" selected>
                                            Aidat
                                        </option>
                                        <option value="Burs">
                                            Burs
                                        </option>
                                        <option value="Bağış">
                                            Bağış
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="Aciklama" id="Aciklama"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=" "/>
                                    <label for="Aciklama"
                                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                        Açıklama</label>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Ekle</button>
                        </form>
                        <button type="button" onclick="executeExample('success')" id="success-button"
                                class="focus:outline-none  focus:text-black hover:text-black dark:bg-slate-700 dark:text-slate-300 dark:hover:text-slate-200  text-indigo-700 hover:bg-opacity-50 bg-gray-100 text-sm font-medium py-2 px-3 rounded"
                                style="display: none;">Success
                        </button>

                    </div>

                    <div class="card-body">

                        <div class="relative overflow-x-auto  sm:rounded">

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable_1">
                                <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tarih
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dekont/Banka No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Miktar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gelir Türü
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Açıklama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sil
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include('includes/db.php');
                                $sql = "SELECT gelir_id, tarih, dekont_no, miktar, gelir_turu, aciklama FROM gelir WHERE id = $id ORDER BY tarih DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        // Tarihi d-m-Y formatına dönüştürme
                                        $gelenTarih = date('d-m-Y', strtotime($row["tarih"]));
                                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-slate-700/50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' . $gelenTarih . '</th>
                        <td class="px-6 py-4">' . $row["dekont_no"] . '</td>
                        <td class="px-6 py-4">' . $row["miktar"] . '</td>
                        <td class="px-6 py-4">' . $row["gelir_turu"] . '</td>
                        <td class="px-6 py-4">' . $row["aciklama"] . '</td>
                        <td class="px-6 py-4">
                        <a href="/functions/gelir-sil.php?id=' . $id . '&gelir-id=' . $row["gelir_id"] . '"> <button type="button" class="focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2 mr-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">Sil</button></a>                                
                        </td>
                    </tr>';
                                    }
                                } else {

                                }
                                ?>


                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--end card-body-->
                </div>

                <!--end col-->
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end inner-grid-->


    <?php include('includes/footer.php'); ?>

</div>
<!--end container-->

<script>
    // Url durum ok
    var url = window.location.href;
    document.addEventListener("DOMContentLoaded", function () {
        if (url.includes("durum=ok")) {
            document.getElementById("success-button").click();
        }
    });

    // Document readystate dinle complete olunca calistir
    document.onreadystatechange = function () {
        if (document.readyState === 'complete') {
            // Url #odeme-alani durumu temizle
            if (url.includes("#odeme-alani")) {
                window.history.replaceState({}, document.title, "/uye-islemler.php?id=" + "<?php echo $id; ?>");
            }
        }
    }
    // Url id=1&durum=ok  durumu temizle
    if (url.includes("durum=ok")) {
        window.history.replaceState({}, document.title, "/uye-islemler.php?id=" + "<?php echo $id; ?>");
    }
</script>

<script>
    // Id silme onayı onclick ile al
    function uyeSil() {
        var result = confirm("Silmek istediğinize emin misiniz? Bu işlem geri alınamaz!", "Silme Onayı", "warning");

        if (result) {
            // Evet ise silme url yonlendir
            window.location = "functions/uye-sil.php?id=<?php echo $id; ?>";
        } else {
            // Hayır ise silme
        }
    }
</script>
<script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/js/pages/sweetalert.init.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/libs/simple-datatables/umd/uye-islemler.js"></script>
<script src="assets/js/pages/datatable.init.js"></script>

</body>

</html>