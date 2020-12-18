<?php 
require 'inc/header.php'; 
if (!isset($_GET['from']))
    $from = 'od';
else
    $from = $_GET['from'];

if (!isset($_GET['to']))
    $to = 'do';
else
    $to = $_GET['to'];

?>

    <main>
        <div class="main-container">
            <div class="container-search">
                <div class="container-search-left">
                <div class="search-left-element">
                        <h3>Kategoria</h3>
                        <p>Kuchenki i piekarniki</p>
                        <p>Lodówki i zamrażalki</p>
                        <p>Pralki i suszarki</p>
                        <p>Zmywarki</p>
                        <p>Czajniki</p>
                        <p>Ekspresy do kawy i akcesoria</p>
                        <p>Miksery i blendery</p>
                        <p>Odkurzacze</p>
                        <p>Roboty kuchenne</p>
                        <p>Sprzęt myjący</p>
                        <p>Żelazka</p>
                        <p>Inne</p>
                    </div>
                    <div class="search-left-element">
                        <h3>Cena</h3>
                        <div class="price">
                            <input type="number" id="from"  placeholder = "od" value=<?php echo $from ?>>
                            <input type="number" id="to" placeholder="do" value=<?php echo $to ?>>
                            <input type="submit" onclick="priceUrl()" value="szukaj">
                        </div>
                    </div>
                    <div class="search-left-element">
                        <h3>Stan</h3>
                        <p onclick='condUrl("jak nowy")'>Jak nowy</p>
                        <p onclick='condUrl("bardzo")'>Bardzo dobry</p>
                        <p onclick='condUrl("dobry")'>Dobry</p>
                        <p onclick='condUrl("przeciętny")'>Przeciętny</p>
                        <br />
                        <p onclick='clearUrl()'>Wyczyść filtrowanie</p>
                    </div>
                    
                </div>
                <div class="container-search-right">
                    <div class="search-right-ad">
                        <img src="app/public/img/place.png" alt="">
                    </div>
                    <?php 
                    $object = new Offers();
                    //how many can be displayed

                        if (!isset($_GET['search'])) 
                            $_GET['search'] = '';
                    
                        if (!isset($_GET['cond'])) 
                            $_GET['cond'] = '';
                        
                        if (!isset($_GET['sort'])) 
                            $_GET['sort'] = '';

                        if (!isset($_GET['from'])) 
                            $_GET['from'] = '';

                        if (!isset($_GET['to'])) 
                            $_GET['to'] = '';
                        
                        $results = $object->searchOffers($_GET['search'], $_GET['cond'], $_GET['from'], $_GET['to'], $_GET['sort']);
                        
                        if (empty($results)) {
                            $start = 0;
                            $limit = 0;
                            echo '<h1>Nie znaleziono rezultatów dla &#39;'.$_GET['search'].'&#39; </h1>';
                        }

                    if (count($results) > 0) {
                        echo '
                        <div class="search-right-sort-found">
                                <h3>Liczba znalezionych ogłoszeń: '.count($results).'</h3>
                        </div>
                        <div class="search-right-sort">
                            <p>Sortuj według:</p> 
                            <select name="selectbox" id="selectbox" onchange="createUrl()">
                                <option id="opt1" value="">od najnowszych</option>
                                <option id="opt2" value="asc">cena rosnąco</option>
                                <option id="opt3" value="desc">cena malejąco</option>
                            </select>
                        </div>
                        
                        ';
                    }
                    
                    OfferView::limitOffers($results);
                    
                    OfferView::showOffers($results);

                    OfferView::showPagination();
                    ?>
                </div>
           </div>
        </div>
        <script src="/app/public/js/filterBy.js"></script>
        <!-- <script src="/app/public/js/filteringTheResults.js"></script> -->
    </main>
<?php require 'inc/footer.php'; ?>