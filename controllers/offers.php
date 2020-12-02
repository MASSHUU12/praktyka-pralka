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

    public function searchOffers($value) {
        $results = $this->searchOffersDb($value);
        $results = array_reverse($results);
        return $results;
    }

    public function deleteOffer($uniqueId, $email) {
        $column = 'UniqueOffers';
        $check = $this->showOffersParam($column, $uniqueId);
        if ($check[0]['UploaderOffers'] == $email) {
            $this->deleteOfferDb($uniqueId);
            header('Location: user?success=true');
        }
        else 
            header('Location: /?error=true');
    }

}