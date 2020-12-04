<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container">
            <div class="container-search">
                <div class="container-search-left">
                    <div class="search-left-element">
                        <h3>Kategoria</h3>
                        <p>Opcja kategoria</p>
                        <h4>Opcja kategoria</h4>
                        <h4>Opcja kategoria</h4>
                        <h4>Opcja kategoria</h4>
                        <h4>Opcja kategoria</h4>
                    </div>
                    <div class="search-left-element">
                        <h3>Cena</h3>
                        <div class="price">
                            <input type="number" placeholder="od">
                            <input type="number" placeholder="od">
                            <input type="submit" value="szukaj">
                        </div>
                    </div>
                    <div class="search-left-element">
                        <h3>Stan</h3>
                        <a href=""><p>jak nowy</p></a>
                        <a href=""><p>bardzo dobry</p></a>
                        <a href=""><p>dobry</p></a>
                        <a href=""><p> przeciętny</p></a>
                    </div>
                    
                    

                </div>
                <div class="container-search-right">
                    <?php 
                    $object = new Offers();
                    //how many can be displayed
                    if (isset($_GET['search']) && $_GET['search'] !== '') {
                        if (!isset($_GET['cond'])) {
                            $_GET['cond'] = '';
                        }
                        $results = $object->searchOffers($_GET['search'], $_GET['cond']);
                        
                        if (empty($results)) {
                            $start = 0;
                            $limit = 0;
                            echo '<h1>Nie znaleziono rezultatów dla &#39;'.$_GET['search'].'&#39; </h1>';
                        }
                        
                    }
                    else
                        $results = $object->showOffers();

                    if (count($results) > 0) 
                        echo '<h3>Liczba znalezionych ogłoszeń: '.count($results).'</h3>';
                    
                    OfferView::limitOffers($results);
                    
                    OfferView::showOffers($results);

                    OfferView::showPagination();
                    ?>
                </div>
           </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>