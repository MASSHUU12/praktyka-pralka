<?php require 'inc/header.php'; ?>

<?php 
$object = new Signup;
$object->getSignupInfo();
                
?>

    <main>
        <div class="main-container">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Rejestracja</h1>
                <form method="POST" id="form">
                    <div class="container-login">
                        <div class="container-login-element">
                            <label for="username">Nazwa konta</label>
                            <input type="text" minlength="3" name="username" id="username">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <div class="container-login-element">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <div class="container-login-element">
                            <label for="password">Hasło</label>
                            <input type="password" minlength="8" name="password" id="password">
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
                            <label for="password-repeat">Powtórz hasło</label>
                            <input type="password" name="password-repeat" id="password-repeat">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <div class="checkbox">
                        <input type="checkbox" required='required' name="agree">
                        <label for="agree">Wyrażam zgode na przetwarzanie moich danych osobowych, oraz akceptuje <a href="/app/public/pdf/regulations.pdf" target="_blank">regulamin</a> serwisu. Zdaję sobie sprawę, że serwis pralka jest tylko projektem edukacyjnym.</label>
                        </div>
                        <input type="submit" name="signup-submit" value="Zarejestruj się">
                    </div>
                </form>
                <h3><?php echo Signup::$message;?></h3>
            </div>
            </div>
            <div class="container-login-right">
                <h2>Dołącz do nas już dzisiaj!</h2>
                <h4>Sprzedawaj i kupuj używany</h4>
                <h4>sprzęt AGD</h4>
                <img src="app/public/img/logos.png" id="standard-logo">
            </div>
            </div>
        </div>
    </main>
    <script src="/app/public/js/inputValidation.js" defer></script>
<?php require 'inc/footer.php'; ?>