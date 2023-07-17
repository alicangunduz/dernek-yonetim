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
<div class="container mx-auto px-2 min-h-[calc(100vh-138px)]  relative pb-14 ">
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="sm:col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-3">
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                    <div class="card" id="odeme-alani">
                        <div class="card-header">
                            <h4 class="card-title">Gider Ekle
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="/functions/gider-ekle.php" method="POST">
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Tarih" id="Tarih"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="Tarih"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Tarih</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Dekont_No" id="Dekont_No"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="Dekont_No"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Dekont No</label>
                                    </div>
                                </div>
                                <div class="grid xl:grid-cols-2 xl:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Miktar" id="Miktar"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="Miktar"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Miktar</label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input type="text" name="Aciklama" id="Aciklama"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

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
    window.history.replaceState({}, document.title, "/gider-ekle.php");
}
</script>

<script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/js/pages/sweetalert.init.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>

</body>

</html>