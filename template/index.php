<?php
    if (isset($_GET['id'])) { 
        $title = 'Item Page';
    } else {
        $title = 'Brand Page';
    }

    require('../layout/header.php');
?>
<div class="container">
    <div class="row scoll">

        <?php if (isset($_GET['id'])) { 
            $brand_id = $_GET['id'];
            foreach ($items as $item) {
                if($item['brand_id'] == $brand_id ) {
        ?>
        
        <div class="col-md-4 mt-4">
            <div class="card" style="width: 18rem;">
                <a href="<?php echo $base_url . "template/item_detail.php?id=" . $item['id'] ?>">
                    <img class="card-img-top" src="<?php echo $base_url . 'isset/images/items/' . $item['image']; ?>"
                        width="250" height="200" alt="">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['name'];?></h5>
                    <p class="card-text">
                        Quantity : <b><?php echo $item['quantity'];?></b>
                        <br>
                        Price : <b>$<?php echo $item['price($)'];?></b>
                    </p>
                    <?php 
                        $param = ['minus', $item['id'], $disabled_price_adjust];
                    ?>
                    <button class="btn btn-secondary btn-sm" id="minus<?php echo $item['id'];?>"
                        onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)">-</button>
                    <span class="text-center quantity" id="quantity<?php echo $item['id'];?>">
                    <?php
                     require('../common/check_order_quantity.php');
                    ?>
                    </span>

                    <?php 
                        $param = ['plus', $item['id'], $disabled_price_adjust, $item['quantity'],];
                    ?>
                    <button class="btn btn-success btn-sm"
                        onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)"
                        id="plus<?php echo $item['id'];?>">+
                    </button>

                    <button type="button" onclick="addCartItem(<?php echo $item['id'];?>)" class="btn btn-primary offset-2">Add to card</button>
                </div>
            </div>
        </div>
        <?php }}} else {
        foreach ($brands as $brand) { ?>
        <div class="col-md-3 mt-2">
            <a href="<?php echo $base_url . "template/index.php?id=" . $brand['id'] ?>">
                <img src="<?php echo $base_url . 'isset/images/brands/' . $brand['image']; ?>" width="250" height="200"
                    alt="">
            </a>
        </div>
        <?php } } ?>
    </div>
</div>

<?php
    require('../layout/footer.php');
?>