<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <span class="mb-3 me-2 mb-md-0 text-muted lh-1">
                    <i class="bi bi-heart bs-icon"></i>
                </span>
                <span>© 2024 Company, Inc</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="nav justify-content-center justify-content-md-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook bs-icon"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-tiktok bs-icon"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>

<script>

    $(document).ready(function() {

        $('#btnBack').click(function() {
            window.history.back();
        });

        $('#btnSeeMore').click(function() {
                $('#moreInfo').toggleClass('d-none');
        });

    });

    function calculationQty(param) {
        let type         = param[0];
        let id           = param[1]; 
        let conditionFlg = param[2];
        let error        = false;
        let quantity     = parseInt($('#quantity' + id).text());

        if (type == 'minus') {
            if (quantity == 1) {
                $("#minus" + id).removeClass("btn btn-danger").addClass("btn btn-secondary");
                error = true; 
            } else {
                $("#plus" + id).removeClass("btn btn-secondary").addClass("btn btn-success");
                quantity -= 1;
            }
        } else {
            let avalible_quantity = param[3];
            if (quantity >= avalible_quantity) {
                $("#plus" + id).removeClass("btn btn-success").addClass("btn btn-secondary");
                error = true; 
                alert('out of stock');
            } else {
                $("#minus" + id).removeClass("btn btn-secondary").addClass("btn btn-danger");
                quantity += 1;
            }
        }

        if (conditionFlg == 0 && error == false) {
            let originalPrice = parseInt($('#original_price' + id).val());
            let subTotal      = originalPrice * quantity;
            let totalAmount   = 0;
            if (type == 'minus') {
                totalAmount   = parseInt($('#total_amount_input').val()) - originalPrice; 
            } else {
                totalAmount   = parseInt($('#total_amount_input').val()) + originalPrice; 
            }
            
            $('#subTotal' + id).text('$' + subTotal);
            $('#total_amount_input').val( totalAmount);
            $('#total_amount').text('$' + totalAmount);
        }

        $('#quantity' + id).text(quantity);
    }

    function confirmationBox(param) {
      let type = param[0];
      let id   = param[1]; 
      let text = "Are you sure you want to " + type + "!";

      if (confirm(text) == true) {
          let order = parseInt($('#cart').text());
          if (type === 'delete') {
            $('#deleteForm' + id).click();
          } else if (type === 'order') {
              $('#OrderForm').click();
              alert('order success')
          }
      }
    }

    function addCartItem(id) {
        let orderQuantity = parseInt($('#quantity' + id).text());
        let data  = { 'item_id': id, 'order_quantity': orderQuantity };
        let order = $('#cart').text();
        if (order == '') {
            order = 0;
        }
        $.ajax({
            url: '../api/add_cart_item.php',
            method: 'POST',
            data: { 'order': data },
            success: function(response){
                if (response !== 'Found') {
                    $('#cart').text(parseInt(order) + 1);
                }
                alert('success');
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
            }
        });
    }

</script>
</html>