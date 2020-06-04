<?php 
include "../../includes/config.php";

try {
    
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];            

        $sql = "SELECT id FROM users WHERE email = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();    

        if ($query->rowCount() < 1) {
            $sql = "INSERT INTO users(firstName,lastName,email) VALUES(:firstName,:lastName,:email)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);    
            $query->execute();                                                                   
        }        

        session_start();

        $_SESSION['login'] = $_POST['email'];            
        $_SESSION['firstname'] = $_POST['firstName'];   
        
    }
    echo json_encode(['code' => 200, 'msg' => "Success"]);
} catch (PDOException $err) {
    echo json_encode(['code' => 400, 'msg' => "Failed"]);
}
?>