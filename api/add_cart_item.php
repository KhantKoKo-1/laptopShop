<?php
session_start();

if (isset($_POST['order'])) {
    $found    = false;
    if (isset($_SESSION['orders'])) {
        $orders   = $_SESSION['orders'];
        $item_id  = $_POST['order']['item_id'];

        foreach ($orders as $index => $order) {
            if ($item_id == $order['item_id']) {
                $found = true;
                $_SESSION['orders'][$index] = $_POST['order'];
                echo "Found";
            }
        }
    }

    if ($found == false) {
        $_SESSION['orders'][] = $_POST['order'];
        echo "Session variable added!";
    }

} else {
    echo "No session variable provided!";
}
?>