<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';

$object = new Login;
$object->changePwd();
                
?>

    <main>
        <div class="main-container">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Zmień hasło</h1>
                <form method="POST" id="form">
                    <div class="container-login">
                        <div class="container-login-element">
                            <label for="old-password">Obecne hasło</label>
                            <input type="password" name="old-password">
                        </div>
                        <div class="container-login-element">
                            <label for="new-password">Nowe hasło</label>
                            <input type="password" minlength="8" name="new-password" id="password">
                            <div class="pwd-indicators">
                            <span id="weak"></span>
                            <span id="medium"></span>
                            <span id="strong"></span>
                            </div>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <div class="container-login-element">
                            <label for="new-password-repeat">Powtórz nowe hasło</label>
                            <input type="password" minlength="8" name="new-password-repeat" id="password-repeat">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <input type="submit" name="signup-submit" value="Zmień hasło">
                    </div>
                </form>
                <h3><?php echo Signup::$message;?></h3>
            </div>
            </div>
            <div class="container-login-right">
                <h2>Zasady bezpiecznego hasła:</h2>
                <h4>- co najmniej 8 znaków</h4>
                <h4>- nie używaj wyrazów słownikowych</h4>
                <h4>- korzystaj ze znaków specjalnych</h4>
                <img src="app/public/img/hash1.png" id="pwd-logo">
            </div>
            </div>
        </div>
    </main>
<script src="/app/public/js/pwdValidation.js" defer></script>
<?php require 'inc/footer.php'; ?>