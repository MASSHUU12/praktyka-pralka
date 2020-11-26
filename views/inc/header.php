<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep internetowy pralka</title>
    <!-- bar graphic -->
    <link rel="shortcut icon" href="app/public/img/barxd.png" width="80%" height="90%">
    <link rel="stylesheet" href="app/public/css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f2a43574a9.js" crossorigin="anonymous"></script>
    <!-- jquery and js -->
    <script src="/app/public/js/banner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/app/public/js/header.js"></script>
    <script src="/app/public/js/hamburgerdropdown.js"></script>
    <script src="/app/public/js/headerCategories.js"></script>
    <script src="/app/public/js/headerSearchbar.js"></script>
    <!-- php config -->
    <?php require_once '../config/config.php'; ?> 

</head>
<body onload="changeSlide()">
    <header class="header" id="header">
        <div><a class="header-links" href="/"><img  class="logo" src="app/public/img/logo.png" alt=""></a></div>
        <i class="header-links" id="header-categories-dropdown-button" onclick="headerCategories()">Categories</i>
        <div id="header-categories-dropdown-id" class="header-categories-dropdown-content">
            <p>Kuchenki mikrofalowe</p>
            <p>Lodówki i zamrażarki</p>  
            <p>Pralki i suszarki</p>  
            <p>Roboty kuchenne</p>       
            <p>Zmywarki</p>                                     
        </div>
        <div class="header-search-container">
            <input class="searchbar" id="header-searchbar-dropdown-button" type="text" placeholder="Search" onclick="headerSearchbar()">
            <button class="searchbar-button"><i class="fas fa-search"></i></button>
            <div id="header-searchbar-dropdown-id" class="header-searchbar-dropdown-content">
                <p>Wynik 1</p>
                <p>Wynik 2</p>
                <p>Wynik 3</p>
                <p>Wynik 4</p>
                <p>Wynik 5</p>
            </div>
        </div>
        <div class="header-text fxver">
            <ul>
                <?php if (isset($_SESSION['username'])) {
                    echo '
                    <a href="newoffer"><li class="header-links">Dodaj ogloszenie</li></a>
                    <a href="user"><li class="header-links">'.$_SESSION['username'].'</li></a>
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
        </div>
        <div class="header-hamburger-dropdown">
            <i class="fas fa-bars fa-lg" onclick="headerHamburger()" id="header-hamburger-dropdown-button"></i>
            <div id="header-hamburger-dropdown-id" class="header-hamburger-dropdown-content">
                <p>Profile</p>
                <p>Orders</p>
                <p>Menu</p>
                <p>Contact</p>
            </div>
        </div>
        </div>
        
    </header>