<?php

class Login extends SignupLoginModel {
    
    public function getUser($email, $password) {
       $results = $this->checkUser($email);
       if (!empty($results)) {
            $remotePassword = $results[0]['passwordUsers'];
            $passwordCheck = password_verify($password, $remotePassword);
            if ($passwordCheck == false) 
                echo 'Wrong password';
            else if ($passwordCheck == true) {
                $_SESSION['userId'] = $results[0]['Id'];
                $_SESSION['username'] = $results[0]['usernameUsers'];
                $_SESSION['email'] = $results[0]['emailUsers'];
                header("Location: /?login=success");
            }
            else 
                echo 'Some error occured. Please try again';
              
        }
        else
            echo 'Konto nie istnieje';
    }

    public function showUser($email) {
        $results = $this->checkUser($email);
        return $results;
    }
        

}