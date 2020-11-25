<?php

class Offers extends OffersModel {
 
    public function showOffers() {
        $results = $this->getOffers();

        foreach ($results as $result) {
        echo '
        <div class="container-offers-element">
                    <div class="element-img">
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

    }
}