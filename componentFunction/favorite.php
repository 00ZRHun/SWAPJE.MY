<form class="favourite-form" name="form" action="" method="post">
  <?php
  $vhid = intval($_GET['vhid']);
  /* $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid
  from tblvehicles join tblbrands
  on tblbrands.id=tblvehicles.VehiclesBrand
  where tblvehicles.id=:vhid"; */
  $sql = "SELECT * 
  from items 
  LEFT JOIN favorite
  ON items.id = favorite.itemId
  where items.id=:vhid AND favorite.userId=:userId AND delmode=0
  LIMIT 1";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':userId', $id, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
      foreach ($results as $result) {
          $_SESSION['brndid'] = $result->bid;
          $providerID = $result->user_id;
  ?>
    <button class="favourite-icon" name="cancelfavorite" value="<?= $id; ?>">
      <i class="fa fa-heart iconOnly cancelfavorite" aria-hidden="true" id="heartIcon"></i>
    </button>
  <?php }}else{ ?>
    <button class="favourite-icon" name="addfavorite" value="<?= $id; ?>">
      <i class="fa fa-heart-o iconOnly addFavorite" aria-hidden="true" id="heartIcon"></i>
    </button>
  <?php } ?>
</form>