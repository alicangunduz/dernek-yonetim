<?php include('includes/header.php'); ?>

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
            <div class="card h-full">
                <div class="card-header">
                    <h4 class="card-title">Giderler Listesi</h4>
                </div>
                <!--end card-header-->
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
                                        Dekont No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Miktar
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
                            $sql = "SELECT id , tarih, dekont_no, miktar, aciklama FROM gider ORDER BY id DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    // Tarih formatı ayarla yıl - ay - gün to gün - ay - yıl
                                    $row["tarih"] = date('d-m-Y', strtotime($row["tarih"]));
                                    echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-slate-700/50">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' . $row["tarih"] . '</th>
                                                        <td class="px-6 py-4">' . $row["dekont_no"] . '</td>
                                                        <td class="px-6 py-4">' . $row["miktar"] . '</td>
                                                        <td class="px-6 py-4">' . $row["aciklama"] . '</td>
                                                        <td class="px-6 py-4">
                                                            <a href="/functions/gider-sil.php?id=' . $row["id"] . '" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Sil</a>
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
            <!--end card-->
            <button type="button" onclick="executeExample('success')" id="success-button"
                class="focus:outline-none  focus:text-black hover:text-black dark:bg-slate-700 dark:text-slate-300 dark:hover:text-slate-200  text-indigo-700 hover:bg-opacity-50 bg-gray-100 text-sm font-medium py-2 px-3 rounded"
                style="display: none;">Success
            </button>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

</div>
<!--end container-->
<script>
// Url durum ok
var url = window.location.href;
document.addEventListener("DOMContentLoaded", function() {
    if (url.includes("durum=ok")) {
        document.getElementById("success-button").click();
    }
});


// Url id=1&durum=ok  durumu temizle
if (url.includes("durum=ok")) {
    window.history.replaceState({}, document.title, "/gider-listele.php");
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
<script src="assets/libs/simple-datatables/umd/gider-listele.js"></script>
<script src="assets/js/pages/datatable.init.js"></script>
</body>

</html>