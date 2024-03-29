<?php require 'inc/header.php'; ?>
<?php
$object = new Login();
$object->getUser();                     
?> 


    <main>
        <div class="main-container">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Zaloguj się</h1>
                <form action="#" method="POST">
                    <div class="container-login">
                        <div class="container-login-element">
                        <label for="email">E-mail</label>
                        <input type="email" name="email">
                        </div>
                        <div class="container-login-element">
                        <label for="password">Hasło</label>
                        <input type="password" name="password">
                        </div>
                        <input type="submit" name="login-submit" value="Zaloguj się">
                    </div>
                </form>
                <h3><?php echo Login::$message;?></h3>
                </div>
            </div>
            <div class="container-login-right">
                <h2>Miło Cię znowu widzieć!</h2>
                <h4>Nie masz jeszcze konta?</h4>
                <a href="signup"><h5>Zarejestruj się</h5></a>
                <img src="app/public/img/password1.png" id="login-logo">
            </div>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>