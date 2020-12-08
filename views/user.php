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
                    <button onclick="location.href='changepwd'"><h4>Zmień hasło</h4></button>
                    </div>
                    <div class="container-user-top-right">
                    <div class="fxver"><i class="fas fa-envelope fa-lg"></i><h3><?php echo $result[0]['emailUsers']; ?></h3></div>
                    <div class="fxver"><i class="fas fa-mobile-alt fa-lg"></i><h3><?php echo $result[0]['numberUsers']; ?></h3></div>
                    <div class="fxver"><i class="fas fa-map-marker fa-lg"></i><h3><?php echo $result[0]['addressUsers']; ?></h3></div>
                    </div>
                    <button onclick="location.href='change'" id="changepwd"><h4>Zmień dane</h4></button>
                </div>
                <div class="container-user-bottom">
                    <ul class="user-tabs">
                        <li data-tab-target="#offers" class="active-user">Twoje ogłoszenia</li>
                        <li data-tab-target="#sold">Sprzedane</li>
                        <li data-tab-target="#orders">Zamówienia</li>
                    </ul>
                    <div class="tab-content">
                        <div id="offers" class="active-user" data-tab-content>
                            <div class="container-search-right container-user-offers">

                                <?php 
                                    $object = new Offers;
                                    $results = $object->showOffersParam('UploaderOffers', $_SESSION['email']);
                                    $resultCount = count($results);

                                    OfferView::limitOffers($results);
                    
                                    OfferView::showOffers($results);

                                    OfferView::showPagination();

                                    if ($resultCount == 0) {
                                        echo '
                                        <div class="fxcol">
                                            <h1>Troche tu pusto, chyba czas to zmienić</h1>
                                            <h2>Dodaj swoje pierwsze ogłoszenie</h2>
                                            <a href="newoffer"><button><h4>Dodaj</h4></button></a>
                                        </div>
                                        ';
                                    
                                    }
                                    
                                    echo '</div>';
                                    
                                        
                                ?>

                            </div>

                            <div id="sold" data-tab-content>
                                <div class="container-search-right container-user-offers">
                                <?php 
                                    $resultsSold = $object->showOrdersSold('SellerOrders', $_SESSION['email']);
                                                        
                                    if (count($resultsSold) > 0) {  
                                    OfferView::showOrders($resultsSold);
                                    }
                                    
                                    ?>
                                </div>
                                    
                            </div>

                            <div id="orders" data-tab-content>
                            <div class="container-search-right container-user-offers">
                                <?php 
            
                                $resultsOrders = $object->showOrdersSold('BuyerOrders', $_SESSION['email']);
                                                        
                                if (count($resultsSold) > 0) {
                                

                                OfferView::showOrders($resultsOrders);

                                
                                }
                                ?>
                                    
                            </div>

                        </div>
                    </div>
                </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>