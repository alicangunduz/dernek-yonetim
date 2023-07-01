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
            <div class="sm:col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-3">
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Site Ayarlari</h4>
                        </div>
                        <!--end card-header-->
                        <div class="card-body">
                            <form action="/functions/site-ayarlar.php" method="POST">
                                <?php
                                $sql = "SELECT * FROM site_ayarlar WHERE id = 0";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $tema_renk = $row['tema_renk'];
                                $dernek_adi = $row['dernek_adi'];
                                $dernek_aciklama = $row['dernek_aciklama'];
                                $logo_link = $row['logo_link'];
                                $aidat_kac_gun = $row['aidat_kac_gun'];

                                ?>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dernek_Adi" id="Dernek_Adi"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $dernek_adi; ?>" required/>

                                        <label for="Dernek_Adi"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Dernek Adı</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dernek_Aciklama" id="Dernek_Aciklama"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $dernek_aciklama; ?>" required/>
                                        <label for="Dernek_Aciklama"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Dernek Açıklama</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dernek_Logo_Link" id="Dernek_Logo_Link"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $logo_link; ?>" required/>
                                        <label for="Dernek_Logo_Link"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Dernek Logo Link</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">

                                        <select id="Tema_Modu" name="Tema_Modu" for="Tema_Modu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 dark:focus-visible:outline-none">
                                            <option value="light" <?php if ($tema_renk == "light") {
                                                echo "selected";
                                            } ?>>
                                                Beyaz Tema
                                            </option>
                                            <option value="dark" <?php if ($tema_renk == "dark") {
                                                echo "selected";
                                            } ?>>
                                                Siyah Tema
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Aidat_Kac_Gun" id="Aidat_Kac_Gun"
                                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                               placeholder=" " value="<?php echo $aidat_kac_gun; ?>" required/>
                                        <label for="Aidat_Kac_Gun"
                                               class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Aidat Kaç Günde Bir Alınıyor ?</label>
                                    </div>

                                </div>

                                <button type="submit"
                                        class="btn bg-blue-500 text-white hover:bg-blue-600">Güncelle
                                </button>
                            </form>
                            <button type="button" onclick="executeExample('success')" id="success-button"
                                    class="focus:outline-none  focus:text-black hover:text-black dark:bg-slate-700 dark:text-slate-300 dark:hover:text-slate-200  text-indigo-700 hover:bg-opacity-50 bg-gray-100 text-sm font-medium py-2 px-3 rounded"
                                    style="display: none;">Success
                            </button>

                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end col-->
    </div>
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
    // Url id=1&durum=ok  durumu temizle
    if (url.includes("durum=ok")) {
        window.history.replaceState({}, document.title, "/site-ayarlar.php");
    }
</script>
<script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/js/pages/sweetalert.init.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>