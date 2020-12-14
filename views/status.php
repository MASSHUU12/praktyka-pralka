<?php require 'inc/header.php'; ?>

    <main>
    <div class="main-container">
            <div class="container-login-whole">
                <div class="container-login-left">
                    <div class="container-login-left-inner">
                    <?php
                        if (!isset($_GET['success'])) 
                            header("Location: login");
                        else {
                            if ($_GET['success'] == 'true') {
                                echo '<h1 class="success">Płatność udana</h1>
                                ';
                                $one = 'Transakcja powiodła się';
                                $two = 'Zamówienie możesz zobaczyć';
                                $three = 'na swoim profilu';
                                $logo = "app/public/img/check.png";
                            }
                            else if ($_GET['success'] == 'false') {
                                echo '<h1>Płatność nieudana</h1>';
                                $one = 'Ups, coś poszło nie tak';
                                $two = 'Możesz spróbować jeszcze raz';
                                $three = 'Pomoc';
                                $logo = "app/public/img/x.png";
                            }
                            else
                                header("Location: login");
                        } 
                        ?>
                    </div>
                </div>
                <div class="container-login-right">
                    <h2><?php echo $one ?></h2>
                    <h4><?php echo $two ?></h4>
                    <h4><?php echo $three ?></h4>
                    <img src="<?php echo $logo ?>" id="payment-logo">
                </div>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>