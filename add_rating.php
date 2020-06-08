<?php include 'includes/config.php'; ?>
<?php
    echo "FFF";
    echo $_POST["star"];
    echo $_POST["id"];

    if(!empty($_POST["star"]) && !empty($_POST["id"])) {
        $sql = "UPDATE rating SET star=:star WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':star',$_POST["star"],PDO::PARAM_STR);
        $query->bindParam(':id',$_POST["id"],PDO::PARAM_STR);
        $query->execute();
        
        /* $count = $query->execute();
        if($count !== 0){
            $msg = "Star Rate Updated Successfully";
        }
        else{
            $error="Something went wrong. Please try again";
        } */
    }

    if(!empty($_POST["itemId"]) && !empty($_POST["userId"]) && !empty($_POST["star"])) {
        $sql = "INSERT INTO rating
            (itemId,userId,star)
            VALUE(:itemId,:userId,:star)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':itemId',$_POST["itemId"],PDO::PARAM_STR);
        $query->bindParam(':userId',$_POST["userId"],PDO::PARAM_STR);
        $query->bindParam(':star',$_POST["star"],PDO::PARAM_STR);
        // echo $_POST["star"];
        $query->execute();
        
        /* $count = $query->execute();
        if($count !== 0){
            $msg = "Star Rate Updated Successfully";
        }
        else{
            $error="Something went wrong. Please try again";
        } */
    }
?>