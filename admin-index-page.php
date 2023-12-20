<?php
    session_start();
    
    include("actions/database-connect.php");
    include("actions/functions.php");

    $user_data = check_login($con);

    // Count Preparing Orders
    function count_preparing_order_status() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM user_order WHERE order_status = 'Preparing'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $preparing_orders = count_preparing_order_status('Preparing');

    // Count Serving Orders
    function count_serving_order_status() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM user_order WHERE order_status = 'Now Serving'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $serving_orders = count_serving_order_status('Now Serving');
    
    // Count Out For Delivery Orders
    function count_otw_order_status() {
        include("actions/database-connect.php");
        $query      = "SELECT * FROM user_order WHERE order_status = 'Out For Delivery'";
        $rows       = mysqli_query($con, $query);
        $total_rows = mysqli_num_rows($rows);
        return $total_rows;
    }

    $otw_orders = count_otw_order_status('Out For Delivery');

    // Sum Total Amount of Purchased Items
    function total_income(){
        include("actions/database-connect.php");
        $query        = "SELECT  SUM(product_total_price) from user_order";
        $query_result = mysqli_query($con, $query);
        $total_income = mysqli_fetch_array($query_result);

        return !empty($total_income) ? number_format($total_income[0]) : 0 ;
    }

    $query      = "SELECT * FROM user_order";
    $result       = mysqli_query($con, $query);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nicolette's Pizza | Admin Dashboard</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="main-container admin-page">
            <div class="navbar-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="css/images/store-logo.png" height="150" alt="Image">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-orders-page.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout-function.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid admin-dashboard">
                <div class="row">
                    <div class="col">
                        <div class="box-count">
                            <h1><?php echo $preparing_orders;?></h1>
                            <p>Total Number of</p>
                            <p>Preparing Orders</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-count">
                            <h1><?php echo $serving_orders;?></h1>
                            <p>Total Number of</p>
                            <p>Serving Orders</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-count">
                            <h1><?php echo $otw_orders;?></h1>
                            <p>Total Number of</p>
                            <p>Out For Delivery Orders</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-count">
                            <h1>₱<?php echo total_income();?></h1>
                            <p>Total Income</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">Orders</th>
                                    <th scope="col">Order Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Order Status</th>
                                </tr>
                            </thead>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                                <tbody class="table-light">
                                    <tr>
                                        <td><?php echo $row['product_name']?></td>
                                        <td><?php echo $row['product_quantity']?></td>
                                        <td>₱<?php echo $row['product_total_price']?></td>
                                        <td><?php echo $row['order_status']?></td>
                                    </tr>
                                </tbody>
                            <?php
                                // include 'modal/modal-buyProduct.php';
                                // include 'modal/delete-item-in-cart.php';
                            }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>