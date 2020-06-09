<?php include 'includes/config.php'; ?>

<!--rating-->
	<table class="demo-table">
		<tbody>
			<!-- <tr>
				<th><strong>Tutorials</strong></th>
			</tr> -->

<?php
// echo "abc";
  $vhid = intval($_GET['vhid']);
  $id = $userId;
/* echo $vhid;
echo $id; */
  $sql = "SELECT * 
  from rating
  where itemId=:vhid AND userId=:userId
  LIMIT 1";
  /* $sql = "SELECT * 
  from items 
  LEFT JOIN rating
  ON items.id = rating.itemId
  where items.id=:vhid AND rating.userId=:userId AND delmode=0
  LIMIT 1"; */
/* echo $sql;
echo $id;  */
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->bindParam(':userId', $id, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
/* echo $vhid;
echo $id; */
// echo $query->rowCount();
  /* if ($query->rowCount() === 0) {
    $sql = "INSERT INTO rating
      (itemId,userId)
      VALUE(:vhid,:userId)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->bindParam(':userId', $id, PDO::PARAM_STR);
    $query->execute();
    echo "abc";
    echo $sql;
    echo $vhid;
    echo $id;
  } */
  if ($query->rowCount() > 0) {
      foreach ($results as $result) {
        
          /* echo "1";
          echo "abc";
          echo $vhid;
          echo $id;
          echo $result->star;
          echo $result->id;
          echo "cba"; */
?>
  <tr>
    <td valign="top">
      <!-- <div class="feed_title"><?php echo $tutorial["title"]; ?></div> -->

      <div id="tutorial-<?php echo $result->id; ?>">
        <!-- <input type="hidden" name="rating" id="rating" value="<?php echo $result->star; ?>" /> -->
        <input type="hidden" name="rating" id="rating" value="<?php echo $result->star; ?>" />
        <ul onMouseOut="resetRating(<?php echo $result->id; ?>);">
          <?php
            for($i=1;$i<=5;$i++) {
              $selected = "";
              if(!empty($result->star) && $i<=$result->star) {
                $selected = "selected";
              }
          ?>
          <!-- <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);" onClick="addRating(this,<?php echo $tutorial["id"]; ?>);">&#9733;</li>   -->
          <li class='<?php echo $selected; ?>' 
            onmouseover="highlightStar(this,<?php echo $result->id; ?>);"
            onmouseout="removeHighlight(<?php echo $result->id; ?>);" 
            onClick="addRating(this,<?php echo $result->id; ?>);"
          >
              &#9733;
          </li>  
          <?php }  ?>
        <ul>
      </div>

      <!-- <div><?php echo $tutorial["description"]; ?></div> -->
    </td>
  </tr>
  <!--  -->
  <!--  -->
  <!--  -->

<?php	}}else{ ?>
<?php	
  $tempId = 100;
  $itemId = $vhid;
  $userId = $id;

  /* echo "2";
  echo $sql;
  echo " id=" . $id;
  echo " vhid=" . $vhid;

  echo " rowCount=" . $query->rowCount(); */
?>
  <tr>
    <td valign="top">
      <div id="tutorial-<?php echo $tempId; ?>">
        <!-- <input type="hidden" name="rating" id="rating" value="<?php echo $result->star; ?>" /> -->
        <input type="hidden" name="rating" id="rating" value="0" />
        <ul onMouseOut="resetRating(<?php echo $tempId; ?>);">
          <?php
            for($i=1;$i<=5;$i++) {
              $selected = "";
              if(!empty($result->star) && $i<=$result->star) {
                $selected = "selected";
              }
          ?>

          <li class='<?php echo $selected; ?>' 
            onmouseover="highlightStar(this,<?php echo $tempId; ?>);"
            onmouseout="removeHighlight(<?php echo $tempId; ?>);" 
            onClick="insertRating(this,<?= $itemId ?>,<?= $userId ?>,<?= $tempId; ?>);"
            
          >
              &#9733;
          </li>  
          <?php }  ?>
        <ul>
      </div>
    </td>
  </tr>
<?php } ?>
    </tbody>
	</table>
<!--/rating-->