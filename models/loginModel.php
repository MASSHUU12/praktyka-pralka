<?php

class LoginModel extends Dbh {

    protected function checkUser($username) {
        $sql = "SELECT * FROM users WHERE usernameUsers = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);

        $results = $stmt->fetchAll();
        return $results;
    }

}