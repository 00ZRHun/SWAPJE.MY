<?php
    // File upload configuration
    $targetDir = "uploads/";
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
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        
        // Check whether file type is valid
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){    
            // Store images on the server
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
                $images_arr[] = $targetFilePath;
            }
        }
    }

    if(!empty($images_arr)){ 
        echo $images_arr;
        var_dump($images_arr);
    }
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        ul, ol, li {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .container{padding: 20px;}
        .upload-div{margin-bottom: 25px;}
        .gallery{width:100%; float:left; margin-top:30px;}
        .gallery ul{margin:0; padding:0; list-style-type:none;}
        .gallery ul li{padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
        .gallery img{width:250px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-div">
            <!-- images upload form -->
            <form method="post" id="uploadForm" enctype="multipart/form-data" action="gallery.php">
                <label>Choose Images</label>
                <input type="file" name="images[]" id="images" multiple >
                <input type="submit" name="submit" value="UPLOAD"/>
            </form>
        
            <!-- display upload status -->
            <div id="uploadStatus"></div>
        </div>

        <div class="gallery">
            <!-- gallery view of uploaded images --> 
            <div class="gallery" id="imagesPreview"></div>
        </div>
    </div>
</body>
</html>