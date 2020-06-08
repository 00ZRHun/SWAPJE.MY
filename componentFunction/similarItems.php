 <!-- row 3( Similar-Cars )-->
 <div class="similar_cars">
  <h3>Similar Items</h3>
  <div class="row">
    <?php
      $sql = "SELECT * from items WHERE delmode=0 AND category=:category AND NOT user_id=:id";
      $query = $dbh->prepare($sql);
      $query->bindParam(':category', $category, PDO::PARAM_STR);
      $query->bindParam(':id', $id, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      // echo $results . $query->rowCount() . $id;

      if ($query->rowCount() > 0) {
          foreach ($results as $result) {
    ?>
      <div class="col-md-3 grid_listing">
        <div class="product-listing-m gray-bg">
          <!-- row 1( pic. ) -->
          <div class="product-listing-img">
            <a href="item-details.php?vhid=<?php echo htmlentities($result->id); ?>">
              <img src="img/itemImages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image" />
            </a>
          </div>

          <!-- row 2( content. ) -->
          <div class="product-listing-content">
            <!-- row 1 -->
            <h5>
              <a href="item-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                <?php echo htmlentities($name); ?>
                  , <?php echo htmlentities($result->usedYear); ?> Years Used.
              </a>
            </h5>

            <!-- row 2( price ) -->
            <p class="list-price">
              <?php echo htmlentities(substr($result->overview, 0, 70)); ?>
            </p>

            <!-- row 3( seat, model, fuel ) -->
            <ul class="features_list">
              <li>
                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                <b>Sell : </b>
                <?php if ($result->sell == 1) { ?>
                  RM<?php echo htmlentities($result->totalPrice); ?>
                <?php } else { ?>
                  -
                <?php } ?>
              </li>
              <li>
                <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                <b>Rent : </b>
                <?php if ($result->rent == 1) { ?>
                  RM<?php echo htmlentities($result->pricePerDay); ?>
                <?php } else { ?>
                  -
                <?php } ?>
              </li>
              <li>
                <!-- <i class="fa fa-car" aria-hidden="true"></i> -->
                <b>Swap : </b>
                <?php if ($result->swap == 1) { ?>
                  RM<?php echo htmlentities($result->value); ?>
                <?php } else { ?>
                  -
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    <?php }}else{ ?>
      <section class="about_us section-padding">
        <div class="container">
          <div class="section-header text-center">
            <h3>No related records found</h3>
          </div>
        </div>
      </section>
    <?php } ?>
  </div>
</div>
<!--/Similar-Cars-->