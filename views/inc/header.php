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
    <!-- header js -->
    <script src="/app/public/js/header.js"></script>
    <!-- php config -->
    <?php require_once '../config/config.php'; ?> 

</head>
<body onload="changeSlide()">
    <header class="header" id="header">
        <div class="logo"><a class="header-links" href="/"><h2>Pralka.pl</h2></a></div>
        <a class="header-links" href="site.php">categories</a>
        <div class="header-search-container">
            <input class="searchbar" type="text" placeholder="Search">
            <button class="searchbar-button"><i class="fas fa-search"></i></button>
        </div>
        <div class="header-text fxver">
            <ul>
                <?php if (isset($_SESSION['username'])) {
                    echo '
                    <a href="newoffer"><li class="header-links">Dodaj ogloszenie</li></a>
                    <a href=""><li class="header-links">'.$_SESSION['username'].'</li></a>
                    <a href="logout"><li class="header-links">Log out</li></a>
                    ';
                    }
                    else {
                        echo '
                        <a href="login"><li class="header-links">Login</li></a>
                        <a href="signup"><li class="header-links">Sign up</li></a>
                        ';
                    }
                ?>
                
            </ul>
        </div>
        <div class="header-icons fxver">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <i class="fas fa-bars fa-lg"></i>
        </div>
    </header>