<?php 
require('../common/database.php');
require('../common/common.php');
$error = false;
$email = '';

if(isset($_POST['submit']) && $_POST['sub-form'] == '1') {
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    
    $param     = ['email' => $email, 'password' => $password];
    list($error_message, $error) = validation($param);
}

function validation($param) {
    $error         = false;
    $error_message = '';
    $pattern       = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';

    if ($param['email'] == '') {
        $error = true;
        $error_message .= 'Please fill your email.</br>';
    } else {
        if (!filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $error_message .= 'Please enter valid email.</br>';
        } elseif (strlen($param['email']) > 50) {
            $error = true;
            $error_message .= 'Email is greater than 50 charaters.</br>';
        }
    }

    if ($param['password'] == '') {
        $error = true;
        $error_message .= 'Please fill password.</br>';
    } else {
        if (strlen($param['password']) > 30) {
            $error = true;
            $error_message .= 'Password is greater than 30 charaters.</br>';
        } elseif (strlen($param['password']) < 8) {
            $error = true;
            $error_message .= 'Password must be minimum length of 8 characters.</br>';    
        } elseif (!preg_match($pattern, $param['password'])) {
            $error = true;
            $error_message .= 'Password must be at least [ one uppercase letter,one lowercase letter,one digit ].</br>';
        }
    }

    if ($error == false) {
       $users_data = $_SESSION['users'];
       $count = 0;
       foreach($users_data as $data) {
          if (($data['email'] == $param['email']) && ($data['password'] == $param['password'])) {
            $count ++;
            setSessionForAuthUser($data);
          }
       }

       if ($count == 0) {
            $error = true;
            $error_message = 'Credentials do not match.';
       }
    }
 
    return array($error_message, $error);
}

function setSessionForAuthUser($user_data) {
    $_SESSION['auth_user'] = $user_data;

    $url = $base_url . 'index.php';
    header("Location:" . $url);
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopKKK!! LoginPage</title>
    <link rel="stylesheet" href="../isset/css/style.css?v1010">
    <link href="../isset/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../isset/bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../isset/js/jquery/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">

            <?php if ($error) { ?>
            <div class="alert alert-danger text-center col-6 mt-2 offset-3" role="alert">
                <b><?php echo $error_message ?></b>
            </div>
            <?php } ?>

            <div class="col-md-6 offset-3 mt-5 border">
                <form method="POST">
                    <h4 style="text-align:center;">Login Form</h4>
                    <div class="col offset-3">
                        <div class="form-group row mt-4">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email"
                                    value="<?php echo $email?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-sm-8 position-relative">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                <span class="toggle-password position-absolute" onclick="togglePasswordVisibility()">
                                    <i id="eye-icon" class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col mt-2 offset-2">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                            <input type="hidden" name="sub-form" value="1" />
                            <input type="reset" class="btn btn-warning" value="Reset" />
                        </div>
                    </div>
                    <div class="col mt-2">
                        <p style="text-align:center;">No Have Account? <a class="text-decoration-none"
                                href="<?php echo $base_url . 'template/register.php' ?>">Create Account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function togglePasswordVisibility() {

        if ($('#password').prop('type') == 'password') {
            $('#password').prop('type', 'text');
            $('#eye-icon').removeClass('bi-eye');
            $('#eye-icon').addClass('bi-eye-slash');
        } else {
            $('#password').prop('type', 'password');
            $('#eye-icon').removeClass('bi-eye-slash');
            $('#eye-icon').addClass('bi-eye');
        }
    
    }
</script>
</html>