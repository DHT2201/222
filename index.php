<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="asset/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="asset/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="asset/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="asset/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="asset/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="asset/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="asset/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="asset/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="asset/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="asset/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="asset/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="asset/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="asset/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="asset/image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="asset/image/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="icon" href="asset/image/favicon/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    session_start();
    error_reporting(0);
    error_reporting(E_ALL);  
    ini_set('display_errors', 1);  


    if (isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = "home";
    }

    $filenames = ['index.php'];

    foreach ($filenames as $filename) {
        if (file_exists('view/page/'.$page.'/'.$filename)) {
            include_once('view/page/'.$page.'/'.$filename);
            $fileFound = true; 
            break; 
        }else{
            include_once('view/page/404/index.php');
        }
    }
    ?>
</body>

</html>