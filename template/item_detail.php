<?php
    $title = 'Item Detail Page'; 
    require('../layout/header.php');
?>

<div class="container">
    <div class="col mt-1">
        <button type="button" class="btn btn-secondary" id="btnBack"><i class="bi bi-arrow-left"></i> Back</button>
    </div>
    <div class="row scoll mt-2">
        <div class="col-md-4">
            <a href="<?php echo $base_url . "template/item_detail.php?id=" . $item['id'] ?>">
                <img class="card-img-top" src="<?php echo $base_url . 'isset/images/user/user01.jpg'; ?>" width="100"
                    height="300" alt="">
            </a>
        </div>
        <div class="col-md-8 mt-4">
            <?php if (isset($_GET['id'])) { 
                $id = $_GET['id'];
                foreach ($items as $item) {
                    if ($item['id'] == $id ) {
                        $avalible_quantity =  $item['quantity'];
            ?>
            <h5><?php echo $item['name']; ?></h5>
            <h6>Price : $<?php echo $item['price($)']; ?></h6> 
            <span>Availability
                <?php if ($item['quantity'] !== 0) { 
                        echo '<b style="color:green">In stock quantity : </b>' . $item['quantity'];
                    } else {
                        echo '<b style="color:red">Out of stock</b>' . $item['quantity'];
                    } 
                 ?>
            </span>
            <hr>
            <p>Brand: Navitel | Model: R250 DUAL | Screen Size: 2″ | Screen Type: TFT | Screen resolution: 320 x 240 |
                Camera sensor: GC2053 (night vision) | Video resolution: 1920 x 1080 Full HD (30 fps) |Viewing angle:
                140° | Video Format: MOV (H.264) | Image format: JPG | Video fragments length: 1/3/5 min | Video
                resolution (Rear): 1280 x 720 (25 fps); 1 Mpx; 100 | Camera rotation (Rear): 360° | 12 Months [p/n R250
                DUAL] SKU: I21916
            </p>

            <?php
                $param = ['minus', $id, $enable_price_adjust];
            ?>
            <button class="btn btn-secondary btn-sm" id="minus<?php echo $id;?>"
                onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)">-</button>
            <span id="quantity<?php echo $id;?>" class="text-center quantity">
                <?php
                require('../common/check_order_quantity.php');
            ?>
            </span>

            <?php 
                $param = ['plus', $id, $enable_price_adjust, $avalible_quantity];
            ?>
            <button class="btn btn-success btn-sm"
                onclick="calculationQty(<?php echo htmlspecialchars(json_encode($param));?>)"
                id="plus<?php echo $id;?>">+
            </button>

            <button type="button" onclick="addCartItem(<?php echo $id;?>)" class="btn btn-primary btn-sm offset-1">Add to card</button>
            <button type="button" class="btn btn-info btn-sm" id="btnSeeMore">See more</button>
        </div>
        <?php }}}?>

        <div id="moreInfo" class="col d-none offset-4 border border-dark mt-3 mb-4">
            <h5 class="text-center">Specification</h5>
            <hr>
            <div id="text-container">
                <p class="fw-bold">Color</p>
                    BLACK AND WHITE
                <p class="fw-bold">Processor</p>
                    Sample processor
                <p class="fw-bold">Graphics adapter</p>
                    Sample Graphics adapter
                <p class="fw-bold">Memory</p>
                    Sample Memory
                <p class="fw-bold">Display</p>
                    Sample Display 
                <p class="fw-bold">Storage</p>
                    Sample Storage
                <p class="fw-bold">Battery</p>
                    Sample Battery
                <p class="fw-bold">Operating System</p>
                    Sample Operating System
            </div>
        </div>
    </div>
</div>

<?php 
    require('../layout/footer.php');
?>