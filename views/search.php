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
                    $limit = 5;
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
                    //limiting per page
                        $resultCount = count($results);
                        if ($resultCount > 0) 
                            echo '<h3>Liczba znalezionych ogłoszeń: '.$resultCount.'</h3>';
                        
                        if ($limit != 0) 
                            $num = ceil($resultCount/$limit);
                        else
                            $num = 0;

                        if (!isset($_GET['page']) || $_GET['page'] == 1) {
                            $start = 0;
                            if ($resultCount < $limit)
                                $limit = $resultCount;
                        }
                        else {
                            if ($_GET['page'] > $num)
                                $_GET['page'] = 1;

                            $start = ($_GET['page']-1)*$limit;
                            if ($_GET['page']==$num) {
                                    $limit = $resultCount%$limit;
                                }
                        }
                    //displays offers
                    for ($i=$start; $i < $start+$limit; $i++) { 
                        echo '
                        <div class="container-search-element">
                            <a href="offer?id='.$results[$i]['UniqueOffers'].'"><img src="'.$results[$i]['ImgOffers'].'" alt=""></a>
                            <div class="search-element-right">
                                <div class="element-right-top">
                                    <div><a href="offer?id='.$results[$i]['UniqueOffers'].'"><h3>'.$results[$i]['TitleOffers'].'</h3></a></div>
                                    <div><p>'.$results[$i]['DateOffers'].'<p></div>
                                </div>
                                <div class="element-right-desc"><h5>Stan: '.$results[$i]['CondOffers'].'</h5></div>
                                <div><h4><span>'.$results[$i]['PriceOffers'].'</span> Koron</h4></div>
                            </div>
                        </div>
                        ';
                        
                    }
                    ?>

                    <!-- pagination -->
                    <div class="fxver">
                        <?php 

                        if (isset($_GET['search'])) 
                            $search = $_GET['search'];
                        else 
                            $search = '';

                        for ($page=1; $page < $num+1; $page++) {
                            if (!isset($_GET['page']) && $page == 1) {
                                echo '<a href="search?search='. $search .'&page='.$page.'"><span><h3>'. $page .'</h3><span></a>';
                            }
                            else {
                                if (!isset($_GET['page'])) 
                                    $active = 1;
                                else 
                                    $active = $_GET['page'];
                                
                                if ($page == $active) 
                                    echo '<a href="search?search='. $search .'&page='.$page.'"><span><h3>'. $page .'</h3><span></a>';
                                
                                else
                                    echo '<a href="search?search='. $search .'&page='.$page.'"><h3>'. $page .'</h3></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
           </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>