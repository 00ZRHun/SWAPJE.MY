<!--Boost-->

    <!-- payment( PayPal ) -->
    <div style="margin-left: auto; width: 50%; float: left" id="payment-box" class="payment-box">                                
        <form  action="https://www.sandbox.paypal.com/cgi-bin/webscr"
            method="post" target="_top">
            <input type='hidden' name='business' value='jobbusiness@gmail.com'>
            <input type='hidden' name='item_name' value='boss'>
            <input type='hidden' name='item_number' value='Boost adv of <?=htmlentities($result->title);?> #1'>
            <input type='hidden' name='amount' value='5'>
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
                type="submit" name="pay_now" id="pay_now" class="primary-btn" style="border: none; margin: 0; padding: 0;"
            >
                <!-- <i class="fa fa-edit"></i> -->
                <i class="fa fa-rocket" aria-hidden="true"></i>
            </button>

                

        </form>
    </div>

<!--/Boost-->