<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang='en'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <meta name='keywords' content=''>
    <meta name='description' content=''>
    
    <title>SWAP.ME</title>
    <!--Bootstrap -->
    <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css'>
    <!--Custome Style -->
    <link rel='stylesheet' href='assets/css/style.css' type='text/css'>
    <!--OWL Carousel slider-->
    <link rel='stylesheet' href='assets/css/owl.carousel.css' type='text/css'>
    <link rel='stylesheet' href='assets/css/owl.transitions.css' type='text/css'>
    <!--slick-slider -->
    <link href='assets/css/slick.css' rel='stylesheet'>
    <!--bootstrap-slider -->
    <link href='assets/css/bootstrap-slider.min.css' rel='stylesheet'>
    <!--FontAwesome Font Style -->
    <link href='assets/css/font-awesome.min.css' rel='stylesheet'>

    <!-- SWITCHER -->
    <link rel='stylesheet' id='switcher-css' type='text/css' href='assets/switcher/css/switcher.css' media='all' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/red.css' title='red' media='all' data-default-color='true' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/orange.css' title='orange' media='all' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/blue.css' title='blue' media='all' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/pink.css' title='pink' media='all' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/green.css' title='green' media='all' />
    <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/purple.css' title='purple' media='all' />
    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='assets/images/favicon-icon/apple-touch-icon-144-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='assets/images/favicon-icon/apple-touch-icon-114-precomposed.html'>
    <link rel='apple-touch-icon-precomposed' sizes='72x72' href='assets/images/favicon-icon/apple-touch-icon-72-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' href='assets/images/favicon-icon/apple-touch-icon-57-precomposed.png'>
    <link rel='shortcut icon' href='assets/images/favicon-icon/favicon.png'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet'>
</head>

<body>

    <!-- Start Switcher -->
    <?php include('includes/colorswitcher.php');
    ?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php');
    ?>
    <!-- /Header -->

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