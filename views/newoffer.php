<?php 
require 'inc/header.php';
require 'inc/notauthorized.php';
?>

    <main>
        <div class="main-container">
            <div class="container-login-whole">
                <h1>Dodaj oferte</h1>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="container-login">
                        <input type="text" name="title" placeholder="Tytuł">
                        <select name="condition">
                            <option value="null">wybierz stan</option>
                            <option value="likeNew">jak nowy</option>
                            <option value="veryGood">bardzo dobry</option>
                            <option value="good">dobry</option>
                            <option value="average">przeciętny</option>
                        </select>
                        <textarea name="description" cols="30" rows="5" placeholder="Opis"></textarea>
                        <input type="file" name="image">
                        <input type="number" name="price" min="1" step="any" placeholder="cena">
                        <input type="submit" name="offer-submit" value="Dodaj">
                    </div>
                </form> 
                <?php 
                if (isset($_POST['offer-submit'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $condition = $_POST['condition'];
                    $image = $_FILES['image'];
                    $price = $_POST['price'];

                    $object = new SubmitOffer();
                    $object->getOfferInfo($title, $description, $condition, $image, $price);
                }
                ?>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>