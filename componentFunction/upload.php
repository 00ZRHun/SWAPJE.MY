<?php
if(isset($_POST['submit'])){
    // File upload configuration
    $targetDir = "img/adsImages/";
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name   = $_FILES['images']['tmp_name'][$key];
        $size       = $_FILES['images']['size'][$key];
        $type       = $_FILES['images']['type'][$key];
        $error      = $_FILES['images']['error'][$key];
        
        // version 1
        // File upload path
        /* $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        
        // Check whether file type is valid
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){    
            // Store images on the server
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
                $images_arr[] = $targetFilePath;
            }
        } */

        // File upload path
        // $fileName = basename($_FILES['images']['name'][$key]);
        /*  $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName; */
        /* $fileName = $_FILES['images']['name'][$key];
        $fileName = basename($fileName); */
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        // $targetFilePath = $targetDir . basename($fileName);
        
        // Check whether file type is valid
        // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // if(in_array($fileType, $allowTypes)){    
            // Store images on the server
            // if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
            // if(move_uploaded_file($fileName,$targetFilePath)){
            /* if( move_uploaded_file($fileName, ($targetDir.basename($fileName))) ){
                // $images_arr[] = $targetFilePath;
                $images_arr[] = $targetDir.basename($fileName);
                echo $fileName;
            } */
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){    
                // Store images on the server
                if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
                    $images_arr[] = $targetFilePath;
                    echo $fileName;
                    echo $targetFilePath;
                }
            }
        // }

        // version 2
        // Display images without storing in the server
        /* $fileName = $_FILES['images']['name'][$key];
        $images_arr = array();
        $images_arr1 = array();
        $images_arr1[] = $fileName;

        foreach($_FILES['images']['name'] as $key=>$val){
            //display images without stored
            $extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
            $images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
        } */
    }
    
    // Generate gallery view of the images
    var_dump($images_arr);
    if(!empty($images_arr)){ 
?>
        <ul>
            <?php foreach($images_arr as $image_src){ ?>
                <?= "<br>" . $image_src ?>
                <li><img src="<?php echo $image_src; ?>" alt=""></li>
            <?php } ?>
        </ul>
    <?php 
    } if(!empty($images_arr1)){ 
    ?>
        <ul>
            <?php foreach($images_arr1 as $image_src1){ ?>
                <?= "<br>" . $image_src1 ?>
                <?php move_uploaded_file(basename($image_src1), ($targetDir . $image_src1)); ?>
            <?php } ?>
        </ul>
    <?php 
    }}
    ?>