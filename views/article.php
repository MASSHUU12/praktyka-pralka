<?php 
require 'inc/header.php';
$object = new SubmitArticle();
$column = "IdArticles";
if (!isset($_GET['id'])) 
    $value = '';
else 
    $value = $_GET['id'];
$results = $object->showArticle($column, $value);
?>

    <main>
        <div class="main-container"> 
            <div class="container-main-article">
                <?php 
                if (empty($results)) {
                    echo '<h1>Artykuł niedostępny</h1>';
                }
                else {
                    echo '
                        <img id="article-main-img" src="'.SubmitArticle::$imageOne.'">
                        <div class="article-title"><h1>'.$results[0]['TitleArticles'].'</h1></div>
                        <div class="article-content">
                            <p>'.$results[0]['DescArticles'].'</p>
                            <div class="fxver">
                            <img class="article-small-img" src="'.SubmitArticle::$imageTwo.'">
                            <img class="article-small-img" src="'.SubmitArticle::$imageThree.'">
                            </div>
                            <p>'.$results[0]['DescTwoArticles'].'</p>
                            <h4>Zobacz sprzęt AGD na sprzedaż na pralka.pl</h4>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>