<?php

class Offers extends OffersModel {
 
    public function showOffers() {
        $results = $this->getOffers();
        $results = array_reverse($results);
        return $results;
    }

    public function showOffersParam($column, $value) {
        $results = $this->getOffersParam($column, $value);
        $results = array_reverse($results);
        return $results;
    }

    public function deleteOffer($uniqueId, $email) {
        $column = 'UniqueOffers';
        $check = $this->showOffersParam($column, $uniqueId);
        if ($check[0]['UploaderOffers'] == $email) 
            $this->deleteOfferDb($uniqueId);
        else 
            header('Location: /error=true');
    }

}