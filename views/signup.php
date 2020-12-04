<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Rejestracja</h1>
                <form action="" method="POST">
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
                <?php 
                if (isset($_POST['signup-submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $passwordRepeat = $_POST['password-repeat'];

                    $object = new Signup;
                    $object->getSignupInfo($username, $email, $password, $passwordRepeat);
                }
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>