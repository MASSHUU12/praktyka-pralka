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
                                        <div class="single-top-left"><img src="'.$results[0]['ImgOffers'].'" onclick="openLightbox();toSlideLightbox(1)" class="lightbox-hover-shadow preview" alt=""></div>
                                        <div class="single-top-right"><div id="single-title"><h2>'.$results[0]['TitleOffers'].'</h2></div><h3>'.$results[0]['DescOffers'].'</h3><h1>'.$results[0]['PriceOffers'].' Koron</h1><button id="single-button">Do koszyka</button></div>
                                    </div>
                                    <div class="single-middle"><h4>email: '.$results[0]['UploaderOffers'].'</h4><h4>numer telefonu: nie podano</h4><h4>adres: nie podano</h4></div>
                                    <div class="single-bottom">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(2) class="lightbox-hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(3) class="lightbox-hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlideLightbox(4) class="lightbox-hover-shadow preview" alt="">
                                    </div>
                                </div>
                                <div class="container-single-alike"></div>
                            </div>

                            <div id="Lightbox" class="lightbox-modal">
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
                            
                                    <a class="lightbox-previous" onclick="changeSlideLightbox(-1)">&#10094;</a>
                                    <a class="lightbox-next" onclick="changeSlideLightbox(1)">&#10095;</a>
                                  
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
                            </div>
                        ';
                    }
                ?>
            <script src="/app/public/js/offerLightbox.js"></script>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>