<?php include('includes/header.php'); ?>
<?php include('includes/db.php'); ?>

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
            <div class="sm:col-span-2 md:col-span-2 lg:col-span-2 xl:col-span-2">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="md:col-span-1 lg:col-span-1 xl:col-span-1   ">
                        <div
                            class="bg-white dark:bg-slate-800 shadow  rounded-md w-full p-4 relative overflow-hidden bg-[url('../images/widgets/p-1.png')] bg-no-repeat bg-contain">
                            <div class="flex justify-between xl:gap-x-4 items-center">
                                <div
                                    class="absolute -left-6 -top-4 text-blue-500 p-3 text-center inline-flex items-center justify-center w-32 h-32 ">
                                    <i class="ti ti-users text-3xl"></i>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS satir_sayisi FROM uye_bilgi";
                                        $result = $conn->query($sql);

                                        // Sonuçları alın
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $satir_sayisi = $row["satir_sayisi"];
                                            echo $satir_sayisi;
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </h3>
                                    <p class="text-gray-400 mb-0 font-medium">Toplam Üye</p>
                                </div>
                            </div>
                        </div>
                        <!--end inner-grid-->
                    </div>
                    <div class="md:col-span-1 lg:col-span-1 xl:col-span-1   ">
                        <div
                            class="bg-white dark:bg-slate-800 shadow  rounded-md w-full p-4 relative overflow-hidden bg-[url('../images/widgets/p-1.png')] bg-no-repeat bg-contain">
                            <div class="flex justify-between xl:gap-x-4 items-center">
                                <div
                                    class="absolute -left-6 -top-4 text-blue-500 p-3 text-center inline-flex items-center justify-center w-32 h-32 ">
                                    <i class="ti ti-user-check text-3xl"></i>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS aktif_uye_sayisi FROM `uye_bilgi` WHERE `uyelik_durumu` = 'Aktif';";
                                        $result = $conn->query($sql);

                                        // Sonuçları alın
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $aktif_uye_sayisi = $row["aktif_uye_sayisi"];
                                            echo $aktif_uye_sayisi;
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </h3>
                                    <p class="text-gray-400 mb-0 font-medium">Toplam Aktif Üye</p>
                                </div>
                            </div>
                        </div>
                        <!--end inner-grid-->
                    </div>
                    <div class="md:col-span-1 lg:col-span-1 xl:col-span-1   ">
                        <div
                            class="bg-white dark:bg-slate-800 shadow  rounded-md w-full p-4 relative overflow-hidden bg-[url('../images/widgets/p-1.png')] bg-no-repeat bg-contain">
                            <div class="flex justify-between xl:gap-x-4 items-center">
                                <div
                                    class="absolute -left-6 -top-4 text-blue-500 p-3 text-center inline-flex items-center justify-center w-32 h-32 ">
                                    <i class="ti ti-user-exclamation text-3xl"></i>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS pasif_uye_sayisi FROM `uye_bilgi` WHERE `uyelik_durumu` = 'Pasif';";
                                        $result = $conn->query($sql);

                                        // Sonuçları alın
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $pasif_uye_sayisi = $row["pasif_uye_sayisi"];
                                            echo $pasif_uye_sayisi;
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </h3>
                                    <p class="text-gray-400 mb-0 font-medium">Toplam Pasif Üye</p>
                                </div>
                            </div>
                        </div>
                        <!--end inner-grid-->
                    </div>

                    <!--end col-->
                </div>
                <!--end card-body-->
            </div>

            <br>
            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                <div class="card h-full">
                    <div class="card-header">
                        <h4 class="card-title">Aidat Ödemesi Yaklaşan Üyeler</h4>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="relative overflow-x-auto  sm:rounded">

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable_1">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Ad Soyad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Üyelik No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TCKN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Telefon
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            İşlemler
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                $sql = "SELECT aidat_kac_gun FROM site_ayarlar WHERE `id` = 0";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $aidat_kac_gun = $row["aidat_kac_gun"];

                                $sql = "SELECT u.id, u.ad, u.soyad, u.uyelik_no, u.tckn, u.tel
                                            FROM gelir g
                                            JOIN uye_bilgi u ON g.id = u.id
                                            WHERE g.gelir_turu = 'aidat'
                                            AND g.tarih = (SELECT MAX(tarih) FROM gelir WHERE id = g.id)
                                            AND DATEDIFF(CURDATE(), g.tarih) > " . $aidat_kac_gun . " AND u.uyelik_durumu = 'Aktif'";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-slate-700/50">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' . $row["ad"] . ' ' . $row["soyad"] . '</th>
                                                    <td class="px-6 py-4">' . $row["uyelik_no"] . '</td>
                                                    <td class="px-6 py-4">' . $row["tckn"] . '</td>
                                                    <td class="px-6 py-4">' . $row["tel"] . '</td>
                                                    <td class="px-6 py-4">
                                                        <a href="uye-islemler.php?id=' . $row["id"] . '#odeme-alani" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">İşlemler</a>
                                                    </td>
                                                </tr>';
                                    }
                                } else {
                                    // Veri bulunamadığında yapılacak işlemler
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->

            </div>

        </div>

        <!--end col-->
    </div>
</div>
<!--end inner-grid-->

<?php include('includes/footer.php'); ?>

</div>
<!--end container-->


<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/datatable.init.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>