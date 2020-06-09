<?php
$img0 = $_POST['image0'];
$img1 = $_POST['image1'];
$img2 = $_POST['image2'];
$img3 = $_POST['image3'];
$img4 = $_POST['image4'];

/* echo
"$_POST = " .
$_POST['image0'] . " " .
$_POST['image1'] . " " .
$_POST['image2'] . " " .
$_POST['image3'] . " " .
$_POST['image4']; */

$folderPath = "upload/";

$image_parts0 = explode(";base64,", $img0);
$image_parts1 = explode(";base64,", $img1);
$image_parts2 = explode(";base64,", $img2);
$image_parts3 = explode(";base64,", $img3);
$image_parts4 = explode(";base64,", $img4);

$image_type_aux0 = explode("image/", $image_parts0[0]);
$image_type_aux1 = explode("image/", $image_parts1[0]);
$image_type_aux2 = explode("image/", $image_parts2[0]);
$image_type_aux3 = explode("image/", $image_parts3[0]);
$image_type_aux4 = explode("image/", $image_parts4[0]);

$image_type0 = $image_type_aux0[1];
$image_type1 = $image_type_aux1[1];
$image_type2 = $image_type_aux2[1];
$image_type3 = $image_type_aux3[1];
$image_type4 = $image_type_aux4[1];

$image_base640 = base64_decode($image_parts0[1]);
$image_base641 = base64_decode($image_parts1[1]);
$image_base642 = base64_decode($image_parts2[1]);
$image_base643 = base64_decode($image_parts3[1]);
$image_base644 = base64_decode($image_parts4[1]);

$fileName0 = uniqid() . '.png';
$fileName1 = uniqid() . '.png';
$fileName2 = uniqid() . '.png';
$fileName3 = uniqid() . '.png';
$fileName4 = uniqid() . '.png';

$file0 = $folderPath . $fileName0;
$file1 = $folderPath . $fileName1;
$file2 = $folderPath . $fileName2;
$file3 = $folderPath . $fileName3;
$file4 = $folderPath . $fileName4;

file_put_contents($file0, $image_base640);
file_put_contents($file1, $image_base641);
file_put_contents($file2, $image_base642);
file_put_contents($file3, $image_base643);
file_put_contents($file4, $image_base644);

print_r($fileName0);
print_r($fileName1);
print_r($fileName2);
print_r($fileName3);
print_r($fileName4);