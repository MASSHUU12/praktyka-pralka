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
                        $objectTwo = new Login();
                        $infos = $objectTwo->showUser($results[0]['UploaderOffers']);
                        echo '
                            <div class="container-single">
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
                                }
                            echo '
                                <div class="container-single-main">
                                    <div class="single-top">
                                        <div class="single-top-left"><img src="'.$results[0]['ImgOffers'].'" onclick="openLightbox();toSlideLightbox(1)" class="lightbox-hover-shadow preview" alt=""></div>
                                        <div class="single-top-right">
                                            <div id="single-title">
                                                <h2>'.$results[0]['TitleOffers'].'</h2>
                                            </div>
                                            <div class="single-desc">
                                                <p>'.$results[0]['DescOffers'].'</p>
                                            </div>
                                            <h5>Stan: '.$results[0]['CondOffers'].'</h5>
                                            <div class="">
                                                <h3><span>'.$results[0]['PriceOffers'].'</span> zł</h3>
                                                <a href="payment?id='.$results[0]['UniqueOffers'].'"><button class="single-button">KUP TERAZ</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-middle"><h4>email: <span>'.$results[0]['UploaderOffers'].'</span></h4><h4>numer telefonu: <span>'.$infos[0]['numberUsers'].'</span></h4><h4>adres: <span>'.$infos[0]['addressUsers'].'</span></h4></div>
                                    <div class="single-bottom">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(2)" class="lightbox-hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(3)" class="lightbox-hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(4)" class="lightbox-hover-shadow preview" alt="">
                                    </div>
                                </div>
                                <div class="container-single-alike"></div>
                            </div>

                            <div id="lightbox" class="lightbox-modal">
                                <div class="lightbox-modal-inner">
                                    <span class="lightbox-close pointer" onclick="closeLightbox()">&times;</span>
                                    <div class="lightbox-modal-content">
                                        <div class="lightbox-slide">
                                            <img src="'.$results[0]['ImgOffers'].'" class="lightbox-image-slide" alt="" />
                                        </div>
                                        <div class="lightbox-slide">
                                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                                        </div>    
                                        <div class="lightbox-slide">
                                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                                        </div>
                                        <div class="lightbox-slide">
                                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                                        </div>
                                
                                        
                                    
                                        <div class="lightbox-dots">
                                            <div class="lightbox-col">
                                                <img src="'.$results[0]['ImgOffers'].'" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(1)" alt="" />
                                            </div>
                                            <div class="lightbox-col">
                                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(2)" alt="" />
                                            </div>
                                            <div class="lightbox-col">
                                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(3)" alt="" />
                                            </div>
                                            <div class="lightbox-col">
                                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(4)" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <a class="lightbox-previous" onclick="changeSlideLightbox(-1)">&#10094;</a>
                                        <a class="lightbox-next" onclick="changeSlideLightbox(1)">&#10095;</a>
                                </div>
                            </div>
                        ';
                    }
                ?>
            <script src="/app/public/js/offerLightbox.js"></script>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>