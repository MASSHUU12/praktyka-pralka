<?php

class SignupModel extends Dbh {

    protected function sendUser($username, $password) {
        $sql = "INSERT INTO users (usernameUsers, passwordUsers) values(?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $hashedPassword]);        
    }
}