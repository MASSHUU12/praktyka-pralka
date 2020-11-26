<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Sign up</h1>
                <form action="" method="POST">
                    <div class="container-login">
                        <input type="text" minlength="3" name="username" placeholder="nazwa konta">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" minlength="8" name="password" placeholder="pasword">
                        <input type="password" name="password-repeat" placeholder="repeat pasword">
                        <input type="submit" name="signup-submit" value="Sign up">
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