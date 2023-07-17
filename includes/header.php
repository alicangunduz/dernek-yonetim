<!DOCTYPE html>
<?php include('includes/db.php');


// Oturum kontrolü
session_start();

if (!isset($_SESSION['username'])) {
    // Kullanıcı girişi yapılmamış, yönlendirme yapabilirsiniz
    header('Location: /login.php');
    exit();
}


?>

<?php

$sql = "SELECT `tema_renk` , `dernek_adi` , `logo_link` FROM `site_ayarlar` WHERE `id` = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $tema_renk = $row["tema_renk"];
        $dernek_adi = $row["dernek_adi"];
        $logo_link = $row["logo_link"];

    }
} else {

}

?>

<html lang="en" dir="ltr" class="<?php echo $tema_renk; ?>">


<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $dernek_adi; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $logo_link ?>" />

    <link rel="stylesheet" href="assets/libs/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/icons.css" />
    <link rel="stylesheet" href="assets/css/tailwind.css" />
    <link rel="stylesheet" href="assets/libs/dragula/dragula.min.css">

</head>

<body data-layout-mode="light"
    class="bg-gray-100 dark:bg-gray-900 bg-[url('../images/bg-body.png')] dark:bg-[url('../images/bg-body-2.png')]">


    <!-- leftbar-tab-menu -->
    <nav class="border-gray-200 bg-gray-900 px-2.5 py-2.5 shadow-sm dark:bg-slate-800 sm:px-4 block print:hidden">
        <div class="container mx-0 flex max-w-full flex-wrap items-center lg:mx-auto">
            <div class="flex items-center">
                <a href="/" class="flex items-center outline-none">
                    <span class="text-xl font-semibold ml-2 text-white">
                        <?php echo $dernek_adi; ?>
                    </span>
                </a>
            </div>

            <div class="order-2 hidden w-full items-center justify-between md:order-1 md:ml-5 md:flex md:w-auto"
                id="mobile-menu-2">
                <ul
                    class="font-body mt-4 flex flex-col font-medium md:mt-0 md:flex-row md:text-sm md:font-medium space-x-0 md:space-x-4 lg:space-x-6 xl:space-x-8 navbar">

                    <a href="index.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-smart-home mr-1 pb-1 text-lg"></i> Anasayfa
                            </button>
                        </li>
                    </a>
                    <a href="uye-ekle.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-plus mr-1 pb-1 text-lg"></i> Üye Ekle
                            </button>
                        </li>
                    </a>
                    <a href="uye-listele.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-user mr-1 pb-1 text-lg"></i> Üye Listele
                            </button>
                        </li>
                    </a>
                    <a href="gider-ekle.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-minus mr-1 pb-1 text-lg"></i> Gider Ekle
                            </button>
                        </li>
                    </a>
                    <a href="gider-listele.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-zoom-out mr-1 pb-1 text-lg"></i> Gider Arşivi
                            </button>
                        </li>
                    </a>
                    <a href="site-ayarlar.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-settings mr-1 pb-1 text-lg"></i> Site Ayarlar
                            </button>
                        </li>
                    </a>
                    <a href="functions/cikis-yap.php">
                        <li class="dropdown">
                            <button id="navDashboardLink"
                                class="flex w-full items-center border-b border-gray-800 py-2 px-3 font-medium md:border-0 md:p-0">
                                <i class="ti ti-arrow-bar-right mr-1 pb-1 text-lg"></i> Çıkış Yap
                            </button>
                        </li>
                    </a>

                </ul>
            </div>
        </div>
    </nav>