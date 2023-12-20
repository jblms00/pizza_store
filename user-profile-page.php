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
        <title>Nicollete's Pizza | My Orders</title>
    </head>
    <body>
        <div class="main-container user-page">
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
                        <a class="nav-link" href="user-cart-page.php">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout-function.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="orders">
                            <div class="row">
                                <div class="col">
                                    <h1>Order History</h1>
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
                                                <th scope="col">Order Price</th>
                                                <th scope="col">Order Total Price</th>
                                                <th scope="col">Delivered To</th>
                                                <th scope="col">Order Status</th>
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
                                                        <p class="order-desc">₱<?php echo $row['product_price'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc">₱<?php echo $row['product_total_price'];?></p>
                                                    </td>
                                                    <td>
                                                        <p class="order-desc"><?php echo $row['user_address'];?></p>
                                                    </td>
                                                    <td>
                                                        <?php if($row['order_status'] == "Out For Delivery"):?>
                                                            <form action="actions/user-received-order.php" method="post">
                                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                                <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?>">
                                                                <button type="submit" role="button" class="btn btn-success" style="font-size: 13px;  margin-top: 44px;">Order Received</button>
                                                            </form>
                                                        <?php  elseif ($row['order_status'] == "Order Received"):?>
                                                            <p class="order-desc" style="color: green; font-weight: 600"><?php echo $row['order_status']?></p>
                                                        <?php else: ?>
                                                            <p class="order-desc"><?php echo $row['order_status']?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
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