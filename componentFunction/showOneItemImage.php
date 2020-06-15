<?php 
    $imagesData = $result->images;
    if(strpos($imagesData, ', ')) {
        $images = explode(', ', $imagesData);
?>
        <img src="img/itemImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image">
<?php } else { ?>
        <img src="img/itemImages/<?php echo htmlentities($imagesData);?>" class="img-responsive" alt="image">
<?php } ?>