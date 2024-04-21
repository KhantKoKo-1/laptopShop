<?php
session_start();
if (isset($_SESSION['auth_user'])) {
    unset($_SESSION['auth_user']);
}

$url = $base_url . 'login.php';
header("Location:" . $url);
exit();

?>