<?php

class SubmitOfferModel extends Dbh {

    protected function submitOfferInfo($title, $description, $condition, $image, $price, $uploader) {
        $sql = "INSERT INTO offers (UniqueOffers, titleOffers, DescOffers, CondOffers, ImgOffers, PriceOffers, UploaderOffers) values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $uniqueId = uniqid('', true);
        $stmt->execute([$uniqueId, $title, $description, $condition, $image , $price, $uploader]);
    }
    
}