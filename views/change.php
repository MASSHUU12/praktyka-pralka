<?php 
    require 'inc/header.php';
    require 'inc/notauthorized.php';
    $object = new Login;
    $result = $object->showUser($_SESSION['email']);

    if (!empty($result[0]['addressUsers'])) {       
        $seperate = explode(', ', $result[0]['addressUsers']);
        $city = reset($seperate);
        $region = end($seperate);
    }
    else {
        $city = 'miasto';
        $region = 'powiat';
    }

        $object = new Login();
        $object->updateUser();
?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Zmeń dane</h1>
                <form method="POST">
                    <div class="container-login">
                    <div class="container-login-element">
                        <label for="username">nazwa konta</label>
                        <input type="text" minlength="3" maxlength="10" name="username" value="<?php echo $result[0]['usernameUsers']; ?>">
                        </div>
                        <div class="container-login-element">
                        <label for="number">numer telefonu</label>
                        <input type="number" minlength="9" maxlength="12" name="number" value="<?php echo $result[0]['numberUsers']; ?>">
                        </div>
                        <div class="container-login-element">
                        <label for="city">miasto</label>
                        <input type="text" minlength="2" maxlength="30" name="city" value="<?php echo $city ?>">
                        </div>
                        <div class="container-login-element">
                        <label for="region">powiat</label>
                        <input type="text" minlength="2" maxlength="30" name="region" value="<?php echo $region ?>">
                        </div>
                        <input type="submit" name="change-submit" value="Zaakceptuj zmiany">
                    </div>
                </form>
                <h3><?php echo Signup::$message;?></h3>
            </div>
            </div>
            <div class="container-login-right">
                <h2>Ustaw swoje dane</h2>
                <h4>Twój numer oraz adres są</h4>
                <h4>widoczne dla innych</h4>
                <img src="app/public/img/logos.png" id="login-logo">
            </div>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>