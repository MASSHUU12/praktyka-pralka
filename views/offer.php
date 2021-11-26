<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container">
                <?php    
                    $column = "UniqueOffers";
                    if (!isset($_GET['id'])) 
                        $value = '';
                    else 
                        $value = $_GET['id'];

                    $object = new Offers();
                    $results = $object->showOffersParam($column, $value);

                    if (empty($results)) {
                        echo '<h1>Oferta nie istnieje</h1>';
                    }
                    else {
                        $objectTwo = new Login();
                        $infos = $objectTwo->showUser($results[0]['UploaderOffers']);
                        echo '
                            <div class="container-single">
                                <div class="container-single-left">
                            ';

                                if (isset($_SESSION['email'])) {
                                    if ($_SESSION['email'] == $results[0]['UploaderOffers']) {
                                    echo '
                                        <div class="container-single-admin">
                                        <h2>Ta oferta należy do ciebie</h2>                                           
                                            <form method="POST">
                                                <div class="fxver">
                                                    <input type="submit" value="edytuj">
                                                    <input type="submit" name="delete" value="usuń">
                                                </div>
                                            </form>
                                        </div>
                                        ';
                                        if (isset($_POST['delete'])) {
                                            $object->deleteOffer($results[0]['UniqueOffers'], $_SESSION['email']);
                                        }
                                    }
                                    if ($_SESSION['email'] == 'admin@admin.com') {
                                        echo '
                                            <div class="container-single-admin">
                                            <h2>Jesteś administatorem</h2>                                           
                                                <form method="POST">
                                                    <div class="fxver">
                                                        <input type="submit" name="delete" value="usuń">
                                                    </div>
                                                </form>
                                            </div>
                                            ';
                                            if (isset($_POST['delete'])) {
                                                $object->deleteOffer($results[0]['UniqueOffers'], $_SESSION['email']);
                                            }
                                        }
                                }
                            echo '
                                    <div class="container-single-main">
                                        <h2>'.$results[0]['TitleOffers'].'</h2>
                                        <h2><span>'.$results[0]['PriceOffers'].'</span> zł</h2>
                                        <div class="single-main-img">
                                            <img class="single-main-img-large" src="'.$results[0]['ImgOffers'].'" onclick="openLightbox();toSlideLightbox(1)" class="lightbox-hover-shadow preview">
                                            <div class="single-img-small">
                                                <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(2)" class="preview">
                                                <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(2)" class="preview">
                                                <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(2)" class="preview">
                                            </div>
                                        </div>
                                        <div class="single-main-cond">
                                            <h4>Stan: '.$results[0]['CondOffers'].'</h4>
                                            <h4>Kategoria: '.$results[0]['CategoryOffers'].'</h4>
                                        </div>
                                        <div class="single-main-desc">
                                            <h3>Opis</h3>
                                            <p>'.$results[0]['DescOffers'].'</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-single-right">
                                    <div class="single-right-top">
                                        <div>
                                            <h3>Opcje dostawy:</h3>
                                            <div>
                                                <p>Odbiór osobisty</p>
                                                <p>Przesyłka kurierska</p>
                                                <p>Paczka pocztowa</p>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="payment?id='.$results[0]['UniqueOffers'].'"><button><h3>Kup teraz</h3></button></a>
                                        </div>
                                    </div>
                                    <div class="single-right-bottom">
                                        <h3>'.$infos[0]['usernameUsers'].'</h3>
                                        <div>
                                            <p><i class="fas fa-envelope fa-lg"></i> <span>'.$results[0]['UploaderOffers'].'</span></p>
                                            <p><i class="fas fa-mobile-alt fa-lg"></i> <span>'.$infos[0]['numberUsers'].'</span></p>
                                            <p><i class="fas fa-map-marker fa-lg"></i> <span>'.$infos[0]['addressUsers'].'</span></p>
                                        </div>
                                    </div>
                                    <div class="single-right-date">
                                        <p><span>Dodano: '.$results[0]['DateOffers'].'</span></p>
                                    </div>
                                </div>
                                ';
                                Lightbox::showLightbox($results[0]['ImgOffers']);
                            echo '
                            </div>
                            ';
                    }
                ?>
            <script src="/app/public/js/offerLightbox.js"></script>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>