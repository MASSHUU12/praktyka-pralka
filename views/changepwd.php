<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';
?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Zmień hasło</h1>
                <form action="" method="POST">
                    <div class="container-login">
                        <h3>Obecne hasło</h3>
                        <input type="password" name="old-password" placeholder="obecne hasło">
                        <h3>Nowe hasło</h3>
                        <input type="password" minlength="8" name="new-password" placeholder="nowe hasło">
                        <input type="password" minlength="8" name="new-password-repeat" placeholder="powtórz nowe hasło">
                        <input type="submit" name="signup-submit" value="Zmień hasło">
                     </div>
                </form>
                <?php 
                if (isset($_POST['signup-submit'])) {
                    $email = $_SESSION['email'];
                    $passwordOld = $_POST['old-password'];
                    $password = $_POST['new-password'];
                    $passwordRepeat = $_POST['new-password-repeat'];

                    $object = new Login;
                    $object->changePwd($email, $passwordOld, $password, $passwordRepeat);
                }
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>