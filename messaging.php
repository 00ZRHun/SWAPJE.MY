<?php

session_start();
include 'includes/config.php';

$current_user_name = "";
$message = "";

if (isset($_SESSION['login'])) {
    
    $id = $_SESSION['login'];    
    
    $user_sql = 'SELECT id FROM users WHERE email=:email';
    $user_query = $dbh->prepare($user_sql);
    $user_query->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
    $user_query->execute();
    $user_results = $user_query->fetch();

    $user_id = $user_results['id'];    

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

  
  <!-- SWAPJE CSS + Google Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/swapje/index.css">
  <link rel="stylesheet" href="css/nav/nav.css">
  <link rel="stylesheet" href="css/swapje/index.css">      
  <link rel="stylesheet" href="css/messaging.css">

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

        function redirectPage(id) {
            window.location.href = "messaging-content.php?id=" + id;
        }
        
        $("#messages-container").ready(function() {

        const to_user_id = $('#to_user_id').val();
        const to_user_namelist = [];                           

        function checkNamelist(from_name, to_name) {                                    

            let hasFound = false;
            
            if(to_user_namelist.length < 1)
                hasFound = false;
            else {
                to_user_namelist.filter(list_item => {
                    if(list_item.from_user_name == from_name && list_item.to_user_name == to_name || list_item.to_user_name == from_name && list_item.from_user_name == to_name) {
                        hasFound = true;                        
                    }                        
                });
            }            

            return hasFound;

        }

        firebase.database().ref("messages").on("child_added", (snapshot) => {

        // Not a sender || Not a receiver
        if(snapshot.val().user_id != <?php echo htmlentities($user_id) ?> && snapshot.val().to_user_id != <?php echo htmlentities($user_id) ?>)
            return;  

        /*
            The following code
            ===================
            👉 Get messages from firebase            
            👉 Render a chat preview div will follow this 2 condition: 
                i. If current logged user and receiver are both found in to_user_name_list array,
                   display last message only. 
                ii. Else, render a new chat preview div. 
        */

        // Check record 
        let check = checkNamelist(snapshot.val().from_user_name, snapshot.val().to_user_name);

        // If not found matched record in to_user_name_list array.
        if(check === false) {
            const chatRecord = {
                from_user_name: snapshot.val().from_user_name,
                to_user_name: snapshot.val().to_user_name
            }

            // Store a record of current receiver and sender to to_user_namelist array.
            to_user_namelist.push(chatRecord);
        }                            

        if(check === true) {                                                        
            $(`*[data-to_user_id="${snapshot.val().user_id == <?php echo htmlentities($user_id)?> ? snapshot.val().to_user_id : snapshot.val().user_id }"]`).html(snapshot.val().chat_message) 
        } else {
                        
            let currentChatUserId = snapshot.val().user_id == "<?php echo htmlentities($user_id)?>" ? snapshot.val().to_user_id : snapshot.val().user_id;            

            async function getAvatar(avatarUserId) {
                return $.ajax({
                method: "POST",
                url: "functions/User/get_user_profile.php",
                dataType: "json",
                data: {
                    avatarUserId
                }                    
                })
                .then(response => {

                    let html = "";
                    let avatarImage;

                    html = `
                    <div class="message-div message-preview" onclick="redirectPage(${snapshot.val().user_id == <?php echo htmlentities($user_id)?> ? snapshot.val().to_user_id : snapshot.val().user_id })">
                        <img src="img/profile/${response.avatarImage}" class="avatar" alt="Avatar">
                        <div class="message-div-content">                
                            <h5 class="message-div-content__username">
                            ${snapshot.val().to_user_id == "<?php echo htmlentities($user_id) ?>" ? snapshot.val().from_user_name : snapshot.val().to_user_name}
                            </h5>
                            <p data-to_user_id=${snapshot.val().user_id == <?php echo htmlentities($user_id)?> ? snapshot.val().to_user_id : snapshot.val().user_id }>${snapshot.val().chat_message}</p>
                        </div>
                    </div>
                    `;

                    document.getElementById("messages-container").innerHTML += html;
                })                                
            };

            getAvatar(currentChatUserId);            
        }                  
    });
});
</script>
</head>
<body>

<!--Header-->
<?php include 'includes/header.php'; ?>
<!-- /Header -->
  
<div class="messaging-container">
    <!-- <h2>Messages</h2> -->
    <!-- <p>You are <?php echo htmlentities($id) ?></p> -->
    <div class="search-box">
    <input type="text" name="search_user" class="form-control" id="search_user" autocomplete="off" placeholder="Search user...">
        <div class="result"></div>
    </div>
    
    <div id="messages-container" class="messages-container">

    </div>
        
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){

    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */        
        var inputVal = $(this).val();        
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search-user.php", {search_user: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());

        // Get clicked user's id
        const id = $(this).attr("id");
        $(this).parent(".result").empty();

        window.location.href = "messaging-content.php?id=" + id;
    });
});
</script>
</body>
</html>
<?php
}
?>

