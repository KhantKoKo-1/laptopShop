<?php
    $found = false;
    if(isset($_SESSION['orders'])) {
        $orders   = $_SESSION['orders'];
        
        foreach ($orders as $order) {
            if (is_array($order) && $order['item_id'] == $item['id']) {
                $found = true;
                echo $order['order_quantity']; 
            }
        }
    }

    if ($found == false) {
        echo 1;
    }
?>