<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container">
                    <?php    
                        $column = "UniqueOffers";
                        $value = $_GET['id'];
                        $object = new Offers();
                        $results = $object->showOffersParam($column, $value);
                        if (empty($results)) {
                            echo '<h1>Oferta nie istnieje</h1>';
                        }
                        else {

                            echo '
                                <div class="container-single">
                                    <div class="container-single-main">
                                        <div class="single-top">
                                            <div class="single-top-left"><img src="'.$results[0]['ImgOffers'].'" alt=""></div>
                                            <div class="single-top-right"><div id="single-title"><h2>'.$results[0]['TitleOffers'].'</h2></div><h3>'.$results[0]['DescOffers'].'</h3><h1>'.$results[0]['PriceOffers'].' Koron</h1><button id="single-button">Do koszyka</button></div>
                                        </div>
                                        <div class="single-middle"><h4>email: '.$results[0]['UploaderOffers'].'</h4><h4>numer telefonu: nie podano</h4><h4>adres: nie podano</h4></div>
                                        <div class="single-bottom">
                                            <img src="app/public/img/default.jpg" alt="">
                                            <img src="app/public/img/default.jpg" alt="">
                                            <img src="app/public/img/default.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="container-single-alike"></div>
                                </div>
                            ';
                        }
                    ?>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>