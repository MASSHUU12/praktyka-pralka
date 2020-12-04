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
                <form method="POST">
                    <div class="container-login">
                        <input type="text" minlength="3" name="username" placeholder="nazwa konta">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" minlength="8" name="password" placeholder="haslo">
                        <input type="password" name="password-repeat" placeholder="powtórz hasło">
                        <div class="checkbox">
                        <input type="checkbox" required='required' name="agree">
                        <label for="agree">Wyrażam zgode na przetwarzanie moich danych osobowych oraz akceptuje regulamin serwisu. Zdaję sobie sprawę, że serwis pralka jest tylko projektem edukacyjnym.</label>
                        </div>
                        <input type="submit" name="signup-submit" value="Zarejestruj się">
                    </div>
                </form>
                <h3><?php echo Signup::$message;?></h3>
            </div>
            </div>
            <div class="container-login-right">
                <h2>Dołącz do nas już dzisiaj</h2>
                <h4>Sprzedawaj i kupuj używany</h4>
                <h4>sprzęt AGD</h4>
                <img src="app/public/img/logos.png" id="login-logo">
            </div>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>