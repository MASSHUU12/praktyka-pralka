<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Login</h1>
                <form action="#" method="POST">
                    <div class="container-login">
                        <input type="text" name="username" placeholder="email">
                        <input type="password" name="password" placeholder="pasword">
                        <input type="submit" name="login-submit" value="Login">
                    </div>
                </form> 
                <?php 
                if (isset($_POST['login-submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $object = new Login();
                    $object->getUser($username, $password);
                }
                ?>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>