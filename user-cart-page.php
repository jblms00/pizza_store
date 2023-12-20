<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);

    $query     = "SELECT * FROM user_cart";
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
        <title>Nicollete's Pizza | My Cart</title>
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
                        <a class="nav-link" href="user-menu-page.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-profile-page.php">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout-function.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid cart-page text-center">
                <div class="row orders">
                    <div class="col">
                        <h1>My Cart</h1>
                    </div>
                </div>
                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php 
                                    $get_image = $row['product_image'];

                                        echo    '<div>
                                        <img class="product-tbl-img" style="border-radius: 9px; box-shadow: 6px 7px 11px 3px #646464;" height="120px" src="css/images/products/'.$get_image.'"></img>
                                    </div>';
                                    ?>
                                </td>
                                <td>
                                    <p class="cart-p"><?php echo $row['product_name']?></p>
                                </td>
                                <td>
                                    <p class="cart-p">₱<?php echo $row['product_price']?></p>
                                </td>
                                <td>
                                    <button class="btn btn-status" type="button" data-bs-toggle="modal" data-bs-target="#buyProduct<?php echo $row['product_id']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-status" type="button" data-bs-toggle="modal" data-bs-target="#deleteCart<?php echo $row['product_id']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    <?php 
                        include 'modal/buy-product-modal.php';
                        include 'modal/delete-cart-modal.php';
                        } 
                    ?>
                </table>
            </div>
        </div>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>