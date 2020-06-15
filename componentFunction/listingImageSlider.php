<section id="listing_img_slider">
  <div><?=$providerID?></div>
  <?php 
    $imagesData = $result->images;
    /* $count = count($images);
    if($count > 1) { */
    if(strpos($imagesData, ', ')) {
      $images = explode(', ', $imagesData);
  ?>
      <!-- <img src="img/adsImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image"> -->
    <?php for ($x = 0; $x < count($images); $x++) { ?>
      <!-- <div><img src="img/itemImages/<?php echo htmlentities($images[$x]); ?>" class="img-responsive" alt="image" width="900" height="560"></div> -->
      <!-- <?php if($x == $count-1){ ?> -->
        <img src="img/itemImages/<?php echo htmlentities($images[$x]);?>" class="img-responsive" alt="image <?=$x+1?> for <?=$result->productName?>" width="900" height="560">
      <!-- <?php }else{ ?>
        <div><img src="img/itemImagesq/<?php echo htmlentities($images[$x]); ?>" class="img-responsive" alt="image <?=$x+1?> for <?=$result->productName?>" width="900" height="560"></div>
      <?php } ?> -->
    <?php }} else { ?>
      <img src="img/itemImages/<?php echo htmlentities($imagesData);?>" class="img-responsive" alt="image <?=$x+1?> for <?=$result->productName?>" width="900" height="560">
    <?php } ?>
</section>