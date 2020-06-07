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

        $sql = "SELECT provider_id FROM swap_requests WHERE provider_id=:user_id";
        $receiver_sql = "SELECT receiver_id FROM swap_requests WHERE receiver_id=:user_id";

        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->execute();

        $query2 = $dbh->prepare($receiver_sql);
        $query2->bindParam(":user_id", $user_id);
        $query2->execute();

        if ($query->rowCount() > 0) {
            // As Provider

            require("./functions/Swap/get_swap_requests.php");
            require("./functions/User/user.php");
            require("./functions/Item/item.php");

            $results = get_requests_as_provider($user_id);

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
                    <div class="d-flex flex-row">
                        <p style="margin-bottom: 0;"><?php echo htmlentities($current_receiver_name); ?> wants to swap your <a href='item-details.php?vhid=<?php echo htmlentities($result->itemID)?>'" class="notification_swap-item"><?php echo htmlentities($result->itemName); ?></a> with 
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
                    </div>        
                    <div class="notification-list__item-footer d-flex flex-row">
                        <button id="accept-request-btn" data-requestID="<?php echo $result->id ?>" class="success-btn">Accept</button>
                        <button id="reject-request-btn" data-requestID="<?php echo $result->id ?>" class="grey-btn">Reject</button>
                    </div>                                            
                </div>                
                <?php
            }
        }
        if ($query2->rowCount() > 0) {
            // As Receiver

            require("./functions/Swap/get_swap_requests.php");
            require("./functions/User/user.php");
            require("./functions/Item/item.php");

            $results = get_requests_as_receiver($user_id);            

            foreach ($results as $result) {                

                $receiver_item_ids = explode(", ", $result->receiver_item_id);
                $receiver_item_names = "";

                $provider_item_id = $result->item_id;
                $provider_item = get_item_detail($provider_item_id, $result->provider_id);
                $provider_item_name = $provider_item["productName"];

                for ($i = 0; $i < count($receiver_item_ids); $i++) {
                    $item = get_item_detail($receiver_item_ids[$i], $result->receiver_id);
                    $receiver_item_names .= $item["productName"] . " ";

                    if($i != count($receiver_item_ids) - 1)
                        $receiver_item_names .= ", ";
                }

                $current_provider = get_user_detail($result->provider_id, $dbh);                
                $current_provider_name = $current_provider["firstName"] . " " . $current_provider["lastName"];
                
                ?>
                    <div class="notification-list__item">
                        <p style="margin-bottom: 0; margin-top: 1em;">You want to swap 
                            <?php for ($i = 0; $i < count($receiver_item_ids); $i++) {
                                $current_item_id = $receiver_item_ids[$i];
                                $current_item = get_item_detail($current_item_id, $result->receiver_id);
                                $currentItemName = $current_item["productName"];  
                                
                                if($i != count($receiver_item_ids) - 1)
                                    $currentItemName .= ", ";
                            ?>  
                                <a href='item-details.php?vhid=<?php echo htmlentities($current_item_id)?>'" class="notification_swap-item"><?php echo htmlentities($currentItemName); ?></a>                     
                                
                            <?php } ?>  
                            with <?php echo htmlentities($current_provider_name) ?>'s <a href='item-details.php?vhid=<?php echo htmlentities($provider_item_id)?>'" class="notification_swap-item"><?php echo htmlentities($provider_item_name); ?></a>
                        </p>
                            <?php if ($result->status == -1) {
                                echo "<span class='badge badge-danger'>REJECTED</span>";
                            } ?>
                            <?php if ($result->status == 1) {
                                echo "<span class='badge badge-success'>ACCEPTED</span>";
                            } ?>
                            <?php if ($result->status == 0) {
                                echo "<span class='badge badge-light'>PENDING</span>";
                            } ?>                        
                    </div>                    
        <?php                
            }
        } else {
            // echo "You don't have any requests yet.";
        }            
        ?>
    </section>
    <!-- /Content -->

    <script src="assets/js/jquery.min.js"></script>
    <!-- Logics -->
    <script src='js/swap/swap.js'></script>
