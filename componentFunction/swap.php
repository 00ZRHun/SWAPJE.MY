<!--Swap-->
<div role="tabpanel" class="tab-pane" id="swap">
    <p>
        <?php
            // to get user ID
            $user_sql = "SELECT id FROM users WHERE email=:email";
            $user_query = $dbh->prepare($user_sql);
            $user_query->bindParam(':email', $email, PDO::PARAM_STR);
            $user_query->execute();
            $user_results = $user_query->fetch();

            $user_id = $user_results["id"];            
            $providerID;
            $item_status = 0;

            $sql = "SELECT * from items where id=:vhid AND delmode=0";
            $query = $dbh->prepare($sql);
            $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    $providerID = $result->user_id;
                }
            }             

            // 
            $self_items_sql = "SELECT item.id as itemID, item.user_id, item.swap, item.productName, item.images, user.id
            FROM items as item
            JOIN users as user
            ON item.user_id = user.id
            WHERE user_id = :user_id AND item.delmode = :item_status";

            $query = $dbh->prepare($self_items_sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $query->bindParam(':item_status', $item_status);

            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            
        ?>        

        <!-- <h2>Item you have:<?=$user_results["id"];?></h2> -->
        <h2>Item you have: </h2>        
        <input type="hidden" name="item_id" id="item_id" value="<?php echo $_GET['vhid'] ?>">
        <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo htmlentities($user_id); ?>">
        <input type="hidden" name="provider_id" id="provider_id" value="<?php echo htmlentities($providerID); ?>">
        
            <!-- gallery view of uploaded images --> 
            <div class="" id="imagesPreview">
                <div class="swap-item-list">
                    <?php
                        foreach ($results as $result) {                              
                    ?>
                    <div class="swap-item">
                        <input style="position: relative;" type="checkbox" name="receiver_item_id" id="<?php echo htmlentities($result->productName) ?>" value="<?php echo htmlentities($result->itemID) ?>" id="" />
                        <?php $images = explode(', ', $result->images); ?>
                        <!-- <img src="img/itemImages/<?php echo htmlentities($images[1]); ?>" class="img-responsive" alt="<?php echo htmlentities($images[1]);?>"> -->
                        <img src="img/itemImages/<?php echo htmlentities($images[0]); ?>" class="img-responsive" alt="images">                        
                        <label for="<?php echo htmlentities($result->productName) ?>"><?php echo htmlentities($result->productName) ?></label>
                    </div>                         
                    <div></div>                                                    
                    <?php
                        }
                    ?>
                </div>            
         </div>



    <button id="swap-with-owner-btn" style="margin-top: 1em" class="primary-btn">Swap with owner</button>
    </p>
</div>
<!--/Swap-->