<?php require 'inc/header.php'; 
$column = "UniqueOffers";
$value = $_GET['id'];
$object = new Offers();
$results = $object->showOffersParam($column, $value);

if (!isset($_SESSION['email'])) {
    header("Location: login");
}

?>

    <main>
        <div class="main-container">
            <div class="container-login-whole">
                <div class="container-login">
                    <h2>Potwierdzenie zakupu</h2>
                    <h3>Dla oferty: <span id="offer"><?php echo $results[0]['UniqueOffers']; ?></span></h3>
                    <h3>Kupujesz: <?php echo $results[0]['TitleOffers']; ?></h3>
                    <h3>Email sprzedawcy: <span id="seller"><?php echo $results[0]['UploaderOffers']; ?></span></h3>
                        <ul>
                            <li>
                                <label for="price">Cena przedmiotu: </label>
                                <span><?php echo $results[0]['PriceOffers'].' zł'; ?></span>
                            </li>
                            <li>
                                <label for="price">Wysyłka: </label>
                                <span>Darmowa</span>
                            </li>
                            <hr>
                            <li>
                                <h4><label for="price">Do zapłaty </label><span id="price" class="text-red font-title"><?php echo $results[0]['PriceOffers']; ?></span>zł</h4>
                            </li>
                        </ul>
                        <div id="paypal-payment-button"></div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://www.paypal.com/sdk/js?client-id=AVuofnixX4Lk6JpyecCndKdMtg_eNsm_stcnHbDtrdE0eKRLi95uZ8WZP9IXi2XYsvKMWXFLpTnHeRHD&currency=PLN"></script>
    <script src="app/public/js/payment.js"></script>
</body>
<?php require 'inc/footer.php'; ?>
