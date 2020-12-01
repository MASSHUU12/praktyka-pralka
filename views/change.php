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

    if (isset($_POST['change-submit'])) {
        $email = $result[0]['emailUsers'];
        $username = $_POST['username'];
        $number = $_POST['number'];
        $city = $_POST['city'];
        $region = $_POST['region'];
        $address = $city. ', ' .$region;

        $object = new Login();
        $object->updateUser($email, $username, $number, $address);
        }
?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <h1>Zmeń dane</h1>
                <form action="" method="POST">
                    <div class="container-login">
                        <h5>nazwa konta</h5>
                        <input type="text" minlength="3" maxlength="10" name="username" value="<?php echo $result[0]['usernameUsers']; ?>">
                        <h5>Numer telefonu</h5>
                        <input type="number" minlength="9" maxlength="12" name="number" value="<?php echo $result[0]['numberUsers']; ?>">
                        <h3>Lokalizacja</h3>
                        <input type="text" minlength="2" maxlength="30" name="city" value="<?php echo $city ?>">                  
                        <input type="text" minlength="2" maxlength="30" name="region" value="<?php echo $region ?>">
                        <input type="submit" name="change-submit" value="Zaakceptuj zmiany">
                     </div>
                </form>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>