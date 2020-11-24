<?php

class SubmitOfferModel extends Dbh {

    protected function submitOfferInfo($title, $description, $condition, $image, $price) {
        $sql = "INSERT INTO offers (UniqueOffers, titleOffers, DescOffers, CondOffers, ImgOffers, priceOffers) values(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $uniqueId = uniqid();
        $stmt->execute([$uniqueId, $title, $description, $condition, $image , $price]);
    }
    
}