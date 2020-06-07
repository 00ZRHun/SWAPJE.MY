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

        echo $_POST["star"];
        echo $_POST["id"];
        
        $query->execute();
        
        // $msg="Profile Updated Successfully".$sql.$name.$mobileno.$dob;
        $count = $query->execute();
        if($count !== 0){
    // $msg = "Ads Updated Successfully".$sql.$title.$id.$category;
            $msg = "Ads Updated Successfully";
        }
        else{
            $error="Something went wrong. Please try again";
        }
    }
?>