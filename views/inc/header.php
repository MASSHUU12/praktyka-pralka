<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="app/public/css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f2a43574a9.js" crossorigin="anonymous"></script>
    <!-- jquery and js -->
    <script src="/app/public/js/banner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- php config -->
    <?php require_once '../config/config.php'; ?> 

</head>
<body onload="changeSlide()">
    <header>
        <div class="logo"><h2>Logo</h2></div>
        <a href="site.php">categories</a>
        <div class="header-search-container">
            <input class="searchbar" type="text" placeholder="Search">
            <button class="searchbar-button"><i class="fas fa-search"></i></button>
        </div>
        <div class="header-text fxver">
            <ul>
                <a href="#"><li>Login</li></a>
                <a href="#"><li>Sign in</li></a>
            </ul>
        </div>
        <div class="header-icons fxver">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <i class="fas fa-bars fa-lg"></i>
        </div>
    </header>