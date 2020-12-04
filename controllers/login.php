<?php

class Login extends SignupLoginModel {

    public static $message;
    
    public function getUser() {
        if (isset($_POST['login-submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $results = $this->checkUser($email);
            if (!empty($results)) {
                    $remotePassword = $results[0]['passwordUsers'];
                    $passwordCheck = password_verify($password, $remotePassword);
                    if ($passwordCheck == false) {
                        self::$message = 'Dane logowania są niepoprawne';
                    }
                    else if ($passwordCheck == true) {
                        $_SESSION['userId'] = $results[0]['Id'];
                        $_SESSION['username'] = $results[0]['usernameUsers'];
                        $_SESSION['email'] = $results[0]['emailUsers'];
                        header("Location: /?login=success");
                    }
                    else 
                    self::$message = 'Wystąpił problem, spróbuj ponownie';
                    
                }
                else
                    self::$message = 'Konto nie istnieje';
        }
    }

    public function showUser($email) {
        $results = $this->checkUser($email);
        return $results;
    }

    public function updateUser() {
        if (isset($_POST['change-submit'])) {
                $email = $result[0]['emailUsers'];
                $username = $_POST['username'];
                $number = $_POST['number'];
                $city = $_POST['city'];
                $region = $_POST['region'];
                $address = $city. ', ' .$region;
            $user = $this->showUser($email);
            if ($user[0]['usernameUsers'] != $username)
                $this->updateUserDb($email, 'usernameUsers', $username);
            if ($user[0]['numberUsers'] != $number) 
                $this->updateUserDb($email, 'numberUsers', $number);
            if ($user[0]['addressUsers'] != $address) 
                $this->updateUserDb($email, 'addressUsers', $address);

            header("Location: user");
        }
    }

    public function changePwd() {
        if (isset($_POST['signup-submit'])) {
                    $email = $_SESSION['email'];
                    $passwordOld = $_POST['old-password'];
                    $password = $_POST['new-password'];
                    $passwordRepeat = $_POST['new-password-repeat'];
                if (empty($email) || empty($passwordOld) || empty($password) || empty($passwordRepeat)) {
                    echo 'Pola nie mogą być puste';
                }
                else {
                    $user = $this->showUser($email);
                    $remotePassword = $user[0]['passwordUsers'];
                    $passwordCheck = password_verify($passwordOld, $remotePassword);
                    
                    if ($passwordCheck == false) 
                        echo 'Hasło jest niepoprawne';
                    else if ($passwordCheck == true) {
                        if ($password !== $passwordRepeat) {
                            echo 'Hasła nie zgadzają się';
                        }
                        else if ($password == $passwordRepeat) {
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            $this->updateUserDb($email, 'passwordUsers', $hashedPassword);

                            header("Location: user");
                        }
                        else 
                            echo 'Wystąpił problem, spróbuj ponownie';
                    }
                    else 
                        echo 'Wystąpił problem, spróbuj ponownie';
                }
        }
        
    }

}