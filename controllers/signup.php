<?php

class Signup extends SignupLoginModel {

    public function getSignupInfo($username, $email, $password, $passwordRepeat) {
        $emailCheck=$this->checkUser($email);

        if (empty($username) ||empty($email) || empty($password) || empty($passwordRepeat)) {
            echo 'Pola nie mogą być puste';
        }
        else if ($password !== $passwordRepeat) {
            echo 'Hasła nie zgadzają się';
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            echo 'Nazwa zawiera niedozwolone znaki';
        }
        else if (!empty($emailCheck)) {
            echo 'Ten email już jest w użyciu';
        }
        else {
            $this->sendUser($username, $email, $password);
            echo 'Rejestracja przebiegła pomyślnie';
        }
    }
}