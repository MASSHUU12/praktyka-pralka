<?php

class Login extends LoginModel {
    
    public function getUser($username, $password) {
       $results = $this->checkUser($username);

        if ($password == $results[0]['passwordUsers']) {
            $_SESSION['userId'] = $results[0]['Id'];
            $_SESSION['username'] = $results[0]['usernameUsers'];
        }
        else
            echo 'wrong password';

       
    }

}