<?php require 'inc/header.php'; ?>

    <main>
        <div class="main-container background">
            <div class="container-login-whole">
                <form action="#" method="POST">
                    <div class="container-login">
                        <?php
                        if (!isset($_GET['success'])) 
                            header("Location: login");
                        else {
                            if ($_GET['success'] == 'true') {
                                echo '<img src="app/public/img/check.png">
                                <h1 class="success">Płatność udana</h1>
                                ';
                            }
                            else if ($_GET['success'] == 'false') {
                                echo '<img src="app/public/img/x.png"><h1>Płatność nieudana</h1>';
                            }
                            else
                                header("Location: login");
                        } 
                        ?>
                        
                    </div>
                </form> 
            </div>  
        </div>
    </main>
<?php require 'inc/footer.php'; ?>