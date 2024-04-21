<?php
    session_start();
    if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            delete_cart_item($id);
        } else {
            $total_amount = $_POST['total_amount'];
            make_order($total_amount);
        }
    }
    $title = 'Cart Page'; 
    require('../layout/header.php');

    function delete_cart_item($item_id) {
        if (isset($_SESSION['orders'])) {
            $orders   = $_SESSION['orders'];
            if (count($_SESSION['orders']) == 1) {
                if ($item_id == $orders[0]['item_id']) {
                    unset($_SESSION['orders']);
                }
            } else {
                foreach ($orders as $index => $order) {
                    if ($item_id == $order['item_id']) {
                        unset($_SESSION['orders'][$index]);
                    }
                }
            }
        }
    }

    function make_order($total_amount) {
        if (isset($_SESSION['orders'])) {
            $random_number = rand(100, 999);
            $date          = date('Y-m-d-H:i:s');
            $code_no       = $random_number . '-' . $date;
            $id            = 1;

            if (isset($_SESSION['order_history'])) {
                $id = count($_SESSION['order_history']) + 1;
            }

            $data = ['id' => $id, 'code_no' => $code_no,'total_amount' => $total_amount];
            $_SESSION['order_history'][] = $data;
            $_SESSION['order_history_detail'][$id][] = $_SESSION['orders'];
            unset($_SESSION['orders']);
            $url = $base_url . 'order_history.php';
            header("Location:" . $url);
            exit();
        }
    }
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $total_amount = 0;
                     if(isset($_SESSION['orders'])) {
                        $orders = $_SESSION['orders'];
                        $found  = false;
                        $count  = 0;
                       foreach ($orders as $order) {
                            $count ++;
                            foreach ($items as $item) {
                                if (is_array($order) && $order['item_id'] == $item['id']) {
                                    $order_quantity    = $order['order_quantity'];
                                    $id                = $item['id'];
                                    $name              = $item['name'];
                                    $sub_total         = $item['price($)'] * $order_quantity;
                                    $original_price    = $item['price($)'];
                                    $avalible_quantity = $item['quantity'];
                                    $total_amount      += $sub_total;
                                }
                            }
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $name; ?></td>
                            <td>
                                <?php 
                                    $param = ['minus', $id, $enable_price_adjust];
                                ?>
                                <button class="<?php echo ($order_quantity != 1) ? 'btn btn-danger' : 'btn btn-secondary'; ?> btn-sm" id="minus<?php echo $id;?>"
                                    onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)">-</button>
                                <span id="quantity<?php echo $id;?>" class="text-center quantity"><?php echo $order_quantity?></span>

                                <?php 
                                    $param = ['plus', $id, $enable_price_adjust, $avalible_quantity];
                                ?>
                                <button class="btn btn-success btn-sm"
                                    onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)"
                                    id="plus<?php echo $id;?>">+
                                </button>
                            </td>
                            <td>
                                <span id="subTotal<?php echo $id;?>">$<?php echo $sub_total;?></span>
                                <input type="hidden" name="sub_total"<?php echo $id;?> value="<?php $sub_total;?>"/>
                                <input type="hidden" id="original_price<?php echo $id;?>" value="<?php echo $original_price;?>" />
                            </td>
                            <td>

                                <?php 
                                    $param = ['delete', $id];
                                ?>
                                <form method="post">
                                    <a type="button" class="btn btn-primary btn-sm" href="<?php echo $base_url . "template/item_detail.php?id=" . $id;?>">
                                        <i class="bi bi-eye"></i>View Detail
                                    </a>
                                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                                    <input type="submit" style="display:none;" id="deleteForm<?php echo $id;?>" name="submit" value="Submit"/>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmationBox(<?php echo htmlspecialchars(json_encode($param));?>)"><i class="bi bi-trash"></i></button>
                                </form>
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
                <?php }?>
            </div>
        </div>
    </div>
</div>

<?php 
    require('../layout/footer.php');
?>