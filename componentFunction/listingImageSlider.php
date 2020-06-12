<?php $images = explode(', ', $result->images); ?>
<!-- <img src="img/adsImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image"> -->

<section id="listing_img_slider">
  <div><?=$providerID?></div>
  <?= $count = count($images) ?>
    <?php for ($x = 0; $x < count($images); $x++) { ?>
      <!-- <div><img src="img/itemImages/<?php echo htmlentities($images[$x]); ?>" class="img-responsive" alt="image" width="900" height="560"></div> -->
      <!-- <?php if($x == $count-1){ ?> -->
        <img src="img/vehicleimages/<?php echo htmlentities($images[$x]);?>" class="img-responsive" alt="image <?=$x+1?> for <?=$result->productName?>" width="900" height="560">
      <!-- <?php }else{ ?>
        <div><img src="img/itemImagesq/<?php echo htmlentities($images[$x]); ?>" class="img-responsive" alt="image <?=$x+1?> for <?=$result->productName?>" width="900" height="560"></div>
      <?php } ?> -->
    <?php } ?>
</section>