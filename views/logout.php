<?php 
session_start();
session_unset();
session_destroy(); 
?>
<?php require 'inc/header.php'; ?>

    <main>
    <div class="main-container">
            <div class="container-login-whole">
            <div class="container-login-left">
                <div class="container-login-left-inner">
                <h1>Zostałeś wylogowany</h1>
                </div>
            </div>
            <div class="container-login-right">
                <h2>Żegnaj</h2>
                <h4>Mamy nadzieje do niedługo</h4>
                <h4>do nas wrócisz</h4>
            </div>
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>