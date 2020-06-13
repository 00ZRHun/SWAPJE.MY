<?php     
    include('../../includes/config.php');
    session_start();
    error_reporting(0);


    try {
        // Get userID
        $user_sql = "SELECT profile FROM users WHERE id=:id";        
        $user_query = $dbh->prepare($user_sql);
        $user_query->bindParam(':id', $_POST['avatarUserId'], PDO::PARAM_STR);
        $user_query->execute();
        $user_result = $user_query->fetch();

        $profile = $user_result["profile"];    
        
        echo json_encode(['code' => 200, 'avatarImage' => $profile]);
    } catch(exception $e) {
        echo json_encode(['code' => 400, 'msg' => "Error"]);
    }    
?>