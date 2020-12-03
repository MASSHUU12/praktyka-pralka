<?php 
require 'inc/header.php'; 
require 'inc/notauthorized.php';
$object = new Login;
$result = $object->showUser($_SESSION['email']);
?>
    <main>
        <div class="main-container fxcol">
            <div class="background-user background">
            </div>
            <div class="container-user">
                <div class="container-user-top">
                    <div class="container-user-top-left">
                        <div class="image">
                            <img src="app/public/img/user.jpg">
                        </div>
                    <h3><?php echo $result[0]['usernameUsers']; ?></h3>
                    <button onclick="location.href='changepwd'"><h4>zmień hasło</h4></button>
                    </div>
                    <div class="container-user-top-right">
                    <div class="fxver"><i class="fas fa-envelope fa-lg"></i><h3><?php echo $result[0]['emailUsers']; ?></h3></div>
                    <div class="fxver"><i class="fas fa-mobile-alt fa-lg"></i><h3><?php echo $result[0]['numberUsers']; ?></h3></div>
                    <div class="fxver"><i class="fas fa-map-marker fa-lg"></i><h3><?php echo $result[0]['addressUsers']; ?></h3></div>
                    </div>
                    <button onclick="location.href='change'" id="changepwd"><h4>zmień dane</h4></button>
                </div>
                <div class="container-user-bottom">
                    <h1>Twoje ogłoszenia</h1> 
                    <div class="container-offers">
                        <?php 
                            $object = new Offers;
                            $results = $object->showOffersParam('UploaderOffers', $_SESSION['email']);
                            $number = 0;
                            foreach ($results as $result) {
                                    echo '
                                    <div class="container-offers-element">
                                        <div class="element-img body-img-hover-zoom">
                                            <a href="offer?id='.$result['UniqueOffers'].'"><img class="product-img" src="'.$result['ImgOffers'].'"></a>
                                        </div>
                                        <div class="element-bottom">
                                                <div class="element-title"><a href="offer?id='.$result['UniqueOffers'].'"><h3>'.$result['TitleOffers'].'</h3></a></div>
                                            <div class="element-desc"><p>Stan: '.$result['CondOffers'].'</p></div>
                                        </div>
                                        <div class="element-price">
                                            <h2>'.$result['PriceOffers'].' koron</h2>
                                        </div>
                                    </div>
                                    ';
                                    $number++;
                            }
                            echo '</div>';
                            if ($number == 0) {
                                echo '
                                <div class="fxcol">
                                    <h1>Troche tu pusto, chyba czas to zmienić</h1>
                                    <h2>Dodaj swoje pierwsze ogłoszenie</h2>
                                    <a href="newoffer"><button><h4>dodaj</h4></button></a>
                                </div>
                                ';
                            
                            }
                                
                        ?>
                        
                </div>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>