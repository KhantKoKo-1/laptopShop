<?php 
 require('../common/database.php');
 require('../common/common.php');
 require('../common/auth.php');
 $order_count = '';

 if (isset($_SESSION['orders'])) {
    $order_count = count($_SESSION['orders']);
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../isset/css/style.css?v1010">
    <link href="../isset/bootstrap/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../isset/bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../isset/js/jquery/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $base_url . 'template/index.php';?>">Brand</a>
            <div class="d-flex">
                <a class="btn btn-light me-2" href="<?php echo $base_url . 'template/cart.php';?>">
                    <i class="bi bi-cart-fill"></i>
                        <span id="cart"><?php echo $order_count; ?></span>
                </a>

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> Profile
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="<?php echo $base_url . 'template/account_information.php';?>">Account Information</a></li>
                        <li><a class="dropdown-item" href="<?php echo $base_url . 'template/order_history.php';?>">Order History</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo $base_url . 'template/logout.php';?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>