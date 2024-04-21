<?php
    $title = 'Cart Page'; 
    require('../layout/header.php');
    $order_id = $_GET['id'];
?>

<div class="container">
    <div class="row scoll mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $total_amount = 0;
                     if(isset($_SESSION['order_history_detail'])) {
                        $order_history_detail = $_SESSION['order_history_detail'][$order_id];
                        $count = 0;
                       foreach ($order_history_detail as $orders) {
                            foreach ($orders as $order) {
                                $count ++;
                                foreach ($items as $item) {
                                    if (is_array($order) && $order['item_id'] == $item['id']) {
                                        $order_quantity = $order['order_quantity'];
                                        $id             = $item['id'];
                                        $name           = $item['name'];
                                        $sub_total      = $item['price($)'] * $order_quantity;
                                        $total_amount   += $sub_total;
                                    }
                                }
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $name; ?></td>
                            <td>
                                <span id="quantity<?php echo $id;?>" class="text-center quantity"><?php echo $order_quantity?></span>
                            </td>
                            <td>
                                <span id="subTotal<?php echo $id;?>">$<?php echo $sub_total;?></span>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
                        <div class="col mt-1">
                            <button type="button" class="btn btn-secondary" id="btnBack"><i class="bi bi-arrow-left"></i> Back</button>
                        </div>
                    </tbody>
                </table>
                <div class="col offset-7">
                    <span>Total Amount : <b id="total_amount">$<?php echo $total_amount;?></b></span>
                </div>

                <?php
                    if(isset($_SESSION['orders'])) {
                        $param = ['order'];
                    ?>
                <form method="post">
                    <div class="col offset-10">
                        <input type="submit" style="display:none;" id="OrderForm" name="submit" value="Submit"/>
                        <input type="hidden" id="total_amount_input" name="total_amount" value="<?php echo $total_amount;?>" />
                        <button type="button" class="btn btn-primary" id="btnOrder" onclick="confirmationBox(<?php echo htmlspecialchars(json_encode($param));?>)"><i class="bi bi-bag-fill"></i>Order Now</button> 
                    </div>
                </form>  
                <?php }}?>
            </div>
        </div>
    </div>
</div>

<?php 
    require('../layout/footer.php');
?>