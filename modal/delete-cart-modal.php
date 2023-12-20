<div class="modal fade" id="deleteCart<?php echo $row['product_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="actions/delete-cart-function.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $row['product_name']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id'];?>">
                    <p>Do you want this to remove this to your cart?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button name="delete" role="button" class="btn btn-warning">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>