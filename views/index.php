<?php require 'inc/header.php'; ?>
    <main>
    <section class="main-banner">
        <img class="main-banner-img" id="slider" src="app/public/img/1.jpg" />
        <div class="main-banner-buttons">
            <i class="fas fa-circle main-banner-button" id="main-banner-button1" onclick="setSlide(1)"></i>
            <i class="fas fa-circle main-banner-button" id="main-banner-button2" onclick="setSlide(2)"></i>
            <i class="fas fa-circle main-banner-button" id="main-banner-button3" onclick="setSlide(3)"></i>
        </div>  
    </section>
        <div class="main-container fxcol">
            <h1>Ostatnio dodane</h1>
            <div class="container-offers">
                <?php 
                $object = new Offers();
                $results = $object->showOffers();
                $limit = 8;
                for ($num = 0; $num < $limit; $num++) {
                    echo '
                    <div class="container-offers-element">
                                <div class="element-img body-img-hover-zoom">
                                    <a href="offer?id='.$results[$num]['UniqueOffers'].'"><img class="product-img" src="'.$results[$num]['ImgOffers'].'"></a>
                                </div>
                                <div class="element-bottom">
                                        <div class="element-title"><a href="offer?id='.$results[$num]['UniqueOffers'].'"><h3>'.$results[$num]['TitleOffers'].'</h3></a></div>
                                    <div class="element-desc"><p>Stan: '.$results[$num]['CondOffers'].'</p></div>
                                </div>
                                <div class="element-price">
                                    <h2>'.$results[$num]['PriceOffers'].' zł</h2>
                                </div>
                            </div>
                    ';
                    }
                ?>
            </div>
            <?php 
            if (!isset($_SESSION['username'])) {
                echo '
                    <div class="main-container-new">
                    <h2>Dołącz do sklepu Pralka już dzisiaj!</h2>
                    <h5>Sprzedawaj i kupuj używany sprzęt AGD</h5>
                    <a href="signup"><button><h3>Rejestracja</h3></button></a>
                ';
            }
            else {
                echo '
                    <div class="main-container-new">
                    <h2>Dodaj ogłoszenie,</h2>
                    <h5>a pojawi się ono tutaj</h5>
                    <a href="signup"><button><h3>Dodaj ogłoszenie</h3></button></a>
                ';
            }
            ?>
        </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>