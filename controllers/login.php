<?php

class Login extends SignupLoginModel {
    
    public function getUser($username, $password) {
       $results = $this->checkUser($username);
       if (!empty($results)) {
            $remotePassword = $results[0]['passwordUsers'];
            $passwordCheck = password_verify($password, $remotePassword);
            if ($passwordCheck == false) 
                echo 'Wrong password';
            else if ($passwordCheck == true) {
                $_SESSION['userId'] = $results[0]['Id'];
                $_SESSION['username'] = $results[0]['usernameUsers'];
                header("Location: /?login=success");
            }
            else 
                echo 'Some error occured. Please try again';
              
        }
        else
            echo 'Konto nie istnieje';
    }
        

}