<?php

class SubmitOfferModel extends Dbh {

    protected function submitOfferInfo($title, $description, $condition, $image, $price, $uploader) {
        $sql = "INSERT INTO offers (UniqueOffers, titleOffers, DescOffers, CondOffers, ImgOffers, PriceOffers, UploaderOffers, DateOffers) values(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $uniqueId = mt_rand();
        $date = date("j-m-y H:i");
        $stmt->execute([$uniqueId, $title, $description, $condition, $image , $price, $uploader, $date]);
    }
    
}