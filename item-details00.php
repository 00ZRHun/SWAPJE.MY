<?php include 'includes/config.php'; ?>

<HTML>
<HEAD>
	<TITLE>PHP Dynamic Star Rating using jQuery</TITLE>
	<style>
		body{width:610;}
		.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
		.demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
		.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
		.demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
		.demo-table ul{margin:0;padding:0;}
		.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
		.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
	</style>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
		function highlightStar(obj,id) {
			removeHighlight(id);		
			$('.demo-table #tutorial-'+id+' li').each(function(index) {
				$(this).addClass('highlight');
				if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
					return false;	
				}
			});
		}

		function removeHighlight(id) {
			$('.demo-table #tutorial-'+id+' li').removeClass('selected');
			$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
		}

		function addRating(obj,id) {
			$('.demo-table #tutorial-'+id+' li').each(function(index) {
				$(this).addClass('selected');
				$('#tutorial-'+id+' #rating').val((index+1));
				if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
					return false;	
				}
			});
			$.ajax({
			url: "add_rating.php",
			data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
			type: "POST"
			});
		}

		function resetRating(id) {
			if($('#tutorial-'+id+' #rating').val() != 0) {
				$('.demo-table #tutorial-'+id+' li').each(function(index) {
					$(this).addClass('selected');
					if((index+1) == $('#tutorial-'+id+' #rating').val()) {
						return false;	
					}
				});
			}
		} 
	</script>
</HEAD>
<BODY>
	<table class="demo-table">
		<tbody>
			<tr>
				<th><strong>Tutorials</strong></th>
			</tr>
<!--rating-->

<?php
// echo "abc";
  $vhid = intval($_GET['vhid']);
  $id = 1;
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
  if ($query->rowCount() > 0) {
      foreach ($results as $result) {
          echo "abc";
          echo $vhid;
          echo $id;
          echo $result->rating;
          echo $result->id;
          echo "cba";
?>
  <!--  -->
  <!--  -->
  <!--  -->
  <tr>
    <td valign="top">
      <!-- <div class="feed_title"><?php echo $tutorial["title"]; ?></div> -->

      <div id="tutorial-<?php echo $result->id; ?>">
        <!-- <input type="hidden" name="rating" id="rating" value="<?php echo $result->rating; ?>" /> -->
        <input type="text" name="rating" id="rating" value="<?php echo $result->rating; ?>" />
        <ul onMouseOut="resetRating(<?php echo $result->id; ?>);">
          <?php
            for($i=1;$i<=5;$i++) {
              $selected = "";
              if(!empty($result->rating) && $i<=$result->rating) {
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

<?php	}} ?>
<!--/rating-->