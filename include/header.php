<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila</title>
    <link rel="stylesheet" href="/DB_CW2/css/fixednavbar(main).css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="/DB_CW2/js/main.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
    <link rel="stylesheet" href="/DB_CW2/css/view.css">
    <link rel="stylesheet" href="/DB_CW2/css/loading.css">
    <link rel="stylesheet" href="/DB_CW2/css/footer.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/DB_CW2/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/DB_CW2/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/DB_CW2/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/DB_CW2/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/DB_CW2/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/DB_CW2/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/DB_CW2/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/DB_CW2/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/DB_CW2/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/DB_CW2/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/DB_CW2/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/DB_CW2/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/DB_CW2/favicon/favicon-16x16.png">
    <link rel="manifest" href="/DB_CW2/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165886203-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-165886203-1');
    </script>

</head>
<body>
    <div class="loader-wrapper">
        <h1 class="loadingtxt">Loading. . . </h1>
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
    </div>
    <nav class="navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="/DB_CW2/page/home.php" class="logo-container"><img src="/DB_CW2/img/logo.png" alt="Sakila logo" id="logo"></a>
        <a href="/DB_CW2/page/changepassword.php"><i class="fa fa-key" id = change-pass></i></a>
        <a href="/DB_CW2/include/logout.inc.php"><i class="fa fa-sign-out-alt" id="logout"></i></a>
        <ul class="nav-container">
        <li><a href="/DB_CW2/table/actor/actor.php" class="nav-elem">Actor</a></li>
        <li><a href="/DB_CW2/table/address/address.php" class="nav-elem">Address</a></li>
        <li><a href="/DB_CW2/table/category/category.php" class="nav-elem">Category</a></li>
        <li><a href="/DB_CW2/table/city/city.php" class="nav-elem">City</a></li>
        <li><a href="/DB_CW2/table/country/country.php" class="nav-elem">Country</a></li>
        <li><a href="/DB_CW2/table/customer/customer.php" class="nav-elem">Customer</a></li>
        <li><a href="/DB_CW2/table/film/film.php" class="nav-elem">Film</a></li>
        <li><a href="/DB_CW2/table/film_actor/film_actor.php" class="nav-elem">Film Actor</a></li>
        <li><a href="/DB_CW2/table/film_category/film_category.php" class="nav-elem">Film Category</a></li>
        <li><a href="/DB_CW2/table/film_text/film_text.php" class="nav-elem">Film Text</a></li>
        <li><a href="/DB_CW2/table/inventory/inventory.php" class="nav-elem">Inventory</a></li>
        <li><a href="/DB_CW2/table/language/language.php" class="nav-elem">Language</a></li>
        <li><a href="/DB_CW2/table/payment/payment.php" class="nav-elem">Payment</a></li>
        <li><a href="/DB_CW2/table/rental/rental.php" class="nav-elem">Rental</a></li>
        <li><a href="/DB_CW2/table/staff/staff.php" class="nav-elem">Staff</a></li>
        <li><a href="/DB_CW2/table/store/store.php" class="nav-elem">Store</a></li>
        <br>
        <br>
        <br>
    </ul>
    </nav>



    