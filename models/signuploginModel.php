<?php

class SignupLoginModel extends Dbh {

    protected function sendUser($username, $email, $password) {
        $sql = "INSERT INTO users (usernameUsers ,emailUsers, passwordUsers) values(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $email, $hashedPassword]);        
    }

    protected function checkUser($email) {
        $sql = "SELECT * FROM users WHERE emailUsers = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $results = $stmt->fetchAll();
        return $results;
    }
}