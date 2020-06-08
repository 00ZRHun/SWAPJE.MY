<!--Rent-->
<div role="tabpanel" class="tab-pane" id="rent">
    <!-- payment( PayPal ) -->
    <div id="payment-box">
            <h4 class="txt-title">
                Product Name :
                <?php echo htmlentities($name); ?>
            </h4>
            <div class="txt-price">
                Price Per Day :
                RM<?php
                    $pricePerDay = $result->pricePerDay;
                    echo htmlentities($pricePerDay);
                    ?>
            </div>
            <div>
            </div>
                <br>
            <form name="form" action="" method="get">
                <input type='hidden' name='vhid' value='<?=$_GET['vhid'];?>'>
                <br>
                <br>
            </form>

            <?php
                $pricePerDay = $result->pricePerDay;
            ?>

            <script src="http://code.jquery.com/jquery-latest.min.js"></script>
            <script>
                var decision = 0;
                $(document).ready(function(){
                $('select.status').on('change',function () {
                        decision = $(this).val();
                        var totalPrice = decision * <?=$pricePerDay?>;
                        alert("RM" + totalPrice);
                });

                });
            </script>

            <table width="200px">
                <tr>
                    <td>
                        <select class="status" >
                        <option value="">Select...</option>
                        <option value="1">1 day</option>
                        <option value="2">2 days</option>
                        <option value="3">3 days</option>
                        <option value="4">4 days</option>
                        <option value="5">5 days</option>
                        <option value="6">6 days</option>
                        <option value="7">1 week</option>
                        </select>
                    </td>
                </tr>
            </table>

            <?php $totalPrice = 100?>
            <button onclick="myfunction()">test</button>

            <script>
                <?php $totalPrice = "<script>document.writeln(decision);</script>";?>
                function myfunction(){
                alert(<?=$totalPrice?>)
                }
            </script>

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
                method="post" target="_top">
                <input type='hidden' name='business' value='<?php echo htmlentities($result->payPalBusinessAccount); ?>'>
                <input type='hidden' name='item_name' value='<?php echo htmlentities($name); ?>'>
                <input type='hidden' name='item_number' value='<?php echo htmlentities($name . '#N1'); ?>'>
                <!-- <input type='hidden' name='amount' value='<?php echo htmlentities((float) ($_GET['totalPrice'])); ?>'> -->
                <!-- <input type='hidden' name='amount' value='<?php echo htmlentities((float) ($result->pricePerDay) * (float) ($_GET['rentDay'])); ?>'> -->
                <?php $totalPrice = "<script>document.writeln(decision);</script>";?>
                <input type='hidden' name='amount' value='<?php echo htmlentities((float) $totalPrice) ?>'>
                <input type='hidden' name='no_shipping' value='1'>
                <input type='hidden' name='currency_code' value='MYR'>
                <input type='hidden' name='notify_url'
                    value='http://localhost:8888/paypal-payment-gateway-integration-in-php/notify.php'>
                <input type='hidden' name='cancel_return'
                    value='http://localhost:8888/paypal-payment-gateway-integration-in-php/cancel.php'>
                <input type='hidden' name='return'
                    value='http://localhost:8888/Renting%20System/SellRentSwap_System/return.php'>
                <input type="hidden" name="cmd" value="_xclick">

                <button type="submit" name="pay_now" id="pay_now">Rent</button>
            </form>

            <script>
                function submitForm(){
                    document.getElementById("form_id").submit();
                }
            </script>
    </div>
</div>
<!--/Rent-->