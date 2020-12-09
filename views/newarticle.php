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
                    <h1>Witaj Michale! Co nam dzisiaj napiszesz?</h1>
                </div>
                <input type="file" name="main-img" id="article-main-img">
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
                    <input type="file" name="img-small-one" class="article-small-img">
                    <input type="file" name="img-small-two" class="article-small-img">
                    </div>
                    <div>
                        <label for="second">druga krótsza część</label>
                        <textarea name="second"></textarea>
                    </div>
                    <div>
                        <label for="link">Tutaj podaj nazwe linku</label>
                        <input type="text" name="link" id="">
                    </div>
                    <input type="submit" name="article-submit" value="gotowe Michale?">
                    <?php echo SubmitArticle::$message; ?>
                </div>
            </div>
        </form>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>