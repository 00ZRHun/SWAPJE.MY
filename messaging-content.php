<?php

$to_user_id = $_GET["id"];

session_start();

include 'includes/config.php';

$id = $_SESSION['login'];
$user_sql = 'SELECT id FROM users WHERE email=:email';
$user_query = $dbh->prepare($user_sql);
$user_query->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
$user_query->execute();
$user_results = $user_query->fetch();

$user_id = $user_results['id'];

if (isset($_SESSION['login'])) {    

    require_once "functions/User/user.php";

    $result = get_user_detail($to_user_id, $dbh);
    $to_user_name = $result["firstName"] . $result["lastName"];

    $from_result = get_user_detail($user_id, $dbh);
    $from_user_name = $from_result["firstName"] . $from_result["lastName"];
    
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Chat</title>
  
  <!-- SWAPJE CSS + Google Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/swapje/index.css">
  <link rel="stylesheet" href="css/nav/nav.css">      
  <link rel="stylesheet" href="css/swapje/messaging.css">

  <!-- Bootstrap --> 
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"> 
  
  <!--Custome Style -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

<!-- Include firebase db -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>

<script src="firebase_config.js"></script>
<script>                            

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        function sendMessage(e) {
            e.preventDefault();

            const message = $('#message-input').val();            
            const to_user_id = $('#to_user_id').val();   
            // console.log(message, to_user_id);

            firebase.database().ref("messages").push().set({
                "chat_message": message,
                "to_user_id": to_user_id, 
                "to_user_name": "<?php echo htmlentities($to_user_name); ?>",
                "from_user_name": "<?php echo htmlentities($from_user_name) ?>",
                "user_id": <?php echo htmlentities($user_id); ?>,
                "created": firebase.database.ServerValue.TIMESTAMP
            });

            $('#message-input').val("");
            document.documentElement.scrollTo({
                left: 0,
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });
            
        };
                
        $("#to_user_id").ready(function() {              
                          
        const to_user_id = $('#to_user_id').val();        
        
        function checkRelationship(Firebase_receiver_id, Firebase_sender_id) {                    

            let relationship = true;

            /*
                Goal 💡 : Check if Current user has relationship with UserB.
                Condition:
                    i. Current user id must matched to Firebase_receiver_id OR Firebase_sender_id. 
                    ii.UserB id must matched to Firebase_receiver_id OR Firebase_sender_id.
                Success: i AND ii
                Parameter: Firebase_receiver_id, Firebase_sender_id
            */            
            
            if(<?php echo htmlentities($user_id) ?> != Firebase_receiver_id && <?php echo htmlentities($user_id) ?> != Firebase_sender_id)            
                relationship = false;
                
            if(<?php echo htmlentities($to_user_id)?> != Firebase_receiver_id && <?php echo htmlentities($to_user_id) ?> != Firebase_sender_id)
                relationship = false;

            return relationship;  
        }

        function checkStatus(Firebase_sender_id) {
            let sentBySelf = false;            

            /*
                Goal 💡 : Check if is the message is sent by current user
                Condition:
                    i. Firebase_sender_id is the same with Current user                    
                Success: i
                Parameter: Firebase_sender_id
            */

            if(Firebase_sender_id == <?php echo htmlentities($user_id) ?>)
                sentBySelf = true;
            
            return sentBySelf;
        }

        firebase.database().ref("messages").on("child_added", async (snapshot) => {   
            
        let check_result = await checkRelationship(snapshot.val().to_user_id, snapshot.val().user_id);                
                
        // Exit if current logged in user is not either a sender or receiver.
        if(check_result === false)
            return;           
            
        let sentBySelf = checkStatus(snapshot.val().user_id);                  

        let html = "";

        // <img src="..." class="avatar" alt="avatar">
        html = `
        <div class="${sentBySelf ? "message-div self-message-div" : "message-div"}">            
            <div class="message-div-content">
                <h5 class="message-div-content__username">
                ${sentBySelf ? "You" : "<?php echo htmlentities($to_user_name) ?>"} 
                </h5>
                <p>${snapshot.val().chat_message}</p>
            </div>
        </div>
        `;
        
        document.getElementById("messages-container").innerHTML += html;
    });    
}); 
        

</script>
</head>
<body>

<!--Header-->
<?php include 'includes/header.php'; ?>
<!-- /Header -->

<form id="message-content-form" onsubmit="return sendMessage(event);">
    <input type="hidden" id="to_user_id" name="to_user_id" value="<?php echo htmlentities($to_user_id) ?>">
    <div class="message-content-container">
        <div class="messaging-header">
            <!-- <p>You are <?php echo htmlentities($id) ?></p> -->
            <h3 class="messaging-tousername"><?php echo htmlentities($to_user_name) ?></h3>
        </div>

        <div id="messages-container" class="messages-container">
            <?php
// $chat_results = fetch_user_chat_history($to_user_id, $dbh);
    ?>
        </div>

        <input type="text" placeholder="Type message and enter to send message ..." autocomplete="off" name="message-input" id="message-input">
    </div>
</form>
<?php
} else {
    echo "You don't have the authority to view this.";
}
?>

</body>
</html>