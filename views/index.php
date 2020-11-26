<?php require 'inc/header.php'; ?>
    <main>
    <section class="main-banner">
        <img class="main-banner-img" id="slider" src="app/public/img/1.jpg" />
        <div class="main-banner-buttons">
            <i class="fas fa-circle main-banner-button" id="main-banner-button1" onclick="setSlide(1)"></i>
            <i class="fas fa-circle main-banner-button" id="main-banner-button2" onclick="setSlide(2)"></i>
            <i class="fas fa-circle main-banner-button" id="main-banner-button3" onclick="setSlide(3)"></i>
        </div>  
    </section>
        <div class="main-container">
            <div class="container-offers">
                <?php 
                $object = new Offers;
                $object->showOffers();
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>