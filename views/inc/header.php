<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep internetowy Pralka</title>
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
    <script src="/app/public/js/userTabs.js" defer></script>
    <script src="/app/public/js/scrollToTop.js"></script>
    <!-- php config -->
    <?php require_once '../config/config.php'; ?> 

</head>
<body onload="changeSlide()">
    <header class="header" id="header">
            <div>
                <a class="header-links" href="/"><img  class="logo" src="app/public/img/logo.png" alt=""></a>
            </div>
            <div class="categories-dropdown">
                <i class="header-links" id="header-categories-dropdown-button">Kategorie</i>
                <div class="header-categories-dropdown-content">
                    <p>Kuchenki i pierkaniki</p>
                    <p>Lodówki i zamrażalki</p>
                    <p>Pralki i suszarki</p>
                    <p>Zmywarki</p>
                    <p>Czajniki</p>
                    <p>Ekspresy do kawy i akcesoria</p>
                    <p>Miksery i blendery</p>
                    <p>Odkurzacze</p>
                    <p>Roboty kuchenne</p>
                    <p>Sprzet myjący</p>
                    <p>Żelazka</p>
                    <p>Inne</p>                               
                </div>
            </div>
        <div class="header-search-container">
            <form action="search" method="GET" autocomplete="off">
            <input class="searchbar" id="header-searchbar-dropdown-button" type="text" name="search" placeholder="Czego dzisiaj szukasz?" onclick="headerSearchbar()">
            <button type="submit" class="searchbar-button"><i class="fas fa-search"></i></button>
            </form>
            <div id="header-searchbar-dropdown-id" class="header-searchbar-dropdown-content">
            </div>
        </div>
        <div class="header-text fxver">
            <ul>
                <?php if (isset($_SESSION['username'])) {
                    echo '
                    <a href="newoffer"><li class="header-links">Dodaj ogłoszenie</li></a>
                    <a href="user"><li class="header-links">'.$_SESSION['username'].'</li></a>
                    <a href="logout"><li class="header-links">Wyloguj się</li></a>
                    ';
                    }
                    else {
                        echo '
                        <a href="login"><li class="header-links">Zaloguj się</li></a>
                        <a href="signup"><li class="header-links">Rejestracja</li></a>
                        ';
                    }
                ?>     
            </ul>
        </div>
            <div class="header-hamburger-dropdown">
                <i class="fas fa-bars fa-2x" id="header-hamburger-dropdown-button-2"></i>
                <div class="header-hamburger-dropdown-content">
                    <h5 class="header-hamburger-dropdown-links">Logowanie</h5>
                    <h5 class="header-hamburger-dropdown-links">Rejestracja</h5>
                </div>
            </div>
            <div class="header-hamburger-dropdown">
                <i class="fas fa-comment fa-lg" id="header-hamburger-dropdown-button"></i>
                <div class="header-hamburger-dropdown-content">
                    <div class="header-messages-whole">
                        <h4>Centrum Wiadomości</h4> 
                        <?php 
                        if (isset($_SESSION['email'])) {
                            $object = new Offers;
                            $resultsSold = $object->showOrdersSold('SellerOrders', $_SESSION['email']);                         
                            if (count($resultsSold) > 0) 
                            OfferView::showNotif($resultsSold);
                        }
                        else
                            OfferView::showNotifNotLogged();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- searchbar live search -->
        <script src="/app/public/js/headerSearchbar.js"></script>
    </header>