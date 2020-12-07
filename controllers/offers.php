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

    public function searchOffers($value, $cond, $sort) {
        if ($sort == 'asc') 
            $sort = 'ORDER BY PriceOffers DESC';
        else if ($sort == 'desc')
            $sort = 'ORDER BY PriceOffers ASC';
        else
            $sort = '';

        if ($cond == '') 
            $cond = '';
        else
            $cond = "AND CondOffers = '". $cond ."'";

        $results = $this->searchOffersDb($value, $cond, $sort);
        $results = array_reverse($results);
        return $results;
    }

    public function deleteOffer($uniqueId, $email) {
        $column = 'UniqueOffers';
        $check = $this->showOffersParam($column, $uniqueId);
        if ($check[0]['UploaderOffers'] == $email) {
            $path = explode('s/',$check[0]['ImgOffers']);
            $img = end($path);
            unlink('../public/offers/'.$img);
            $path = explode('/',$img);
            $dir = reset($path);
            rmdir('../public/offers/'.$dir);
            $this->deleteOfferDb($uniqueId);
            echo '<h3 class="success">Zlecono usunięcie oferty</h3>';
        }
        else 
            header('Location: /?error=true');
    }

    public function showOrdersSold($column, $value) {
        $results = $this->getOrdersSold($column, $value);
        $results = array_reverse($results);
        return $results;
    } 
}