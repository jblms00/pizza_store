<div class="modal fade" id="deleteOrder<?php echo $row['order_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="actions/delete-order-function.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $row['product_name']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                    <p>Do you want this to remove this order?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button name="delete" role="button" class="btn btn-warning">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>