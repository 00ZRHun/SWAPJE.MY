<?php
    include("includes/config.php");

    try {
        if(isset($_REQUEST["search_user"])){
            // create prepared statement
            $sql = "SELECT id, firstName, lastName FROM users WHERE firstName LIKE :search_user OR lastName LIKE :search_user";
            $stmt = $dbh->prepare($sql);
            $term = $_REQUEST["search_user"] . '%';
            // bind parameters to statement
            $stmt->bindParam(":search_user", $term);
            // execute the prepared statement
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    echo "<p id=". $row["id"] .">" . $row["firstName"] . " " . $row["lastName"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        }  
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
?>