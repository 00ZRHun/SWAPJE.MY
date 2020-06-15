<button type="button" class="close" data-dismiss="abc" aria-label="Close" 
        onclick="
        document.getElementById('ads').outerHTML = '';
        // document.getElementById('ads').style.visibility='hidden';
        // document.getElementById('ads2').style.visibility='visible';
">
        <span aria-hidden="true">
                &times;
        </span>
</button>
                  
<?php 
    $imagesData = $result->images;
    if(strpos($imagesData, ', ')) {
        $images = explode(', ', $imagesData);
?>
        <!-- <img id="imgId2" src="img/adsImages/abc.png" class="img-responsive" alt="ads closed" style="display: block; margin-left: auto; margin-right: auto; width: 50%; visibility: hidden;"> -->
        <img src="img/adsImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="ads" style="display: block; margin-left: auto; margin-right: auto; width: 50%; height: 50%;">
<?php } else { ?>
        <img src="img/adsImages/<?php echo htmlentities($imagesData);?>" class="img-responsive" alt="image">
<?php } ?>