<?php 
require 'inc/header.php';
//require 'inc/notauthorized.php';

$object = new SubmitOffer();
$object->getOfferInfo();
?>

    <main>
    <form action="#" method="POST" id="form" enctype="multipart/form-data">
        <div class="main-container"> 
            <div class="container-single">
                <div class="container-single-main">
                    <div class="fxcol alignstart">
                        <div class="container-newoffer-element">
                            <input type="text" name="title" id="newoffer-title" minlength="5" maxlength="50" placeholder="Tytuł">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                        <input type="number" name="price" id="newoffer-price" min="1" max="99999" step="any" placeholder="cena">
                    </div>
                    <div class="single-main-img">
                        <input type="file" name="image" class="single-main-img-large"> 
                        <div class="single-img-small">
                            <img src="app/public/img/default.jpg">
                            <img src="app/public/img/default.jpg">
                            <img src="app/public/img/default.jpg">
                        </div>
                    </div>
                    <div class="single-main-cond">
                        <select name="condition">
                                <option value="Nie podano">Wybierz stan</option>
                                <option value="jak nowy">Jak nowy</option>
                                <option value="bardzo dobry">Bardzo dobry</option>
                                <option value="dobry">Dobry</option>
                                <option value="przeciętny">Przeciętny</option>
                            </select>
                            <select name="category">
                                <option value="inne">Wybierz kategorię</option>
                                <optgroup label="AGD">
                                <option value="kuchenki i piekarniki">Kuchenki i piekarniki</option>
                                <option value="lodówki i zamrażarki">Lodówki i zamrażarki</option>
                                <option value="pralki i suszarki">Pralki i suszarki</option>
                                <option value="zmywarki">Zmywarki</option>
                                <optgroup label="Małe agd">
                                <option value="czajniki">Czajniki</option>
                                <option value="ekspresy do kawy i akcesoria">Ekspresy do kawy i akcesoria</option>
                                <option value="miksery i blendery">Miksery i blendery</option>
                                <option value="odkurzacze">Odkurzacze</option>
                                <option value="roboty kuchenne">Roboty kuchenne</option>
                                <option value="sprzęt myjący">Sprzęt myjący</option>
                                <option value="żelazka">Żelazka</option>
                                <option value="inne">Inne</option>
                            </select>
                    </div>
                    <div class="single-main-desc">
                        <div class="container-newoffer-element">
                        <textarea name="description" id="newoffer-desc" cols="30" rows="5" maxlength="255" placeholder="Opis"></textarea>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>error</small>
                        </div>
                    </div>
                </div>
                <div class="container-single-right">
                    <div class="single-right-top">
                        <div>
                            <h3>Dodaj opcje dostawy:</h3>
                            <div>
                                <div class="fxcol smallgap alignstart">
                                    <div class="fxver smallgap">
                                        <input type="checkbox" name="" id=""><p>Odbiór osobisty</p>
                                    </div>
                                    <div class="fxver smallgap">
                                        <input type="checkbox" name="" id=""><p>Przesyłka kurierska</p>
                                    </div>
                                    <div class="fxver smallgap">
                                        <input type="checkbox" name="" id=""><p>Paczka pocztowa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="submit" name="offer-submit" value="Dodaj">
                        </div>
                    </div>
                    <h3><?php echo SubmitOffer::$message;?></h3>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="/app/public/js/offerValidation.js" defer></script>
<?php require 'inc/footer.php'; ?>