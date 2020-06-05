<?php
echo '1';
//Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$db = 'swapje';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
echo '2';
//insert into database
if(!empty($_POST)) {
 $userId = $_POST['userId'];
 $itemId = $_POST['itemId'];
 mysqli_query($conn, "INSERT INTO favorite (userId, itemId) values ('$userId', '$itemId')"); 
 
 echo "userId : ".$userId."</br>";
 echo "itemId : ".$itemId."</br>";
}
echo '3';
?>