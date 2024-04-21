<?php
    $title = 'Order History Page'; 
    require('../layout/header.php');
?>

<div class="container">
    <div class="row scoll mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order No</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $count = 0;
                     if(isset($_SESSION['order_history'])) {
                        $order_history = array_reverse($_SESSION['order_history']);
                        foreach ($order_history as $order) {
                            $count ++;
                            $id        = $order['id'];
                            $code_no   = $order['code_no'];
                            $sub_total = $order['total_amount'];
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><a class="text-decoration-none" href="<?php echo $base_url . "template/order_history_detail.php?id=" . $id;?>"><?php echo $code_no; ?></a></td>
                            <td>
                                <span id="subTotal<?php echo $id;?>">$<?php echo $sub_total;?></span>
                            </td>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm" href="<?php echo $base_url . "template/order_history_detail.php?id=" . $id;?>">
                                    <i class="bi bi-eye"></i>View Detail
                                </a>
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
            </div>
        </div>
    </div>
</div>

<?php 
    require('../layout/footer.php');
?>