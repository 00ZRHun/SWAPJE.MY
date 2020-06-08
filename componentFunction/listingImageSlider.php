<section id="listing_img_slider">
  <div><?=$providerID?></div>
  <div><img src="img/itemImages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/itemImages/<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/itemImages/<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="img/itemImages/<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive"  alt="image" width="900" height="560"></div>

  <?php
if ($result->Vimage5 == "") {

        } else {
            ?>

    <div>
      <img src="img/itemImages/<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive" alt="image" width="900" height="560">
    </div>

  <?php
}
        ?>

</section>