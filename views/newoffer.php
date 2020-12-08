<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';
?>

    <main>
        <div class="main-container"> 
            <form action="#" method="POST" enctype="multipart/form-data">
            <div class="container-single">
                <div class="container-single-main">
                    <div class="single-top">
                        <div class="single-top-left"><input type="file" name="image"></div>
                        <div class="single-top-right">
                            <div id="single-title">
                                <input type="text" name="title" minlength="5" maxlength="50" placeholder="Tytuł">
                            </div>
                            <div class="single-desc">
                                <textarea name="description" cols="30" rows="5" maxlength="255" placeholder="Opis"></textarea>
                            </div>
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
                            <div>
                                <input type="number" name="price" min="1" max="99999" step="any" placeholder="cena">
                                <input type="submit" name="offer-submit" class="single-button" value="Dodaj">
                            </div>
                        </div>
                    </div>
                    <div class="single-middle">
                        <?php 
                            if (isset($_POST['offer-submit'])) {
                                $image = $_FILES['image'];
                                $title = $_POST['title'];
                                $description = $_POST['description'];
                                $condition = $_POST['condition'];
                                $category = $_POST['category'];
                                $price = $_POST['price'];
                                $uploader = $_SESSION['email'];

                                $object = new SubmitOffer();
                                $object->getOfferInfo($title, $description, $condition, $category, $image, $price, $uploader);
                            }
                        ?>
                    </div>
                    <div class="single-bottom">
                        <img src="app/public/img/default.jpg" class="lightbox-hover-shadow preview" alt="">
                        <img src="app/public/img/default.jpg" class="lightbox-hover-shadow preview" alt="">
                        <img src="app/public/img/default.jpg" class="lightbox-hover-shadow preview" alt="">
                    </div>
                </div>
                <div class="container-single-alike"></div>
            </div>
            </form>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>