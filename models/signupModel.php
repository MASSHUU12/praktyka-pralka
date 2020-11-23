<?php

class SignupModel extends Dbh {

    protected function sendUser($username, $password) {
        $sql = "INSERT INTO users (usernameUsers, passwordUsers) values(?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);        
    }
}