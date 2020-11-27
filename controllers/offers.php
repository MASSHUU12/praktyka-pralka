<?php

class Offers extends OffersModel {
 
    public function showOffers() {
        $results = $this->getOffers();
        $results = array_reverse($results);
        return $results;
    }
}