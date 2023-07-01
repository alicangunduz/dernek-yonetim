<!DOCTYPE html>
<?php include('includes/db.php'); ?>
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
    <meta charset="utf-8"/>
    <title>
        <?php echo $dernek_adi; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $logo_link ?>"/>

    <link rel="stylesheet" href="assets/libs/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/icons.css"/>
    <link rel="stylesheet" href="assets/css/tailwind.css"/>

</head>

<body data-layout-mode="dark"
      class="bg-gray-100 dark:bg-gray-900 bg-[url('../images/bg-body.png')] dark:bg-[url('../images/bg-body-2.png')]">


<div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
    <div
            class="w-full  m-auto bg-white light:bg-white-800/60 rounded shadow-lg ring-2 ring-white-300/50 light:ring-white-700/50 lg:max-w-md">
        <div class="text-center p-6 bg-white-900 rounded-t">
            <img src="<?php echo $logo_link ?>" alt="" class="w-20 h-30 mx-auto mb-2">
            <h3 class="font-semibold text-dark text-xl mb-1">
                <?php echo $dernek_adi; ?>
            </h3>
            <p class="text-xs text-dark-400">Yönetim Giriş Ekranı</p>
        </div>

        <form class="p-6" method="POST" action="functions/login.php">
            <div>
                <label for="kullanici_adi" class="label">Kullanıcı Adı</label>
                <input type="text" id="kullanici_adi" name="username"
                       class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
                       placeholder="Kullanıcı Adınızı Yazınız" required>
            </div>
            <div class="mt-4">
                <label for="sifre" class="label">Şifre</label>
                <input type="password" id="sifre" name="password"
                       class="form-control dark:bg-slate-800/60 dark:border-slate-700/50"
                       placeholder="Şifrenizi Giriniz" required>
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Giriş yap
                </button>
            </div>
        </form>
    </div>
</div>

<script src="assets/libs/simplebar/simplebar.min.js"></script>
</body>

</html>