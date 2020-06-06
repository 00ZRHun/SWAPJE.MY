<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
    <!-- Content -->
    <section style='min-height: 100vh;' class='container'>

        <?php
        $user_sql = 'SELECT id FROM users WHERE email=:email';
        $user_query = $dbh->prepare($user_sql);
        $user_query->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
        $user_query->execute();
        $user_results = $user_query->fetch();

        $user_id = $user_results['id'];

        $sql = "SELECT provider_id FROM swap_records WHERE provider_id=:user_id";
        $receiver_sql = "SELECT receiver_id FROM swap_records WHERE receiver_id=:user_id";

        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->execute();

        $query2 = $dbh->prepare($receiver_sql);
        $query2->bindParam(":user_id", $user_id);
        $query2->execute();
        

        if ($query->rowCount() > 0) {

            // As Provider

            require("./functions/Swap/get_swap_records.php");
            // require("./functions/User/user.php");
            // require("./functions/Item/item.php");
            
            $results = get_records_as_provider($user_id);
            
            foreach ($results as $result) {                                   

                $receiver_item_ids = explode(", ", $result->receiver_item_id);
                $receiver_item_names = "";                

                foreach ($receiver_item_ids as $id) {
                    $item = get_item_detail($id, $result->receiver_id);
                    $receiver_item_names .= $item["productName"] . " ";
                }                

                $current_receiver = get_user_detail($result->receiver_id, $dbh);
                $current_receiver_name = $current_receiver["firstName"] . " " . $current_receiver["lastName"];
                                            
                ?>
                <div class="notification-list__item">
                    <p style="margin-bottom: 1em;"><?php echo htmlentities($current_receiver_name) ?> wants to swap your <a href='item-details.php?vhid=<?php echo htmlentities($result->itemID)?>'" class="notification_swap-item"><?php echo htmlentities($result->itemName) ?></a> with
                        <?php for ($i = 0; $i < count($receiver_item_ids); $i++) {
                            $current_item_id = $receiver_item_ids[$i];
                            $current_item = get_item_detail($current_item_id, $result->receiver_id);
                            $currentItemName = $current_item["productName"];  
                            
                            if($i != count($receiver_item_ids) - 1)
                                $currentItemName .= ", ";
                        ?>  
                            <a href='item-details.php?vhid=<?php echo htmlentities($current_item_id)?>'" class="notification_swap-item"><?php echo htmlentities($currentItemName); ?></a>                                                 
                        <?php } ?>        
                    </p>
                        <?php if ($result->status == -1) {
                            echo "You rejected this request.";
                        } ?>
                        <?php if ($result->status == 1) {
                            echo "You accepted this request.";
                        } ?>
                </div>                    
            <?php
                
            }
            
        } if ($query2->rowCount() > 0) {                

                // As Receiver

                require("./functions/Swap/get_swap_records.php");
                // require("./functions/User/user.php");
                // require("./functions/Item/item.php");
                              
                $results = get_records_as_receiver($user_id);

                foreach ($results as $result) {     
                    
                    $receiver_item_ids = explode(", ", $result->receiver_item_id);
                    $receiver_item_names = "";                                               

                    $provider_item_id = $result->item_id;
                    $provider_item = get_item_detail($provider_item_id, $result->provider_id);                    
                    $provider_item_name = $provider_item["productName"];                    

                    foreach ($receiver_item_ids as $id) {
                        $item = get_item_detail($id, $result->receiver_id);
                        $receiver_item_names .= $item["productName"] . " ";
                    }                

                    $current_provider = get_user_detail($result->provider_id, $dbh);
                    $current_provider_name = $current_provider["firstName"] . " " . $current_provider["lastName"];

                ?>
                    <div class="notification-list__item">
                        <p style="margin-bottom: 1em;">You want to swap your
                            <?php for ($i = 0; $i < count($receiver_item_ids); $i++) {
                                $current_item_id = $receiver_item_ids[$i];
                                $current_item = get_item_detail($current_item_id, $result->receiver_id);
                                $currentItemName = $current_item["productName"];  
                                
                                if($i != count($receiver_item_ids) - 1)
                                    $currentItemName .= ", ";
                            ?>  
                                <a href='item-details.php?vhid=<?php echo htmlentities($current_item_id)?>'" class="notification_swap-item"><?php echo htmlentities($currentItemName); ?></a>                                                 
                            <?php } ?>   
                            with <?php echo htmlentities($current_provider_name) ?>'s <a class="notification_swap-item" href="item-details.php?vhid=<?php echo htmlentities($provider_item_id) ?>"><?php echo htmlentities($provider_item_name) ?></a>     
                        </p>
                        <div class="d-flex align-items-center">
                            <?php if ($result->status == -1) {
                                    echo "Your swap request is <span style='color: var(--primary-color); font-weight:bold'>rejected</span>";
                                } ?>
                            <?php if ($result->status == 1) {
                                    echo "Your swap request is <span style='color: #09c976; font-weight: bold'>accepted</span>";
                                } ?>                        
                        </div>                        
                    </div>                    
            <?php
                    
                }
            }
            ?>

    </section>
    <!-- /Content -->

    <script src='assets/js/jquery.min.js'></script>

    <!-- Logics -->
    <script src='js/swap/swap.js'></script>