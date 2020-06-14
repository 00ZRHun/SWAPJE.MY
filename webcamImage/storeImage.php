<?php
// echo "max = " . $max;

// $images = $_POST['image'];
$images = array_filter($_POST['image']);
$folderPath = "upload/";

/* echo '<pre>';
print_r($_POST['image']);
echo '<pre>';

$images = $_POST['image'];

$i = 0;
echo $images[$i]; */

/* echo '<br><pre>';
print_r($images);
echo '<pre>'; */

for($i=0; $i<count($images); $i++){
    // if($image[$i] !== null){
    if(is_null($images[$i])){
        echo "NOT null";
    }else {
        echo "null";
    }
    // if(!is_null($image[$i])){
        echo $images[$i] . "<br>";
        $image_parts = explode(";base64,", $images[$i]);
    // if($image_parts !== ""){

        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
    
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid(rand(0,100), true) . '.png';
    
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
    // }
}

// print_r($fileName);
/* echo '<br>image_parts = ' . $image_parts;
echo '<br>image_type_aux = ' . $image_type_aux;
echo '<br>image_type = ' . $image_type;
// echo $image_base64;
echo "<br>fileName = " . $fileName;
echo "<br>file = " . $file; */