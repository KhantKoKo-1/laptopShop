<?php 
$auth = false;

if (isset($_SESSION['auth_user'])) {
    $auth = true;
} else {
    $url = $base_url . 'template/login.php';
    header("Location:" . $url);
    exit();
}
?>