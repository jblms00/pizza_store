<div class="modal fade" id="addCart<?php echo $row['product_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="actions/add-cart-function.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $row['product_name']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image'];?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>">
                    <input type="hidden" name="user_email" value="<?php echo $user_data['email'];?>">
                    <p>Do you want this to add to your cart?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" role="button" class="btn btn-warning">Add Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>