<!--Rent-->
<div role="tabpanel" class="tab-pane" id="rent">
    <p>
        <!-- payment( PayPal ) -->
        <div id="payment-box" class="payment-box">  
            <h5 class="txt-price" style="margin: 0">
                Price per Day :
                RM<?= $pricePerDay=$result->pricePerDay ?>
            </h5>        

            <form style="margin-left: auto" action="https://www.sandbox.paypal.com/cgi-bin/webscr"
                method="post" target="_top">
                <input type='hidden' name='business' value='<?php echo htmlentities($result->payPalBusinessAccount); ?>'>
                <input type='hidden' name='item_name' value='<?php echo htmlentities($name); ?>'>
                <input type='hidden' name='item_number' value='<?php echo htmlentities($name . '#1'); ?>'>

                <table>
                    <tr>
                        <td>Day(s) of rent</td>
                        <td><input type='number' id="day" class='price' /></td>
                    </tr>
                    <tr>
                        <td>Total price</td>
                        <!-- <td><input type='text' id='totalPrice' name='amount' value="40" disabled /></td> -->
                        <td><input type='text' name='amount' id='totalPrice' value='<?=$pricePerDay?>' readonly/></td>
                    </tr>
                </table>
                
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='currency_code' value='MYR'>
                <input type='hidden' name='notify_url'
                    value='http://localhost:8888/SWAPJE.MY/paypal-payment-gateway-integration-in-php/notify.php'>
                <input type='hidden' name='cancel_return'
                    value='http://localhost:8888/SWAPJE.MY/paypal-payment-gateway-integration-in-php/cancel.php'>
                <input type='hidden' name='return'
                    value='http://localhost:8888/SWAPJE.MY/return.php'>
                <input type="hidden" name="cmd" value="_xclick">

                <button
                    type="submit" name="pay_now" id="pay_now" class="pay_rent_btn" class="primary-btn"
                >
                Pay Now
                </button>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
        <script>
            $(document).ready(function(){

                if(!$("#day").val()) {
                    $(".pay_rent_btn").hide();
                }                    


                // we used jQuery 'keyup' to trigger the computation as the user type
                $('.price').keyup(function () {

                    if(!$("#day").val())
                        return $(".pay_rent_btn").hide();
                
                    // initialize the sum (total price) to zero
                    var sum = 0;
                    
                    // we use jQuery each() to loop through all the textbox with 'price' class
                    // and compute the sum for each loop
                    $('.price').each(function() {
                        total = Number($(this).val()) * <?=$pricePerDay?>;
                        // total = Number($(this).val()) * 100;
                    });
                    
                    // set the computed value to 'totalPrice' textbox
                    $('#totalPrice').val(total);

                    /* var button = document.getElementById("pay_now");
                    //  document.getElementById("pay_now").disabled = false;
                    button.disabled = false; */
                    /* if ($.trim($(this).text()) === '') {
                        $('#pay_now').prop('disabled', true);
                    } else {
                        $('#pay_now').prop('disabled', false);
                    } */

                    /* if ($.trim($(this).text()) === '') {
                        $('button#pay_now').prop('disabled', true);
                    } else {
                        $('button#pay_now').prop('disabled', false);
                    } */
                    if( $("#totalPrice").val() == 0) {                        
                        // $("#pay_now").prop("disabled", true);
                    }else {                        
                        // $("#pay_now").prop("disabled", false);
                        // $("#pay_now").removeAttribute('disabled');
                        $(".pay_rent_btn").show()
                    }
                });
            });
        </script>
    </p>
</div>
<!--/Rent-->