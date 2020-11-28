<?php

class OffersModel extends Dbh {

    protected function getOffers() {
        $sql = "SELECT * FROM offers";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getOffersParam($column, $value) {
        $sql = "SELECT * FROM offers WHERE ". $column ."= ". $value ." ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function deleteOfferDb($uniqueId) {
        $sql = "DELETE FROM offers WHERE UniqueOffers='. $uniqueId .'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

}