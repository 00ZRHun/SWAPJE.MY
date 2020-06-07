<?php include 'includes/config.php'; ?>
<?php
    echo "FFF";
    echo $_POST["rating"];
    echo $_POST["id"];

    if(!empty($_POST["rating"]) && !empty($_POST["id"])) {
        /* require_once("Rate.php");
        $rate = new Rate(); */
        // $rate->updateRatingCount($_POST["rating"], $_POST["id"]);
    // 
    // 
    // 
    // 
        $sql = "UPDATE rating SET rating=:rating WHERE id=:id";
        /* $sql = "update ads
            set
            title=:title,
            category=:category,
            companyName=:companyName,
            payPalBusinessAccount=:payPalBusinessAccount,
            contactNo=:contactNo,
            description=:description,
            Vimage1=:vimage1,
            Vimage2=:vimage2,
            Vimage3=:vimage3,
            Vimage4=:vimage4,
            Vimage5=:vimage5
            where id=:id"; */
        $query = $dbh->prepare($sql);
        $query->bindParam(':rating',$_POST["rating"],PDO::PARAM_STR);
        $query->bindParam(':id',$_POST["id"],PDO::PARAM_STR);

        echo $_POST["rating"];
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