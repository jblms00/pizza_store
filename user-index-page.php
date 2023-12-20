<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Nicollete's Pizza | Homepage</title>
    </head>
    <body>
        <div class="main-container index-page">
            <div class="navbar-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="css/images/store-logo.png" height="150" alt="Image">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-menu-page.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-cart-page.php">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-profile-page.php">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout-function.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="text-desc">
                            <h1>FRESHLY MADE EVERYDAY!</h1>
                            <p>"Walang Expectation vs. Reality"</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="pizza-bg"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>