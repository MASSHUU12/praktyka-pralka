<?php

class SubmitOfferModel extends Dbh {

    protected function submitOfferInfo($uniqueId, $title, $description, $condition, $category, $image, $price, $uploader) {
        $sql = "INSERT INTO offers (UniqueOffers, titleOffers, DescOffers, CondOffers, CategoryOffers, ImgOffers, PriceOffers, UploaderOffers, DateOffers) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $date = date("H:i j/m/y");
        $stmt->execute([$uniqueId, $title, $description, $condition, $category, $image , $price, $uploader, $date]);
    }

    protected function submitOrderInfo($paypalId, $uniqueId, $buyer, $seller, $amount, $address, $title, $description, $condition, $category, $image, $date) {
        $sql = "INSERT INTO orders (IdOrders, UniqueOrders, BuyerOrders, SellerOrders, AmountOrders, AddressOrders, TitleOrders, DescOrders, CondOrders, CategoryOrders, ImgOrders, DateOrders) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$paypalId, $uniqueId, $buyer, $seller, $amount, $address, $title, $description, $condition, $category, $image, $date]);
    }

}