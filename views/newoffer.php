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
                                <option value="Nie podano">wybierz stan</option>
                                <option value="jak nowy">jak nowy</option>
                                <option value="bardzo dobry">bardzo dobry</option>
                                <option value="dobry">dobry</option>
                                <option value="przeciętny">przeciętny</option>
                            </select>
                            <div>
                                <input type="number" name="price" min="1" step="any" placeholder="cena">
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
                                $price = $_POST['price'];
                                $uploader = $_SESSION['email'];

                                $object = new SubmitOffer();
                                $object->getOfferInfo($title, $description, $condition, $image, $price, $uploader);
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