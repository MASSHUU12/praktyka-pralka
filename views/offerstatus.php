<?php 
require 'inc/header.php'; 

if (!isset($_GET['id']) || !isset($_SESSION['email'])) {
        header("Location: 404");
}

?>
<main>
    <div class="main-container">
        <div class="offerstatus">    
            <h2>Wystawiłeś przedmiot na sprzedaż</h2>
            <h4>Twoja oferta niebawem pojawi się w serwisie</h4>
            <div></div>
            <p>Link do twojej oferty: <span class="green"><a href="offer?id=<?php echo $_GET['id'];?>"><?php echo $_GET['id'];?></a></span></p>
        </div>  
    </div>
</main>
<?php require 'inc/footer.php'; ?>