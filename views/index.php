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
        <div class="main-container">
            <div class="container-offers">
                <?php 
                $object = new Offers;
                $results = $object->showOffers();

                foreach ($results as $result) {
                    echo '
                    <div class="container-offers-element">
                                <div class="element-img body-img-hover-zoom">
                                    <img class="product-img" src="'.$result['ImgOffers'].'">
                                </div>
                                <div class="element-bottom">
                                    <div class="element-title"><h3>'.$result['TitleOffers'].'</h3></div>
                                    <div class="element-desc"><p>'.$result['DescOffers'].'</p><h2>'.$result['PriceOffers'].' koron</h2></div>
                                </div>
                                <div class="element-cart">
                                    <button class="element-cart-button"><i class="fas fa-shopping-cart fa-2x"></i></button>
                                </div>
                            </div>
                    ';
                    }
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>