<div class="modal fade" id="update_order<?php echo $row['order_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="actions/update-purhased-product-function.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body admin-update">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                                <select class="form-select" name="order_status">
                                    <option value="Preparing">Preparing</option>
                                    <option value="Now Serving">Now Serving</option>
                                    <option value="Out For Delivery">Out For Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" role="button" class="btn btn-success">Update Order</button>
                </div>
            </form>
        </div>
    </div>
</div>