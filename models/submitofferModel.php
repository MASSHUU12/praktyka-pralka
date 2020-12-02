<?php

class SubmitOfferModel extends Dbh {

    protected function submitOfferInfo($title, $description, $condition, $image, $price, $uploader) {
        $sql = "INSERT INTO offers (UniqueOffers, titleOffers, DescOffers, CondOffers, ImgOffers, PriceOffers, UploaderOffers, DateOffers) values(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $uniqueId = mt_rand().mt_rand();
        $date = date("H:i j-m-y");
        $stmt->execute([$uniqueId, $title, $description, $condition, $image , $price, $uploader, $date]);
    }

}