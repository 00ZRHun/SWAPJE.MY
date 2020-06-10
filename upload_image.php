<?php
session_start();
$where = dirname(__FILE__);
include($where . "/includes/config.php");
$categoria_img = '1';
$id_album = '1';

// Loop $_FILES to exeicute all files
foreach ($_FILES as $file) {   
    $nome_file_temporaneo = $file["tmp_name"];
    $nome_file_vero = $file["name"];
    $tipo_file = $file["type"];
    for($i=0;$i<sizeof($tipo_file);$i++) {
        echo "<br>Nome:" . $nome_file_temporaneo[$i]."<br>";
        $dati_file = file_get_contents($nome_file_temporaneo[$i]);
        $query = "INSERT INTO images (category_id,image_big,image_type,id_album) values (:categoria_img,:data,:img_type,:id_album)";

        $stmt = $dbh->prepare($query);

        // 
        /* $stmt->bindParam(":data", $dati_file, PDO::PARAM_STR);
        $stmt->bindParam(":data", $dati_file, PDO::PARAM_LOB); */
        // 

        $stmt->bindParam(":categoria_img", $categoria_img, PDO::PARAM_INT);
        $stmt->bindParam(":data", $dati_file, PDO::PARAM_LOB);
        $stmt->bindParam(":img_type", $tipo_file[$i],PDO::PARAM_STR);
        $stmt->bindParam(":id_album", $id_album, PDO::PARAM_INT);

        echo "<br>".$query;
        echo "<br>categoria_img = " . $categoria_img;
        echo "<br>tipo_file = " . $tipo_file;
        echo "<br>id_album = " . $id_album;
        echo "<br>dati_file = " . $dati_file;

        $stmt->execute();
    }
}
?>