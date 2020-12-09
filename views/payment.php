<?php require 'inc/header.php'; 
$column = "UniqueOffers";
$value = $_GET['id'];
$object = new Offers();
$results = $object->showOffersParam($column, $value);

if (empty($results)) 
    header("Location: user");


if (!isset($_SESSION['email'])) 
    header("Location: login");


?>

    <main>
    <div class="main-container">
            <div class="container-login-whole">
                <div class="container-login-left">
                    <div class="container-login-left-inner">
                    <div>
                        <h1>Potwierdzenie zakupu</h1>
                        <h3>Dla oferty: <span id="offer"><?php echo $results[0]['UniqueOffers']; ?></span></h3>
                        <h3>Kupujesz: <?php echo $results[0]['TitleOffers']; ?></h3>
                        <h3>Sprzedawca: <span id="seller"><?php echo $results[0]['UploaderOffers']; ?></span></h3>
                    </div>
                    <ul>
                            <li>
                                <div class="fxspc">
                                <label for="price">Cena przedmiotu: </label>
                                    <span><?php echo $results[0]['PriceOffers'].' zł'; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="fxspc">
                                <label for="price">Wysyłka: </label>
                                    <span>Darmowa</span>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="fxspc">
                                    <h4><label for="price">Do zapłaty </label></h4><h4><span id="price"><?php echo $results[0]['PriceOffers']; ?></span>zł</h4>
                                </div>
                            </li>
                        </ul>
                    <div id="paypal-payment-button"></div>
                    </div>
                </div>
                <div class="container-login-right">
                    <h2>Już prawie gotowe!</h2>
                    <h4>Wybierz jedną z opcji płatności</h4>
                    <a href="https://www.paypal.com/pl/smarthelp/topic/TRANSACTIONS" target="_blank"><h5>Potrzebujesz pomocy?</h5></a>
                    <img src="app/public/img/credit1.png" id="payment-logo">
                </div>
            </div>  
        </div>
    </main>
    <script src="https://www.paypal.com/sdk/js?client-id=AVuofnixX4Lk6JpyecCndKdMtg_eNsm_stcnHbDtrdE0eKRLi95uZ8WZP9IXi2XYsvKMWXFLpTnHeRHD&currency=PLN"></script>
    <script src="app/public/js/payment.js"></script>
</body>
<?php require 'inc/footer.php'; ?>
