<?php 
session_start();
session_unset();
session_destroy(); 
?>
<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container">
            <div class="container-login-whole">
                <div class="container-login">
                    <h1>You have been logged out</h1>
                </div>
            </div>
        </div>
    </main>
<?php require 'inc/footer.php'; ?>