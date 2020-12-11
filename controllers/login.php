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

    public function updateUser($email) {
        if (isset($_POST['change-submit'])) {
                $username = $_POST['username'];
                $number = $_POST['number'];
                $city = $_POST['city'];
                $zip = $_POST['zip'];
                $address = $city.', '.$zip;
                    
                $user = $this->showUser($email);
                if ($user[0]['usernameUsers'] != $username) {
                    $this->updateUserDb($email, 'usernameUsers', $username);
                    header("Location: user");
                }
                if ($user[0]['numberUsers'] != $number) {
                    $this->updateUserDb($email, 'numberUsers', $number);
                    header("Location: user");
                }
                if ($user[0]['addressUsers'] != $address) {
                    $zipCheck = $this->zipApi($zip);
                    if (!in_array($city, $zipCheck)) 
                        self::$message = 'Kod pocztowy nie zgadza się z miastem';
                    else {
                        $this->updateUserDb($email, 'addressUsers', $address);
                        header("Location: user");
                    }   
                }     
        }
    }

    private function zipApi($code) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        
        $data = [
        "codes" => $code,
        "country" => "PL"
        ];
        
        curl_setopt($ch, CURLOPT_URL, "https://app.zipcodebase.com/api/v1/search?" . http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "apikey: f050b6b0-34a3-11eb-845c-0d6a445ac681",  
        ));
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $json = json_decode($response, true);
        $cities = array();

        if (empty($json['results']))
            return $cities;

        $results = $json['results'][$code];

        foreach ($results as $result) 
            array_push($cities, $result['city']);
        
        return $cities;

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