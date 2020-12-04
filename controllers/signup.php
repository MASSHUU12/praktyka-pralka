<?php

class Signup extends SignupLoginModel {

    public static $message;

    public function getSignupInfo() {
        if (isset($_POST['signup-submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordRepeat = $_POST['password-repeat'];
            $emailCheck=$this->checkUser($email);

            if (empty($username) ||empty($email) || empty($password) || empty($passwordRepeat)) {
                self::$message = 'Pola nie mogą być puste';
            }
            else if ($password !== $passwordRepeat) {
                self::$message = 'Hasła nie zgadzają się';
            }
            else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                self::$message = 'Nazwa zawiera niedozwolone znaki';
            }
            else if (!empty($emailCheck)) {
                self::$message = 'Ten email już jest w użyciu';
            }
            else {
                $this->sendUser($username, $email, $password);
                self::$message = 'Rejestracja przebiegła pomyślnie';
            }
        }
    }
}