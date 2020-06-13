<!--Sell-->
<div role="tabpanel" class="tab-pane active" id="sell">
    <p>
        <!-- payment( PayPal ) -->
        <div id="payment-box" class="payment-box">                                
            <h5 class="txt-price" style="margin: 0">
                Total Price :
                RM<?php echo htmlentities($result->totalPrice); ?>
            </h5>
            <form style="margin-left: auto" action="https://www.sandbox.paypal.com/cgi-bin/webscr"
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
                    value='http://localhost:8888/SWAPJE.MY/return.php'>
                <input type="hidden" name="cmd" value="_xclick">

                <button
                    type="submit" name="pay_now" id="pay_now" class="primary-btn"
                >
                Pay Now
                </button>
            </form>
        </div>
    </p>
</div>
<!--/Sell-->