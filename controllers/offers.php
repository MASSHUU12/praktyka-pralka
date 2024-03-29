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

    public function searchOffers($value, $cond, $from, $to, $sort) {
        if (strpos($cond, 'bardzo') !== false)
            $cond = str_replace('bardzo', 'bardzo dobry', $cond);

        if ($sort == 'asc') 
            $sort = 'ORDER BY PriceOffers DESC';
        else if ($sort == 'desc')
            $sort = 'ORDER BY PriceOffers ASC';
        else
            $sort = '';

        if ($cond == '') 
            $cond = '';
        else {
            if (strpos($cond, ',') == false) 
                $cond = "AND CondOffers = '". $cond ."'";
            else {
            
                $cond = explode(',', $cond);
                $condCount = count($cond)-1;
                for ($i=0; $i <= $condCount; $i++) { 
                    if ($i == 0)
                        $condQuery = "AND CondOffers = '". $cond[$i] ."'";
                    else
                        $condQuery = $condQuery." OR CondOffers = '". $cond[$i] ."'";
                }
                $cond = $condQuery;
            }
        }


        if ($from !== '') 
            $from = "AND PriceOffers >= $from";

        if ($to !== '') 
            $to = "AND PriceOffers <= $to";

        $results = $this->searchOffersDb($value, $cond, $from, $to, $sort);
        $results = array_reverse($results);
        return $results;
    }

    public function deleteOffer($uniqueId, $email) {
        $column = 'UniqueOffers';
        $check = $this->showOffersParam($column, $uniqueId);
            // $path = explode('s/',$check[0]['ImgOffers']);
            // $img = end($path);
            // unlink('../public/offers/'.$img);
            // $path = explode('/',$img);
            // $dir = reset($path);
            // rmdir('../public/offers/'.$dir);
            $this->deleteOfferDb($uniqueId);
            echo '<h3 class="success">Zlecono usunięcie oferty</h3>';
    }

    public function showOrdersSold($column, $value) {
        $results = $this->getOrdersSold($column, $value);
        $results = array_reverse($results);
        return $results;
    } 
}