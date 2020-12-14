<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';
$object = new SubmitArticle();
$object->getArticleInfo();

if ($_SESSION['email'] !== 'remixtro@gmail.com') {
    echo '<br><br><br><br><h1>Nie wyglądasz mi na przystojnego Michała</h1>';
    exit();
}
?>

    <main>
        <div class="main-container"> 
        <form method="POST" enctype="multipart/form-data">
            <div class="container-main-article">
                <div class="article-title">
                    <h1>
                        <?php 
                            if (!isset(SubmitArticle::$message)) 
                                echo 'Witaj Michale! Co nam dzisiaj napiszesz?';
                            else 
                                echo SubmitArticle::$message;
                        ?>
                    </h1>
                </div>
                <input type="file" name="main-img[]" id="article-main-img" multiple>
                <div class="article-title">
                    <label for="title">tytuł</label>
                    <input type="text" name="title">
                </div>
                <div class="article-content">
                    <div>
                        <label for="first">pierwsza część cześć</label>
                        <textarea name="first"></textarea>
                    </div>
                    <div class="fxver">
                    <img class="article-small-img" src="app/public/img/default.jpg">
                    <img class="article-small-img" src="app/public/img/default.jpg">
                    </div>
                    <div>
                        <label for="second">druga krótsza część</label>
                        <textarea name="second"></textarea>
                    </div>
                    <input type="submit" name="article-submit" value="gotowe Michale?">
                </div>
            </div>
        </form>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>