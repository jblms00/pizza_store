<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);

    $query     = "SELECT * FROM products";
    $result    = mysqli_query($con, $query);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Nicollete's Pizza | Menu</title>
    </head>
    <body>
        <div class="main-container">
            <div class="navbar-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="css/images/store-logo.png" height="150" alt="Image">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-index-page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
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
            <div class="container-fluid menu-page text-center">
                <div class="row">
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="css/images/products/<?php echo $row['product_image']?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addCart<?php echo $row['product_id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-cart3" viewBox="0 0 16 16">
                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="col-8">
                                            <p class="card-link disabled"><?php echo $row['product_name']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        include 'modal/add-cart-modal.php';
                        } 
                    ?>
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