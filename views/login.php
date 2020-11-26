<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Zaloguj się</h1>
                <form action="#" method="POST">
                    <div class="container-login">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" name="password" placeholder="hasło">
                        <input type="submit" name="login-submit" value="Zaloguj się">
                    </div>
                </form> 
                <?php 
                if (isset($_POST['login-submit'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $object = new Login();
                    $object->getUser($email, $password);
                }
                ?>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>