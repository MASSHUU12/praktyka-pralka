<?php 

class OfferView {

    static $start;
    static $num;
    static $limit = 5;

    public static function limitOffers($results) {
        //limiting per page
        $resultCount = count($results);
        
        if (self::$limit != 0) 
            self::$num = ceil($resultCount/self::$limit);
        else
            self::$num = 0;

        if (!isset($_GET['page']) || $_GET['page'] == 1) {
            self::$start = 0;
            if ($resultCount < self::$limit)
                self::$limit = $resultCount;
        }
        else {
            if ($_GET['page'] > self::$num)
                $_GET['page'] = 1;

                self::$start = ($_GET['page']-1)*self::$limit;
            if ($_GET['page']==self::$num) {
                    self::$limit = $resultCount%self::$limit;
                }
        }
    }

    public static function showOffers($results) {
        //displays offers
        for ($i=self::$start; $i < self::$start+self::$limit; $i++) { 
            echo '
            <div class="container-search-element">
                <a href="offer?id='.$results[$i]['UniqueOffers'].'"><img src="'.$results[$i]['ImgOffers'].'" alt=""></a>
                <div class="search-element-right">
                    <div class="element-right-top">
                        <div><a href="offer?id='.$results[$i]['UniqueOffers'].'"><h3>'.$results[$i]['TitleOffers'].'</h3></a></div>
                        <div><p>'.$results[$i]['DateOffers'].'<p></div>
                    </div>
                    <div class="element-right-desc"><p>Stan: '.$results[$i]['CondOffers'].'</p></div>
                    <div><h4><span>'.$results[$i]['PriceOffers'].'</span> zł</h4></div>
                </div>
            </div>
            ';
            
        }

    }

    public static function showOrders($results) {
        //displays offers
        foreach ($results as $result) { 
            echo '
            <div class="container-search-element">
                <img src="'.$result['ImgOrders'].'" alt="">
                <div class="search-element-right">
                    <div class="element-right-top">
                        <div><h3>'.$result['TitleOrders'].'</h3></div>
                        <div><p>'.$result['DateOrders'].'<p></div>
                    </div>
                    <div class="element-right-desc"><h5>Kupujący: '.$result['BuyerOrders'].'</h5><h5>Sprzedający: '.$result['SellerOrders'].'</h5><h5>Numer zamówienia: '.$result['Id'].'</h5></div>
                    <div><h4><span>'.$result['AmountOrders'].'</span> zł</h4></div>
                </div>
            </div>
            ';
            
        }

    }

    public static function showPagination() {
        // pagination
                    echo '<div class="fxver">';
 

                        if (isset($_GET['search'])) 
                            $search = $_GET['search'];
                        else 
                            $search = '';

                        for ($page=1; $page < self::$num+1; $page++) {
                            if (!isset($_GET['page']) && $page == 1) {
                                echo '<a href="'.getUrl().'?search='. $search .'&page='.$page.'"><span><h3>'. $page .'</h3><span></a>';
                            }
                            else {
                                if (!isset($_GET['page'])) 
                                    $active = 1;
                                else 
                                    $active = $_GET['page'];
                                
                                if ($page == $active) 
                                    echo '<a href="'.getUrl().'?search='. $search .'&page='.$page.'"><span><h3>'. $page .'</h3><span></a>';
                                
                                else
                                    echo '<a href="'.getUrl().'?search='. $search .'&page='.$page.'"><h3>'. $page .'</h3></a>';
                            }
                        }
                        
                    echo '</div>';
    }
}