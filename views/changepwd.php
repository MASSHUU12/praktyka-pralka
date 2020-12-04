<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';
?>

<?php 
$object = new Login;
$object->changePwd();
                
?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Zmień hasło</h1>
                <form method="POST">
                    <div class="container-login">
                    <div class="container-login-element">
                        <label for="old-password">obecne hasło</label>
                        <input type="password" name="old-password">
                        </div>
                        <div class="container-login-element">
                        <label for="new-password">nowe hasło</label>
                        <input type="password" minlength="8" name="new-password">
                        </div>
                        <div class="container-login-element">
                        <label for="new-password-repeat">powtórz nowe hasło</label>
                        <input type="password" minlength="8" name="new-password-repeat">
                        </div>
                        <input type="submit" name="signup-submit" value="Zmień hasło">
                    </div>
                </form>
                <h3><?php echo Signup::$message;?></h3>
            </div>
            </div>
            <div class="container-login-right">
                <h2>Dołącz do nas już dzisiaj</h2>
                <h4>Sprzedawaj i kupuj używany</h4>
                <h4>sprzęt AGD</h4>
            </div>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>