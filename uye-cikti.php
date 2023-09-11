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
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-4 xl:col-span-4 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Çıktı almak istediğiniz bilgileri seçin</h4>
                        </div>
                        <!--end card-header-->
                        <div class="card-body">
                            <form action="functions/uye-cikti-pdf.php" method="POST">
                                <label class="custom-label block dark:text-slate-300">
                                    <div
                                        class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                                        <input type="checkbox" class="hidden">
                                        <i class="fas fa-check hidden text-xs text-slate-700 dark:text-slate-200"></i>
                                    </div>
                                    Üye id
                                </label>
                            </form>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <!--end card-body-->
            </div>
            <!--end card-->
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


<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>