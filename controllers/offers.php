<?php

class Offers extends OffersModel {
 
    public function showOffers() {
        $results = $this->getOffers();
        return $results;
    }
}