<?php
    $title = 'Account Info Page'; 
    require('../layout/header.php');
?>

<div class="container">
    <div class="col mt-1">
        <button type="button" class="btn btn-secondary" id="btnBack"><i class="bi bi-arrow-left"></i> Back</button>
    </div>
    <div class="row scoll mt-2">
        <div class="col-md-6 offset-3">
            <div class="card" style="width: 20rem;margin-left:25%;">
                <img class="card-img-top" src="<?php echo $base_url . 'isset/images/user/user01.jpg'; ?>" width="250"
                    height="150" alt="">
                <hr>
                <div class="card-body">
                    <pre>Name    : <?php echo $_SESSION['auth_user']['name']?></pre>
                    <pre>Email   : <?php echo $_SESSION['auth_user']['email']?></pre>
                    <pre>Level   : <?php echo $_SESSION['auth_user']['level']?></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require('../layout/footer.php');
?>