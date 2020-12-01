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
                                        <div class="single-top-left"><img src="'.$results[0]['ImgOffers'].'" onclick="openLightbox();toSlide(1) class="hover-shadow preview" alt=""></div>
                                        <div class="single-top-right"><div id="single-title"><h2>'.$results[0]['TitleOffers'].'</h2></div><h3>'.$results[0]['DescOffers'].'</h3><h1>'.$results[0]['PriceOffers'].' Koron</h1><button id="single-button">Do koszyka</button></div>
                                    </div>
                                    <div class="single-middle"><h4>email: '.$results[0]['UploaderOffers'].'</h4><h4>numer telefonu: nie podano</h4><h4>adres: nie podano</h4></div>
                                    <div class="single-bottom">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlide(2) class="hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlide(3) class="hover-shadow preview" alt="">
                                        <img src="app/public/img/default.jpg" onclick="openLightbox();toSlide(4) class="hover-shadow preview" alt="">
                                    </div>
                                </div>
                                <div class="container-single-alike"></div>
                            </div>

                            <div id="Lightbox" class="modal">
                                <span class="close pointer" onclick="closeLightbox()">&times;</span>
                                <div class="modal-content">
                                    <div class="slide">
                                        <img src="'.$results[0]['ImgOffers'].'" class="image-slide" alt="" />
                                    </div>
                                    <div class="slide">
                                        <img src="app/public/img/default.jpg" class="image-slide" alt="" />
                                    </div>    
                                    <div class="slide">
                                        <img src="app/public/img/default.jpg" class="image-slide" alt="" />
                                    </div>
                                    <div class="slide">
                                        <img src="app/public/img/default.jpg" class="image-slide" alt="" />
                                    </div>
                            
                                    <a class="previous" onclick="changeSlide(-1)">&#10094;</a>
                                    <a class="next" onclick="changeSlide(1)">&#10095;</a>
                                  
                                    <div class="dots">
                                        <div class="col">
                                            <img src="'.$results[0]['ImgOffers'].'" class="modal-preview hover-shadow" onclick="toSlide(1)" alt="" />
                                        </div>
                                        <div class="col">
                                            <img src="app/public/img/default.jpg" class="modal-preview hover-shadow" onclick="toSlide(2)" alt="" />
                                        </div>
                                        <div class="col">
                                            <img src="app/public/img/default.jpg" class="modal-preview hover-shadow" onclick="toSlide(3)" alt="" />
                                        </div>
                                        <div class="col">
                                            <img src="app/public/img/default.jpg" class="modal-preview hover-shadow" onclick="toSlide(4)" alt="" />
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