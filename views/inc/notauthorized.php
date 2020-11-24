<?php 
    if (!isset($_SESSION['username'])) { 
        echo '
            <main>
                <div class="main-container">
                    <div class="container-login-whole">
                        <div class="container-login">
                            <h1>Nie masz dostepu do tej strony. Napierw zaloguj sie</h1>
                        </div>
                    </div>
                </div>
            </main>
            ';

    require '/footer.php';
    exit();
    }
?>