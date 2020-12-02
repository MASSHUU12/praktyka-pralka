<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container">
            <div class="container-search">
                <div class="container-search-left">
                    <div class="search-left-element">
                        <h3>Kategoria</h3>
                        <h4>Opcja kategoria</h4>
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
                        <h4>jak nowy</h4>
                        <h4>bardzo dobry</h4>
                        <h4>dobry</h4>
                        <h4>przeciętny</h4>
                    </div>
                    
                    

                </div>
                <div class="container-search-right">
                    <?php 
                    $object = new Offers();
                    if (isset($_GET['search']) && $_GET['search'] !== '') {
                        $results = $object->searchOffers($_GET['search']);
                        if (empty($results)) {
                            echo '<h1>Nie znaleziono rezultatów dla &#39;'.$_GET['search'].'&#39; </h1>';
                        }
                    }
                    else
                        $results = $object->showOffers();
                    
                    foreach ($results as $result) {
                        echo '
                        <div class="container-search-element">
                            <a href="offer?id='.$result['UniqueOffers'].'"><img src="'.$result['ImgOffers'].'" alt=""></a>
                            <div class="search-element-right">
                                <div class="element-right-top">
                                    <div><a href="offer?id='.$result['UniqueOffers'].'"><h2>'.$result['TitleOffers'].'</h2></a></div>
                                    <div><p>'.$result['DateOffers'].'<p></div>
                                </div>
                                <div class="element-right-desc"><h5>Stan: '.$result['CondOffers'].'</h5></div>
                                <div><h4><span>'.$result['PriceOffers'].'</span> Koron</h4></div>
                            </div>
                        </div>
                        ';
                    }
                    ?>

                </div>
           </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>