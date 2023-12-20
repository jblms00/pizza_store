<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);
    
    $query     = "SELECT * FROM user_order";
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
        <title>Nicollete's Pizza | Customer's Orders</title>
    </head>
    <body>
        <div class="main-container admin-page">
            <div class="navbar-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="css/images/store-logo.png" height="150" alt="Image">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-index-page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout-function.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="right-bg">
                            <div class="row">
                                <div class="col">
                                    <h1 class="order-history">Customer's Order History</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-warning">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order Image</th>
                                                <th scope="col">Order Name</th>
                                                <th scope="col">Order Quantity</th>
                                                <th scope="col">Order Total Price</th>
                                                <th scope="col">Delivered To</th>
                                                <th scope="col">Order Status</th>
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
                                                        <p class="order-desc"><?php echo $row['product_name'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc"><?php echo $row['product_quantity'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc">₱<?php echo $row['product_total_price'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc"><?php echo $row['user_address'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc"><?php echo $row['order_status'];?></p>
                                                    </td>
                                                    <td>
                                                        <?php if($row['order_status'] == "Order Received"):?>
                                                            <button class="btn btn-success btn-admin-modal" data-bs-toggle="modal"  disabled="true" data-bs-target="#update_order<?php echo $row['order_id'];?>">Update</button>
                                                            <button class="btn btn-warning btn-admin-modal" data-bs-toggle="modal" data-bs-target="#deleteOrder<?php echo $row['order_id'];?>">Remove</button>
                                                        <?php  else: ?>
                                                            <button class="btn btn-success btn-admin-modal" data-bs-toggle="modal" data-bs-target="#update_order<?php echo $row['order_id'];?>">Update</button>
                                                            <button class="btn btn-warning btn-admin-modal" data-bs-toggle="modal" data-bs-target="#deleteOrder<?php echo $row['order_id'];?>">Remove</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php 
                                            include 'modal/admin-update-order-modal.php';    
                                            include 'modal/delete-order-modal.php';    
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
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