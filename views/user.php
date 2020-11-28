<?php 
require 'inc/header.php'; 
require 'inc/notauthorized.php';
$object = new Login;
$result = $object->showUser($_SESSION['email'])
?>
    <main>
        <div class="main-container fxcol">
            <div class="background-user background"></div>
            <div class="container-user">
                <div class="container-user-top">
                    <div class="container-user-top-left">
                        <div class="image">
                            <img src="app/public/img/user.jpg">
                        </div>
                    <h3><?php echo $result[0]['usernameUsers']; ?></h3>
                    <button><h4>zmień hasło</h4></button>
                    </div>
                    <div class="container-user-top-right">
                    <h2>email: <?php echo $result[0]['emailUsers']; ?></h2>
                    <h2>adres:</h2>
                    <h2>numer telefonu:</h2>
                    </div>
                    <button id="changepwd"><h4>zmień dane</h4></button>
                </div>
                <div class="container-user-bottom">
                    <h1>Twoje ogłoszenia</h1> 
                    <div class="container-offers">
                        <?php 
                            $object = new Offers;
                            $results = $object->showOffers();
                            $number = 0;
                            foreach ($results as $result) {
                                if ($result['UploaderOffers'] == $_SESSION['email']) {
                                    echo '
                                    <div class="container-offers-element">
                                                <div class="element-img">
                                                    <img class="product-img" src="'.$result['ImgOffers'].'">
                                                </div>
                                                <div class="element-bottom">
                                                    <div class="element-title"><h3>'.$result['TitleOffers'].'</h3></div>
                                                    <div class="element-desc"><p>Stan: '.$result['CondOffers'].'</p><h2>'.$result['PriceOffers'].' koron</h2></div>
                                                </div>
                                                <div class="element-cart">
                                                    <button class="element-cart-button"><i class="fas fa-shopping-cart fa-2x"></i></button>
                                                </div>
                                            </div>
                                    ';
                                    $number++;
                                }
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