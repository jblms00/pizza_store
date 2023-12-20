<div class="modal fade" id="buyProduct<?php echo $row['product_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="actions/buy-product-function.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Buy Now</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid modal-order">
                        <div class="row">
                            <div class="col-4">
                                <?php 
                                $get_image = $row['product_image'];
                                    echo    '<div>
                                                <img class="product-tbl-img" style="border-radius: 9px; box-shadow: 6px 7px 11px 3px #646464;" height="120px" src="css/images/products/'.$get_image.'"></img>
                                            </div>';
                                ?>
                                <input type="hidden" name="product_image" value="<?php echo $row['product_image']?>">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="item-details">Name of Order:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="item-php"><?php echo $row['product_name']?></p>
                                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
                                        <input type="hidden" name="user_email" value="<?php echo $user_data['email']?>">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="item-details">Price:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="item-php">₱<?php echo $row['product_price']?></p>
                                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="item-details">Quantity:</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" min="1" max="10" name="product_quantity" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-address">
                            <div class="row">
                                <div class="col-2">
                                    <p>Address:</p>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="user_address" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" role="button" class="btn btn-success">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>