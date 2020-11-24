<?php

class OffersModel extends Dbh {

    protected function getOffers() {
        $sql = "SELECT * FROM offers";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

}