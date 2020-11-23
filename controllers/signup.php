<?php

class Signup extends SignupModel {

    public function getSignupInfo($username, $password, $passwordRepeat) {
        if (empty($username) || empty($password) || empty($passwordRepeat)) {
            echo 'You cant leave any fields empty';
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            echo 'wrong email';
        }
        else if ($password !== $passwordRepeat) {
            echo 'Make sure that passwords match';
        }
        else {
            $this->sendUser($username, $password);
        }
    }
}