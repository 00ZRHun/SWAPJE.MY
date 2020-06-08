<!--Sell-->
<div role="tabpanel" class="tab-pane active" id="sell">
    <p>
        <!-- payment( PayPal ) -->
        <div id="payment-box">
                <!-- <img src="images/camera.jpg" /> -->
                <h4 class="txt-title">
                    Product Name :
                    <?php echo htmlentities($name); ?>
                </h4>
                <div class="txt-price">
                    Total Price :
                    RM<?php echo htmlentities($result->totalPrice); ?>
                </div>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
                    method="post" target="_top">
                    <input type='hidden' name='business' value='<?php echo htmlentities($result->payPalBusinessAccount); ?>'>
                    <input type='hidden' name='item_name' value='<?php echo htmlentities($name); ?>'>
                    <input type='hidden' name='item_number' value='<?php echo htmlentities($name . '#1'); ?>'>
                    <input type='hidden' name='amount' value='<?php echo htmlentities($result->totalPrice); ?>'>
                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='MYR'>
                    <input type='hidden' name='notify_url'
                        value='http://localhost:8888/paypal-payment-gateway-integration-in-php/notify.php'>
                    <input type='hidden' name='cancel_return'
                        value='http://localhost:8888/paypal-payment-gateway-integration-in-php/cancel.php'>
                    <input type='hidden' name='return'
                        value='http://localhost:8888/Renting%20System/SellRentSwap_System/return.php'>
                    <input type="hidden" name="cmd" value="_xclick">

                    <input
                        type="submit" name="pay_now" id="pay_now"
                        Value="Pay Now"
                    >
                </form>
        </div>
    </p>
</div>
<!--/Sell-->