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
                    <h4 class="card-title">Üye Listesi</h4>
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
                                    Meslek
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT id , uyelik_no, ad, soyad, tckn, meslek FROM uye_bilgi";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-slate-700/50">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">' . $row["ad"] . ' ' . $row["soyad"] . '</th>
                                                        <td class="px-6 py-4">' . $row["uyelik_no"] . '</td>
                                                        <td class="px-6 py-4">' . $row["tckn"] . '</td>
                                                        <td class="px-6 py-4">' . $row["meslek"] . '</td>
                                                        <td class="px-6 py-4">
                                                            <a href="uye-islemler.php?id=' . $row["id"] . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">İşlemler</a>
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

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

</div>
<!--end container-->


<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/datatable.init.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>